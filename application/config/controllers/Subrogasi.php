<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subrogasi extends CI_Controller {

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
            echo"<script>window.location.replace('".base_url("?page=upload_subrogasi');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_subrogasi');</script>");
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
                    "bank"=> $rowData[0][2],
                    "produk"=> $rowData[0][5],
                    "jenis_produk"=> $rowData[0][6],
                    "jumlah_klaim"=> $rowData[0][12],
                    "jumlah_subro"=> $rowData[0][15],
                    "month_remark"=> $rowData[0][16],
                    "year_remark"=>  $rowData[0][17],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                $insert = $this->db->insert("temp_subrogasi",$data);            
            }
             $dataTotal = $this->db->query("SELECT DISTINCT wilayah_kerja,bank,produk,jenis_produk,SUM(jumlah_klaim) AS jumlah_klaim,SUM(jumlah_subro) AS jumlah_subro,year_remark,month_remark FROM temp_subrogasi WHERE tahun='$period_years' AND bulan='$period_month' GROUP BY wilayah_kerja,bank,jenis_produk")->result_array();
             foreach ($dataTotal as $dttotal) {
                    $data = array(
                    "wilayah_kerja"=> $dttotal['wilayah_kerja'],
                    "bank"=> $dttotal['bank'],
                    "produk"=>$dttotal['produk'],
                    'jenis_produk'=>str_replace(' ','', $dttotal['jenis_produk']),
                    "jumlah_klaim"=> $dttotal['jumlah_klaim'],
                    "jumlah_subro"=> $dttotal['jumlah_subro'],
                    "month_remark"=> $dttotal['month_remark'],
                    "year_remark"=>  $dttotal['year_remark'],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                    $this->db->insert('detail_realisasi_subrogasi',$data);
                }
            $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_realisasi_subrogasi",$data);

            $this->db->delete('temp_subrogasi', array('tahun' => $period_years, 'bulan' => $period_month));  
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_subrogasi');</script>");
    }

    public function deleteUploadRealisasi(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_realisasi_subrogasi', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('detail_realisasi_subrogasi', array('tahun' => $tahun, 'bulan' => $bulan));
}

public function dataRealisasi($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_subrogasi';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'bank',     'dt' => 2, 'field' => 'bank' ),
            array( 'db' => 'produk',     'dt' => 3, 'field' => 'produk' ),
            array( 'db' => 'jenis_produk',     'dt' => 4, 'field' => 'jenis_produk' ),
            array( 'db' => 'jumlah_klaim',     'dt' => 5, 'field' => 'jumlah_klaim' ),
            array( 'db' => 'jumlah_subro',     'dt' => 6, 'field' => 'jumlah_subro' ),
            array( 'db' => 'month_remark',     'dt' => 7, 'field' => 'month_remark' ),
            array( 'db' => 'year_remark',     'dt' => 8, 'field' => 'year_remark' ),
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
         $table = 'header_realisasi_subrogasi';
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


    public function subrogasi_target_header() { 
        $this->load->library('ssplib');
         $table = 'header_target_subrogasi';
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
     public function upload_subrogasi_target(){
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
            echo"<script>window.location.replace('".base_url("?page=upload_target_subrogasi');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_target_subrogasi');</script>");
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
                $insert = $this->db->insert("target_subrogasi",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'judul'=>'TARGET SUBROGASI TAHUN '.$period_years,
            );
            $insert = $this->db->insert("header_target_subrogasi",$data);

             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_target_subrogasi');</script>");
    }


     public function deleteUploadSubrogasiTarget(){
        $tahun =$this->input->post('tahun_delete');
        $this->db->delete('header_target_subrogasi', array('tahun' => $tahun));
        $this->db->delete('target_subrogasi', array('tahun' => $tahun));
}
public function dataTargetSubrogasi($tahun) { 
     $this->load->library('ssplibcustom');
        $table = 'target_subrogasi';
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

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $c .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($c, 0, -1);

        $filterProduk = $this->input->post('filterProduk', true);
        for ($i = 0; $i < count($filterProduk); $i++) {
                  $d .="'".$filterProduk[$i]."',";
                }
        $hasilfilterProduk=substr($d, 0, -1);
        $data =$this->db->query("SELECT main1.*, main2.*, main3.* FROM (SELECT wilayah_kerja,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_now FROM detail_realisasi_subrogasi WHERE tahun=$tahun_param AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank IN($hasilfilterBank) AND produk IN($hasilfilterProduk) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_before FROM detail_realisasi_subrogasi WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank IN($hasilfilterBank) AND produk IN($hasilfilterProduk) GROUP BY wilayah_kerja ) main2 ON main1.wilayah_kerja = main2.wilayah_kerja LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(target/1000000,1 )) AS target from target_subrogasi where tahun=$tahun_param AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY wilayah_kerja) main3 ON main1.wilayah_kerja = main3.wilayah_kerja ORDER BY jumlah_subro_now DESC")->result_array();

        echo json_encode($data);
    }

public function JenisProdukPencapaian(){
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

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $c .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($c, 0, -1);

        $filterProduk = $this->input->post('filterProduk', true);
        for ($i = 0; $i < count($filterProduk); $i++) {
                  $d .="'".$filterProduk[$i]."',";
                }
        $hasilfilterProduk=substr($d, 0, -1);

        $filterJenisProduk = $this->input->post('filterJenisProduk', true);
        for ($i = 0; $i < count($filterJenisProduk); $i++) {
                  $b .="'".$filterJenisProduk[$i]."',";
                  $e .="SELECT '".$filterJenisProduk[$i]."' AS jenis_produk,SUM(ROUND(".$filterJenisProduk[$i]."/1000000,1 )) AS target FROM target_subrogasi WHERE tahun=$tahun_param AND wilayah_kerja IN($hasilfilterWilayah) UNION ALL ";
                }
        $queryFilter=substr($e, 0, -11);

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT jenis_produk,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_now FROM detail_realisasi_subrogasi WHERE tahun=$tahun_param AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank IN($hasilfilterBank) AND produk IN($hasilfilterProduk) GROUP BY jenis_produk) main1 LEFT JOIN ($queryFilter) main2 ON main1.jenis_produk = main2.jenis_produk ORDER BY jumlah_subro_now DESC")->result_array();

         echo json_encode($data); 
    }

     public function GrowthProduk(){
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

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $c .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($c, 0, -1);

        $filterProduk = $this->input->post('filterProduk', true);
        for ($i = 0; $i < count($filterProduk); $i++) {
                  $d .="'".$filterProduk[$i]."',";
                }
        $hasilfilterProduk=substr($d, 0, -1);
       $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT produk AS produk_judul,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_now,wilayah_kerja FROM detail_realisasi_subrogasi WHERE tahun=$tahun_param AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank IN($hasilfilterBank)  AND produk IN($hasilfilterProduk) GROUP BY produk) main1 LEFT JOIN (SELECT produk,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_before,wilayah_kerja FROM detail_realisasi_subrogasi WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank IN($hasilfilterBank)  AND produk IN($hasilfilterProduk) GROUP BY produk) main2 ON main1.produk_judul = main2.produk ORDER BY jumlah_subro_now DESC")->result_array();
        echo json_encode($data); 
    }

    public function GrowthMitra(){
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

        $filterBank = $this->input->post('filterBank', true);
        for ($i = 0; $i < count($filterBank); $i++) {
                  $c .="'".$filterBank[$i]."',";
                }
        $hasilfilterBank=substr($c, 0, -1);

        $filterProduk = $this->input->post('filterProduk', true);
        for ($i = 0; $i < count($filterProduk); $i++) {
                  $d .="'".$filterProduk[$i]."',";
                }
        $hasilfilterJenis=substr($d, 0, -1);
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT bank AS bank_judul,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_now,wilayah_kerja FROM detail_realisasi_subrogasi WHERE tahun=$tahun_param AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank IN($hasilfilterBank)  AND produk IN($hasilfilterJenis) GROUP BY bank) main1 LEFT JOIN (SELECT bank,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_before,wilayah_kerja FROM detail_realisasi_subrogasi WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank IN($hasilfilterBank)  AND produk IN($hasilfilterJenis) GROUP BY bank) main2 ON main1.bank_judul = main2.bank ORDER BY jumlah_subro_now DESC")->result_array();
       echo json_encode($data); 
    }

    public function getMonth(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
        $data =$this->db->query("SELECT a.bulan,b.nomor,b.bulan_nama FROM detail_realisasi_subrogasi a INNER JOIN bulan b ON a.bulan=b.nomor WHERE tahun=$hasilfilterTahun GROUP BY b.nomor")->result_array();
        echo json_encode($data);
    }
    public function RecoveryTotal(){
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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT bulan,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro FROM detail_realisasi_subrogasi WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah)) main1 LEFT JOIN (SELECT bulan,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah)) main2 ON main1.bulan = main2.bulan")->result_array();
        echo json_encode($data);
    }
    public function RecoveryWilayah(){
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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah_kerja AS wilayah_recovery,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro FROM detail_realisasi_subrogasi WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY wilayah_kerja) main2 ON main1.wilayah_recovery = main2.wilayah_kerja")->result_array();
        echo json_encode($data);
    }
    public function RecoveryMitra(){
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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT bank,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro FROM detail_realisasi_subrogasi WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY bank) main1 LEFT JOIN (SELECT penerima_jaminan,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY penerima_jaminan) main2 ON main1.bank = main2.penerima_jaminan")->result_array();
        echo json_encode($data);
    }
    public function RecoveryProduk(){
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

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT produk AS produk_recovery,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro FROM detail_realisasi_subrogasi WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY produk) main1 LEFT JOIN (SELECT produk,SUM(ROUND(jumlah_beban/1000000,1 )) AS jumlah_beban FROM detail_realisasi_beban WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) GROUP BY produk) main2 ON main1.produk_recovery = main2.produk")->result_array();
        echo json_encode($data);
    }
    }