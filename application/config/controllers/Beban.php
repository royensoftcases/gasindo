<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beban extends CI_Controller {

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
            echo"<script>window.location.replace('".base_url("?page=upload_beban');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_beban');</script>");
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 4; $row <= $highestRow; $row++){                            
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                                                      
                 $data = array(
                    "wilayah_kerja"=> $rowData[0][2],
                    "penerima_jaminan"=> $rowData[0][3],
                    "cabang"=> $rowData[0][4],
                    "jumlah_beban"=> $rowData[0][20],
                    "produk"=> $rowData[0][25],
                    "jenis_produk"=> $rowData[0][26],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                $insert = $this->db->insert("temp_beban",$data);            
            }
            $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_realisasi_beban",$data);
             $dataTotal = $this->db->query("SELECT DISTINCT wilayah_kerja,penerima_jaminan,cabang,produk,jenis_produk,SUM(jumlah_beban) AS pokok_kredit,SUM(jumlah_beban) AS jumlah_beban FROM temp_beban WHERE tahun='$period_years' AND bulan='$period_month' GROUP BY wilayah_kerja,penerima_jaminan,produk,jenis_produk,cabang")->result_array();
             foreach ($dataTotal as $dttotal) {
                    $data = array(
                        'wilayah_kerja'=>$dttotal['wilayah_kerja'],
                        'penerima_jaminan'=>$dttotal['penerima_jaminan'],
                        'cabang'=>$dttotal['cabang'],
                        'produk'=>$dttotal['produk'],
                        'jenis_produk'=>str_replace(' ','', $dttotal['jenis_produk']),
                        'jumlah_beban' => $dttotal['jumlah_beban'],
                        'tahun'=>$period_years,
                        'bulan'=>$period_month,
                );
                    $this->db->insert('detail_realisasi_beban',$data);
                }
            $this->db->delete('temp_beban', array('tahun' => $period_years, 'bulan' => $period_month));  
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_beban');</script>");
    }

    public function deleteUploadRealisasi(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_realisasi_beban', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('detail_realisasi_beban', array('tahun' => $tahun, 'bulan' => $bulan));
}

public function dataRealisasi($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_beban';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'penerima_jaminan',     'dt' => 2, 'field' => 'penerima_jaminan' ),
            array( 'db' => 'cabang',     'dt' => 3, 'field' => 'cabang' ),
            array( 'db' => 'produk',     'dt' => 4, 'field' => 'produk' ),
            array( 'db' => 'jenis_produk',     'dt' => 5, 'field' => 'jenis_produk' ),
            array( 'db' => 'jumlah_beban',     'dt' => 6, 'field' => 'jumlah_beban' ),
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
         $table = 'header_realisasi_beban';
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


    public function beban_klaim_header() { 
        $this->load->library('ssplib');
         $table = 'header_target_beban';
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
     public function upload_beban_klaim(){
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
 
            for ($row = 2; $row <= $highestRow; $row++){                            
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                                                      
                 $data = array(
                    "wilayah_kerja"=> $rowData[0][1],
                    "KUR"=> $rowData[0][2],
                    "PEN"=> $rowData[0][3],
                    "NONKURPEN"=> $rowData[0][4],
                    "target"=> $rowData[0][5],
                    "tahun"=> $period_years,
                );
 
                $insert = $this->db->insert("target_beban_klaim",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'judul'=>'TARGET BEBAN KLAIM TAHUN '.$period_years,
            );
            $insert = $this->db->insert("header_target_beban",$data);

             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_target_beban');</script>");
    }
     public function deleteUploadBebanKlaim(){
        $tahun =$this->input->post('tahun_delete');
        $this->db->delete('header_target_beban', array('tahun' => $tahun));
        $this->db->delete('target_beban_klaim', array('tahun' => $tahun));
}
public function dataTargetBebanKlaim($tahun) { 
     $this->load->library('ssplibcustom');
        $table = 'target_beban_klaim';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'KUR',     'dt' => 2, 'field' => 'KUR' ),
            array( 'db' => 'PEN',     'dt' => 3, 'field' => 'PEN' ),
            array( 'db' => 'NONKURPEN',     'dt' => 4, 'field' => 'NONKURPEN' ),
            array( 'db' => 'target',     'dt' => 5, 'field' => 'target' ),
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

   public function filterWilayahPencapaian(){
    $tahun_param=$_SESSION['tahun_param'];
     $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

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

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $d .="'".$filterMitra[$i]."',";
                }
        $hasilfiltermitra=substr($d, 0, -1);
        $data =$this->db->query("SELECT main1.*, main2.*, main3.* FROM (SELECT wilayah_kerja,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban_now FROM detail_realisasi_beban WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND penerima_jaminan IN($hasilfiltermitra) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban_before FROM detail_realisasi_beban WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND penerima_jaminan IN($hasilfiltermitra) GROUP BY wilayah_kerja ) main2 ON main1.wilayah_kerja = main2.wilayah_kerja LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(target/1000000,1 )) AS target from target_beban_klaim where tahun=$tahun_param AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY wilayah_kerja) main3 ON main1.wilayah_kerja = main3.wilayah_kerja ORDER BY jumlah_beban_now DESC")->result_array();

        echo json_encode($data);
    }

     public function filterJenisProdukPencapaian(){
        $tahun_param=$_SESSION['tahun_param'];
     $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

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

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $d .="'".$filterMitra[$i]."',";
                }
        $hasilfiltermitra=substr($d, 0, -1);

        $filterJenisProduk = $this->input->post('filterJenisProduk', true);
        for ($i = 0; $i < count($filterJenisProduk); $i++) {
                  $b .="'".$filterJenisProduk[$i]."',";
                  $e .="SELECT '".$filterJenisProduk[$i]."' AS jenis_produk,SUM(ROUND(".$filterJenisProduk[$i]."/1000000,1 )) AS target FROM target_beban_klaim WHERE tahun=$tahun_param AND wilayah_kerja IN($hasilfilterWilayah) UNION ALL ";
                }
        $queryFilter=substr($e, 0, -11);

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT jenis_produk,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban_now FROM detail_realisasi_beban WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND penerima_jaminan IN($hasilfiltermitra) GROUP BY jenis_produk) main1 LEFT JOIN ($queryFilter) main2 ON main1.jenis_produk = main2.jenis_produk ORDER BY jumlah_beban_now DESC")->result_array();

        echo json_encode($data);
    }

    public function filterProdukPencapaian(){
        $tahun_param=$_SESSION['tahun_param'];
       $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

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

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $d .="'".$filterMitra[$i]."',";
                }
        $hasilfiltermitra=substr($d, 0, -1);
        $data = $this->db->query("SELECT main1.* FROM (SELECT produk,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban,wilayah_kerja FROM detail_realisasi_beban WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND penerima_jaminan IN($hasilfiltermitra) GROUP BY produk) main1 ORDER BY jumlah_beban DESC")->result_array();
        echo json_encode($data); 
    }

    public function filterMitraPencapaian(){
        $tahun_param=$_SESSION['tahun_param'];
      $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

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

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $d .="'".$filterMitra[$i]."',";
                }
        $hasilfiltermitra=substr($d, 0, -1);
       $data = $this->db->query("SELECT main1.* FROM (SELECT penerima_jaminan,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban,wilayah_kerja FROM detail_realisasi_beban WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND penerima_jaminan IN($hasilfiltermitra) GROUP BY penerima_jaminan) main1 ORDER BY jumlah_beban DESC")->result_array();
        echo json_encode($data);
    }

    public function filterGrowthProduk(){
        $tahun_param=$_SESSION['tahun_param'];
       $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

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

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $d .="'".$filterMitra[$i]."',";
                }
        $hasilfiltermitra=substr($d, 0, -1);
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT produk AS produk_judul,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban_now FROM detail_realisasi_beban WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND penerima_jaminan IN($hasilfiltermitra) GROUP BY produk) main1 LEFT JOIN (SELECT produk,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban_before FROM detail_realisasi_beban WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) GROUP BY produk) main2 ON main1.produk_judul = main2.produk ORDER BY jumlah_beban_before DESC")->result_array();
        echo json_encode($data);
    }

     public function filterGrowthMitra(){
        $tahun_param=$_SESSION['tahun_param'];
       $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $a .="'".$filterBulan[$i]."',";
                }
        $hasilfilter=substr($a, 0, -1);

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

        $filterMitra = $this->input->post('filterMitra', true);
        for ($i = 0; $i < count($filterMitra); $i++) {
                  $d .="'".$filterMitra[$i]."',";
                }
        $hasilfiltermitra=substr($d, 0, -1);
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT penerima_jaminan AS mitra,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban_now,produk FROM detail_realisasi_beban WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) GROUP BY penerima_jaminan) main1 LEFT JOIN (SELECT penerima_jaminan,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban_before,produk FROM detail_realisasi_beban WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND produk IN($hasilfilterPerProduk) AND penerima_jaminan IN($hasilfiltermitra) GROUP BY penerima_jaminan) main2 ON main1.mitra = main2.penerima_jaminan ORDER BY jumlah_beban_now DESC")->result_array();
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

        $data =$this->db->query("SELECT a.wilayah_kerja,b.bulan_singkat,SUM(ROUND(a.jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.wilayah_kerja,b.nomor")->result_array();

        echo json_encode($data);
    }

    public function monitoringJenis(){
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

        $data =$this->db->query("SELECT a.jenis_produk,b.bulan_singkat,SUM(ROUND(a.jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.jenis_produk,b.nomor")->result_array();

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

        $data =$this->db->query("SELECT a.produk,b.bulan_singkat,SUM(ROUND(a.jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.produk,b.nomor")->result_array();

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

        $data =$this->db->query("SELECT a.penerima_jaminan,b.bulan_singkat,SUM(ROUND(a.jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban a INNER JOIN bulan b ON a.bulan=b.nomor WHERE a.tahun=$hasilfilterTahun AND a.wilayah_kerja IN($hasilfilterWilayah) GROUP BY a.penerima_jaminan,b.nomor")->result_array();

        echo json_encode($data);
    }

public function getMonth(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
        $data =$this->db->query("SELECT a.bulan,b.nomor,b.bulan_nama FROM detail_realisasi_beban a INNER JOIN bulan b ON a.bulan=b.nomor WHERE tahun=$hasilfilterTahun GROUP BY b.nomor")->result_array();
        echo json_encode($data);
    }

     public function RasioTotal(){
       $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT bulan,SUM(ROUND(jumlah_beban/1000000,1 )) AS beban_klaim FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah)) main1 LEFT JOIN (SELECT bulan,SUM(ROUND(ijp/1000000,1 )) AS ijp FROM detail_realisasi_volume WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah)) main2 ON main1.bulan = main2.bulan")->result_array();
        echo json_encode($data);
    }

    public function RatioWilayah(){
       $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah_kerja AS wilayah_ratio,SUM(ROUND(jumlah_beban/1000000,1 )) AS beban_klaim FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(ijp/1000000,1 )) AS ijp FROM detail_realisasi_volume WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY wilayah_kerja) main2 ON main1.wilayah_ratio = main2.wilayah_kerja")->result_array();
        echo json_encode($data);
    }
    public function RatioProduk(){
       $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT produk AS produk_ratio,SUM(ROUND(jumlah_beban/1000000,1 )) AS beban_klaim FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY produk) main1 LEFT JOIN (SELECT produk,SUM(ROUND(ijp/1000000,1 )) AS ijp FROM detail_realisasi_volume WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY produk) main2 ON main1.produk_ratio = main2.produk")->result_array();
        echo json_encode($data);
    }
    public function RatioMitra(){
       $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT penerima_jaminan,SUM(ROUND(jumlah_beban/1000000,1 )) AS beban_klaim FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY penerima_jaminan) main1 LEFT JOIN (SELECT bank,SUM(ROUND(ijp/1000000,1 )) AS ijp FROM detail_realisasi_volume WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY bank) main2 ON main1.penerima_jaminan = main2.bank")->result_array();
        echo json_encode($data);
    }
    }