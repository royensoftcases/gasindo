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
  $totalrku=$_GET['totalrku']*1000000;
  $pencapaian_total=($_GET['pencapaian_total']*1000000);
  $pencapaian_total_before=($_GET['pencapaian_total_before']*1000000);

  $titleBulan=$_GET['filterBulan'];
  $titleWilayah=$_GET['filterWilayah'];
  $titleTahun=$_GET['filterTahun'];
  $filterBulan = explode (",",$_GET['filterBulan']);
  $filterWilayah = explode (",",$_GET['filterWilayah']);
  $filterTahun = explode (",",$_GET['filterTahun']);
 ?>
  <section class="browse-job">
          <div class="container" style="padding-bottom: 20px;width:100%;">
                  <h4 style="text-align: center;"><b>LABA RUGI</b></h4>         
                </div>
                  <div class="container" style="padding-bottom: 20px;width:100%;">  
                  <table class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%;border:1px;font-size: 12px;">
                    <thead>
                      <tr>
                        <th>TOTAL RKU</th>
                        <th>REALISASI <?php echo $gettahunNow; ?></th>
                        <th>REALISASI <?php echo $gettahunBefore; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo number_format($totalrku,0,".","."); ?></td>
                        <td><?php echo number_format($pencapaian_total,0,".","."); ?></td>
                        <td><?php echo number_format($pencapaian_total_before,0,".","."); ?></td>
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
                        <td><b>BULAN :</b> <?php echo $titleBulan; ?></td>
                      </tr>
                      <tr>
                        <td><b>WILAYAH KERJA :</b> <?php echo $titleWilayah; ?></td>
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
                        <div id="chart_pencapaian_wilayah" style="height: 300px;width: 90em;padding-right: 5em"></div>
                      </figure></td>
                       <td><figure class="highcharts-figure">
                       <div id="chart_pencapaian_sekanwil" style="height: 300px;width: 25em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>

<div class="container" style="text-align: center;padding-top: 3%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td><figure class="highcharts-figure">
                      <div id="chart_growth_wilayah" style="height:300px;width: 90em;padding-right: 5em"></div>
                      </figure></td>
                        <td><figure class="highcharts-figure">
                      <div id="chart_growth_sekanwil" style="height:300px;width: 25em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>

  <div class="container" style="text-align: center;padding-top: 12%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_beban_pemasaran" style="height: 300px;width: 40em;"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_beban_sosialisasi" style="height:300px;width: 40em;"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_beban_perjalanan" style="height:300px;width: 40em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
  <div class="container" style="text-align: center;padding-top: 3%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_beban_promosi" style="height: 300px;width: 40em;"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_beban_rapat" style="height:300px;width: 40em;"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_beban_umum" style="height:300px;width: 40em;"></div>
                      </figure></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
    <div class="container" style="text-align: center;padding-top: 3%;width: 100%">
  <table style="width:100%;border:0px;">
                    <tbody>
                      <tr>
                        <td style="text-align: center;"><figure class="highcharts-figure">
                        <div id="chart_beban_representasi" style="height: 300px;width: 40em;"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_ebt" style="height:300px;width: 40em;"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_kosong" style="height:300px;width: 40em;"></div>
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

var targetWilayah=[];
var realisasiwilayah=[];
var realisasiBeforewilayah=[];
var categoriesWilayah=[];
var dataPersenWilayah=[];
var categoriesGrotwhWilayah=[];
var dataPersenGrowthWilayah=[];
var categoriesUnitKerja=[];

var pencapaian_target=0;
var pencapaian_total=0;
var pencapaian_total_before=0;
var tot_before_pencapaian = 0;
var tot_volume_pencapaian = 0;

var growthSekanwil=0;
var pencapaianSekanwil=0;

var realisasiPasar=[];
var targetPasar=[];
var categoriesPasar=[];

var realisasiSosialisasi=[];
var targetSosialisasi=[];
var categoriesSosialisasi=[];

var realisasiPerjalanan=[];
var targetPerjalanan=[];
var categoriesPerjalanan=[];

var realisasiPromosi=[];
var targetPromosi=[];
var categoriesPromosi=[];

var realisasiRapat=[];
var targetRapat=[];
var categoriesRapat=[];

var realisasiUmum=[];
var targetUmum=[];
var categoriesUmum=[];

var realisasiRepresentasi=[];
var targetRepresentasi=[];
var categoriesRepresentasi=[];


var filterTahun=[];
var filterBulan=[];
var filterWilayah=[];

Array.prototype.clear = function() {
    this.splice(0, this.length);
};

  function cekFilter(){
filterBulan=<?php echo json_encode($filterBulan); ?>;               
filterWilayah=<?php echo json_encode($filterWilayah); ?>;
filterTahun=<?php echo json_encode($filterTahun); ?>;


$.post("index.php/LabaRugi/PencapianWilayah", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        realisasiwilayah.push(getNum(parseInt(data[i]['realisasi_now'])),);
        realisasiBeforewilayah.push(getNum(parseInt(data[i]['realisasi_before'])),);
        targetWilayah.push(getNum(parseInt(data[i]['target'])),);

        dataPersenWilayah.push(getNum((parseInt(data[i]['realisasi_now'])/parseInt(data[i]['target']))*(100).toFixed(0)),);
        dataPersenGrowthWilayah.push(getNum(((parseInt(data[i]['realisasi_now'])-parseInt(data[i]['realisasi_before'])))/(parseInt(data[i]['realisasi_before']))*(100).toFixed(0)),);
        pencapaian_target+=(getNum(parseInt(data[i]['target'])));
        pencapaian_total+=(getNum(parseInt(data[i]['realisasi_now'])));
        pencapaian_total_before+=(getNum(parseInt(data[i]['realisasi_before'])));

        categoriesWilayah.push('<span style="text-transform: uppercase;font-size:8px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:8px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:8px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:8px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);

        categoriesGrotwhWilayah.push('<span style="text-transform: uppercase;font-size:8px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:8px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:8px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:8px;">'+getNum((((parseInt(data[i]['realisasi_now'])-parseInt(data[i]['realisasi_before'])))/(parseInt(data[i]['realisasi_before']))*(100)).toFixed(0))+'%</span>',);

        categoriesUnitKerja.push('<span style="text-transform: uppercase;font-size:8px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: #41A317;font-size:8px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
        }
         growthSekanwil=getNum((Math.abs(parseInt(pencapaian_total))-Math.abs(parseInt(pencapaian_total_before)))/(Math.abs(parseInt(pencapaian_total_before)))*(100).toFixed(0));
        pencapaianSekanwil=getNum(((Math.abs(parseInt(pencapaian_total))/Math.abs(parseInt(pencapaian_target))*(100).toFixed(0))));
              chartPencapaianWilayah();
              chartPencapaianSekanwil();
              chartGrowthWilayah();
              chartGrowthSekanwil();
            }
    );
    $.post("index.php/LabaRugi/BebanPemasaran", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiPasar.push(parseInt(data[i]['realisasi_now']),);
        targetPasar.push(parseInt(data[i]['target']),);
        categoriesPasar.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
      }
        chartPencapaianBebanPemasaran();
      }
    );

  $.post("index.php/LabaRugi/BebanSosialisasi", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiSosialisasi.push(parseInt(data[i]['realisasi_now']),);
        targetSosialisasi.push(parseInt(data[i]['target']),);
        categoriesSosialisasi.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
      }
        chartPencapaianBebanSosialisasi();
      }
    );

   $.post("index.php/LabaRugi/BebanPerjalanan", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiPerjalanan.push(parseInt(data[i]['realisasi_now']),);
        targetPerjalanan.push(parseInt(data[i]['target']),);
        categoriesPerjalanan.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
      }
        chartPencapaianBebanPerjalanan();
      }
    );

    $.post("index.php/LabaRugi/BebanPromosi", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiPromosi.push(parseInt(data[i]['realisasi_now']),);
        targetPromosi.push(parseInt(data[i]['target']),);
        categoriesPromosi.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(parseInt(getNum(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
      }
        chartPencapaianBebanPromosi();
      }
    );

    $.post("index.php/LabaRugi/BebanRapat", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiRapat.push(parseInt(data[i]['realisasi_now']),);
        targetRapat.push(parseInt(data[i]['target']),);
        categoriesRapat.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
      }
        chartPencapaianBebanRapat();
      }
    );

    $.post("index.php/LabaRugi/BebanUmum", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiUmum.push(parseInt(data[i]['realisasi_now']),);
        targetUmum.push(parseInt(data[i]['target']),);
        categoriesUmum.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
      }
        chartPencapaianBebanUmum();
      }
    );

    $.post("index.php/LabaRugi/BebanRepresentasi", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiRepresentasi.push(parseInt(data[i]['realisasi_now']),);
        targetRepresentasi.push(parseInt(data[i]['target']),);
        categoriesRepresentasi.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi_now']))/parseInt(data[i]['target'])*(100)).toFixed(0))+'%</span>',);
      }
        chartPencapaianBebanRepresentasi();
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
     text: 'Pencapaian Laba Rugi Per Unit Kerja ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesWilayah,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
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
    text: 'Growth Laba Rugi Per Unit Kerja ',
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
     align: 'left',
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
  },{
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

function chartGrowthSekanwil(){
     Highcharts.chart('chart_growth_sekanwil', {
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
    text: 'Growth Se Kanwil',
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Growth</span><br><span style="color: #FF9516;font-size:23px;">'+growthSekanwil.toFixed(0)+'%</span>'],
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.45,
      borderWidth: 0
    }
  },
  series: [{
        name: '% Growth',
        data: [growthSekanwil],
        color: '#FF9516',

    }]
});
 }

 
function chartPencapaianSekanwil(){
     Highcharts.chart('chart_pencapaian_sekanwil', {
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
    text: 'Pencapaian Se Kanwil',
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: rgb(124, 181, 236);font-size:23px;">'+pencapaianSekanwil.toFixed(0)+'%</span>'],
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
                    return false; // now you don't
            }
        },
  plotOptions: {
    column: {
      pointPadding: 0.45,
      borderWidth: 0
    }
  },
  legend:{
    align: 'left',
     backgroundColor: '#D9FBFF',
    width: 108,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
        }
        
},
  series: [{
        name: '% Pencapaian',
        data: [pencapaianSekanwil],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

function chartPencapaianBebanPemasaran(){
    Highcharts.chart('chart_beban_pemasaran', {
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
     text: 'Beban Pemasaran ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesPasar,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
    data: targetPasar,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiPasar,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: "",
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianBebanSosialisasi(){
    Highcharts.chart('chart_beban_sosialisasi', {
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
     text: 'Beban Sosialisasi & Rekonsiliasi ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesSosialisasi,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
    data: targetSosialisasi,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiSosialisasi,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: "",
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianBebanPerjalanan(){
    Highcharts.chart('chart_beban_perjalanan', {
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
     text: 'Beban Perjalanan Dinas ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesPerjalanan,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
    data: targetPerjalanan,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiPerjalanan,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: "",
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianBebanPromosi(){
    Highcharts.chart('chart_beban_promosi', {
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
     text: 'Beban Promosi ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesPromosi,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
    data: targetPromosi,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiPromosi,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: "",
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianBebanRapat(){
    Highcharts.chart('chart_beban_rapat', {
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
     text: 'Beban Rapat Kerja ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesRapat,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
    data: targetRapat,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiRapat,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: "",
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianBebanUmum(){
    Highcharts.chart('chart_beban_umum', {
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
     text: 'Beban Umum Lain-lain ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesUmum,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
    data: targetUmum,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiUmum,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: "",
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianBebanRepresentasi(){
    Highcharts.chart('chart_beban_representasi', {
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
     text: 'Beban Representasi ',
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesRepresentasi,
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
     align: 'left',
     backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target '+gettahunNow,
    data: targetRepresentasi,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
    data: realisasiRepresentasi,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: "",
     color: '#41A317',
  }
  ]
});
}

</script>