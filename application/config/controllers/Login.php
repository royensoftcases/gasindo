<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('encrypt');
    }
    public function index(){
      $this->load->view('login');
    }

    public function masuk(){
      $username = $this->input->post('username');
      $password  = $this->input->post('password');
      $tahun_param  = $this->input->post('tahun_param');

       $query= $this->db->query("SELECT username,password,status,id,rule from users_db where username = '$username' AND status=1")->result_array();
       $passwordDb=$this->encrypt->decode($query[0]['password']);
        if($username==$query[0]['username'] && $password==$passwordDb){
            $_SESSION['username']=$username;
            $_SESSION['id']=$query[0]['id'];
            $_SESSION['rule']=$query[0]['rule'];
            $_SESSION['tahun_param']= $tahun_param;
            echo"<script>alert('Success to Login!');</script>"; 
            echo"<script>window.location.replace('".base_url("index.php?page=home');</script>");
        }
        else{
             echo"<script type='text/javascript'>alert('FAILED TO LOGIN');</script>";
            echo"<script>javascript:history.back()</script>";
        }
    }


    public function keluar(){
     /* session_start();*/
      session_destroy(); // perintah menghapus semua session yg ada
      header("location:../login");
       echo"<script type='text/javascript'>alert('You Are Logged Out');</script>";
    }
}