<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ijp extends CI_Controller {

    public function __construct() {
        parent::__construct();
       ini_set('memory_limit', '1024M');
        ini_set("max_execution_time", '2048');
        $this->load->database();
        $this->load->model('Crud_models');
        $this->load->library('Excel');
        $this->load->library('upload');
    }

    public function ijp_header() { 
        $this->load->library('ssplib');
         $table = 'header_target_ijp';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'id', 'dt' => "id"),
            array('db' => 'tahun', 'dt' => "tahun"),
            array('db' => 'judul', 'dt' => "judul"),
        );
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
         $orderby = "tahun";
        echo json_encode(
                $this->ssplib->simple($_GET, $sql_details, $table, $primaryKey, $columns,$orderby)
        );
    }

 public function upload_ijp(){
  $fileName = $_FILES['file_excel']['name'];
  $period_years = $this->input->post('period_years');
    


        $config['upload_path'] ='./upload/';
        $config['file_name'] = $fileName; 
        $config['allowed_types'] = 'xls|xlsx|csv'; 
        $config['max_size'] = 999999; 
 
        $this->load->library('upload');
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('file_excel') ){
           echo"<script>alert('Ukuran file melebihi batas!');</script>";
            echo"<script>window.location.replace('".base_url("?page=upload_target_ijp');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_target_ijp');</script>");
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 5; $row <= $highestRow; $row++){                            
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                                                      
                 $data = array(
                    "kantor_wilayah"=> $rowData[0][1],
                    "produk"=> $rowData[0][2],
                    "kode"=> $rowData[0][3],
                    "jenis_produk"=> $rowData[0][4],
                    "bandung"=> $rowData[0][5],
                    "cirebon"=> $rowData[0][6],
                    "purwakarta"=> $rowData[0][7],
                    "tasikmalaya"=> $rowData[0][8],
                    "sukabumi"=> $rowData[0][9],
                    "ijp"=> $rowData[0][10],
                    "tahun"=> $period_years,
                );
 
                $insert = $this->db->insert("target_ijp",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'judul'=>'TARGET IJP TAHUN '.$period_years,
            );
            $insert = $this->db->insert("header_target_ijp",$data);

             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_target_ijp');</script>");
    }

      public function deleteUploadIjp(){
        $tahun =$this->input->post('tahun_delete');
        $this->db->delete('header_target_ijp', array('tahun' => $tahun));
        $this->db->delete('target_ijp', array('tahun' => $tahun));
}
public function dataIjp($tahun) { 
     $this->load->library('ssplibcustom');
        $table = 'target_ijp';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'kantor_wilayah',     'dt' => 1, 'field' => 'kantor_wilayah' ),
            array( 'db' => 'produk',     'dt' => 2, 'field' => 'produk' ),
            array( 'db' => 'kode',     'dt' => 3, 'field' => 'kode' ),
            array( 'db' => 'jenis_produk',     'dt' => 4, 'field' => 'jenis_produk' ),
            array( 'db' => 'bandung',     'dt' => 5, 'field' => 'bandung' ),
            array( 'db' => 'cirebon',     'dt' => 6, 'field' => 'cirebon' ),
            array( 'db' => 'purwakarta',     'dt' => 7, 'field' => 'purwakarta' ),
            array( 'db' => 'tasikmalaya',     'dt' => 8, 'field' => 'tasikmalaya' ),
            array( 'db' => 'sukabumi',     'dt' => 9, 'field' => 'sukabumi' ),
            array( 'db' => 'ijp',     'dt' => 10, 'field' => 'ijp' ),
        );
         $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $joinQuery = "";
        $extraWhere = "tahun='$tahun'";
        $groupBy = "";
        $having = "";
        echo json_encode(
                $this->ssplibcustom->simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }

    public function filterBulanWilayahPencapaian(){
      $tahun_param=$_SESSION['tahun_param'];
        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

         $filterTipeProduk = $this->input->post('filterTipeProduk', true);
        for ($i = 0; $i < count($filterTipeProduk); $i++) {
                  $d .="'".$filterTipeProduk[$i]."',";
                }
        $hasilfilterTipeProduk=substr($d, 0, -1);

        $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $e .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($e, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $f .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($f, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                  $c .="SELECT '".$filterWilayah[$i]."' AS wilayah_kerja,SUM(ROUND(".$filterWilayah[$i]."/1000000,1 )) AS ijp FROM target_ijp WHERE tahun=$tahun_param AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) UNION ALL ";
                }
        $hasilfilterWilayah=substr($b, 0, -1);
        $queryWilayah=substr($c, 0, -11);

        $data =$this->db->query("SELECT main1.*, main2.*, main3.* FROM (SELECT wilayah_kerja,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit_now FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit_before FROM detail_realisasi_volume WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY wilayah_kerja ) main2 ON main1.wilayah_kerja = main2.wilayah_kerja LEFT JOIN ($queryWilayah) main3 ON main1.wilayah_kerja = main3.wilayah_kerja ORDER BY pokok_kredit_now DESC")->result_array();
        echo json_encode($data);
    }

    public function filterbulanIjpJenisProduk(){
       $tahun_param=$_SESSION['tahun_param'];
        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                  $c .="SUM(ROUND(".$filterWilayah[$i]."/1000000,1))+";
                }
        $hasilfilterWilayah=substr($b, 0, -1);
        $queryWilayah=substr($c, 0, -1);

        $filterTipeProduk = $this->input->post('filterTipeProduk', true);
        for ($i = 0; $i < count($filterTipeProduk); $i++) {
                  $d .="'".$filterTipeProduk[$i]."',";
                }
        $hasilfilterTipeProduk=substr($d, 0, -1);

        $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $e .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($e, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $f .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($f, 0, -1);
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT jenis_produk,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY jenis_produk) main1 LEFT JOIN (SELECT jenis_produk,($queryWilayah) AS ijp FROM target_ijp WHERE tahun=$tahun_param AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) GROUP BY jenis_produk) main2 ON main1.jenis_produk = main2.jenis_produk ORDER BY ijp DESC")->result_array();
        echo json_encode($data); 
    }

    public function filterbulanIjpProduk(){
       $tahun_param=$_SESSION['tahun_param'];
        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                  $c .="SUM(ROUND(".$filterWilayah[$i]."/1000000,1))+";
                }
        $hasilfilterWilayah=substr($b, 0, -1);
        $queryWilayah=substr($c, 0, -1);

        $filterTipeProduk = $this->input->post('filterTipeProduk', true);
        for ($i = 0; $i < count($filterTipeProduk); $i++) {
                  $d .="'".$filterTipeProduk[$i]."',";
                }
        $hasilfilterTipeProduk=substr($d, 0, -1);

         $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $e .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($e, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $f .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($f, 0, -1);
       $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT produk as produk_total,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY produk) main1 LEFT JOIN (SELECT produk as produk,( $queryWilayah) AS ijp FROM target_ijp WHERE tahun=$tahun_param AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) GROUP BY produk) main2 ON main1.produk_total = main2.produk ORDER BY ijp DESC")->result_array();
        echo json_encode($data);
    }


    public function filterbulanGrowthProduk(){
       $tahun_param=$_SESSION['tahun_param'];
        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

        $hasilfilterWilayah="";
        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                  $c .="SUM(ROUND(".$filterWilayah[$i]."/1000000,1))+";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterTipeProduk = $this->input->post('filterTipeProduk', true);
        for ($i = 0; $i < count($filterTipeProduk); $i++) {
                  $d .="'".$filterTipeProduk[$i]."',";
                }
        $hasilfilterTipeProduk=substr($d, 0, -1);

         $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $e .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($e, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $f .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($f, 0, -1);
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT produk as produk_now,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit_now FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY produk) main1 LEFT JOIN (SELECT produk,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit_before FROM detail_realisasi_volume WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY produk) main2 ON main1.produk_now = main2.produk ORDER BY pokok_kredit_now DESC")->result_array();
        echo json_encode($data);
    }

     public function filterbulanGrowthMitra(){
      $tahun_param=$_SESSION['tahun_param'];
        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

        $hasilfilterWilayah="";
        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                  $c .="SUM(ROUND(".$filterWilayah[$i]."/1000000,1))+";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterTipeProduk = $this->input->post('filterTipeProduk', true);
        for ($i = 0; $i < count($filterTipeProduk); $i++) {
                  $d .="'".$filterTipeProduk[$i]."',";
                }
        $hasilfilterTipeProduk=substr($d, 0, -1);

        $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $e .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($e, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $f .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($f, 0, -1);
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT bank,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit_now FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY bank) main1 LEFT JOIN (SELECT bank,SUM(ROUND(ijp/1000000,1 )) AS pokok_kredit_before FROM detail_realisasi_volume WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY bank) main2 ON main1.bank = main2.bank ORDER BY pokok_kredit_before DESC")->result_array();
        echo json_encode($data);
    }

    }
