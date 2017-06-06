<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les resultats du backoffice
 *
 * @author Dylan Vansteenacker
 */
class Result_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('result_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    /**
     * Determine le type de résultat
     * @param string $type Le type d'epreuve
     * @return string Le type de resultat
     */
    private function getResultType($type) {
        switch ($type) {
            case 'course':
                $resultType = 'time';
                break;
            case 'marche':
                $resultType = 'time';
                break;
            case 'saut':
                $resultType = 'dist';
                break;
            case 'lancer':
                $resultType = 'dist';
                break;
            case 'épreuves combinées':
                $resultType = 'points';
                break;
        }

        return $resultType;
    }

    /**
     * Presentation des resultats
     * @param int $offset Point de départ pour la recherche de résultat pour la 
     * pagination
     */
    public function index($offset = 0) {
        $data['title'] = 'Gestion des résultats';
        $limit = 15;
        $data['results'] = $this->result_model->getResults('asc', $limit, $offset);

        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('backoffice/result_admin/index');
        $config['total_rows'] = $this->result_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();
$this->output->enable_profiler(TRUE);
        $data['content'] = [$this->load->view('backoffice/result/index', $data, true)];

        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un resultat pour backoffice.
     */
    public function add() {

        $this->load->model('event_model');
        $this->load->model('athlete_model');
        $this->load->model('epreuve_model');

        $data['title'] = 'Ajout d\'un résultat';
        $data['attributes'] = [
            'class' => 'col s12'
        ];

        try {
            $data['events'] = $this->event_model->getByType('compétition');
        } catch (DomainException $e) {
            $msg = $e->getMessage();
            $status = 'error';
            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }
        $data['athletes'] = $this->athlete_model->getAthletes();
        $data['epreuves'] = $this->epreuve_model->getEpreuves();

        $this->form_validation->set_rules('event', 'événement associé', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('epreuve', 'epreuve', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('result', 'adresse', 'trim|required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('athlete', 'athlète', 'required|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $dataDb['epreuve_id'] = $this->input->post('epreuve');
            $dataDb['event_id'] = $this->input->post('event');
            $dataDb['athlete_id'] = $this->input->post('athlete');
            $dataDb['result'] = $this->input->post('result');

            if (!$this->result_model->create($dataDb)) {
                $msg = "Problème lors de l'ajout dans la base de donnée";
                $status = 'error';
            } else {
                $msg = "Le resultat a bien été ajouté !";
                $status = 'success';
            }
            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }

        $data['content'] = [$this->load->view('backoffice/result/add', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Modification d'un resultats
     * @param int $id L'id du resultat
     */
    public function edit($id = null) {

        try {
            $data['result'] = $this->result_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $this->load->model('event_model');
        $this->load->model('athlete_model');
        $this->load->model('epreuve_model');

        $data['title'] = 'Modification d\'un résultat';
        $data['attributes'] = [
            'class' => 'col s12'
        ];

        try {
            $data['events'] = $this->event_model->getByType('compétition');
        } catch (DomainException $e) {
            $msg = $e->getMessage();
            $status = 'error';
            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }
        $data['athletes'] = $this->athlete_model->getAthletes();
        $data['epreuves'] = $this->epreuve_model->getEpreuves();

        $this->form_validation->set_rules('event', 'événement associé', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('epreuve', 'epreuve', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('result', 'adresse', 'trim|required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('athlete', 'athlète', 'required|is_natural_no_zero');

        if ($this->form_validation->run() == true) {
            $dataDb['epreuve_id'] = $this->input->post('epreuve');
            $dataDb['event_id'] = $this->input->post('event');
            $dataDb['athlete_id'] = $this->input->post('athlete');
            $dataDb['result'] = $this->input->post('result');

            if (!$this->result_model->update(['id' => $id], $dataDb)) {
                $msg = "Problème lors de la modification dans la base de donnée";
                $status = 'error';
            } else {
                $msg = "Le resultat a bien été modifié !";
                $status = 'success';
            }
            $data['notification'] = [
                'msg' => $msg,
                'status' => $status,
            ];
        }

        $data['content'] = [$this->load->view('backoffice/result/edit', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Supprime un resultat
     * @param int $id L'id du resultat.
     */
    public function delete($id) {

        try {
            if ($this->result_model->delete(['id' => $id])) {

                $msg = "Résultat supprimé !";
                $status = "success";
            } else {
                $msg = "Problème lors de la suppression dans la base de donnée";
                $status = "error";
            }
        } catch (Exception $ex) {
            $msg = "Problème lors de la suppression du résultat: " . $ex->getMessage();
            $status = "error";
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/result_admin', 'location', 301);
    }

}
