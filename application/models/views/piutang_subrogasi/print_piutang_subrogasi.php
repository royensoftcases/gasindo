  <style type="text/css" media="print">
    .page
    {
     -webkit-transform: rotate(-90deg); 
     -moz-transform:rotate(-90deg);
     filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
    @media print {
     @page {
        margin-left: 0.5in;
        margin-right: 0.5in;
        margin-top: 0;
        margin-bottom: 0;
        size: landscape;
      }
}
</style>
<?php
  $gettahunNow=$_SESSION['tahun_param'];
  $gettahunBefore=$_SESSION['tahun_param']-1;
  $totalrku=($_GET['totalrku']);

  $titleBulan=$_GET['filterBulan'];
  $titleWilayah=$_GET['filterWilayah'];
  $titleMitra=$_GET['filterMitra'];
  $titleProduk=$_GET['filterProduk'];
  $filterBulan = explode (",",$_GET['filterBulan']);
  $filterWilayah = explode (",",$_GET['filterWilayah']);
  $filterMitra = explode (",",$_GET['filterMitra']);
  $filterProduk = explode (",",$_GET['filterProduk']);
 ?>
  <section class="browse-job">
      <div class="container" style="padding-bottom: 20px;">
                  <h4 style="text-align: center;"><b>PIUTANG SUBROGASI</b></h4>         
                </div>
                 <div class="container" style="padding-bottom: 20px;width:100%;">  
                  <table class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%;border:1px;font-size: 12px;">
                    <thead>
                      <tr>
                        <th>TOTAL OUTSTANDING PIUTANG <?php echo $gettahunNow; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo number_format($totalrku,0,".","."); ?></td>
                      </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </tfoot>
                  </table>
                </div>
          <div class="container" style="width:100%;">  
                  <table class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%;border:1px;font-size: 11px;">
                     <thead>
                      <tr>
                        <td>FILTER</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><b>Bulan : </b><?php echo $titleBulan; ?></td>
                      </tr>
                       <tr>
                        <td><b>Wilayah : </b><?php echo $titleWilayah; ?></td>
                      </tr>
                       <tr>
                        <td><b>Mitra : </b><?php echo $titleMitra ?></td>
                      </tr>
                      <tr>
                        <td><b>Produk : </b><?php echo $titleProduk; ?></td>
                      </tr>
                    </tbody>
                   <tfoot>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </tfoot>
                  </table>
                </div>

<div class="container" style="text-align: center;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;padding-top: 4%;"><figure class="highcharts-figure">
                        <div id="chart_pencapaian_wilayah" style="height: 390px;width: 40em;padding-right: 4em;"></div>
                      </figure></td>
                       <td style="text-align: center;padding-top: 6%;"><figure class="highcharts-figure">
                        <div id="chart_produk" style="height: 390px;width: 75em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
<div class="container" style="text-align: center;padding-top: 20%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_mitra" style="height: 390px;width: 115em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
    </section>

    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>

      <script src="<?php echo base_url()?>assets/js/highstock.js"></script>
      <script src="<?php echo base_url()?>assets/js/exporting.js"></script>
      <script src="<?php echo base_url()?>assets/js/offline-exporting.js"></script>
      <script src="<?php echo base_url()?>assets/js/export-data.js"></script>
      <script src="<?php echo base_url()?>assets/js/series-label.js"></script>
      <script src="<?php echo base_url()?>assets/js/data.js"></script>


      <script type="text/javascript">
$(document).ready(function(){ 
});
 function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
function getNum(val) {
   val = +val || 0
   return val;
}

window.onload = function () {
  cekFilter();
  setTimeout(function wait(){
        window.print();
    }, 1600);
  setTimeout(window.close, 1700);
  }

var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

var realisasiwilayah=[];
var categoriesWilayah=[];

var realisasiProduk=[];
var categoriesProduk=[];

var realisasiMitra=[];
var categoriesMitra=[];

var tot_now_pencapaian = 0;

var filterBulan=[];
var filterWilayah=[];
var filterMitra=[];
var filterProduk=[];

Array.prototype.clear = function() {
    this.splice(0, this.length);
};
function cekFilter() {
filterBulan=<?php echo json_encode($filterBulan); ?>;
filterWilayah=<?php echo json_encode($filterWilayah); ?>;   
filterMitra=<?php echo json_encode($filterMitra); ?>;            
filterProduk=<?php echo json_encode($filterProduk); ?>;

  $.post("index.php/PiutangSubrogasi/WilayahPencapaian", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterMitra: filterMitra,
        filterProduk: filterProduk
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiwilayah.push(getNum(parseInt(data[i]['piutang_subro'])),);
        tot_now_pencapaian+=(getNum(parseInt(data[i]['piutang_subro'])));

        categoriesWilayah.push('<span style="text-transform: uppercase;font-size:8px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:8px;">'+formatNumber(getNum(parseInt(data[i]['piutang_subro'])))+'</span>',);
      }
        chartPencapaianWilayah();
      }
    );

 $.post("index.php/PiutangSubrogasi/ProdukPencapaian", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterMitra: filterMitra,
        filterProduk: filterProduk,
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiProduk.push(getNum(parseInt(data[i]['piutang_subro'])),);
        categoriesProduk.push('<span style="text-transform: uppercase;font-size:8px;">'+data[i]['produk'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:8px;">'+formatNumber(getNum(parseInt(data[i]['piutang_subro'])))+'</span>',);
      }
        chartProduk();
      }
    );

 $.post("index.php/PiutangSubrogasi/MitraPencapaian", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterMitra: filterMitra,
        filterProduk: filterProduk,
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        realisasiMitra.push(getNum(parseInt(data[i]['piutang_subro'])),);
        categoriesMitra.push('<span style="text-transform: uppercase;font-size:7px;">'+data[i]['mitra'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:7px;">'+formatNumber(getNum(parseInt(data[i]['piutang_subro'])))+'</span>',);
        }
              chartMitra();
            }
    );
}

function chartPencapaianWilayah(){
    Highcharts.chart('chart_pencapaian_wilayah', {
  chart: {
    type: 'column',
    style: {
            font: 'bold 8px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  credits: {
        enabled: false
    },
  title: {
    text: 'Piutang Subrogasi Per Wilayah Kerja '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesWilayah,
    crosshair: true,
  },
  yAxis: {
    min: 0,
    title: {
    text: ''
    },
    labels: {
            enabled: false
        }
  },
  tooltip: {
            formatter: function() {
                if(tooltipShow) {
                    return "";
                } else {
                    return false; // now you don't
                }
            }
        },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Total',
    data: realisasiwilayah,
    color: 'rgb(124, 181, 236)',

  }
  ]
});
}
 function chartProduk(){
     Highcharts.chart('chart_produk', {
  chart: {
    type: 'column',
    style: {
            font: 'bold 8px "Trebuchet MS", Verdana, sans-serif'
        },
  },
  credits: {
        enabled: false
    },
  title: {
    text: 'Piutang Subrogasi Per Produk '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: categoriesProduk,
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: ''
    },
    labels: {
            enabled: false
        }
  },
  tooltip: {
            formatter: function() {
                if(tooltipShow) {
                    return "";
                } else {
                    return false; // now you don't
                }
            }
        },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Total',
   data: realisasiProduk,
    color: 'rgb(124, 181, 236)',

  }]
});
 }

 function chartMitra(){
     Highcharts.chart('chart_mitra', {
  chart: {
    type: 'column',
    style: {
            font: 'bold 8px "Trebuchet MS", Verdana, sans-serif'
        },
  },
  credits: {
        enabled: false
    },
  title: {
    text: 'Piutang Subrogasi Per Mitra '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: categoriesMitra,
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: ''
    },
    labels: {
            enabled: false
        }
  },
  tooltip: {
            formatter: function() {
                if(tooltipShow) {
                    return "";
                } else {
                    return false; // now you don't
                }
            }
        },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Total',
   data: realisasiMitra,
    color: 'rgb(124, 181, 236)',

  }]
});
 }

</script>