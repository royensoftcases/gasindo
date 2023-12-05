<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Volume extends CI_Controller {

    public function __construct() {
        parent::__construct();
        ini_set('memory_limit', '1024M');
        ini_set("max_execution_time", '2048');
        $this->load->database();
        $this->load->model('Crud_models');
        $this->load->library('Excel');
        $this->load->library('upload');
    }

     public function realisasi_header() { 
        $this->load->library('ssplib');
         $table = 'header_realisasi_volume';
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

    public function realisasi_header_market() { 
        $this->load->library('ssplib');
         $table = 'header_realisasi_market';
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

     public function eksposure_header() { 
        $this->load->library('ssplib');
         $table = 'header_eksposure';
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
            echo"<script>window.location.replace('".base_url("?page=upload_realisasi_volume');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_realisasi_volume');</script>");
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
                    "wilayah_kerja"=> $rowData[0][1],
                    "produk"=> $rowData[0][2],
                    "jenis_produk"=> $rowData[0][3],
                    "bank"=> $rowData[0][4],
                   /* "tgl_sertifikat"=>gmdate("Y-m-d", ($rowData[0][8] - 25569) * 86400),*/
                    "pokok_kredit"=> $rowData[0][6],
                    "ijp"=> $rowData[0][7],
                   /* "tgl_akat"=> date("Y-m-d", strtotime($rowData[0][23])),*/
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
 
                $insert = $this->db->insert("temp_volume",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_realisasi_volume",$data);
            $dataTotal = $this->db->query("SELECT DISTINCT wilayah_kerja,jenis_produk,produk,bank,SUM(pokok_kredit) AS pokok_kredit,SUM(ijp) AS ijp FROM temp_volume WHERE tahun='$period_years' AND bulan='$period_month' GROUP BY wilayah_kerja,jenis_produk,produk,bank")->result_array();
             foreach ($dataTotal as $dttotal) {
                    $data = array(
                        'wilayah_kerja'=>$dttotal['wilayah_kerja'],
                        'produk'=>$dttotal['produk'],
                        'jenis_produk'=>$dttotal['jenis_produk'],
                        'bank'=>$dttotal['bank'],
                        'pokok_kredit' => $dttotal['pokok_kredit'],
                        'ijp' => $dttotal['ijp'],
                        'tahun'=>$period_years,
                        'bulan'=>$period_month,
                );
                    $this->db->insert('detail_realisasi_volume',$data);
                }
            $this->db->delete('temp_volume', array('tahun' => $period_years, 'bulan' => $period_month));
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_realisasi_volume');</script>");
    }



  public function upload_realisasi_market(){
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
            echo"<script>window.location.replace('".base_url("?page=upload_realisasi_market');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
            $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
             $insert = $this->db->insert("header_realisasi_market",$data);
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_realisasi_market');</script>");
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 3; $row <= $highestRow; $row++){                            
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                                                      
                 $data = array(
                    "wilayah_kerja"=> $rowData[0][0],
                    "bank"=> $rowData[0][2],
                    "penyaluran"=> $rowData[0][3],
                    "penjaminan"=> $rowData[0][4],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                $insert = $this->db->insert("detail_realisasi_market",$data);
                      
            }
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_realisasi_market');</script>");
    }

public function upload_eksposure(){
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
            echo"<script>window.location.replace('".base_url("?page=eksposure');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
            $data = array(
                    'tahun'=>$period_years,
                    'bulan'=>$period_month,
            );
            $insert = $this->db->insert("header_eksposure",$data);

                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=eksposure');</script>");
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
                    "produk"=> $rowData[0][2],
                    "sk"=> $rowData[0][3],
                    "tgl_sp"=>  gmdate("Y-m-d", ($rowData[0][4]-25569)*86400),
                    "nasabah"=> $rowData[0][5],
                    "plafond"=> $rowData[0][6],
                    "tgl_jatuh_tempo"=>gmdate("Y-m-d", ($rowData[0][7]-25569)*86400),
                    "peruntukan"=> $rowData[0][8],
                    "tahun"=> $period_years,
                    "bulan"=> $period_month
                );
                $insert = $this->db->insert("eksposure",$data);
                      
            }
             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=eksposure');</script>");
    }

    public function deleteUploadRealisasi(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_realisasi_volume', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('detail_realisasi_volume', array('tahun' => $tahun, 'bulan' => $bulan));
}

    public function deleteUploadRealisasiMarket(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_realisasi_market', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('detail_realisasi_market', array('tahun' => $tahun, 'bulan' => $bulan));
}

public function deleteUploadEksposure(){
        $tahun =$this->input->post('tahun_delete');
        $bulan =$this->input->post('bulan_delete');
        $this->db->delete('header_eksposure', array('tahun' => $tahun, 'bulan' => $bulan));
        $this->db->delete('eksposure', array('tahun' => $tahun, 'bulan' => $bulan));
}

public function dataRealisasi($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_volume';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'jenis_produk',     'dt' => 2, 'field' => 'jenis_produk' ),
            array( 'db' => 'produk',     'dt' => 3, 'field' => 'produk' ),
            array( 'db' => 'bank',     'dt' => 4, 'field' => 'bank' ),
            array( 'db' => 'pokok_kredit',     'dt' => 5, 'field' => 'pokok_kredit' ),
            array( 'db' => 'ijp',     'dt' => 6, 'field' => 'ijp' ),
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

    public function dataRealisasiMarket($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'detail_realisasi_market';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'bank',     'dt' => 2, 'field' => 'bank' ),
            array( 'db' => 'penyaluran',     'dt' => 3, 'field' => 'penyaluran' ),
            array( 'db' => 'penjaminan',     'dt' => 4, 'field' => 'penjaminan' ),
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

public function dataEksposure($tahun,$bulan) { 
     $this->load->library('ssplibcustom');
        $table = 'eksposure';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'produk',     'dt' => 2, 'field' => 'produk' ),
            array( 'db' => 'sk',     'dt' => 3, 'field' => 'sk' ),
            array( 'db' => 'tgl_sp',     'dt' => 4, 'field' => 'tgl_sp' ),
            array( 'db' => 'nasabah',     'dt' => 5, 'field' => 'nasabah' ),
            array( 'db' => 'plafond',     'dt' => 6, 'field' => 'plafond' ),
            array( 'db' => 'tgl_jatuh_tempo',     'dt' => 7, 'field' => 'tgl_jatuh_tempo' ),
            array( 'db' => 'peruntukan',     'dt' => 8, 'field' => 'peruntukan' ),
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
    public function Pencarian(){
    $search_nasabah = $this->input->post('search_nasabah', true);
    $date_periode = $this->input->post('date_periode', true);

         $query= $this->db->query("SELECT nasabah,(SELECT SUM(plafond) from eksposure where BINARY(nasabah)='$search_nasabah' AND tgl_jatuh_tempo<'$date_periode') AS off_risk,(SELECT SUM(plafond) from eksposure where BINARY(nasabah)='$search_nasabah' AND tgl_jatuh_tempo>='$date_periode') AS on_risk,(SELECT count(id) from eksposure where BINARY(nasabah)='$search_nasabah') AS riwayat,(SELECT SUM(plafond) from eksposure where BINARY(nasabah)='$search_nasabah') AS total_plafond,(SELECT tgl_jatuh_tempo from eksposure where BINARY(nasabah)='$search_nasabah' ORDER BY tgl_jatuh_tempo DESC LIMIT 1 ) AS tgl_tempo from eksposure where BINARY(nasabah) = '$search_nasabah'")->result_array();
        $data = array(
            'nasabah'=>$query[0]['nasabah'],
            'on_risk'=>$query[0]['on_risk'],
            'off_risk'=>$query[0]['off_risk'],
            'riwayat'=>$query[0]['riwayat'],
            'total_plafond'=>$query[0]['total_plafond'],
            'tgl_tempo'=>$query[0]['tgl_tempo'],
    );
        echo json_encode($data); 
      /* echo $query;*/
}
public function GetNasabah(){
 $data =$this->db->query("SELECT distinct(nasabah) from eksposure")->result_array();
        echo json_encode($data);
}

 public function dataEksposureFront() { 
$search_nasabah =$this->input->post('nasabahname');
     $this->load->library('ssplibcustom');
        $table = 'eksposure';
        $primaryKey = 'id';
        $columns = array(
             array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'wilayah_kerja',     'dt' => 1, 'field' => 'wilayah_kerja' ),
            array( 'db' => 'produk',     'dt' => 2, 'field' => 'produk' ),
            array( 'db' => 'sk',     'dt' => 3, 'field' => 'sk' ),
            array( 'db' => 'tgl_sp',     'dt' => 4, 'field' => 'tgl_sp' ),
            array( 'db' => 'nasabah',     'dt' => 5, 'field' => 'nasabah' ),
            array( 'db' => 'plafond',     'dt' => 6, 'field' => 'plafond' ),
            array( 'db' => 'tgl_jatuh_tempo',     'dt' => 7, 'field' => 'tgl_jatuh_tempo' ),
            array( 'db' => 'peruntukan',     'dt' => 8, 'field' => 'peruntukan' ),
        );
         $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname
        );
        $joinQuery = "";
        $extraWhere = "BINARY(nasabah)='$search_nasabah'";
        $groupBy = "";
        $having = "";
        echo json_encode(
                $this->ssplibcustom->simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
        );
    }

 public function volume_header() { 
        $this->load->library('ssplib');
         $table = 'header_target_volume';
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

 public function upload_volume(){
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
            echo"<script>window.location.replace('".base_url("?page=upload_target_volume');</script>");
        }
              
        $inputFileName = './upload/'.$fileName;
 
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                echo"<script>alert('".pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()."');</script>";
                echo"<script>window.location.replace('".base_url("?page=upload_target_volume');</script>");
            }
 
            $sheet = $objPHPExcel->getSheet(1);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
 
            for ($row = 5; $row <= $highestRow; $row++){                            
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);   
                                                      
                 $data = array(
                    "produk"=> $rowData[0][1],
                    "kode"=> $rowData[0][2],
                    "jenis_produk"=> $rowData[0][3],
                    "bandung"=> $rowData[0][4],
                    "cirebon"=> $rowData[0][5],
                    "purwakarta"=> $rowData[0][6],
                    "tasikmalaya"=> $rowData[0][7],
                    "sukabumi"=> $rowData[0][8],
                    "volume"=> $rowData[0][9],
                    "tahun"=> $period_years,
                );
                 
 
                $insert = $this->db->insert("target_volume",$data);
                      
            }
                $data = array(
                    'tahun'=>$period_years,
                    'judul'=>'TARGET VOLUME TAHUN '.$period_years,
            );
            $insert = $this->db->insert("header_target_volume",$data);

             unlink('upload/'.$fileName);
            echo"<script>window.location.replace('".base_url("?page=upload_target_volume');</script>");
    }

      public function deleteUploadVolume(){
        $tahun =$this->input->post('tahun_delete');
        $this->db->delete('header_target_volume', array('tahun' => $tahun));
        $this->db->delete('target_volume', array('tahun' => $tahun));
}
      public function dataVolume($tahun) { 
     $this->load->library('ssplibcustom');
        $table = 'target_volume';
        $primaryKey = 'id';
        $columns = array(
            array( 'db' => 'id', 'dt' => 0, 'field' => 'id' ),
            array( 'db' => 'produk',     'dt' => 1, 'field' => 'produk' ),
            array( 'db' => 'kode',     'dt' => 2, 'field' => 'kode' ),
            array( 'db' => 'jenis_produk',     'dt' => 3, 'field' => 'jenis_produk' ),
            array( 'db' => 'bandung',     'dt' => 4, 'field' => 'bandung' ),
            array( 'db' => 'cirebon',     'dt' => 5, 'field' => 'cirebon' ),
            array( 'db' => 'purwakarta',     'dt' => 6, 'field' => 'purwakarta' ),
            array( 'db' => 'tasikmalaya',     'dt' => 7, 'field' => 'tasikmalaya' ),
            array( 'db' => 'sukabumi',     'dt' => 8, 'field' => 'sukabumi' ),
            array( 'db' => 'volume',     'dt' => 9, 'field' => 'volume' ),
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
                  $c .="SELECT '".$filterWilayah[$i]."' AS wilayah_kerja,SUM(ROUND(".$filterWilayah[$i]."/1000000,1 )) AS volume FROM target_volume WHERE tahun=$tahun_param AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) UNION ALL ";
                }
        $hasilfilterWilayah=substr($b, 0, -1);
        $queryWilayah=substr($c, 0, -11);

        $data =$this->db->query("SELECT main1.*, main2.*, main3.* FROM (SELECT wilayah_kerja,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit_now FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit_before FROM detail_realisasi_volume WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY wilayah_kerja ) main2 ON main1.wilayah_kerja = main2.wilayah_kerja LEFT JOIN ($queryWilayah) main3 ON main1.wilayah_kerja = main3.wilayah_kerja ORDER BY pokok_kredit_now DESC")->result_array();
        echo json_encode($data);
    }

    public function filterbulanVolumeJenisProduk(){
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
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT jenis_produk,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY jenis_produk) main1 LEFT JOIN (SELECT jenis_produk,($queryWilayah) AS volume FROM target_volume WHERE tahun=$tahun_param AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) GROUP BY jenis_produk) main2 ON main1.jenis_produk = main2.jenis_produk ORDER BY volume DESC")->result_array();
        echo json_encode($data); 
    }

    public function filterbulanVolumeProduk(){
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
       $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT produk as produk_total,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY produk) main1 LEFT JOIN (SELECT produk as produk,( $queryWilayah) AS volume FROM target_volume WHERE tahun=$tahun_param AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) GROUP BY produk) main2 ON main1.produk_total = main2.produk ORDER BY volume DESC")->result_array();
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
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT produk as produk_now,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit_now FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY produk) main1 LEFT JOIN (SELECT produk,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit_before FROM detail_realisasi_volume WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY produk) main2 ON main1.produk_now = main2.produk ORDER BY pokok_kredit_now DESC")->result_array();
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
        $data = $this->db->query("SELECT main1.*, main2.* FROM (SELECT bank,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit_now FROM detail_realisasi_volume WHERE tahun=$tahun_param AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY bank) main1 LEFT JOIN (SELECT bank,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit_before FROM detail_realisasi_volume WHERE tahun=$tahun_param-1 AND bulan IN($hasilfilter) AND wilayah_kerja IN($hasilfilterWilayah) AND jenis_produk IN($hasilfilterTipeProduk) AND produk IN($hasilfilterPerProduk) AND bank IN($hasilfilterBank) GROUP BY bank) main2 ON main1.bank = main2.bank ORDER BY pokok_kredit_now DESC")->result_array();
        echo json_encode($data);
    }

    public function GetPerProduk(){
         $filterTipeProduk = $this->input->post('filterTipeProduk', true);
        for ($i = 0; $i < count($filterTipeProduk); $i++) {
                  $d .="'".$filterTipeProduk[$i]."',";
                }
        $hasilfilterTipeProduk=substr($d, 0, -1);
        $ProdukQuery = "SELECT DISTINCT(produk) FROM target_volume where jenis_produk IN($hasilfilterTipeProduk) AND tahun=$tahun_param";
        $result =$this->db->query($ProdukQuery)->result_array();
        $html =""; 
        foreach ($result as $each) { 
        $html .='<li><input type="checkbox" name="filterPerProduk" id="'.$each['produk'].'" value="'.$each['produk'].'" checked class="checkbox_produk" onclick="cekFilter();"/><label style="font-size: 11px;" for="'.$each['produk'].'">'.$each['produk'].'</label></li>';
         } 
         echo $html;
    }


public function getMonth(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);
        $data =$this->db->query("SELECT a.bulan,b.nomor,b.bulan_nama FROM detail_realisasi_market a INNER JOIN bulan b ON a.bulan=b.nomor WHERE tahun=$hasilfilterTahun GROUP BY b.nomor")->result_array();
        echo json_encode($data);
    }
    public function Marketbank(){
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

        $data =$this->db->query("SELECT bank,bulan,SUM(penyaluran) AS penyaluran,SUM(penjaminan) AS penjaminan FROM detail_realisasi_market WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank='BRI' GROUP BY bank UNION ALL SELECT bank,bulan,SUM(penyaluran) AS penyaluran,SUM(penjaminan) AS penjaminan FROM detail_realisasi_market WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank='BNI' GROUP BY bank UNION ALL SELECT bank,bulan,SUM(penyaluran) AS penyaluran,SUM(penjaminan) AS penjaminan FROM detail_realisasi_market WHERE tahun=$hasilfilterTahun AND bulan IN($hasilfilterBulan) AND wilayah_kerja IN($hasilfilterWilayah) AND bank='Mandiri' GROUP BY bank")->result_array();
        echo json_encode($data);
    }

    public function Allbank(){
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
        $data =$this->db->query("SELECT main1.*, main2.*, main3.*,a.bulan_singkat FROM bulan a INNER JOIN (SELECT b.bulan,b.bank as bank1,SUM(b.penyaluran) AS penyaluran_bri,SUM(b.penjaminan) AS penjaminan_bri FROM detail_realisasi_market b INNER JOIN bulan a ON a.nomor=b.bulan WHERE b.tahun=$hasilfilterTahun AND b.wilayah_kerja IN($hasilfilterWilayah) AND b.bank='BRI' GROUP BY b.bank,a.nomor) main1 ON a.nomor=main1.bulan LEFT JOIN (SELECT b.bulan,b.bank as bank2,SUM(b.penyaluran) AS penyaluran_bni,SUM(b.penjaminan) AS penjaminan_bni FROM detail_realisasi_market b INNER JOIN bulan a ON a.nomor=b.bulan WHERE b.tahun=$hasilfilterTahun AND b.wilayah_kerja IN($hasilfilterWilayah) AND b.bank='BNI' GROUP BY b.bank,a.nomor) main2 ON a.nomor=main2.bulan LEFT JOIN (SELECT b.bulan,b.bank as bank3,SUM(b.penyaluran) AS penyaluran_mandiri,SUM(b.penjaminan) AS penjaminan_mandiri FROM detail_realisasi_market b INNER JOIN bulan a ON a.nomor=b.bulan WHERE b.tahun=$hasilfilterTahun AND b.wilayah_kerja IN($hasilfilterWilayah) AND b.bank='Mandiri' GROUP BY b.bank,a.nomor) main3 ON a.nomor=main3.bulan GROUP BY a.nomor")->result_array();
        echo json_encode($data);
    }
    public function Marketbri(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

        $data =$this->db->query("SELECT b.wilayah_kerja,b.tahun,b.bulan,a.nomor,a.bulan_singkat, SUM(b.penyaluran) AS penyaluran,SUM(b.penjaminan) AS penjaminan FROM detail_realisasi_market b INNER JOIN bulan a ON b.bulan=a.nomor WHERE b.tahun=$hasilfilterTahun AND wilayah_kerja IN('Bandung','Cirebon','Purwakarta','Sukabumi','Tasikmalaya') AND bank='BRI' GROUP BY b.wilayah_kerja,a.nomor")->result_array();
        echo json_encode($data);
    }

    public function Marketbni(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

         $data =$this->db->query("SELECT b.wilayah_kerja,b.tahun,b.bulan,a.nomor,a.bulan_singkat, SUM(b.penyaluran) AS penyaluran,SUM(b.penjaminan) AS penjaminan FROM detail_realisasi_market b INNER JOIN bulan a ON b.bulan=a.nomor WHERE b.tahun=$hasilfilterTahun AND wilayah_kerja IN('Bandung','Cirebon','Purwakarta','Sukabumi','Tasikmalaya') AND bank='BNI' GROUP BY b.wilayah_kerja,a.nomor")->result_array();
        echo json_encode($data);
    }

    public function Marketmandiri(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $c .="'".$filterTahun[$i]."',";
                }
        $hasilfilterTahun=substr($c, 0, -1);

         $data =$this->db->query("SELECT b.wilayah_kerja,b.tahun,b.bulan,a.nomor,a.bulan_singkat, SUM(b.penyaluran) AS penyaluran,SUM(b.penjaminan) AS penjaminan FROM detail_realisasi_market b INNER JOIN bulan a ON b.bulan=a.nomor WHERE b.tahun=$hasilfilterTahun AND wilayah_kerja IN('Bandung','Cirebon','Purwakarta','Sukabumi','Tasikmalaya') AND bank='Mandiri' GROUP BY b.wilayah_kerja,a.nomor")->result_array();
        echo json_encode($data);
    }
    }