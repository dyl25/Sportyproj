<?php

/**
 * Controler des utilisateurs pour le backoffice
 *
 * @author Dylan Vansteenacker
 */
class User_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');

        if (!$this->session->userdata['id']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    /**
     * Presentation des utilisateurs
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index($offset = 0) {
        $data['title'] = 'Gestion des utilisateurs';
        $limit = 15;
        $data['users'] = $this->user_model->getUsers('asc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('backoffice/user_admin/index');
        $config['total_rows'] = $this->user_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();

        $data['content'] = [$this->load->view('backoffice/user/index', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Upload une image
     * @return boolean Si l'image a ete upload ou pas
     */
    private function uploadPicture() {
        $config['upload_path'] = './assets/images/upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            return false;
        }

        return $this->upload->data('file_name');
    }

    /**
     * Modifie l'utilisateur selon son rôle.
     * @param int $id L'id de l'utilisateur.
     * @param string $roleName Le nom du rôle choisit dans le formulaire.
     * @return bool True si le rôle a été modifié correctement sinon false.
     */
    private function updateByRole($id, $roleName) {
        if ($this->user_model->isRole($id, 'athlete') && $roleName == 'user') {
            //si on baisse ses privilèges il faut l'enlever des athlètes
            return $this->athlete_model->delete(['user_id' => $id]);
            //user vers athlète
        } elseif ($this->user_model->isRole($id, 'user') && $roleName == 'athlete') {
            //si on augmente ses privilèges il faut l'ajouter aux athlètes
            return $this->prepareAthlete($id);
        } elseif ($this->user_model->isRole($id, 'athlete') && $roleName == 'athlete') {
            return $this->prepareAthlete($id, 'update');
        } else {
            return true;
        }
    }

    /**
     * Prepare un athlete pour son ajout ou modification
     * @param int $id L'id de l'utilisateur
     * @param string $method Le type de modification
     * @return string Le status de l'ajout ou de la modification
     */
    private function prepareAthlete($id, $method = 'create') {
        $this->load->model('athlete_model');
        $dataDbAthlete['user_id'] = $id;
        $dataDbAthlete['club_id'] = $this->input->post('club');
        $dataDbAthlete['register_num'] = $this->input->post('registerNum');
        $dataDbAthlete['category_id'] = $this->input->post('category');
        if ($method == 'create') {
            return $this->athlete_model->create($dataDbAthlete);
        } elseif ($method == 'update') {
            return $this->athlete_model->update(['user_id' => $id], $dataDbAthlete);
        }
    }

    /**
     * Prépare un utilisateur pour son ajout ou edition
     * @param string $method La metode d'ajout ou de modification
     * @param bool $upload Il y a-t-il une image à upload
     * @param int $id L'id de l'utilisateur pour update
     * @return string Le message et le status de l'ajout ou la modification
     */
    private function prepareUser($method, $upload = false, $id = null) {
        $dataDb['profile_image'] = null;
        //gestion de l'image de profile
        if ($upload) {

            $dataDb['profile_image'] = $this->uploadPicture();

            if (!$dataDb['profile_image']) {
                return [
                    'msg' => "Il y a eu un problème lors du téléchargement de l'image : " . $this->upload->display_errors(''),
                    'status' => 'error'
                ];
            }
        }

        $dataDb['login'] = $this->input->post('login');
        $dataDb['email'] = $this->input->post('email');
        if ($this->input->post('password')) {
            $dataDb['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        //recuperation de l'id du role
        $roleName = $this->input->post('role');
        $dataDb['role_id'] = $this->role_model->getId($roleName);

        if ($method == 'create') {
            $userId = $this->user_model->createUser($dataDb);
            if (!$userId) {
                $msg = "Problème lors de l'ajout dans la base de donnée";
                $status = 'error';
            } else {
                //si le user cree est un athlete
                if ($roleName == 'athlete') {

                    //return $this->prepareAthlete($userId);
                    if (!$this->prepareAthlete($userId)) {
                        $msg = "Il y a eu un problème lors de l'insertion de l'utilisateur dans les athlètes";
                        $status = 'error';
                    }
                }

                $msg = "L'utilisateur a bien été ajouté !";
                $status = 'success';
            }
        } elseif ($method == 'update') {

            if ($this->updateByRole($id, $roleName)) {
                $where = ['id' => $id];
                if (!$this->user_model->update($where, $dataDb)) {
                    $msg = "Problème lors de la modification dans la base de donnée.";
                    $status = 'error';
                } else {
                    $msg = "L'utilisateur a bien été modifié.";
                    $status = 'success';
                }
            } else {
                $msg = "Problème lors de la modification du rôle dans la base de donnée.";
                $status = 'error';
            }
        }
        return [
            'msg' => $msg,
            'status' => $status,
        ];
    }

    /**
     *  Ajoute un utilistauer
     */
    public function add() {

        //pour generer un fomr multipart pour le telechargement d'image
        $this->load->helper('form');

        //chargement des differents models
        $this->load->model('role_model');
        $this->load->model('club_model');
        $this->load->model('categoryAthlete_model');

        $data['title'] = 'Ajout d\'un utilisateur';
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['scripts'] = [base_url() . 'assets/javascript/addAthlete.js'];
        $data['roles'] = $this->role_model->getRoles();
        $data['clubs'] = $this->club_model->getClubs();
        $data['categories'] = $this->categoryAthlete_model->getCategories();

        //definition des différentes regle de validation du formulaire
        $this->form_validation->set_rules('login', 'login', 'required|min_length[3]|is_unique[users.login]|trim');
        $this->form_validation->set_rules('email', 'e-mail', 'required|is_unique[users.email]|trim');
        $this->form_validation->set_rules('password', 'mot de passe', 'required');
        $this->form_validation->set_rules('passwordVerif', 'vérification du mot de passe', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'role', 'required');

        //seulement si l'id du role est athlete
        if ($this->input->post('role') == 'athlete') {
            $this->form_validation->set_rules('club', 'club', 'required|is_natural_no_zero');
            /*
             * ne doit pas etre unique car le dossard change chaque annee et 
             * un athlete peut recevoir un dossard existant de l'annee passee 
             */
            $this->form_validation->set_rules('registerNum', 'numéro de dossard', 'trim|required|is_natural');
            $this->form_validation->set_rules('category', 'catégorie', 'required|is_natural_no_zero');
        }

        if ($this->form_validation->run() == true) {

            //determine si une image est uploadee
            $upload = $_FILES['image']['size'] > 0;
            $data['notification'] = $this->prepareUser('create', $upload);
        }

        $data['content'] = [$this->load->view('backoffice/user/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Edition d'un utilisateur.
     * @param int $id L'id de l'utilisateur
     */
    public function edit($id) {
        $this->load->model('athlete_model');
        try {
            $data['user'] = $this->user_model->getBy('id', $id);
            if ($data['user']->name == 'athlete') {
                $data['athlete'] = $this->athlete_model->getBy('user_id', $id);
            }
        } catch (DomainException $e) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->model('role_model');
        $this->load->model('club_model');
        $this->load->model('categoryAthlete_model');

        $data['title'] = 'Edition d\'un utilisateur';
        $data['scripts'] = [base_url() . 'assets/javascript/addAthlete.js'];
        $data['attributes'] = [
            'class' => 'col s12'
        ];
        $data['roles'] = $this->role_model->getRoles();
        $data['clubs'] = $this->club_model->getClubs();
        $data['categories'] = $this->categoryAthlete_model->getCategories();

        $this->form_validation->set_rules('login', 'login', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('email', 'e-mail', 'required|is_unique_update[users.email.id.' . $data['user']->id . ']|trim');
        $this->form_validation->set_rules('password', 'mot de passe', 'trim|min_length[3]');
        $this->form_validation->set_rules('passwordVerif', 'vérification du mot de passe', 'matches[password]|trim');
        $this->form_validation->set_rules('role', 'role', 'required');

        if ($this->input->post('role') == 'athlete') {
            $this->form_validation->set_rules('club', 'club', 'required|is_natural_no_zero');
            /*
             * ne doit pas etre unique car le dossard change chaque annee et 
             * un athlete peut recevoir un dossard existant de l'annee passee 
             */
            $this->form_validation->set_rules('registerNum', 'numéro de dossard', 'trim|required|is_natural');
            $this->form_validation->set_rules('category', 'catégorie', 'required|is_natural_no_zero');
        }

        if ($this->form_validation->run() == true) {
            //determine si une image est uploadee
            $upload = $_FILES['image']['size'] > 0;

            $data['notification'] = $this->prepareUser('update', $upload, $id);
        }

        $data['content'] = [$this->load->view('backoffice/user/edit', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Supprime un utilisateur
     * @param int $id L'id de l'utilisateur
     */
    public function delete($id) {
        try {
            //récupération de l'image de l'utilisateur
            $userImage = $this->user_model->getBy('id', $id)->profile_image;
        } catch (Exception $ex) {
            $msg = "Problème lors de la suppression de l'image de l'utilisateur: " . $ex->getMessage();
            $status = "error";
        }

        //suppression si image existante
        if (!is_null($userImage) || !empty($userImage)) {
            $fileDelete = unlink(FCPATH . "/assets/images/upload/" . $userImage);

            if (!$fileDelete) {
                $msg = "Problème lors de la suppression de l'image de l'article.";
                $status = "error";
            }
        }

        //si il n'y a pas d'image existante ou l'image à été supprimée correctement
        if (!isset($fileDelete) || $fileDelete) {
            try {
                if ($this->user_model->delete(['id' => $id])) {

                    $msg = "Utilisateur supprimé !";
                    $status = "success";
                } else {
                    $msg = "Problème lors de la suppression dans la base de donnée";
                    $status = "error";
                }
            } catch (Exception $ex) {
                $msg = "Problème lors de la suppression de l'utilisateur: " . $ex->getMessage();
                $status = "error";
            }
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/user_admin', 'location', 301);
    }

}
