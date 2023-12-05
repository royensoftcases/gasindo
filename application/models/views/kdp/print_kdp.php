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
  $getlunas=$_GET['getlunas'];
  $getdaluarsa=$_GET['getdaluarsa'];
  $getlengkap=$_GET['getlengkap'];
  $gettidaklengkap=$_GET['gettidaklengkap'];
  $gettotal=$_GET['gettotal'];
  $titlePeriode=$_GET['filterPeriode'];
  $titleWilayah=$_GET['filterWilayah'];
  $titlePerproduk=$_GET['filterPerProduk'];
  $titleBank=$_GET['filterBank'];
  $filterPeriode = explode (",",$_GET['filterPeriode']);
  $filterWilayah = explode (",",$_GET['filterWilayah']);
  $filterPerProduk = explode (",",$_GET['filterPerProduk']);
  $filterBank = explode (",",$_GET['filterBank']);

 ?>
  <section class="browse-job">
                  <div class="container" style="padding-bottom: 20px;padding-top: 20px;width:100%;">
                  <h4 style="text-align: center;"><b>KDP</b></h4>         
                  <table class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%;border:1px;font-size: 12px;">
                    <thead>
                      <tr>
                        <th>LUNAS/BATAL</th>
                        <th>DALUARSA</th>
                        <th>BERKAS LENGKAP</th>
                        <th>BERKAS BELUM LENGKAP</th>
                        <th>TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo $getlunas; ?></td>
                        <td><?php echo $getdaluarsa; ?></td>
                        <td><?php echo $getlengkap; ?></td>
                        <td><?php echo $gettidaklengkap; ?></td>
                        <td><?php echo $gettotal; ?></td>
                      </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </tfoot>
                  </table>
                </div>

                 <div class="container" style="width:100%;">      
                  <table class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%;border:1px;font-size: 12px;">
                    <thead>
                      <tr>
                        <th>Filter</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><b>Periode Data :</b> <?php echo $titlePeriode; ?></td>
                      </tr>
                      <tr>
                        <td><b>Kantor Cabang : </b><?php echo $titleWilayah; ?></td>
                      </tr>
                      <tr>
                        <td><b>Produk : </b><?php echo $titlePerproduk; ?></td>
                      </tr>
                      <tr>                       
                        <td><b>Bank : </b><?php echo $titleBank; ?></td>
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
  <div>
  <figure class="highcharts-figure" style="text-align: center;">
  <div id="chart_wilayah_kerja" style="height: 390px;width: 110em"></div>
</figure>
  </div>

  <div style="padding-top: 5%;">
                   <figure class="highcharts-figure">
  <div id="chart_perProduk" style="height: 390px;width: 110em"></div>
</figure>
 </div>

  <div style="padding-top: 3%;">
                   <figure class="highcharts-figure">
  <div id="chart_mitra" style="height: 390px;width: 110em"></div>
</figure>
  </div>

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
        // After waiting for five seconds, submit the form.
        window.print();
    }, 1600);
  setTimeout(window.close, 1700);
  }
var filterPeriode=[];
var filterWilayah=[];
var filterPerProduk=[];
var filterBank=[];

var wilayahLengkap=[];
var wilayahBelumLengkap=[];
var wilayahLunasBatal=[];
var wilayahDaluarsa=[];
var wilayahTotalDaluarsa=[];
var wilayahTotalLengkap=[];
var wilayahTotalBelumLengkap=[];
var wilayahTotalLunasBatal=[];
var wilayahTotalJumlah=[];
var categoriesWilayah=[];

var produkLengkap=[];
var produkBelumLengkap=[];
var produkLunasBatal=[];
var produkDaluarsa=[];
var categoriesProduct=[];

var mitraLengkap=[];
var mitraBelumLengkap=[];
var mitraLunasBatal=[];
var mitraDaluarsa=[];
var categoriesMitra=[];

var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;


Array.prototype.clear = function() {
    this.splice(0, this.length);
};
  function cekFilter(){
filterPeriode=<?php echo json_encode($filterPeriode); ?>;               
filterWilayah=<?php echo json_encode($filterWilayah); ?>;
filterPerProduk=<?php echo json_encode($filterPerProduk); ?>;
filterBank=<?php echo json_encode($filterBank); ?>;

$.post("index.php/Kdp/WilayahKerja", {
        filterPeriode: filterPeriode,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        wilayahLengkap.push(getNum(parseInt(data[i]['lengkap'])),);
        wilayahBelumLengkap.push(getNum(parseInt(data[i]['belum_lengkap'])),);
        wilayahLunasBatal.push(getNum(parseInt(data[i]['lunas_batal'])),);
        wilayahDaluarsa.push(getNum(parseInt(data[i]['daluarsa'])),);

        total=getNum(parseInt(data[i]['lengkap']))+getNum(parseInt(data[i]['belum_lengkap']))+getNum(parseInt(data[i]['lunas_batal']))+getNum(parseInt(data[i]['daluarsa']));

        categoriesWilayah.push('<span style="text-transform: uppercase;">'+data[i]['wilayah_wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['lengkap'])))+'</span>'+' <br>'+'<span style="color: #FCAD05;">'+formatNumber(getNum(parseInt(data[i]['belum_lengkap'])))+'</span>'+' <br>'+'<span style="color: #41A317;">'+formatNumber(getNum(parseInt(data[i]['lunas_batal'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #FF4E74;">'+formatNumber(getNum(parseInt(data[i]['daluarsa'])))+'</span>'+' <br>'+'<span style="color: #7239FF;">'+formatNumber(total)+'</span>',);
        }
      getlunas=formatNumber(getNum(parseInt(data[0]['total_lunas_batal'])));
      getdaluarsa=formatNumber(getNum(parseInt(data[0]['total_daluarsa'])));
      getlengkap=formatNumber(getNum(parseInt(data[0]['total_lengkap'])));
      gettidaklengkap=formatNumber(getNum(parseInt(data[0]['total_belum_lengkap'])));
      gettotal=formatNumber(getNum(parseInt(data[0]['total_jumlah'])));
              chartWilayahKerja();
            }
    );
  
  $.post("index.php/Kdp/PerProduk", {
        filterPeriode: filterPeriode,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        produkLengkap.push(getNum(parseInt(data[i]['lengkap'])),);
        produkBelumLengkap.push(getNum(parseInt(data[i]['belum_lengkap'])),);
        produkLunasBatal.push(getNum(parseInt(data[i]['lunas_batal'])),);
        produkDaluarsa.push(getNum(parseInt(data[i]['daluarsa'])),);
        total=getNum(parseInt(data[i]['lengkap']))+getNum(parseInt(data[i]['belum_lengkap']))+getNum(parseInt(data[i]['lunas_batal']))+getNum(parseInt(data[i]['daluarsa']));

        categoriesProduct.push('<span style="text-transform: uppercase;">'+data[i]['produk'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['lengkap'])))+'</span>'+' <br>'+'<span style="color: #FCAD05;">'+formatNumber(getNum(parseInt(data[i]['belum_lengkap'])))+'</span>'+' <br>'+'<span style="color: #41A317;">'+formatNumber(getNum(parseInt(data[i]['lunas_batal'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #FF4E74;">'+formatNumber(getNum(parseInt(data[i]['daluarsa'])))+'</span>'+' <br>'+'<span style="color: #7239FF;">'+formatNumber(total)+'</span>',);
        }
              chartPerProduk();
            }
    );

  $.post("index.php/Kdp/Mitra", {
        filterPeriode: filterPeriode,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        mitraLengkap.push(getNum(parseInt(data[i]['lengkap'])),);
        mitraBelumLengkap.push(getNum(parseInt(data[i]['belum_lengkap'])),);
        mitraLunasBatal.push(getNum(parseInt(data[i]['lunas_batal'])),);
        mitraDaluarsa.push(getNum(parseInt(data[i]['daluarsa'])),);
        total=getNum(parseInt(data[i]['lengkap']))+getNum(parseInt(data[i]['belum_lengkap']))+getNum(parseInt(data[i]['lunas_batal']))+getNum(parseInt(data[i]['daluarsa']));


        categoriesMitra.push('<span style="text-transform: uppercase;">'+data[i]['bank'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);">'+formatNumber(getNum(parseInt(data[i]['lengkap'])))+'</span>'+' <br>'+'<span style="color: #FCAD05;">'+formatNumber(getNum(parseInt(data[i]['belum_lengkap'])))+'</span>'+' <br>'+'<span style="color: #41A317;">'+formatNumber(getNum(parseInt(data[i]['lunas_batal'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #FF4E74;">'+formatNumber(getNum(parseInt(data[i]['daluarsa'])))+'</span>'+' <br>'+'<span style="color: #7239FF;">'+formatNumber(total)+'</span>',);
        }
              chartMitra();
            }
    );
  }
  

function chartWilayahKerja(){
    Highcharts.chart('chart_wilayah_kerja', {
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
    text: 'Per Wilayah Kerja '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif',
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
    name: 'Lengkap',
    data: wilayahLengkap,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Belum Lengkap',
    data: wilayahBelumLengkap,
    color: '#FCAD05',
  },{
    name: 'Lunas / Batal',
     data: wilayahLunasBatal,
     color: '#41A317',
  },{
    name: 'Daluarsa',
     data: wilayahDaluarsa,
     color: '#FF4E74',
  },{
    name: 'Total',
     data: '',
     color: '#7239FF',
  }
  ]
});
}

function chartPerProduk(){
    Highcharts.chart('chart_perProduk', {
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
     text: 'Per Produk '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesProduct,
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
    name: 'Lengkap',
    data: produkLengkap,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Belum Lengkap',
    data: produkBelumLengkap,
    color: '#FCAD05',
  },{
    name: 'Lunas / Batal',
     data: produkLunasBatal,
     color: '#41A317',
  },{
    name: 'Daluarsa',
     data: produkDaluarsa,
     color: '#FF4E74',
  },{
    name: 'Total',
     data: '',
     color: '#7239FF',
  }
  ]
});
}

function chartMitra(){
    Highcharts.chart('chart_mitra', {
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
     text: 'Per mitra '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 14px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesMitra,
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
    name: 'Lengkap',
    data: mitraLengkap,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Belum Lengkap',
    data: mitraBelumLengkap,
    color: '#FCAD05',
  },{
    name: 'Lunas / Batal',
     data: mitraLunasBatal,
     color: '#41A317',
  },{
    name: 'Daluarsa',
     data: mitraDaluarsa,
     color: '#FF4E74',
  },{
    name: 'Total',
     data: '',
     color: '#7239FF',
  }
  ]
});
}
</script>