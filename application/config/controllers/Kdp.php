<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kdp extends CI_Controller {

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
            echo"<script>window.location.replace('".base_url("?page=upload_rincian_kdp');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_rincian_kdp');</script>");
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
                    "bank"=> $rowData[0][1],
                    "produk"=> $rowData[0][2],
                    "wilayah"=> $rowData[0][3],
                    "periode_date"=> $rowData[0][4],
                    "jumlah_terjamin"=> $rowData[0][5],
                    "plafond"=> $rowData[0][6],
                    "pengajuan_klaim"=> $rowData[0][7],
                    "lunas_batal"=> $rowData[0][8],
                    "daluarsa"=> $rowData[0][9],
                    "lengkap"=> $rowData[0][10],
                    "belum_lengkap"=> $rowData[0][11],
                    "jumlah"=> $rowData[0][12],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
 
                $insert = $this->db->insert("rincian_kdp",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_rincian_kdp",$data);
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_rincian_kdp');</script>");
    }

    public function deleteUploadRealisasi(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_rincian_kdp', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('rincian_kdp', array('tahun' => $tahun, 'bulan' => $bulan));
}

public function dataRealisasi($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'rincian_kdp';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah',     'dt' => 1, 'field' => 'wilayah' ),
            array( 'db' => 'produk',     'dt' => 2, 'field' => 'produk' ),
            array( 'db' => 'bank',     'dt' => 3, 'field' => 'bank' ),
            array( 'db' => 'lunas_batal',     'dt' => 4, 'field' => 'lunas_batal' ),
            array( 'db' => 'daluarsa',     'dt' => 5, 'field' => 'daluarsa' ),
            array( 'db' => 'lengkap',     'dt' => 6, 'field' => 'lengkap' ),
            array( 'db' => 'belum_lengkap',     'dt' => 7, 'field' => 'belum_lengkap' ),
            array( 'db' => 'periode_date', 'dt' => 8, 'field' => 'periode_date' ),
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
         $table = 'header_rincian_kdp';
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

     public function WilayahKerja(){
        $filterPeriode = $this->input->post('filterPeriode', true);
        for ($i = 0; $i < count($filterPeriode); $i++) {
                  $a .="'".$filterPeriode[$i]."',";
                }
        $hasilfilterPeriode=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $c .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($c, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $d .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($d, 0, -1);
        
        /*$data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah AS wilayah_wilayah,SUM(ROUND(lengkap/1000000,1 )) AS lengkap,SUM(ROUND(belum_lengkap/1000000,1 )) AS belum_lengkap,SUM(ROUND(lunas_batal/1000000,1 )) AS lunas_batal,SUM(ROUND(daluarsa/1000000,1 )) AS daluarsa FROM rincian_kdp WHERE periode_date IN($hasilfilterPeriode) AND wilayah IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND  bank IN($hasilfilterBank) GROUP BY wilayah) main1 LEFT JOIN (SELECT wilayah,SUM(ROUND(lunas_batal,2 )) AS total_lunas_batal,SUM(ROUND(daluarsa,2 )) AS total_daluarsa,SUM(ROUND(lengkap,2 )) AS total_lengkap,SUM(ROUND(belum_lengkap,2 )) AS total_belum_lengkap,SUM(ROUND(jumlah,2 )) AS total_jumlah FROM rincian_kdp WHERE periode_date IN($hasilfilterPeriode) AND wilayah IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND  bank IN($hasilfilterBank) GROUP BY tahun) main2 ON main1.wilayah_wilayah = main2.wilayah ORDER BY daluarsa DESC")->result_array();*/

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah AS wilayah_wilayah,SUM(ROUND(lengkap/1000000,1 )) AS lengkap,SUM(ROUND(belum_lengkap/1000000,1 )) AS belum_lengkap,SUM(ROUND(lunas_batal/1000000,1 )) AS lunas_batal,SUM(ROUND(daluarsa/1000000,1 )) AS daluarsa,tahun FROM rincian_kdp WHERE periode_date IN($hasilfilterPeriode) AND wilayah IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND  bank IN($hasilfilterBank) GROUP BY wilayah) main1 LEFT JOIN (SELECT SUM(ROUND(lunas_batal,2 )) AS total_lunas_batal,SUM(ROUND(daluarsa,2 )) AS total_daluarsa,SUM(ROUND(lengkap,2 )) AS total_lengkap,SUM(ROUND(belum_lengkap,2 )) AS total_belum_lengkap,SUM(ROUND(jumlah,2 )) AS total_jumlah,tahun FROM rincian_kdp WHERE periode_date IN($hasilfilterPeriode) AND wilayah IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND  bank IN($hasilfilterBank)) main2 ON main1.tahun = main2.tahun ORDER BY belum_lengkap DESC")->result_array();
        echo json_encode($data);
    }

    public function PerProduk(){
        $filterPeriode = $this->input->post('filterPeriode', true);
        for ($i = 0; $i < count($filterPeriode); $i++) {
                  $a .="'".$filterPeriode[$i]."',";
                }
        $hasilfilterPeriode=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $c .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($c, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $d .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($d, 0, -1);
        
        $data =$this->db->query("SELECT produk,SUM(ROUND(lengkap/1000000,1 )) AS lengkap,SUM(ROUND(belum_lengkap/1000000,1 )) AS belum_lengkap,SUM(ROUND(lunas_batal/1000000,1 )) AS lunas_batal,SUM(ROUND(daluarsa/1000000,1 )) AS daluarsa FROM rincian_kdp WHERE periode_date IN($hasilfilterPeriode) AND wilayah IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND  bank IN($hasilfilterBank) GROUP BY produk ORDER BY belum_lengkap DESC")->result_array();
        echo json_encode($data);
    }

    public function Mitra(){
        $filterPeriode = $this->input->post('filterPeriode', true);
        for ($i = 0; $i < count($filterPeriode); $i++) {
                  $a .="'".$filterPeriode[$i]."',";
                }
        $hasilfilterPeriode=substr($a, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $filterPerProduk = $this->input->post('filterPerProduk', true);
        for ($i = 0; $i < count($filterPerProduk); $i++) {
                  $c .="'".$filterPerProduk[$i]."',";
                }
        $hasilfilterPerProduk=substr($c, 0, -1);

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $d .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($d, 0, -1);
        
        $data =$this->db->query("SELECT bank,SUM(ROUND(lengkap/1000000,1 )) AS lengkap,SUM(ROUND(belum_lengkap/1000000,1 )) AS belum_lengkap,SUM(ROUND(lunas_batal/1000000,1 )) AS lunas_batal,SUM(ROUND(daluarsa/1000000,1 )) AS daluarsa FROM rincian_kdp WHERE periode_date IN($hasilfilterPeriode) AND wilayah IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND  bank IN($hasilfilterBank) GROUP BY bank ORDER BY belum_lengkap DESC")->result_array();
        echo json_encode($data);
    }

     public function monitoringWilayah(){
      $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $data =$this->db->query("SELECT a.wilayah,b.bulan_singkat,SUM(ROUND(a.jumlah/1000000,1 )) AS total FROM rincian_kdp a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah IN($hasilfilterWilayah) GROUP BY a.wilayah,b.nomor")->result_array();

        echo json_encode($data);
    }
    public function monitoringProduk(){
      $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $data =$this->db->query("SELECT a.produk,b.bulan_singkat,SUM(ROUND(a.jumlah/1000000,1 )) AS total FROM rincian_kdp a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah IN($hasilfilterWilayah) GROUP BY a.produk,b.nomor")->result_array();

        echo json_encode($data);
    }

    public function monitoringMitra(){
      $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $b .="'".$filterWilayah[$i]."',";
                }
        $hasilfilterWilayah=substr($b, 0, -1);

        $data =$this->db->query("SELECT a.bank,b.bulan_singkat,SUM(ROUND(a.jumlah/1000000,1 )) AS total FROM rincian_kdp a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah IN($hasilfilterWilayah) GROUP BY a.bank,b.nomor")->result_array();

        echo json_encode($data);
    }
    }
