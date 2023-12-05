<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set("max_execution_time", '2048');
        $this->load->database();
        $this->load->model('Crud_models');
        $this->load->library('encrypt');
    }

   public function index() { 
        $this->load->library('ssplib');
         $table = 'users_db';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'id', 'dt' => "id"),
            array('db' => 'username', 'dt' => "username"),
            array('db' => 'rule', 'dt' => "rule"),
            array('db' => 'tanggal', 'dt' => "tanggal"),
            array('db' => 'status', 'dt' => "status"),
        );
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $groupBy = "id";
        echo json_encode(
                $this->ssplib->simple($_GET, $sql_details, $table, $primaryKey, $columns, $groupBy)
        );
    }
     public function addUser() { 
        $now=date("Y-m-d H:i:s");
        $username = $this->input->post('username');
        $password  = $this->encrypt->encode($this->input->post('password'));
        $level = $this->input->post('level');
        $data = array(
            'username'=>$username,
            'password'=>$password,
            'rule'=>$level,
            'tanggal'=>$now,
            'status'=>'1',
    );
    if ($this->db->insert('users_db',$data))
{
    echo "1";
}else{
    echo "0";
}
    }    
    public function dataUser() {
        $id = $this->input->post('id', true);
         $query= $this->db->query("SELECT * from users_db where id = '$id'")->result_array();
        $data = array(
            'id'=>$query[0]['id'],
            'username'=>$query[0]['username'],
            'password'=>$this->encrypt->decode($query[0]['password']),
            'rule'=>$query[0]['rule'],
            'status'=>$query[0]['status'],
    );
        echo json_encode($data); 
    }
     public function editUser(){
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password  = $this->encrypt->encode($this->input->post('password'));
        $level = $this->input->post('level');
        $status = $this->input->post('status');
        $data = array(
            'username'=>$username,
            'password'=>$password,
            'rule'=>$level,
            'status'=>$status,
    );
        if ($this->db->update('users_db',$data, array('id'=>$id)))
{
    echo "1";
}else{
    echo "0";
}
    }
    public function deleteUser(){
        $id =$this->input->post('id');
        $this->db->delete('users_db', array('id' => $id));
}
    }
