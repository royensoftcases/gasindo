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
  $totalrku=($_GET['totalrku']*1000000);
  $tot_now_pencapaian=($_GET['tot_now_pencapaian']*1000000);
  $tot_before_pencapaian=($_GET['tot_before_pencapaian']*1000000);

  $titleBulan=$_GET['filterBulan'];
  $titleWilayah=$_GET['filterWilayah'];
  $titleProduk=$_GET['filterPerProduk'];
  $titleMitra=$_GET['filterMitra'];
  $filterBulan = explode (",",$_GET['filterBulan']);
  $filterWilayah = explode (",",$_GET['filterWilayah']);
  $filterPerProduk = explode (",",$_GET['filterPerProduk']);
  $filterMitra = explode (",",$_GET['filterMitra']);
  $filterJenisProduk = explode (",",$_GET['filterJenisProduk']);
 ?>
  <section class="browse-job">
      <div class="container" style="padding-bottom: 20px;">
                  <h4 style="text-align: center;"><b>BEBAN KLAIM</b></h4>         
                </div>
                 <div class="container" style="padding-bottom: 20px;width:100%;">  
                  <table class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%;border:1px;font-size: 12px;">
                    <thead>
                      <tr>
                        <th>TOTAL RKU <?php echo $gettahunNow; ?></th>
                        <th>REALISASI <?php echo $gettahunNow; ?></th>
                        <th>REALISASI <?php echo $gettahunBefore; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo number_format($totalrku,0,".","."); ?></td>
                        <td><?php echo number_format($tot_now_pencapaian,0,".","."); ?></td>
                        <td><?php echo number_format($tot_before_pencapaian,0,".","."); ?></td>
                      </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
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
                        <td><b>Per Produk : </b><?php echo $titleProduk; ?></td>
                      </tr>
                       <tr>
                        <td><b>Mitra : </b><?php echo $titleMitra; ?></td>
                      </tr>
                    </tbody>
                   <tfoot>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </tfoot>
                  </table>
                </div>

<div class="container" style="text-align: center;padding-top: 3%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_pencapaian_wilayah" style="height: 390px;width: 45em;"></div>
                      </figure></td>
                       <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_pencapaian_jenis_produk" style="height: 390px;width: 40em;"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_pencapaian_total" style="height:390px;width: 25em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
<div class="container" style="text-align: center;padding-top: 23%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td><figure class="highcharts-figure">
                      <div id="chart_pencapaian_produk" style="height: 390px;width: 110em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>

<div class="container" style="text-align: center;padding-top: 4%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_pencapaian_mitra" style="height: 390px;width: 110em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
<div class="container" style="text-align: center;padding-top: 23%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_growth_wilayah" style="height: 390px;width: 40em;"></div>
                      </figure></td>
                        <td><figure class="highcharts-figure">
                      <div id="chart_growth_produk" style="height:390px;width: 70em;padding-left: 5em"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
<div class="container" style="text-align: center;padding-top: 4%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_growth_permitra" style="height: 390px;width: 85em;"></div>
                      </figure></td>
                        <td><figure class="highcharts-figure">
                      <div id="chart_growth_total" style="height:390px;width: 25em;"></div>
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

var pokok_kredit_now;
var pokok_kredit_before;
var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

var targetWilayah=[];
var realisasiwilayah=[];
var realisasiBeforewilayah=[];
var categoriesWilayah=[];
var dataPersenWilayah=[];
var categoriesGrotwhWilayah=[];
var dataPersenGrowthWilayah=[];

var realisasiJenisProduk=[];
var targetJenisProduk=[];
var categoriesJenisProduk=[];
var dataPersenJenisProduk=[];

var realisasiProduk=[];
var categoriesProduk=[];

var realisasiperProduk=[];
var categoriesperProduk=[];

var pencapaian_total;
var tot_now_pencapaian = 0;
var tot_before_pencapaian = 0;
var tot_volume_pencapaian = 0;


var growthrealisasiProduk=[];
var growthrealisasiProdukBefore=[];
var categoriesGrowthProduk=[];
var dataPersenGrowthProduk=[];

var growth_total;

var growthrealisasiMitra=[];
var growthrealisasiMitraBefore=[];
var categoriesGrowthMitra=[];
var dataPersenGrowthMitra=[];

var filterBulan=[];
var filterWilayah=[];
var filterPerProduk=[];
var filterMitra=[];

Array.prototype.clear = function() {
    this.splice(0, this.length);
};
function cekFilter() {
filterBulan=<?php echo json_encode($filterBulan); ?>;
filterWilayah=<?php echo json_encode($filterWilayah); ?>;               
filterPerProduk=<?php echo json_encode($filterPerProduk); ?>;
filterMitra=<?php echo json_encode($filterMitra); ?>;
filterJenisProduk=<?php echo json_encode($filterJenisProduk); ?>;

   $.post("index.php/Beban/filterWilayahPencapaian", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterMitra :filterMitra
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiwilayah.push(getNum(parseInt(data[i]['jumlah_beban_now'])),);
        realisasiBeforewilayah.push(getNum(parseInt(data[i]['jumlah_beban_before'])),);
        targetWilayah.push(getNum(parseInt(data[i]['target'])),);
        dataPersenWilayah.push(getNum(((parseInt(data[i]['jumlah_beban_now']) / parseInt(data[i]['target']))*(100))).toFixed(0),);
        tot_now_pencapaian+=(getNum(parseInt(data[i]['jumlah_beban_now'])));
        tot_before_pencapaian+=(getNum(parseInt(data[i]['jumlah_beban_before'])));
        tot_volume_pencapaian+=(getNum(parseInt(data[i]['target'])));

        categoriesWilayah.push('<span style="text-transform: uppercase;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['jumlah_beban_now']) / parseInt(data[i]['target']))*(100)).toFixed(0))+'%</span>',);

        categoriesGrotwhWilayah.push('<span style="text-transform: uppercase;;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['jumlah_beban_now']) - parseInt(data[i]['jumlah_beban_before']))/ parseInt(data[i]['jumlah_beban_before'])*(100))).toFixed(0)+'%</span>',);
      }
      pencapaian_total=getNum(parseInt(tot_now_pencapaian)/parseInt(tot_volume_pencapaian))*(100);
      growth_total=getNum((parseInt(tot_now_pencapaian)-parseInt(tot_before_pencapaian))/(parseInt(tot_before_pencapaian)))*(100);
        chartPencapaianWilayah();
        chartGrowthWilayah();
        chartPencapaianTotal();
        chartGrowthTotal();
      }

    );

  $.post("index.php/Beban/filterJenisProdukPencapaian", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterMitra :filterMitra,
        filterJenisProduk: filterJenisProduk
    },
            function (data, status) {
         var data = JSON.parse(data);
         var jenis;
        for (var i = 0; i < data.length; i++) {
        if(data[i]['jenis_produk']=='NONKURPEN'){
          jenis='NON KUR PEN';
        }else{
          jenis=data[i]['jenis_produk'];
        }
        realisasiJenisProduk.push(getNum(parseInt(data[i]['jumlah_beban_now'])),);
        targetJenisProduk.push(getNum(parseInt(data[i]['target'])),);
        dataPersenJenisProduk.push(getNum(((parseInt(data[i]['jumlah_beban_now']) / parseInt(data[i]['target'])))*(100)).toFixed(0),);
        categoriesJenisProduk.push('<span style="text-transform: uppercase;">'+jenis+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['jumlah_beban_now']) / parseInt(data[i]['target']))*(100)).toFixed(0))+'%</span>',);
      }
      chartPencapaianJenisProduk();
      }
    );

  $.post("index.php/Beban/filterProdukPencapaian", {
     filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterMitra :filterMitra
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        realisasiProduk.push(getNum(parseInt(data[i]['jumlah_beban'])),);
        categoriesProduk.push('<span style="text-transform: uppercase;">'+data[i]['produk'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban'])))+'</span>'+'</span>',);
      }
              chartPencapaianProduk();
            }
    );

  $.post("index.php/Beban/filterMitraPencapaian", {
      filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterMitra :filterMitra
    },
            function (data, status) {
            var data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        realisasiperProduk.push(getNum(parseInt(data[i]['jumlah_beban'])),);
        categoriesperProduk.push('<span style="text-transform: uppercase;">'+data[i]['penerima_jaminan'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban'])))+'</span>'+'</span>',);
      }
      chartPencapaianMitra();
            }
    );

  $.post("index.php/Beban/filterGrowthProduk", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterMitra :filterMitra
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        growthrealisasiProduk.push(getNum(parseInt(data[i]['jumlah_beban_now'])),);
        growthrealisasiProdukBefore.push(getNum(parseInt(data[i]['jumlah_beban_before'])),);
        dataPersenGrowthProduk.push(getNum(((parseInt(data[i]['jumlah_beban_now']) / parseInt(data[i]['jumlah_beban_before'])))*(100)).toFixed(0),);
        categoriesGrowthProduk.push('<span style="text-transform: uppercase;">'+data[i]['produk_judul'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['jumlah_beban_now']) - parseInt(data[i]['jumlah_beban_before']))/parseInt(data[i]['jumlah_beban_before'])*(100))).toFixed(0)+'%</span>',);
        }
              chartGrowthProduk();
            }
    );

  $.post("index.php/Beban/filterGrowthMitra", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterMitra :filterMitra
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        growthrealisasiMitra.push(getNum(parseInt(data[i]['jumlah_beban_now'])),);
        growthrealisasiMitraBefore.push(getNum(parseInt(data[i]['jumlah_beban_before'])),);
        dataPersenGrowthMitra.push(getNum(((parseInt(data[i]['jumlah_beban_now']) - parseInt(data[i]['jumlah_beban_before']))/ parseInt(data[i]['jumlah_beban_before']))*(100)).toFixed(0),);
        categoriesGrowthMitra.push('<span style="text-transform: uppercase;">'+data[i]['mitra'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['jumlah_beban_now']) - parseInt(data[i]['jumlah_beban_before']))/parseInt(data[i]['jumlah_beban_before'])*(100))).toFixed(0)+'%</span>',);
        }
              chartGrowthMitra();
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
    text: 'Pencapaian Per Wilayah Kerja '+gettahunNow,
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
    name: 'Target',
    data: targetWilayah,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiwilayah,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: dataPersenWilayah,
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianJenisProduk(){
     Highcharts.chart('chart_pencapaian_jenis_produk', {
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
    text: 'Pencapaian Per Jenis Produk '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesJenisProduk,
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
    name: 'Target',
   data: targetJenisProduk,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
   data: realisasiJenisProduk,
     color: '#FF9516',

  },{
    name: '% Pencapaian',
     data: dataPersenJenisProduk,
     color: '#41A317',
  }]
});
 }


function chartPencapaianProduk(){
     Highcharts.chart('chart_pencapaian_produk', {
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
    text: 'Beban Klaim Per Produk '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesProduk,
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
    name: 'Realisasi '+gettahunNow,
   data: realisasiProduk,
     color: '#FF9516',

  }],

});
 }

  function chartPencapaianTotal(){
     Highcharts.chart('chart_pencapaian_total', {
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
    text: 'Pencapaian '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span" style="font-size:14px;">Pencapaian </span><br><span style="color: #FF9516;font-size:29px;">'+pencapaian_total.toFixed(0)+'%</span>'],
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
      pointPadding: 0.45,
      borderWidth: 0
    }
  },
  series: [{
        name: '% Pencapaian',
        data: [pencapaian_total],
        color: '#FF9516',

    }]
    });
 }


function chartPencapaianMitra(){
   Highcharts.chart('chart_pencapaian_mitra', {
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
    text: 'Beban Klaim Per Mitra '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesperProduk,
    crosshair: true,
  },
  yAxis: {
    min: 10,
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
    name: 'Realisasi '+gettahunNow,
   data: realisasiperProduk,
    color: '#FF9516',
  }]
});
}



function chartGrowthWilayah(){
    Highcharts.chart('chart_growth_wilayah', {
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
    text: 'Growth Per Wilayah Kerja '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesGrotwhWilayah,
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
    name: 'Realisasi '+gettahunBefore,
    data: realisasiBeforewilayah,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiwilayah,
    color: '#FF9516',
  },{
    name: '% Growth',
     data: dataPersenGrowthWilayah,
     color: '#41A317',
  }
  ]
});
}


function chartGrowthProduk(){
     Highcharts.chart('chart_growth_produk', {
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
    text: 'Growth Per Produk '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: categoriesGrowthProduk,
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
    name: 'Realisasi '+gettahunBefore,
   data: growthrealisasiProdukBefore,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
   data: growthrealisasiProduk,
     color: '#FF9516',

  },{
    name: '% Growth',
     data: dataPersenGrowthProduk,
     color: '#41A317',
  }]
});
 }


function chartGrowthTotal(){
   Highcharts.chart('chart_growth_total', {
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
        text: 'Yoy '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:14px;">Yoy</span><br><span style="color: rgb(124, 181, 236);font-size:29px;">'+growth_total.toFixed(0)+'%</span>'],
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
      pointPadding: 0.45,
      borderWidth: 0
    }
  },
  series: [{
        name: '% Yoy',
        data: [growth_total],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

function chartGrowthMitra(){
   Highcharts.chart('chart_growth_permitra', {
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
    text: 'Growth Per Mitra '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesGrowthMitra,
    crosshair: true,
  },
  yAxis: {
    min: 10,
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
    name: 'Realisasi '+gettahunBefore,
    data: growthrealisasiMitraBefore,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
   data: growthrealisasiMitra,
    color: '#FF9516',
  },{
    name: '% Growth',
     data: dataPersenGrowthMitra,
     color: '#41A317',
  }]
});
}

</script>