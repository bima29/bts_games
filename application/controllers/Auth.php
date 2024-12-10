<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_DB $db
 */
class Auth extends CI_Controller {
    public function index()
    {
        $this->load->view('Partials/Fitur/header');
        $this->load->view('Partials/Fitur/Login/content');
        $this->load->view('Partials/Fitur/footer');
    }
    public function sign_up()
    {
        $this->load->view('Partials/Fitur/header');
        $this->load->view('Partials/Fitur/Sign/content');
        $this->load->view('Partials/Fitur/footer');
    }
}