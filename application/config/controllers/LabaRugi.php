<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LabaRugi extends CI_Controller {

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
            echo"<script>window.location.replace('".base_url("?page=upload_laba_rugi');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_laba_rugi');</script>");
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
                    "unit_kerja"=> $rowData[0][0],
                    "keterangan"=> $rowData[0][1],
                    "realisasi"=> $rowData[0][2],
                    "periode_data"=> $rowData[0][3],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );

                $insert = $this->db->insert("detail_realisasi_laba_rugi",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_rincian_laba_rugi",$data);
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_laba_rugi');</script>");
    }

public function upload_excel_deposito(){
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
            echo"<script>window.location.replace('".base_url("?page=upload_deposito');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
            $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_realisasi_deposito",$data);

                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_deposito');</script>");
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 8; $row <= $highestRow; $row++){                            
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                                                      
                 $data = array(
                    "unit_kerja"=> $rowData[0][1],
                    "mitra"=> $rowData[0][2],
                    "wilayah_kerja"=> $rowData[0][4],
                    "provinsi"=> $rowData[0][5],
                    "no_bilyet"=> $rowData[0][6],
                    "tgl_tempo"=>  gmdate("Y-m-d", ($rowData[0][11]-25569)*86400),
                    "suku_bunga"=> $rowData[0][14],
                    "nominal_before"=> $rowData[0][15],
                    "nominal"=> $rowData[0][16],
                    "jenis_depo"=> $rowData[0][17],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                $insert = $this->db->insert("detail_realisasi_deposito",$data);
                      
            }
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_deposito');</script>");
    }


    public function deleteUploadRealisasi(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_rincian_laba_rugi', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('detail_realisasi_laba_rugi', array('tahun' => $tahun, 'bulan' => $bulan));
}


public function dataRealisasi($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_laba_rugi';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'unit_kerja',     'dt' => 1, 'field' => 'unit_kerja' ),
            array( 'db' => 'keterangan',     'dt' => 2, 'field' => 'keterangan' ),
            array( 'db' => 'realisasi',     'dt' => 3, 'field' => 'realisasi' ),
            array( 'db' => 'periode_data',     'dt' => 4, 'field' => 'periode_data' ),
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
         $table = 'header_rincian_laba_rugi';
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

    public function realisasi_header_deposito() { 
        $this->load->library('ssplib');
         $table = 'header_realisasi_deposito';
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


public function target_header() { 
        $this->load->library('ssplib');
         $table = 'header_target_laba_rugi';
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

    public function upload_target(){
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
            echo"<script>window.location.replace('".base_url("?page=upload_target_laba_rugi');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_target_laba_rugi');</script>");
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
                    "unit_kerja"=> $rowData[0][0],
                    "keterangan"=> $rowData[0][1],
                    "realisasi"=> $rowData[0][2],
                    "tahun"=> $period_years,
                );
                $insert = $this->db->insert("target_laba_rugi",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'judul'=>'TARGET LABA-RUGI TAHUN '.$period_years,
            );
            $insert = $this->db->insert("header_target_laba_rugi",$data);

             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_target_laba_rugi');</script>");
    }
    public function deleteUploadTarget(){
        $tahun =$this->input->post('tahun_delete');
        $this->db->delete('header_target_laba_rugi', array('tahun' => $tahun));
        $this->db->delete('target_laba_rugi', array('tahun' => $tahun));
}
public function deleteUploadRealisasiDeposito(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_realisasi_deposito', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('detail_realisasi_deposito', array('tahun' => $tahun, 'bulan' => $bulan));
}

    public function dataTarget($tahun) { 
         $this->load->library('ssplibcustom');
            $table = 'target_laba_rugi';
            $primaryKey = 'id';
            $columns = array(
                array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
                array( 'db' => 'unit_kerja',     'dt' => 1, 'field' => 'unit_kerja' ),
                array( 'db' => 'keterangan',     'dt' => 2, 'field' => 'keterangan' ),
                array( 'db' => 'realisasi',     'dt' => 3, 'field' => 'realisasi' ),
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

    public function dataRealisasiDeposito($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_deposito';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'unit_kerja',     'dt' => 1, 'field' => 'unit_kerja' ),
            array( 'db' => 'mitra',     'dt' => 2, 'field' => 'mitra' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 3, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'provinsi',     'dt' => 4, 'field' => 'provinsi' ),
            array( 'db' => 'no_bilyet',     'dt' => 5, 'field' => 'no_bilyet' ),
            array( 'db' => 'tgl_tempo',     'dt' => 6, 'field' => 'tgl_tempo' ),
            array( 'db' => 'suku_bunga',     'dt' => 7, 'field' => 'suku_bunga' ),
            array( 'db' => 'nominal_before',     'dt' => 8, 'field' => 'nominal_before' ),
            array( 'db' => 'nominal',     'dt' => 9, 'field' => 'nominal' ),
            array( 'db' => 'jenis_depo',     'dt' => 10, 'field' => 'jenis_depo' ),
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

     public function dataMonitoringDeposito($tahun) { 
        //echo $bulan;
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_deposito';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'unit_kerja',     'dt' => 1, 'field' => 'unit_kerja' ),
            array( 'db' => 'mitra',     'dt' => 2, 'field' => 'mitra' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 3, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'provinsi',     'dt' => 4, 'field' => 'provinsi' ),
            array( 'db' => 'no_bilyet',     'dt' => 5, 'field' => 'no_bilyet' ),
            array( 'db' => 'tgl_tempo',     'dt' => 6, 'field' => 'tgl_tempo' ),
            array( 'db' => 'suku_bunga',     'dt' => 7, 'field' => 'suku_bunga' ),
            array( 'db' => 'nominal_before',     'dt' => 8, 'field' => 'nominal_before' ),
            array( 'db' => 'nominal',     'dt' => 9, 'field' => 'nominal' ),
            array( 'db' => 'jenis_depo',     'dt' => 10, 'field' => 'jenis_depo' ),
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

public function PencapianWilayah(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
        $data = $this->db->query("SELECT main1.*,main2.*, main3.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='EBT' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_before FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun-1) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='EBT' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='EBT' GROUP BY unit_kerja) main3 ON main1.wilayah = main3.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function BebanPemasaran(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
       $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Pemasaran' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Pemasaran' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function BebanSosialisasi(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
       $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Sosialisasi & Rekonsiliasi' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Sosialisasi & Rekonsiliasi' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function BebanPerjalanan(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
       $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Perjalanan Dinas' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Perjalanan Dinas' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function BebanPromosi(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
       $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Promosi' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Promosi' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function BebanRapat(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
       $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Rapat Kerja' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Rapat Kerja' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function BebanUmum(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
       $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Umum Lain-lain' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Umum Lain-lain' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function BebanRepresentasi(){
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

        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
       $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja AS wilayah,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun IN($hasilfilterTahun) AND bulan IN($hasilfilterBulan) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Representasi' GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun IN($hasilfilterTahun) AND unit_kerja IN($hasilfilterWilayah) AND keterangan='Beban Representasi' GROUP BY unit_kerja) main2 ON main1.wilayah = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function getMonth(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
        $data =$this->db->query("SELECT a.bulan,b.nomor,b.bulan_nama FROM detail_realisasi_deposito a INNER JOIN bulan b ON a.bulan=b.nomor WHERE tahun=$hasilfilterTahun GROUP BY b.nomor")->result_array();
        echo json_encode($data);
    }

     public function DepositoMitra(){
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

        $data =$this->db->query("SELECT mitra,SUM(ROUND(nominal/1000000,1 )) AS nominal FROM detail_realisasi_deposito WHERE tahun=$hasilfilterTahun AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY mitra")->result_array();
        echo json_encode($data);
    }

    public function SukuBunga(){
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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT mitra AS mitra_bunga,MIN(suku_bunga)AS min_bunga FROM detail_realisasi_deposito  WHERE tahun=$hasilfilterTahun AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY mitra) main1 LEFT JOIN (SELECT mitra,MAX(suku_bunga)AS max_bunga FROM detail_realisasi_deposito  WHERE tahun=$hasilfilterTahun AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY mitra) main2 ON main1.mitra_bunga = main2.mitra")->result_array();
        echo json_encode($data);
    }

    public function DepositoTerbesar(){
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

        $data =$this->db->query("SELECT unit_kerja,Max(ROUND(nominal/1000000,1 )) AS nominal FROM detail_realisasi_deposito WHERE tahun=$hasilfilterTahun AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY unit_kerja order by nominal desc LIMIT 5")->result_array();
        echo json_encode($data);
    }

    public function depoBebanWilayah(){
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

        $data =$this->db->query("SELECT a.wilayah_kerja,b.bulan_singkat,SUM(ROUND(a.nominal/1000000,1 )) AS nominal FROM detail_realisasi_deposito a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.wilayah_kerja,b.nomor")->result_array();

        echo json_encode($data);
    }

    public function depoMitra(){
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

        $data =$this->db->query("SELECT a.wilayah_kerja,a.mitra,b.bulan_singkat,SUM(ROUND(a.nominal/1000000,1 )) AS nominal FROM detail_realisasi_deposito a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.mitra,b.nomor")->result_array();

        echo json_encode($data);
    }

    public function depoBunga(){
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

        $data =$this->db->query("SELECT a.wilayah_kerja,a.mitra,b.bulan_singkat,max(suku_bunga) AS suku_bunga FROM detail_realisasi_deposito a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.mitra,b.nomor order by suku_bunga desc")->result_array();

        echo json_encode($data);
    }

    public function depoUnitKerja(){
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

        $data =$this->db->query("SELECT a.wilayah_kerja,a.unit_kerja,b.bulan_singkat,SUM(ROUND(a.nominal/1000000,1 )) AS nominal FROM detail_realisasi_deposito a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.unit_kerja,b.nomor")->result_array();

        echo json_encode($data);
    }

    }
