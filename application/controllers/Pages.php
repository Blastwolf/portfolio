<?php

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->model('experiences_model');
        $this->load->model('competences_model');

    }


    public function index()
    {
        $data['experiences'] = $this->experiences_model->get_experiences();
        $data['competences'] = $this->competences_model->get_competences();

        $this->load->view('pages/index', $data);

    }


    public function contact()
    {

        $data = $this->input->post();

        $this->form_validation->set_rules('name', 'nom', 'required|max_length[30]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'message', 'required');

        $this->email->from($data['email'], $data['name']);//
        $this->email->to('test434@outlook.fr');

        $this->email->subject($data['name']);
        $this->email->message($data['message']);

        if ($this->form_validation->run() == FALSE) {

            $data['experiences'] = $this->experiences_model->get_experiences();
            $data['competences'] = $this->competences_model->get_competences();

            $this->load->view('pages/index', $data);

        } else {
            if ($this->email->send()) {
                $this->session->set_flashdata('messageOk', 'Votre message a bien été envoyé.');
                redirect('#three');
            } else {
                $this->session->set_flashdata('messageKo', 'Il y a eu un problème lors de l\'envoi.');
                redirect('#three');
            }
        }
    }

}