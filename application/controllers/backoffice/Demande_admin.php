<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller pour les clubs du backoffice
 *
 * @author Dylan Vansteenacker
 */
class Demande_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('demande_model');

        //before filter afin de voir si l'utilisateur peut accéder au backoffice
        if (!$this->session->userdata['login']) {
            redirect('login');
        }

        if (!$this->user_model->isAdmin($this->session->userdata['id'])) {
            redirect('accueil');
        }
    }

    /**
     * Affichage spécifique pour les administarteurs des différentes commandes 
     * de gestions des articles
     */
    public function index($offset = 0) {
        $data['title'] = 'Gestion des demandes';
        $limit = 15;
        $data['demandes'] = $this->demande_model->getDemandes('asc', $limit, $offset);
        
        $this->load->library('pagination');

        //config pour la pagination
        $config['base_url'] = site_url('backoffice/demande_admin/index');
        $config['total_rows'] = $this->demande_model->count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['paginationLinks'] = $this->pagination->create_links();
        
        $data['content'] = [$this->load->view('backoffice/demande/index', $data, true)];
        $this->load->view('backoffice/layout_backoffice', $data);
    }

    /**
     * Ajout d'un club pour backoffice.
     */
    public function add($id = null) {

        try {
            $data['demande'] = $this->demande_model->getBy('id', $id);
        } catch (DomainException $e) {
            show_404();
        }

        $this->load->model('role_model');
        $this->load->model('athlete_model');

        //préparation pour l'ajout
        $dataDb['user_id'] = $data['demande']->user_id;
        $dataDb['category_id'] = $data['demande']->category_id;
        $dataDb['register_num'] = $data['demande']->dossard;

        $where = ['id' => $dataDb['user_id']];
        //role a update dans la table des utilisateurs
        $dataDbUser['role_id'] = $this->role_model->getId('athlete');

        if ($this->athlete_model->create($dataDb) &&
                $this->user_model->update($where, $dataDbUser) &&
                $this->demande_model->delete(['id' => $id])) {
            $msg = "L'utilisateur a été ajouté aux athlètes";
            $status = "success";
        } else {
            $msg = "Problème lors de l'ajout de l'utilisateur aux athlètes";
            $status = "error";
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/demande_admin', 'location', 301);
    }

    /**
     * Supprime une demande
     * @param int $id L'id de la demande.
     */
    public function delete($id) {

        if ($this->demande_model->delete(['id' => $id])) {
            $msg = "Demande supprimé !";
            $status = "success";
        } else {
            $msg = "Problème lors de la suppression dans la base de donnée";
            $status = "error";
        }

        $this->session->set_flashdata('notification', [
            'msg' => $msg,
            'status' => $status,
        ]);

        redirect('backoffice/demande_admin', 'location', 301);
    }

}
