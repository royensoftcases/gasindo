<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

     public function PencapaianVolume(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $a .="'".$filterTahun[$i]."',";
                }
        $hasilTahun=substr($a, 0, -1);

        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $b .="'".$filterBulan[$i]."',";
                }
        $hasilBulan=substr($b, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $c .="'".$filterWilayah[$i]."',";
                  $d .="SELECT '".$filterWilayah[$i]."' AS wilayah_kerja,SUM(ROUND(".$filterWilayah[$i]."/1000000,1 )) AS volume FROM target_volume WHERE tahun IN($hasilTahun) UNION ALL ";
                }
        $hasilWilayah=substr($c, 0, -1);
        $queryWilayah=substr($d, 0, -11);

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah_kerja,SUM(ROUND(pokok_kredit/1000000,1 )) AS pokok_kredit_now FROM detail_realisasi_volume WHERE tahun IN($hasilTahun) AND bulan IN($hasilBulan) AND wilayah_kerja IN($hasilWilayah) GROUP BY wilayah_kerja) main1 LEFT JOIN ($queryWilayah) main2 ON main1.wilayah_kerja = main2.wilayah_kerja ORDER BY pokok_kredit_now DESC")->result_array();
        echo json_encode($data);
    }

    public function PencapaianIjp(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $a .="'".$filterTahun[$i]."',";
                }
        $hasilTahun=substr($a, 0, -1);

        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $b .="'".$filterBulan[$i]."',";
                }
        $hasilBulan=substr($b, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $c .="'".$filterWilayah[$i]."',";
                  $d .="SELECT '".$filterWilayah[$i]."' AS wilayah_kerja,SUM(ROUND(".$filterWilayah[$i]."/1000000,1 )) AS ijp FROM target_ijp WHERE tahun IN($hasilTahun) UNION ALL ";
                }
        $hasilWilayah=substr($c, 0, -1);
        $queryWilayah=substr($d, 0, -11);

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah_kerja,SUM(ROUND(ijp/1000000,1 )) AS ijp_now FROM detail_realisasi_volume WHERE tahun IN($hasilTahun) AND bulan IN($hasilBulan) AND wilayah_kerja IN($hasilWilayah) GROUP BY wilayah_kerja) main1 LEFT JOIN ($queryWilayah) main2 ON main1.wilayah_kerja = main2.wilayah_kerja ORDER BY ijp_now DESC")->result_array();
        echo json_encode($data);
    }

     public function PencapaianBeban(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $a .="'".$filterTahun[$i]."',";
                }
        $hasilTahun=substr($a, 0, -1);

        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $b .="'".$filterBulan[$i]."',";
                }
        $hasilBulan=substr($b, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $c .="'".$filterWilayah[$i]."',";
                }
        $hasilWilayah=substr($c, 0, -1);

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah_kerja,SUM(ROUND(jumlah_beban/1000000,1 )) AS beban_now FROM detail_realisasi_beban WHERE tahun IN($hasilTahun) AND bulan IN($hasilBulan) AND wilayah_kerja IN($hasilWilayah) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(target/1000000,1 )) AS target from target_beban_klaim WHERE tahun IN($hasilTahun) AND wilayah_kerja IN($hasilWilayah) GROUP BY wilayah_kerja) main2 ON main1.wilayah_kerja = main2.wilayah_kerja ORDER BY beban_now DESC")->result_array();
        echo json_encode($data);
    }

    public function PencapaianKdp(){
      $tahun_param=$_SESSION['tahun_param'];
        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $c .="'".$filterWilayah[$i]."',";
                }
        $hasilWilayah=substr($c, 0, -1);

        $data =$this->db->query("SELECT main1.* FROM (SELECT wilayah,SUM(ROUND(lengkap/1000000,1 )) AS lengkap,SUM(ROUND(belum_lengkap/1000000,1 )) AS belum_lengkap,SUM(ROUND(lunas_batal/1000000,1 )) AS lunas_batal,SUM(ROUND(daluarsa/1000000,1 )) AS daluarsa FROM rincian_kdp WHERE tahun=$tahun_param AND bulan=(SELECT max(bulan) FROM rincian_kdp WHERE tahun=$tahun_param) AND wilayah IN($hasilWilayah) GROUP BY wilayah) main1 ORDER BY belum_lengkap DESC")->result_array();
        echo json_encode($data);
    }

    public function PencapaianSubro(){
        $filterTahun = $this->input->post('filterTahun', true);
        for ($i = 0; $i < count($filterTahun); $i++) {
                  $a .="'".$filterTahun[$i]."',";
                }
        $hasilTahun=substr($a, 0, -1);

        $filterBulan = $this->input->post('filterBulan', true);
        for ($i = 0; $i < count($filterBulan); $i++) {
                  $b .="'".$filterBulan[$i]."',";
                }
        $hasilBulan=substr($b, 0, -1);

        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $c .="'".$filterWilayah[$i]."',";
                }
        $hasilWilayah=substr($c, 0, -1);

        $data =$this->db->query("SELECT main1.*, main2.* FROM (SELECT wilayah_kerja,SUM(ROUND(jumlah_subro/1000000,1 )) AS jumlah_subro_now FROM detail_realisasi_subrogasi WHERE tahun IN($hasilTahun) AND bulan IN($hasilBulan) AND wilayah_kerja IN($hasilWilayah) GROUP BY wilayah_kerja) main1 LEFT JOIN (SELECT wilayah_kerja,SUM(ROUND(target/1000000,1 )) AS target from target_subrogasi where tahun IN($hasilTahun) AND wilayah_kerja IN($hasilWilayah) GROUP BY wilayah_kerja) main2 ON main1.wilayah_kerja = main2.wilayah_kerja ORDER BY jumlah_subro_now DESC")->result_array();
        echo json_encode($data);
    }

    public function PencapaianPiutang(){
      $tahun_param=$_SESSION['tahun_param'];
        $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $c .="'".$filterWilayah[$i]."',";
                }
        $hasilWilayah=strtoupper(substr($c, 0, -1));

        $data =$this->db->query("SELECT wilayah_kerja,SUM(ROUND(piutang_subro/1000000,1 )) AS piutang_subro FROM detail_realisasi_piutang WHERE tahun=$tahun_param AND bulan=(SELECT max(bulan) FROM detail_realisasi_piutang WHERE tahun=$tahun_param) AND wilayah_kerja IN($hasilWilayah) GROUP BY wilayah_kerja ORDER BY piutang_subro DESC")->result_array();
        echo json_encode($data);
    }

    public function PencapaianLaba(){
      $tahun_param=$_SESSION['tahun_param'];
      $filterWilayah = $this->input->post('filterWilayah', true);
        for ($i = 0; $i < count($filterWilayah); $i++) {
                  $c .="'".$filterWilayah[$i]."',";
                }
        $hasilWilayah=strtoupper(substr($c, 0, -1));

        $data = $this->db->query("SELECT main1.*,main2.* FROM (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS realisasi_now FROM detail_realisasi_laba_rugi WHERE tahun=$tahun_param AND bulan=(SELECT max(bulan) FROM detail_realisasi_laba_rugi WHERE tahun=$tahun_param) AND keterangan='EBT' AND unit_kerja IN($hasilWilayah,'Kanwil IV') GROUP BY unit_kerja) main1 LEFT JOIN (SELECT unit_kerja,SUM(ROUND(realisasi/1000000,1 )) AS target FROM target_laba_rugi WHERE tahun=$tahun_param AND keterangan='EBT' AND unit_kerja IN($hasilWilayah,'Kanwil IV') GROUP BY unit_kerja) main2 ON main1.unit_kerja = main2.unit_kerja ORDER BY realisasi_now DESC")->result_array();
        echo json_encode($data);
    }

    }
