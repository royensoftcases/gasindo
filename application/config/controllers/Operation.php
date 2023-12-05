<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Operation extends CI_Controller {



    public function __construct() {

        parent::__construct();

        ini_set('memory_limit', '1024M');

        ini_set("max_execution_time", '2048');

        $this->load->database();

        $this->load->model('Crud_models');

        $this->load->library('encrypt');

        $this->load->library('Excel');

        $this->load->library('upload');

    }



   public function index() { 

    }

    

   public function dataCashFlow($tahun,$bulan,$wilayah) { 

     $this->load->library('ssplibcustom');

        $table = 'cash_flow';

        $primaryKey = 'id';

        $columns = array(

            array( 'db' => '`a`.`id`', 'dt' => 0, 'field' => 'id' ),

            array( 'db' => '`a`.`unit_kerja`',     'dt' => 1, 'field' => 'unit_kerja' ),

            array( 'db' => '`a`.`keterangan`',     'dt' => 2, 'field' => 'keterangan' ),

            array( 'db' => '`a`.`cash_out`',     'dt' => 3, 'field' => 'cash_out' ),

            array( 'db' => '`a`.`cash_in`',     'dt' => 4, 'field' => 'cash_in' ),

            array( 'db' => '`a`.`saldo`',     'dt' => 5, 'field' => 'saldo' ),

            array( 'db' => '`a`.`tanggal`',     'dt' => 6, 'field' => 'tanggal' ),

            array( 'db' => '`a`.`no`',     'dt' => 7, 'field' => 'no' ),

            array( 'db' => '`b`.`number`',     'dt' => 8, 'field' => 'number'),

        );

         $sql_details = array(

            'user' => $this->db->username,

            'pass' => $this->db->password,

            'db' => $this->db->database,

            'host' => $this->db->hostname

        );

        $joinQuery = "FROM `cash_flow` AS `a` LEFT JOIN (SELECT max(`no`) AS `number` FROM `cash_flow` WHERE YEAR(tanggal)=$tahun && MONTH(tanggal)=$bulan && unit_kerja='$wilayah') AS `b` ON (`a`.`no` = `b`.`number` )";

        $extraWhere = "YEAR(a.tanggal)=$tahun && MONTH(a.tanggal)=$bulan && a.unit_kerja='$wilayah'";

        $groupBy = "";

        $orderBy = "no";

        $having = "";

        echo json_encode(

                $this->ssplibcustom->simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy,$orderBy, $having)

        );

    }



     public function addCash() { 

        $now=date("Y-m-d H:i:s");

        $unit_kerja = $this->input->post('unit_kerja');

        $tipe = $this->input->post('tipe');

        $keterangan = $this->input->post('keterangan');

        $tanggal = $this->input->post('tanggal');

        $nominal = $this->input->post('nominal');

        $no;



       $getno = $this->db->query("SELECT max(no)+1 AS no FROM cash_flow WHERE  YEAR(tanggal)=YEAR('$tanggal') AND MONTH(tanggal)=MONTH('$tanggal') AND unit_kerja='$unit_kerja'")->result_array();

       if($getno[0]['no']==''){

        $no=1;

       }else{

        $no=$getno[0]['no'];

       }

       $getsaldo = $this->db->query("SELECT saldo FROM cash_flow WHERE  YEAR(tanggal)=YEAR('$tanggal') AND MONTH(tanggal)=MONTH('$tanggal') AND unit_kerja='$unit_kerja' AND no=$no-1")->result_array();

        if($tipe=='in'){

            $data = array(

            'no'=>$no,

            'unit_kerja'=>$unit_kerja,

            'keterangan'=>$keterangan,

            'cash_out'=>0,

            'cash_in'=>$nominal,

            'saldo'=>($getsaldo[0]['saldo']+$nominal),

            'tanggal'=>$tanggal,

            'create_at'=>$now,

            'update_at'=>$now,

            );

        }

        else{

           $data = array(

            'no'=>$no,

            'unit_kerja'=>$unit_kerja,

            'keterangan'=>$keterangan,

            'cash_out'=>$nominal,

            'cash_in'=>0,

            'saldo'=>($getsaldo[0]['saldo']-$nominal),

            'tanggal'=>$tanggal,

            'create_at'=>$now,

            'update_at'=>$now,

            );

        }

    if ($this->db->insert('cash_flow',$data))

{

    echo "1";

}else{

    echo "0";

}

}



public function dataCash() {

        $id = $this->input->post('id', true);

         $query= $this->db->query("SELECT * from cash_flow where id = '$id'")->result_array();

        $data = array(

            'id'=>$query[0]['id'],

            'no'=>$query[0]['no'],

            'unit_kerja'=>$query[0]['unit_kerja'],

            'keterangan'=>$query[0]['keterangan'],

            'cash_out'=>$query[0]['cash_out'],

            'cash_in'=>$query[0]['cash_in'],

            'saldo'=>$query[0]['saldo'],

            'tanggal'=>$query[0]['tanggal'],

    );

        echo json_encode($data); 

    }



     public function editCash(){

        $id = $this->input->post('id');

        $tanggal = $this->input->post('tanggal');

        $unit_kerja = $this->input->post('unit_kerja');

        $keterangan = $this->input->post('keterangan');

        $tipe = $this->input->post('tipe');

        $nominal = $this->input->post('nominal');



        $getsaldo = $this->db->query("SELECT no,saldo,(SELECT max(no) from cash_flow where YEAR(tanggal)=YEAR('$tanggal') AND MONTH(tanggal)=MONTH('$tanggal')) as last_no FROM cash_flow WHERE id=$id")->result_array();

        $getNo=$getsaldo[0]['no']-1;

        $getsaldobefore = $this->db->query("SELECT saldo FROM cash_flow WHERE  YEAR(tanggal)=YEAR('$tanggal') AND MONTH(tanggal)=MONTH('$tanggal') AND unit_kerja='$unit_kerja' AND no=$getNo")->result_array();

        $getNo=$getsaldobefore[0]['saldo'];

        if($tipe=='Cash In'){

            $data = array(

            'keterangan'=>$keterangan,

            'cash_out'=>0,

            'cash_in'=>$nominal,

            'saldo'=>($getsaldobefore[0]['saldo']+$nominal),

            'update_at'=>$now,

            );

        }

        else{

           $data = array(

            'keterangan'=>$keterangan,

            'cash_out'=>$nominal,

            'cash_in'=>0,

            'saldo'=>($getsaldobefore[0]['saldo']-$nominal),

            'tanggal'=>$tanggal,

            'create_at'=>$now,

            'update_at'=>$now,

            );

        }

          $this->db->update('cash_flow',$data, array('id'=>$id));







        for($i=$getsaldo[0]['no'];$i<$getsaldo[0]['last_no'];$i++){

         $geteditbefore = $this->db->query("SELECT saldo FROM cash_flow WHERE no=$i")->result_array();

         $geteditnow = $this->db->query("SELECT cash_in,cash_out FROM cash_flow WHERE no=$i+1")->result_array();

          if($geteditnow[0]['cash_out']==0){

            $data = array(

            'saldo'=>($geteditbefore[0]['saldo']+$geteditnow[0]['cash_in']),

            'update_at'=>$now,

            );

        }else{

            $data = array(

            'saldo'=>($geteditbefore[0]['saldo']-$geteditnow[0]['cash_out']),

            'update_at'=>$now,

            );

        }

         $this->db->update('cash_flow',$data, array('no'=>$i+1));

    }

    echo "1";

    }



    public function deleteCash(){

        $id =$this->input->post('id');

        $this->db->delete('cash_flow', array('id' => $id));

}



public function getMonth(){

        $filterTahun = $this->input->post('filterTahun', true);

        for ($i = 0; $i < count($filterTahun); $i++) {

                  $c .="'".$filterTahun[$i]."',";

                }

        $hasilfilterTahun=substr($c, 0, -1);

        $data =$this->db->query("SELECT MONTH(a.tanggal) as bulan,b.nomor,b.bulan_nama FROM cash_flow a INNER JOIN bulan b ON MONTH(a.tanggal)=b.nomor WHERE YEAR(a.tanggal)=$hasilfilterTahun GROUP BY b.nomor")->result_array();

        echo json_encode($data);

    }



    public function GetCashFlow(){

        $filterBulan = $this->input->post('filterBulan', true);

        for ($i = 0; $i < count($filterBulan); $i++) {

                  $a .="'".$filterBulan[$i]."',";

                }

        $hasilfilterBulan=substr($a, 0, -1);





        $filterTahun = $this->input->post('filterTahun', true);

        for ($i = 0; $i < count($filterTahun); $i++) {

                  $c .="'".$filterTahun[$i]."',";

                }

        $hasilfilterTahun=substr($c, 0, -1);

       $data = $this->db->query("SELECT unit_kerja AS wilayah,SUM(cash_out) AS cash_out, SUM(cash_in) AS cash_in  FROM cash_flow WHERE YEAR(tanggal) IN($hasilfilterTahun) AND MONTH(tanggal) IN($hasilfilterBulan) GROUP BY unit_kerja")->result_array();

        echo json_encode($data); 

    }

    public function GetSaldoCash(){

        $filterBulan = $this->input->post('filterBulan', true);

        for ($i = 0; $i < count($filterBulan); $i++) {

                  $a .="'".$filterBulan[$i]."',";

                }

        $hasilfilterBulan=substr($a, 0, -1);





        $filterTahun = $this->input->post('filterTahun', true);

        for ($i = 0; $i < count($filterTahun); $i++) {

                  $c .="'".$filterTahun[$i]."',";

                }

        $hasilfilterTahun=substr($c, 0, -1);

       $data = $this->db->query("SELECT unit_kerja AS wilayah,SUM(cash_in-cash_out) AS saldo FROM cash_flow WHERE YEAR(tanggal) IN($hasilfilterTahun) AND MONTH(tanggal) IN($hasilfilterBulan) GROUP BY unit_kerja")->result_array();

        echo json_encode($data); 

    }

 public function addCash() { 

        $now=date("Y-m-d H:i:s");

        $unit_kerja = $this->input->post('unit_kerja');

        $tipe = $this->input->post('tipe');

        $keterangan = $this->input->post('keterangan');

        $tanggal = $this->input->post('tanggal');

        $nominal = $this->input->post('nominal');

        $no;



       $getno = $this->db->query("SELECT max(no)+1 AS no FROM cash_flow WHERE  YEAR(tanggal)=YEAR('$tanggal') AND MONTH(tanggal)=MONTH('$tanggal') AND unit_kerja='$unit_kerja'")->result_array();

       if($getno[0]['no']==''){

        $no=1;

       }else{

        $no=$getno[0]['no'];

       }

       $getsaldo = $this->db->query("SELECT saldo FROM cash_flow WHERE  YEAR(tanggal)=YEAR('$tanggal') AND MONTH(tanggal)=MONTH('$tanggal') AND unit_kerja='$unit_kerja' AND no=$no-1")->result_array();

        if($tipe=='in'){

            $data = array(

            'no'=>$no,

            'unit_kerja'=>$unit_kerja,

            'keterangan'=>$keterangan,

            'cash_out'=>0,

            'cash_in'=>$nominal,

            'saldo'=>($getsaldo[0]['saldo']+$nominal),

            'tanggal'=>$tanggal,

            'create_at'=>$now,

            'update_at'=>$now,

            );

        }

        else{

           $data = array(

            'no'=>$no,

            'unit_kerja'=>$unit_kerja,

            'keterangan'=>$keterangan,

            'cash_out'=>$nominal,

            'cash_in'=>0,

            'saldo'=>($getsaldo[0]['saldo']-$nominal),

            'tanggal'=>$tanggal,

            'create_at'=>$now,

            'update_at'=>$now,

            );

        }

    if ($this->db->insert('cash_flow',$data))

{

    echo "1";

}else{

    echo "0";

}

}

    }

