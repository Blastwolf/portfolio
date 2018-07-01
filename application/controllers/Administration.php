<?php

class Administration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('experiences_model');
        $this->load->model('competences_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->library('session');

        if (!isset($_SESSION['username'])) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Administration';
        $data['experiences'] = $this->experiences_model->get_experiences();
        $data['competences'] = $this->competences_model->get_competences();

        if (empty($data['experiences']) || empty($data['competences'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('administration/backendView', $data);
        $this->load->view('templates/footer');

    }

    public function addExperience()
    {
        $data['title'] = 'Ajouter une experience';


        $this->form_validation->set_rules('date_debut', 'Date de début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date de fin', 'required');
        $this->form_validation->set_rules('titre', 'titre', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('lien', 'lien', 'required');


        if ($this->form_validation->run() == FALSE || $this->upload->do_upload('userfile') == FALSE) {

            $data['error'] = $this->upload->display_errors('<div class="alert alert-warning">', '</div>');
            $data['experience'] = $this->input->post();

            $this->load->view('templates/header', $data);
            $this->load->view('administration/addExperience', $data);
            $this->load->view('templates/footer');
        } else {
            $this->experiences_model->set_experiences();
            $this->session->set_flashdata('messageExp', 'Experience ajouté avec succé !');
            redirect('administration');
        }
    }


    public function editExperience($id = NULL)
    {
        if (is_null($id) || !is_numeric($id)) {
            show_404();
        }

        $data['title'] = 'Modifier une experience';

        $data['experience'] = $this->experiences_model->get_experiences($id);

        if (empty($data['experience'])) {
            show_404();
        }


        $data['title'] = $data['experience']['titre'];

        $this->form_validation->set_rules('date_debut', 'Date de début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date de fin', 'required');
        $this->form_validation->set_rules('titre', 'titre', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('lien', 'lien', 'required');


        if ($this->form_validation->run() == FALSE) {

            $data['error'] = '';
            $this->load->view('templates/header', $data);
            $this->load->view('administration/editExperience', $data);
            $this->load->view('templates/footer');
        } else {
            if (!empty($_FILES['userfile']['name'])) {
                if ($this->upload->do_upload('userfile') == FALSE) {
                    $data['error'] = $this->upload->display_errors('<div class="alert alert-warning">', '</div>');
                    $this->load->view('templates/header', $data);
                    $this->load->view('administration/editExperience', $data);
                    $this->load->view('templates/footer');
                } else {
                    unlink('uploads/' . $data['experience']['image']);
                    $this->experiences_model->update_experience($id, TRUE);
                    $this->session->set_flashdata('messageExp', 'Experience modifié avec succé !');
                    redirect('administration/index');
                }
            } else {
                $this->experiences_model->update_experience($id);
                $this->session->set_flashdata('messageExp', 'Experience modifié avec succé !');
                redirect('administration/index');
            }

        }

    }

    public function deleteExperience($id = NULL)
    {
        if (is_null($id) || !is_numeric($id)) {
            show_404();
        }

        $data['experience'] = $this->experiences_model->get_experiences($id);

        if (empty($data['experience'])) {
            show_404();
        }

        unlink('uploads/' . $data['experience']['image']);
        $this->experiences_model->delete_experience($id);
        $this->session->set_flashdata('messageExp', 'Experience supprimé avec succé !');

        redirect('administration');

    }


    public function addCompetence()
    {
        $data['title'] = 'Ajouter une compétence';

        $this->form_validation->set_rules('name', 'competence', 'required');
        $this->form_validation->set_rules('level', 'niveau de maitrise', 'required');
        $this->form_validation->set_rules('category', 'categorie', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('administration/addCompetence');
            $this->load->view('templates/footer');
        } else {
            $this->competences_model->set_competence();
            $this->session->set_flashdata('messageComp', 'Compétence ajouté avec succé !');
            redirect('administration');
        }

    }

    public function editCompetence($id = NULL)
    {
        if (is_null($id) || !is_numeric($id)) {
            show_404();
        }

        $data['title'] = 'Modifier une compétence';
        $data['competence'] = $this->competences_model->get_competences($id);

        if (empty($data['competence'])) {
            show_404();
        }

        $this->form_validation->set_rules('name', 'competence', 'required');
        $this->form_validation->set_rules('level', 'niveau de maitrise', 'required');
        $this->form_validation->set_rules('category', 'categorie', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('administration/editCompetence', $data);
            $this->load->view('templates/footer');
        } else {
            $this->competences_model->update_competence($id);
            $this->session->set_flashdata('messageComp', 'Compétence modifié avec succé !');
            redirect('administration');
        }

    }

    public function deleteCompetence($id = NULL)
    {
        if (is_null($id) || !is_numeric($id)) {
            show_404();
        }
        if (!$this->competences_model->delete_competence($id)) {
            show_404();
        } else {
            $this->session->set_flashdata('messageComp', 'Compétence supprimé avec succé !');
            redirect('administration');
        }
    }


}