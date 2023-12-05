<!DOCTYPE html>
<?php
if(empty($_SESSION['username'])){
  header("location:index.php/login");
}
$username=$_SESSION['username'];
$rule=$_SESSION['rule'];
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HARITA GROUP">
    <title>Simaung Jamkrindo</title>

    <link rel="icon" href="<?php echo base_url()?>assets/img/icon.png">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendors/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendors/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/cssf38d.css?family=Lato:300,400,700,900|Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendors/slick.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendors/slick-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendors/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fixedColumns.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.custom.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.css">

    
  <style type="text/css">
      p.firstltr::first-letter {
    font-size: 150%;
    color: #d4af37;
    padding-left: 3px;
    padding-right: 2px;
    font-family: Georgia;
}
  #loader-wrapper .loader-section {
    position: fixed;
    top: 0;
    width: 100%;
    height: 100%;
    background: url('<?php echo base_url();?>/assets/images/load-indicator.gif') 50% 50% no-repeat rgb(249,249,249);
    z-index: 1000;
}
   th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
        left: : 0 auto;
    }
    .DTFC_RightBodyLiner {
  overflow: hidden!important;
}

  .DTFC_LeftBodyLiner{
  overflow: hidden!important;
}
.DTFC_RightBodyLiner {
overflow-x: hidden;
}
 .DTFC_LeftBodyLiner{overflow-y:unset !important}
 .DTFC_RightBodyLiner{overflow-y:unset !important}

 .block {
    display: block;
    width: 100%;
    border: none;
    padding: 4px 6px;
    font-size: 13px;
    cursor: pointer;
    text-align: left;
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
@media screen and (max-width: 999px) {
    img {
        height: 1.7em;
    }
    .logosedang {
 padding-top: 10%;
}
.logokeluar {
  height: 1.5em;
  padding-right: 4%;
}
.logokiri {
  padding-right: 2%;
  padding-top: 1.5%;
}
.logopadding {
  padding-left: 1%;
  padding-top: 1.6%;
}
.logobumn {
  padding-left: 4%;
  padding-top: 1.3%;
}
}
@media screen and (min-width: 1000px) {
   /* img {
        height: 5em;
    }*/
    .logobesar {
  height: 5em;
}
.logosedang {
  height: 4.5em;
}
.logokecil {
  height: 4em;
}
.logoxkecil {
  height: 4em;
  padding-left: 1%;
}
.logokeluar {
  padding-right: 3%;
}
.logobumn {
  padding-left: 3%;
}
.logokiri {
  padding-right: 2%;
}
}

    </style>
  </head>
  <body class="inner-page">
    <header class="navbar-fixed-top" data-spy="affix" data-offset-top="60">
      <!-- MAIN NAVIGATION STARTS -->
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>  
    <!-- <a href="?page=template"><img style="width: 9em;" src="<?php echo base_url()?>assets/images/logobumnterbaru.png" alt="JAMKRINDO"></a><a href="?page=template"><img style="width: 15em;" src="<?php echo base_url()?>assets/img/logo.png" alt="SIMAUNG"></a> -->

   <!--  <a href="?page=template"><img class="logosedang" src="<?php echo base_url()?>assets/images/logobumnterbaru.png" alt="JAMKRINDO"></a><a href="?page=template"><img class="logobesar" src="<?php echo base_url()?>assets/img/logo.png" alt="SIMAUNG"></a> -->
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav text-center">
            <li class="sign-in pull-left logobumn">
                <a href="?page=template"><img class="logosedang" src="<?php echo base_url()?>assets/images/logobumnterbaru.png" alt="SIMAUNG"></a>
              </li>
    <li class="sign-in pull-left logopadding">
               <a href="?page=template"><img class="logobesar" src="<?php echo base_url()?>assets/img/logo.png" alt="SIMAUNG"></a>
              </li>
             <?php if($rule=="1"){?>
               <li <?php if($header=="master"){echo ' class=" dropdown active"';}?>>
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">MASTER <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a <?php if($sub_menu=="master_user"){echo ' style="color: #001EB7;"';}?> href="?page=master_user">LIST USER</a></li>
                  <li class="dropdown-submenu">
                  <a <?php if($sub_menu=="upload_realisasi_volume"){echo ' style="color: #001EB7;"';}?> class="dropdown-menu-submenu" href="#">UPLOAD EXCEL PENJAMINAN<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a <?php if($sub_menu_sub=="real_volume"){echo ' style="color: #001EB7;"';}?> href="?page=upload_realisasi_volume">Realiasi Volume</a></li>
                    <li><a <?php if($sub_menu_sub=="target_volume"){echo ' style="color: #001EB7;"';}?> href="?page=upload_target_volume">Target Volume</a></li>
                    <li><a <?php if($sub_menu_sub=="target_ijp"){echo ' style="color: #001EB7;"';}?> href="?page=upload_target_ijp">Target IJP</a></li>
                    <li><a <?php if($sub_menu_sub=="real_market"){echo ' style="color: #001EB7;"';}?> href="?page=upload_realisasi_market">Realiasi Market Share</a></li>
                    <li><a <?php if($sub_menu_sub=="upload_eksposure"){echo ' style="color: #001EB7;"';}?> href="?page=upload_eksposure">Eksposure</a></li>
                  </ul>
                </li>
                <li class="dropdown-submenu">
                  <a <?php if($sub_menu=="upload_beban"){echo ' style="color: #001EB7;"';}?> class="dropdown-menu-submenu" href="#">UPLOAD EXCEL KLAIM<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a <?php if($sub_menu_sub=="upload_beban"){echo ' style="color: #001EB7;"';}?> href="?page=upload_beban">Realiasi Beban Klaim</a></li>
                    <li><a <?php if($sub_menu_sub=="target_beban"){echo ' style="color: #001EB7;"';}?> href="?page=upload_target_beban">Target Beban Klaim</a></li>
                    <li><a <?php if($sub_menu_sub=="rincian_kdp"){echo ' style="color: #001EB7;"';}?> href="?page=upload_rincian_kdp">Upload Excel KDP</a></li>
                  </ul>
                </li>

                  <li class="dropdown-submenu">
                  <a <?php if($sub_menu=="upload_subrogasi"){echo ' style="color: #001EB7;"';}?> class="dropdown-menu-submenu" href="#">UPLOAD EXCEL SUBROGASI<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a <?php if($sub_menu_sub=="real_subrogasi"){echo ' style="color: #001EB7;"';}?> href="?page=upload_subrogasi">Pendapatan Subrogasi</a></li>
                    <li><a <?php if($sub_menu_sub=="target_subrogasi"){echo ' style="color: #001EB7;"';}?> href="?page=upload_target_subrogasi">Target Subrogasi</a></li>
                     <li><a <?php if($sub_menu_sub=="piutang_subrogasi"){echo ' style="color: #001EB7;"';}?> href="?page=upload_piutang_subrogasi">Piutang Subrogasi</a></li>
                  </ul>
                </li>

                <li class="dropdown-submenu">
                  <a <?php if($sub_menu=="upload_laba_rugi"){echo ' style="color: #001EB7;"';}?> class="dropdown-menu-submenu" href="#">UPLOAD EXCEL LABA/RUGI<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a <?php if($sub_menu_sub=="real_laba_rugi"){echo ' style="color: #001EB7;"';}?> href="?page=upload_laba_rugi">Realisasi Laba-Rugi</a></li>
                    <li><a <?php if($sub_menu_sub=="target_laba_rugi"){echo ' style="color: #001EB7;"';}?> href="?page=upload_target_laba_rugi">Target Laba-Rugi</a></li>
                    <li><a <?php if($sub_menu_sub=="upload_deposito"){echo ' style="color: #001EB7;"';}?> href="?page=upload_deposito">Upload Deposito</a></li>
                  </ul>
                </li>

                <li class="dropdown-submenu">
                  <a <?php if($sub_menu=="menu_operation"){echo ' style="color: #001EB7;"';}?> class="dropdown-menu-submenu" href="#">DATA EXCEL OPERATION<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a <?php if($sub_menu_sub=="data_cash_flow"){echo ' style="color: #001EB7;"';}?> href="?page=data_cash_flow">Cash Flow</a></li>
                    <li><a <?php if($sub_menu_sub=="data_belanja"){echo ' style="color: #001EB7;"';}?> href="?page=data_belanja">Belanja Modal</a></li>
                    <li><a <?php if($sub_menu_sub=="data_sdm"){echo ' style="color: #001EB7;"';}?> href="?page=data_sdm">SDM</a></li>
                  </ul>
                </li>
                </ul>
              </li>
             <?php }?>
             

              <li<?php if($content=="home/home"){echo ' class="active"';}?>><a href="?page=template">HOME</a></li>
              <li <?php if($header=="volume/volume"){echo ' class=" dropdown active"';}?>>
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">PENJAMINAN <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a <?php if($sub_menu=="volume"){echo ' style="color: #001EB7;"';}?> href="?page=volume">VOLUME</a></li>
                  <li><a <?php if($sub_menu=="ijp"){echo ' style="color: #001EB7;"';}?> href="?page=ijp">IJP</a></li>
                  <li><a <?php if($sub_menu=="market"){echo ' style="color: #001EB7;"';}?> href="?page=market">MARKET SHARE</a></li>
                  <li><a <?php if($sub_menu=="eksposure"){echo ' style="color: #001EB7;"';}?> href="?page=eksposure">EKSPOSURE</a></li>
        
              </ul>
              </li>
              <li <?php if($header=="beban/beban_klaim"){echo ' class=" dropdown active"';}?>>
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">KLAIM <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a <?php if($sub_menu=="beban"){echo ' style="color: #001EB7;"';}?>href="?page=beban_klaim">BEBAN KLAIM</a></li>
                  <li><a <?php if($sub_menu=="kdp"){echo ' style="color: #001EB7;"';}?>href="?page=kdp">KDP</a></li>
                  <li><a <?php if($sub_menu=="monitoring_klaim"){echo ' style="color: #001EB7;"';}?>href="?page=monitoring_klaim">MONITORING KLAIM</a></li>
                  <li><a <?php if($sub_menu=="monitoring_kdp"){echo ' style="color: #001EB7;"';}?>href="?page=monitoring_kdp">MONITORING KDP</a></li>
                  <li><a <?php if($sub_menu=="rasio_klaim"){echo ' style="color: #001EB7;"';}?>href="?page=rasio_klaim">RASIO KLAIM</a></li>
              </ul>
              </li>
              <li <?php if($header=="subrogasi/subrogasi"){echo ' class=" dropdown active"';}?>>
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">SUBROGASI <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a <?php if($sub_menu=="pendapatan"){echo ' style="color: #001EB7;"';}?>href="?page=pendapatan_subrogasi">PENDAPATAN SUBROGASI</a></li>
                  <li><a <?php if($sub_menu=="piutang"){echo ' style="color: #001EB7;"';}?>href="?page=piutang_subrogasi">PIUTANG SUBROGASI</a></li>
                  <li><a <?php if($sub_menu=="recovery"){echo ' style="color: #001EB7;"';}?>href="?page=recovery_subrogasi">RECOVERY RATE SUBROGASI</a></li>
              </ul>
              </li>

              <li <?php if($header=="laba_rugi/laba_rugi"){echo ' class=" dropdown active"';}?>>
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">LABA/RUGI <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a <?php if($sub_menu=="laba_rugi"){echo ' style="color: #001EB7;"';}?>href="?page=laba_rugi">LABA/RUGI</a></li>
                  <li><a <?php if($sub_menu=="monitoring_depo"){echo ' style="color: #001EB7;"';}?>href="?page=monitoring_depo">MONITORING DEPOSITO</a></li>
                   <li><a <?php if($sub_menu=="operation_1"){echo ' style="color: #001EB7;"';}?>href="?page=operation_1">OPERATION</a></li>
              </ul>
              </li>
              <li class="sign-in pull-right logokeluar">
               <a href="index.php/Login/keluar">
                  <small class="hidden-sm">User</small>
                  <span class="hidden-sm">Sign Out</span> 
                  <i class="fa fa-sign-out"></i></a>
              </li>
              <li class="sign-in pull-right logokiri">
                <a href="?page=template"><img class="logoxkecil" src="<?php echo base_url()?>assets/images/jamkrindo_logo.png" alt="SIMAUNG"></a>
              </li>
    <li class="sign-in pull-right logokiri">
               <a href="?page=template"><img class="logokecil" src="<?php echo base_url()?>assets/images/LOGO KANWIL4 REBORN.png" alt="SIMAUNG"></a>
              </li>
            </ul>
          </div>

        </div>
      </nav>
      <!-- MAIN NAVIGATION ENDS -->
    </header>
 <?php $this->load->view($content) ?>
    <!-- FOOTER STARTS -->
   <!--  <footer>
      <div class="container">
        <div class="copyright">
          <div class="row">
            <div class="col-sm-6">
             JAMKRINDO All rights reserved.
            </div>
            <div class="col-sm-6 author-info">
              Created And Copyrights 2021.
            </div>
          </div>
        </div>
      </div>
    </footer> -->


    <!-- FOOTER ENDS -->
      <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/slick.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.countdown.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/summernote.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/custom.js"></script>
      <script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/dataTables.fixedColumns.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jszip.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>

       <script src="<?php echo base_url()?>assets/js/jquery-ui-13.2.js"></script>
    
      <div class="bsa-cpc"></div>
         <script type="text/javascript">
  $('#loader-wrapper').hide();
  $('#loader').hide();

  $(document).ready(function(){
  $('.dropdown-submenu a.dropdown-menu-submenu').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
  </body>
</html>