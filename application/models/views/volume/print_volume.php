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
  $titleTipeProduk=$_GET['filterTipeProduk'];
  $titlePerProduk=$_GET['filterPerProduk'];
  $titleBank=$_GET['filterBank'];
  $filterBulan = explode (",",$_GET['filterBulan']);
  $filterWilayah = explode (",",$_GET['filterWilayah']);
  $filterTipeProduk = explode (",",$_GET['filterTipeProduk']);
  $filterPerProduk = explode (",",$_GET['filterPerProduk']);
  $filterBank = explode (",",$_GET['filterBank']);
 ?>
  <section class="browse-job">
          <div class="container" style="padding-bottom: 20px;width:100%;">
                  <h4 style="text-align: center;"><b>VOLUME</b></h4>         
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
                        <td><b>BULAN :</b> <?php echo $titleBulan; ?></td>
                      </tr>
                      <tr>
                        <td><b>WILAYAH KERJA :</b> <?php echo $titleWilayah; ?></td>
                      </tr>
                      <tr>
                        <td><b>TIPE PRODUK :</b> <?php echo $titleTipeProduk; ?></td>
                      </tr>
                      <tr>
                        <td><b>PRODUK :</b> <?php echo $titlePerProduk; ?></td>
                      </tr>
                      <tr>
                        <td><b>BANK/LEM.KEUANGAN :</b> <?php echo $titleBank; ?></td>
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
                        <div id="chart_pencapaian_wilayah" style="height: 390px;width: 45em;padding-right: 5em"></div>
                      </figure></td>
                        <td><figure class="highcharts-figure">
                      <div id="chart_pencapaian_produk" style="height:390px;width: 45em;padding-right: 5em"></div>
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
                        <td style="text-align: center;"><figure class="highcharts-figure">
                       <div id="chart_pencapaian_perproduk" style="height: 390px;width: 120em;"></div>
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
                        <div id="chart_growth_wilayah" style="height: 390px;width: 90em;padding-right: 5em"></div>
                      </figure></td>
                      <td><figure class="highcharts-figure">
                      <div id="chart_growth_total" style="height:390px;width: 25em;"></div>
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
                       <div id="chart_growth_produk" style="height: 390px;width: 120em;"></div>
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
                       <div id="chart_growth_permitra" style="height: 390px;width: 120em;"></div>
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

var targetProduk=[];
var realisasiProduk=[];
var categoriesProduk=[];
var dataPersenProduk=[];

var targetperProduk=[];
var realisasiperProdak=[];
var categoriesperProduk=[];
var dataPersenPerProduk=[];

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
var filterTipeProduk=[];
var filterPerProduk=[];
var filterBank=[];


Array.prototype.clear = function() {
    this.splice(0, this.length);
};

function getNum(val) {
   val = +val || 0
   return val;
}

  function cekFilter(){
filterBulan=<?php echo json_encode($filterBulan); ?>;               
filterWilayah=<?php echo json_encode($filterWilayah); ?>;
filterTipeProduk=<?php echo json_encode($filterTipeProduk); ?>;
filterPerProduk=<?php echo json_encode($filterPerProduk); ?>;
filterBank=<?php echo json_encode($filterBank); ?>;

$.post("index.php/Volume/filterbulanWilayahPencapaian", {
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
        filterTipeProduk: filterTipeProduk,
        filterPerProduk: filterPerProduk,
        filterBank: filterBank
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiwilayah.push(getNum(parseInt(data[i]['pokok_kredit_now'])),);
        realisasiBeforewilayah.push(getNum(parseInt(data[i]['pokok_kredit_before'])),);
        targetWilayah.push(getNum(parseInt(data[i]['volume'])),);
        dataPersenWilayah.push(getNum(((parseInt(data[i]['pokok_kredit_now']) / parseInt(data[i]['volume']))*(100)).toFixed(0)),);
        tot_now_pencapaian+=(getNum(parseInt(data[i]['pokok_kredit_now'])));
        tot_before_pencapaian+=(getNum(parseInt(data[i]['pokok_kredit_before'])));
        tot_volume_pencapaian+=(getNum(parseInt(data[i]['volume'])));

        categoriesWilayah.push('<span style="text-transform: uppercase;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) / parseInt(data[i]['volume']))*(100)).toFixed(0))+'%</span>',);

        categoriesGrotwhWilayah.push('<span style="text-transform: uppercase;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) - parseInt(data[i]['pokok_kredit_before']))/ parseInt(data[i]['pokok_kredit_before'])*(100)).toFixed(0))+'%</span>',);
      }
       pencapaian_total=(getNum(parseInt(tot_now_pencapaian))/getNum(parseInt(tot_volume_pencapaian)))*(100);
       growth_total=(getNum(parseInt(tot_now_pencapaian))-getNum(parseInt(tot_before_pencapaian)))/(getNum(parseInt(tot_before_pencapaian)))*(100);
        chartPencapaianWilayah();
        chartGrowthWilayah();
        chartPencapaianTotal();
        chartGrowthTotal();
      }
    );

  $.post("index.php/Volume/filterbulanVolumeJenisProduk", {
     filterBulan: filterBulan,
     filterWilayah: filterWilayah,
     filterTipeProduk: filterTipeProduk,
     filterPerProduk: filterPerProduk,
     filterBank: filterBank,
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        targetProduk.push(getNum(parseInt(data[i]['volume'])),);
        realisasiProduk.push(getNum(parseInt(data[i]['pokok_kredit'])),);
        dataPersenProduk.push(getNum(((parseInt(data[i]['pokok_kredit']) / parseInt(data[i]['volume']))*(100)).toFixed(0)),);
        categoriesProduk.push('<span style="text-transform: uppercase;">'+data[i]['jenis_produk']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['pokok_kredit']) / parseInt(data[i]['volume']))*(100)).toFixed(0))+'%</span>',);
      }
              chartPencapaianProduk();
            }
    );

  $.post("index.php/Volume/filterbulanVolumeProduk", {
    filterBulan: filterBulan,
    filterWilayah: filterWilayah,
    filterTipeProduk: filterTipeProduk,
    filterPerProduk: filterPerProduk,
    filterBank: filterBank
    },
            function (data, status) {
            var data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        realisasiperProdak.push(getNum(parseInt(data[i]['pokok_kredit'])),);
        targetperProduk.push(getNum(parseInt(data[i]['volume'])),);
        dataPersenPerProduk.push(getNum(((parseInt(data[i]['pokok_kredit']) / parseInt(data[i]['volume']))*(100)).toFixed(0)),);
        categoriesperProduk.push('<span style="text-transform: uppercase;">'+data[i]['produk_total'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['pokok_kredit']) / parseInt(data[i]['volume']))*(100)).toFixed(0))+'%</span>',);
      }
      chartPencapaianPerProduk();
            }
    );

  $.post("index.php/Volume/filterbulanGrowthProduk", {
    filterBulan: filterBulan,
    filterWilayah: filterWilayah,
    filterTipeProduk: filterTipeProduk,
    filterPerProduk: filterPerProduk,
    filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        growthrealisasiProduk.push(getNum(parseInt(data[i]['pokok_kredit_now'])),);
        growthrealisasiProdukBefore.push(getNum(parseInt(data[i]['pokok_kredit_before'])),);
        dataPersenGrowthProduk.push(getNum(((parseInt(data[i]['pokok_kredit_now']) / parseInt(data[i]['pokok_kredit_before']))*(100)).toFixed(0)),);
        categoriesGrowthProduk.push('<span style="text-transform: uppercase;">'+data[i]['produk_now'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) - parseInt(data[i]['pokok_kredit_before']))/parseInt(data[i]['pokok_kredit_before'])*(100)).toFixed(0))+'%</span>',);
        }
              chartGrowthProduk();
            }
    );

  $.post("index.php/Volume/filterbulanGrowthMitra", {
     filterBulan: filterBulan,
     filterWilayah: filterWilayah,
     filterTipeProduk: filterTipeProduk,
     filterPerProduk: filterPerProduk,
     filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
        growthrealisasiMitra.push(getNum(parseInt(data[i]['pokok_kredit_now'])),);
        growthrealisasiMitraBefore.push(getNum(parseInt(data[i]['pokok_kredit_before'])),);
        dataPersenGrowthMitra.push(getNum(((parseInt(data[i]['pokok_kredit_now']) - parseInt(data[i]['pokok_kredit_before']))/ parseInt(data[i]['pokok_kredit_before'])*(100)).toFixed(0)),);
        categoriesGrowthMitra.push('<span style="text-transform: uppercase;">'+data[i]['bank'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;">'+formatNumber(parseInt(getNum(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) - parseInt(data[i]['pokok_kredit_before']))/parseInt(data[i]['pokok_kredit_before'])*(100))).toFixed(0)+'%</span>',);
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


function chartPencapaianProduk(){
     Highcharts.chart('chart_pencapaian_produk', {
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
  plotOptions: {
    column: {
      pointPadding: 0.3,
      borderWidth: 0
    }
  },
  legend:{
    align: 'left',
     backgroundColor: '#D9FBFF',
     width: 360,
        align: 'left',
        
},
   series: [{
    name: 'Target',
   data: targetProduk,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
   data: realisasiProduk,
     color: '#FF9516',

  },{
    name: '% Pencapaian',
     data: dataPersenProduk,
     color: '#41A317',
  }]
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
   text: 'Pencapaian Total '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span>Pencapaian</span><br><span style="color: #41A317;font-size:27px;">'+pencapaian_total.toFixed(0)+'%</span>'],
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
        name: '% Pencapaian',
        data: [pencapaian_total],
        color: '#41A317',

    }]
});
 }

function chartPencapaianPerProduk(){
   Highcharts.chart('chart_pencapaian_perproduk', {
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
    text: 'Pencapaian Per Produk '+gettahunNow,
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
     align: 'left',
      backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.3,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Target',
    data: targetperProduk,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi '+gettahunNow,
   data: realisasiperProdak,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: dataPersenPerProduk,
     color: '#41A317',
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
   categories: ['<span>Yoy</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+growth_total.toFixed(0)+'%</span>'],
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
     text: 'Growth Per Mitra Kerja '+gettahunNow,
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
     align: 'left',
      backgroundColor: '#D9FBFF'
        
},
  plotOptions: {
    column: {
      pointPadding: 0.3,
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