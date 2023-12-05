<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Crud extends CI_Controller {

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set("max_execution_time", '2048');
        $this->load->database();
        $this->load->model('Crud_models');
        $this->load->library('encrypt');
    }


   public function Employee() { 
        $this->load->library('ssplib');
         $table = 'm_employee';
        $primaryKey = 'nip';
        $columns = array(
            array('db' => 'nip', 'dt' => "nip"),
            array('db' => 'name', 'dt' => "name"),
            array('db' => 'gender', 'dt' => "gender"),
            array('db' => 'phone', 'dt' => "phone"),
            array('db' => 'address', 'dt' => "address"),
			array('db' => 'birth_date', 'dt' => "birth_date"),
        );
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $groupBy = "nip";
        echo json_encode(
                $this->ssplib->simple($_GET, $sql_details, $table, $primaryKey, $columns, $groupBy)
        );
    }


     public function addEmployee() { 
        $name = $this->input->post('name');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$birth = $this->input->post('birth');
        $data = array(
            'name'=>$name,
            'gender'=>$gender,
            'phone'=>$phone,
            'address'=>$address,
			'birth_date'=>$birth,
            'status'=>'1',
   );
    if ($this->db->insert('m_employee',$data))
{
    echo "1";
}else{
    echo "0";
}
    }    

    public function dataEmployee() {
        $nip = $this->input->post('nip', true);
         $query= $this->db->query("SELECT * from m_employee where nip = $nip")->result_array();
        $data = array(
            'nip'=>$query[0]['nip'],
            'name'=>$query[0]['name'],
            'phone'=>$query[0]['phone'],
            'address'=>$query[0]['address'],
			'birth_date'=>$query[0]['birth_date'],
    );
        echo json_encode($data); 
    }

     public function editEmployee(){
        $nip = $this->input->post('nip');
		$name = $this->input->post('name');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
		$address = $this->input->post('address');
		$birth = $this->input->post('birth');
        $data = array(
            'name'=>$name,
            'gender'=>$gender,
            'phone'=>$phone,
            'address'=>$address,
			'birth_date'=>$birth,
    );
        if ($this->db->update('m_employee',$data, array('nip'=>$nip)))
{
    echo "1";
}else{
    echo "0";
}
    }

    public function deleteEmployee(){
        $nip =$this->input->post('nip');
        $this->db->delete('m_employee', array('nip' => $nip));
}


public function Absent() { 
     $this->load->library('ssplibcustom');
        $table = 'list_abd';
        $primaryKey = 'id';
        $columns = array(
        array( 'db' => '`a`.`id`', 'dt' => 0, 'field' => 'id' ),
        array( 'db' => '`b`.`nip`', 'dt' => 1, 'field' => 'nip' ),
        array( 'db' => '`b`.`name`', 'dt' => 2, 'field' => 'name' ),
        array( 'db' => '`a`.`date_start`', 'dt' => 3, 'field' => 'date_start' ),
        array( 'db' => '`a`.`count_time`', 'dt' => 4, 'field' => 'count_time' ),
        array( 'db' => '`a`.`keterangan`', 'dt' => 5, 'field' => 'keterangan' ),
        );

         $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
       $joinQuery = "FROM `list_abd` AS `a` LEFT JOIN `m_employee` AS `b` ON (`a`.`id_employee` = `b`.`nip` )";

        $extraWhere = "";
        $groupBy = "id";
        $having = "";

        echo json_encode(
                $this->ssplibcustom->simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)

        );

    }

public function addAbsent() { 
        $id_employee = $this->input->post('nip');
        $date_start = $this->input->post('tgl');
        $count_time = $this->input->post('lama');
        $keterangan = $this->input->post('keterangan');
        $returnDate ="";
        for($i=0;$i<$count_time;$i++){
    $returnDate = date('Y-m-d', strtotime('+'.$i.' days', strtotime($date_start)));
    $data = array(
            'id_employee'=>$id_employee,
            'date_start'=>$returnDate,
            'count_time'=>1,
            'keterangan'=>$keterangan,
            'status'=>'1',
   );
    if ($this->db->insert('list_abd',$data))
{
}else{
    }
    }
     echo "1";
    }    

 public function dataAbsent() {
        $nip = $this->input->post('nip', true);
         $query= $this->db->query("SELECT * from m_employee a LEFT JOIN list_abd b ON a.nip=b.id_employee  where nip = $nip")->result_array();
        $data = array(
            'id'=>$query[0]['id'],
            'nip'=>$query[0]['nip'],
            'name'=>$query[0]['name'],
            'date_start'=>$query[0]['date_start'],
            'count_time'=>$query[0]['count_time'],
            'keterangan'=>$query[0]['keterangan'],
    );
        echo json_encode($data); 
    }

     public function editAbsent(){
       $id= $this->input->post('id');
        $date_start = $this->input->post('tgl');
        $keterangan = $this->input->post('keterangan');
        
    $data = array(
            'date_start'=>$date_start,
            'keterangan'=>$keterangan,
    );
        if ($this->db->update('list_abd',$data, array('id'=>$id)))
{
    echo "1";
}else{
    echo "0";
}
}

 public function deleteAbsent(){
        $id =$this->input->post('id');
        $this->db->delete('list_abd', array('id' => $id));
}

}


