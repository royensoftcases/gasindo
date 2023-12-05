  <?php
   $gettahunNow=$_SESSION['tahun_param'];
   $gettahunBefore=$_SESSION['tahun_param']-1;
 ?>
  <section class="browse-job">
      <div class="container"  style="padding-top: 40px;">
        <div class="row">
          <div class="sidebar col-md-2 col-sm-3">
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
               <div class="category-title"><label style="font-size: 11px;">Bulan</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                         <?php 
                         foreach ($dapat_bulan as $each_bulan) {?>
                          <li>
                    <?php 
                    switch ($each_bulan['bulan'])
                          {
                            case '02' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="februari" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="februari">February</label>
                              <?php break;
                            case '03' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="maret" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="maret">March</label>
                              <?php break;
                            case '04' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="april" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="april">April</label>
                              <?php break;
                            case '05' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="mei" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="mei">May</label>
                              <?php break;
                            case '06' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="juni" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="juni">June</label>
                              <?php break;
                            case '07' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="juli" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="juli">July</label>
                              <?php break;
                            case '08' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="agustus" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="agustus">August</label>
                              <?php break;
                            case '09' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="september" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="september">September</label>
                              <?php break;
                            case '10' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="oktober" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="oktober">October</label>
                              <?php break;
                            case '11' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="november" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="november">November</label>
                              <?php break;
                            case '12' :?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="desember" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="desember">December</label>
                              <?php break;
                            default : ?>
                            <input type="radio" name="filterBulan" class="checkbox_bulan" id="januari" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                             <label style="font-size: 11px;" for="januari">January</label>
                          <?php }
                    ?>
                  </li>
                         <?php }?>
                </ul>
              </div>
            </div>
              <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
              <div class="category-title"><input type="checkbox" id="allFilterwilayah" name="allFilterwilayah" checked><label style="font-size: 11px;" for="allFilterwilayah">Wilayah Kerja</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                   <?php 
                       foreach ($dapat_wilayah as $each_wilayah) {?>
                         <li>
                    <input type="checkbox" name="filterWilayah" id="<?php echo $each_wilayah['wilayah_kerja'];?>" value="<?php echo $each_wilayah['wilayah_kerja'];?>" checked class="checkbox_wilayah" onclick="cekFilter();"/>
                    <label style="font-size: 10px;" for="<?php echo $each_wilayah['wilayah_kerja'];?>"><?php echo $each_wilayah['wilayah_kerja'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;font-size: 11px;">
              <div class="category-title"><input type="checkbox" id="allFilterMitra" name="allFilterMitra" checked><label style="font-size: 11px;" for="allFilterMitra">Penerima Jaminan</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                    <?php 
                       foreach ($dapat_mitra as $each_mitra) {?>
                         <li>
                    <input type="checkbox" name="filterMitra" id="<?php echo $each_mitra['mitra'];?>" value="<?php echo $each_mitra['mitra'];?>" checked class="checkbox_mitra" onclick="cekFilter();"/>
                    <label style="font-size: 9px;width: calc(100% - 0px);" for="<?php echo $each_mitra['mitra'];?>"><?php echo $each_mitra['mitra'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>

             <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
             <div class="category-title"><input type="checkbox" id="allFilterProduk" name="allFilterProduk" checked><label style="font-size: 11px;" for="allFilterProduk">Produk</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                  <?php 
                       foreach ($dapat_produk as $each_produk) {?>
                         <li>
                    <input type="checkbox" name="filterProduk" id="<?php echo $each_produk['produk'];?>" value="<?php echo $each_produk['produk'];?>" checked class="checkbox_produk" onclick="cekFilter();"/>
                    <label style="font-size: 9px;" for="<?php echo $each_produk['produk'];?>"><?php echo $each_produk['produk'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
          </div>
             <div class="col-md-10 col-sm-9" style="padding-left:0px;">
               <div class="col-md-4 col-sm-4">
                    <address style="background-color: #9DDFFF;color: #7D14FF">
                      <span style="color: #9A0000;font-size: 11px;"><b>TOTAL OUTSTANDING PIUTANG <?php echo $gettahunNow; ?></b></span><br>
                     <span id="idrealisasi_piutang" style="font-size: 12px;">0</span>
                    </address>
                  </div>
                </div>
  <div class="col-md-10 col-sm-9" style="padding-left:0px;">                   
<div>
<div class="col-md-4 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_wilayah" style="height: 310px"></div>
</figure>
        </div>
        <div class="col-md-8 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_produk" style="height: 330px"></div>
</figure>
        </div>
      </div>

       <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_mitra" style="height: 310px"></div>
</figure>
        </div>
      </div>
       <div>
           <div class="col-md-12" style="padding-top: 40px;text-align: center;">
              <button class="btn-blank btn-lg" onClick="var temp = printall();"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
        </div>
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
$("#allFilterBulan").change(function(){
  $(".checkbox_bulan").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
$("#allFilterwilayah").change(function(){
  $(".checkbox_wilayah").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
$("#allFilterProduk").change(function(){
  $(".checkbox_produk").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
$("#allFilterMitra").change(function(){
  $(".checkbox_mitra").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
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
function cekFilter(){
filterJenisProduk=<?php echo json_encode($filterJenisProduk); ?>;

realisasiwilayah.clear();
categoriesWilayah.clear();

realisasiProduk.clear();
categoriesProduk.clear();

realisasiMitra.clear();
categoriesMitra.clear();

tot_now_pencapaian = 0;

filterBulan.clear();
filterWilayah.clear();
filterMitra.clear();
filterProduk.clear();

$("input:radio[name=filterBulan]:checked").each(function(){
    filterBulan.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});
  $("input:checkbox[name=filterMitra]:checked").each(function(){
    filterMitra.push($(this).val());
});
$("input:checkbox[name=filterProduk]:checked").each(function(){
    filterProduk.push($(this).val());
});
 if(filterBulan==""||filterWilayah==""||filterMitra==""||filterProduk==""){
chartPencapaianWilayah();
chartProduk();
chartMitra();
 }

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
      document.getElementById("idrealisasi_piutang").innerHTML=formatNumber(getNum(parseInt(tot_now_pencapaian))*1000000);
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

function printall(){
    window.open("?page=print_piutang_subrogasi&totalrku="+tot_now_pencapaian*1000000+"&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterMitra="+filterMitra+"&filterProduk="+filterProduk, '_blank');
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
            font: 'bold 11px "Trebuchet MS", Verdana, sans-serif'
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
    headerFormat: '<span>{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:9px">{series.name}: </td>' +
      '<td style="padding:0;font-size:9px"><b>{point.y:,.0f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF',
     width: 70,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '9px',
        }
        
},
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0,
      fontSize:'2px'
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
            font: 'bold 11px "Trebuchet MS", Verdana, sans-serif'
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
    headerFormat: '<span>{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:9px">{series.name}: </td>' +
      '<td style="padding:0;font-size:9px"><b>{point.y:,.0f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  legend:{
    align: 'center',
     backgroundColor: '#D9FBFF',
     width: 70,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '9px',
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
            font: 'bold 11px "Trebuchet MS", Verdana, sans-serif'
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
    headerFormat: '<span>{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:9px">{series.name}: </td>' +
      '<td style="padding:0;font-size:9px"><b>{point.y:,.0f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  legend:{
    align: 'center',
     backgroundColor: '#D9FBFF',
     width: 70,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '9px',
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