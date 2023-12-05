<?php



defined('BASEPATH') OR exit('No direct script access allowed');


class Template extends CI_Controller {


    public function __construct() {

        parent::__construct();

        $this->load->model('Crud_models');

        $this->load->database();

    }

    public function index() {
        $page = $this->input->get('page');
        switch ($page) {

            case 'employee':

            $data['content'] = 'employee';
                break;

             case 'absent':

            $data['content'] = 'absent';
                break;

             case 'dashboard':

            $data['content'] = 'dashboard';
                break;

            default:
                $data['content'] = 'dashboard';

        }
        $this->load->view('template/template', $data);
    }
}

?>

