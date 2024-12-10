<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_DB $db
 */
class Admin extends CI_Controller {
    public function index()
    {
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/navigate');
        $this->load->view('admin/index');
        $this->load->view('admin/partials/footer');
    }
   
}