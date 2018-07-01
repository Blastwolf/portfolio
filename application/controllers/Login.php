<?php


class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('connect_model');
        $this->load->model('experiences_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $method = $this->router->fetch_method();
        echo $method;
        if ($this->session->username == 'admin') redirect('administration');
    }

    public function index()
    {
        $data['title'] = 'Page de connection';

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('administration/login');
            $this->load->view('templates/footer');

        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $userData = $this->connect_model->connect($username);
            $hash = $userData['password'];
            var_dump($password);
            if ($userData['username'] == $username && password_verify($password, $userData['password'])) {
                $_SESSION['username'] = $username;
                redirect('administration');
            } else {
                $this->session->set_flashdata('message', 'Mot de passe/Nom d\'utilisateur incorrect');
                echo 'putin de merde';
                var_dump($hash);
                redirect('login', 'index');

            }
        }
    }
}
