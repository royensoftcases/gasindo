<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PiutangSubrogasi extends CI_Controller {

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
    
 public function upload_realisasi(){
  $fileName = $_FILES['file_excel']['name'];
  $period_years = $this->input->post('period_years');
  $period_month = $this->input->post('period_month');
    
        $config['upload_path'] ='./upload/';
        $config['file_name'] = $fileName; 
        $config['allowed_types'] = 'xls|xlsx|csv'; 
        $config['max_size'] = 999999; 
 
        $this->load->library('upload');
        $this->upload->initialize($config);
          
        if(! $this->upload->do_upload('file_excel') ){
           echo"<script>alert('Ukuran file melebihi batas!');</script>";
            echo"<script>window.location.replace('".base_url("?page=upload_piutang_subrogasi');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_piutang_subrogasi');</script>");
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 2; $row <= $highestRow; $row++){                            
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                                                      
                 $data = array(
                    "wilayah_kerja"=> $rowData[0][0],
                    "mitra"=> $rowData[0][1],
                    "produk"=> $rowData[0][2],
                    "piutang_subro"=> $rowData[0][3],
                    "periode"=> $rowData[0][4],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                $insert = $this->db->insert("temp_piutang",$data);            
            }
             $dataTotal = $this->db->query("SELECT DISTINCT wilayah_kerja,mitra,produk,SUM(piutang_subro) AS piutang_subro,periode FROM temp_piutang WHERE tahun='$period_years' AND bulan='$period_month' GROUP BY wilayah_kerja,mitra,produk")->result_array();
             foreach ($dataTotal as $dttotal) {
                    $data = array(
                    "wilayah_kerja"=> $dttotal['wilayah_kerja'],
                    "mitra"=> $dttotal['mitra'],
                    "produk"=>$dttotal['produk'],
                    "piutang_subro"=> $dttotal['piutang_subro'],
                    "periode"=>  $dttotal['periode'],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                    $this->db->insert('detail_realisasi_piutang',$data);
                }
            $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_realisasi_piutang",$data);

            $this->db->delete('temp_piutang', array('tahun' => $period_years, 'bulan' => $period_month));  
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_piutang_subrogasi');</script>");
    }

    public function deleteUploadRealisasi(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_realisasi_piutang', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('detail_realisasi_piutang', array('tahun' => $tahun, 'bulan' => $bulan));
}

public function dataRealisasi($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_piutang';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'mitra',     'dt' => 2, 'field' => 'mitra' ),
            array( 'db' => 'produk',     'dt' => 3, 'field' => 'produk' ),
            array( 'db' => 'piutang_subro',     'dt' => 4, 'field' => 'piutang_subro' ),
            array( 'db' => 'periode',     'dt' => 5, 'field' => 'periode' ),
        );
         $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $joinQuery = "";
        $extraWhere = "tahun='$tahun' AND bulan='$bulan'";
        $groupBy = "";
        $having = "";
        echo json_encode(
                $this->ssplibcustom->simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }

    public function realisasi_header() { 
        $this->load->library('ssplib');
         $table = 'header_realisasi_piutang';
        $primaryKey = 'id';
        $columns = array(
            array('db' => 'id', 'dt' => "id"),
            array('db' => 'tahun', 'dt' => "tahun"),
            array('db' => 'bulan', 'dt' => "bulan"),
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

public function WilayahPencapaian(){
     $tahun_param=$_SESSION['tahun_param'];
      $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilterBulan=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $c .="'".$filterMitra[$i]."',";
                }
        $hasilfilterMitra=substr($c, 0, -1);

        $filterProduk = $this->input->post('filterProduk', true);
        for ($i = 0; $i < count($filterProduk); $i++) {
                  $d .="'".$filterProduk[$i]."',";
                }
        $hasilfilterProduk=substr($d, 0, -1);
        $data =$this->db->query("SELECT wilayah_kerja,SUM(ROUND(piutang_subro/1000000,1 )) AS piutang_subro FROM detail_realisasi_piutang WHERE tahun=$tahun_param AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND mitra IN($hasilfilterMitra) AND produk IN($hasilfilterProduk) GROUP BY wilayah_kerja ORDER BY piutang_subro DESC")->result_array();

        echo json_encode($data);
    }
     public function ProdukPencapaian(){
         $tahun_param=$_SESSION['tahun_param'];
       $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilterBulan=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $c .="'".$filterMitra[$i]."',";
                }
        $hasilfilterMitra=substr($c, 0, -1);

        $filterProduk = $this->input->post('filterProduk', true);
        for ($i = 0; $i < count($filterProduk); $i++) {
                  $d .="'".$filterProduk[$i]."',";
                }
        $hasilfilterProduk=substr($d, 0, -1);
        $data =$this->db->query("SELECT produk,SUM(ROUND(piutang_subro/1000000,1 )) AS piutang_subro FROM detail_realisasi_piutang WHERE tahun=$tahun_param AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND mitra IN($hasilfilterMitra) AND produk IN($hasilfilterProduk) GROUP BY produk ORDER BY piutang_subro DESC")->result_array();
        echo json_encode($data); 
    }

    public function MitraPencapaian(){
         $tahun_param=$_SESSION['tahun_param'];
       $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilterBulan=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $c .="'".$filterMitra[$i]."',";
                }
        $hasilfilterMitra=substr($c, 0, -1);

        $filterProduk = $this->input->post('filterProduk', true);
        for ($i = 0; $i < count($filterProduk); $i++) {
                  $d .="'".$filterProduk[$i]."',";
                }
        $hasilfilterProduk=substr($d, 0, -1);
        $data =$this->db->query("SELECT mitra,SUM(ROUND(piutang_subro/1000000,1 )) AS piutang_subro FROM detail_realisasi_piutang WHERE tahun=$tahun_param AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND mitra IN($hasilfilterMitra) AND produk IN($hasilfilterProduk) GROUP BY mitra ORDER BY piutang_subro DESC")->result_array();
        echo json_encode($data); 
    }
    }