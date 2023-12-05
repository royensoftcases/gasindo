  <?php
  $gettahunNow=$_SESSION['tahun_param'];
  $gettahunBefore=$_SESSION['tahun_param']-1;
 ?>
  <section class="browse-job">
      <div class="container"  style="padding-top: 40px;">
        <div class="row">
        <div class="sidebar col-md-2 col-sm-3">
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
               <div class="category-title"><label style="font-size: 11px;">Tahun</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list radio_tahun">
                <ul>
                   <?php 
                       foreach ($dapat_tahun as $each_tahun) {?>
                         <li>
                    <input type="radio" name="filterTahun" id="<?php echo $each_tahun['tahun'];?>" value="<?php echo $each_tahun['tahun'];?>" checked class="checkbox_tahun" onclick="cekBulantahun();"/>
                    <label style="font-size: 10px;" for="<?php echo $each_tahun['tahun'];?>"><?php echo $each_tahun['tahun'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
               <div class="category-title"><label style="font-size: 11px;">Bulan</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul id="dapat_bulan" name="dapat_bulan">    
                </ul>
              </div>
            </div>
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
              <div class="category-title"><input type="checkbox" id="allFilterwilayah" name="allFilterwilayah" checked><label style="font-size: 11px;" for="allFilterwilayah">kanwil IV</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                   <?php 
                       foreach ($dapat_wilayah as $each_wilayah) {?>
                         <li>
                    <input type="checkbox" name="filterWilayah" id="<?php echo $each_wilayah['wilayah_kerja'];?>" value="<?php echo $each_wilayah['wilayah_kerja'];?>" checked class="checkbox_wilayah" onclick="cekFilter();"/>
                    <label style="font-size: 11px;" for="<?php echo $each_wilayah['wilayah_kerja'];?>"><?php echo $each_wilayah['wilayah_kerja'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
          </div>


            <div class="col-md-10 col-sm-9" style="padding-left:0px;">
              <div class="col-md-3 col-sm-3">
                     <address style="background-color: #9A0000;color: #7D14FF">
                      <span style="color: #FFFFFF;font-size: 20px;"><b>KLAIM</b></span><br>
                      <span id="id1" style="color: #FFFFFF;font-size: 14px;">0</span>
                    </address>
                  </div>
                   <div class="col-md-3 col-sm-3">
                    <address style="background-color: #017F02;color: #7D14FF">
                     <span style="color: #FFFFFF;font-size: 20px;"><b>IJP</b></span><br>
                     <span id="id2" style="color: #FFFFFF;font-size: 14px;">0</span>
                    </address>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <address style="background-color: #D11BFD;color: #7D14FF">
                     <span style="color: #FFFFFF;font-size: 20px;"><b>RASIO KLAIM</b></span><br>
                     <span id="id3" style="color: #FFFFFF;font-size: 14px;">0</span>
                    </address>
                  </div>

      <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_rasio_wilayah" style="height: 310px"></div>
</figure>
        </div>
      </div>

      <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_rasio_produk" style="height: 310px"></div>
</figure>
        </div>
      </div>

      <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_rasio_mitra" style="height: 310px"></div>
</figure>
        </div>
      </div>

      <!-- <div>
           <div class="col-md-12" style="padding-top: 40px;text-align: center;">
              <button class="btn-blank btn-lg" onClick="var temp = printall();"><i class="fa fa-print"></i> Print</button>
        </div>
      </div> -->
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
var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

var filterTahun=[];
var filterBulan=[];
var filterWilayah=[];

var categoriesRatioWilayah=[];
var rasioBebanwilayah=[];
var rasioijpwilayah=[];
var dataPersenRatioWilayah=[];

var categoriesRatioProduk=[];
var rasioBebanproduk=[];
var rasioijpproduk=[];
var dataPersenRatioProduk=[];

var categoriesRatioMitra=[];
var rasioBebanmitra=[];
var rasioijpmitra=[];
var dataPersenRatioMitra=[];

var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

var jumlahKlaim = 0;
var jumlahIjp = 0;
var jumlahRasioKlaim = 0;

var getbulan=[];
var getbulandata=[];

$(document).ready(function(){ 
 $("#allFilterTahun").change(function(){
  $(".checkbox_tahun").prop("checked", $(this).prop("checked"));
  cekBulantahun();
  });
  $("#allFilterBulan").change(function(){
  $(".checkbox_bulan").prop("checked", $(this).prop("checked"));
  cekBulantahun();
  });
$("#allFilterwilayah").change(function(){
  $(".checkbox_wilayah").prop("checked", $(this).prop("checked"));
  cekBulantahun();
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
  cekBulantahun();
  }
  function cekBulantahun(){
  filterTahun.clear();
  filterBulan.clear();
  getbulan.clear();
  getbulandata.clear();

 $("input:radio[name=filterTahun]:checked").each(function(){
    filterTahun.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});
 $.post("index.php/Beban/getMonth", {
        filterTahun: filterTahun,
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
           getbulandata=[data[i]['bulan']];
          getbulan.push("<li><input type='radio' name='filterBulan' class='checkbox_bulan' id='"+data[i]['bulan_nama']+"' value='"+data[i]['bulan']+"' checked onclick='cekFilter();'/> <label style='font-size: 11px;' for='"+data[i]['bulan_nama']+"'>"+data[i]['bulan_nama']+"</label></li>");
      }
      console.log(getbulan);
      document.getElementById("dapat_bulan").innerHTML=getbulan.toString().replaceAll(',','');
       $.post("index.php/Beban/RasioTotal", {
        filterTahun: filterTahun,
        filterBulan: getbulandata,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
          cekFilter();
      }
    );
      }
    );
}

Array.prototype.clear = function() {
    this.splice(0, this.length);
};
function cekFilter() {
filterTahun.clear();
filterBulan.clear();
filterWilayah.clear();

jumlahKlaim = 0;
jumlahIjp = 0;
jumlahRasioKlaim = 0;

categoriesRatioWilayah.clear();
rasioBebanwilayah.clear();
rasioijpwilayah.clear();
dataPersenRatioWilayah.clear();

categoriesRatioProduk.clear();
rasioBebanproduk.clear();
rasioijpproduk.clear();
dataPersenRatioProduk.clear();

categoriesRatioMitra.clear();
rasioBebanmitra.clear();
rasioijpmitra.clear();
dataPersenRatioMitra.clear();


  $("input:radio[name=filterTahun]:checked").each(function(){
    filterTahun.push($(this).val());
});
  $("input:radio[name=filterBulan]:checked").each(function(){
    filterBulan.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});

  if(filterTahun==""||filterBulan==""||filterWilayah==""){
document.getElementById("id1").innerHTML="0";
document.getElementById("id2").innerHTML="0";
document.getElementById("id3").innerHTML="0";
 chartRasioWilayah();
 chartRasioProduk();
 chartRasioMitra();
  }

  $.post("index.php/Beban/RasioTotal", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        jumlahKlaim+=(getNum(parseInt(data[i]['beban_klaim'])));
        jumlahIjp+=(getNum(parseInt(data[i]['ijp'])));
      }
       jumlahRasioKlaim=(getNum(parseInt(jumlahKlaim))/getNum(parseInt(jumlahIjp)))*(100);
       document.getElementById("id1").innerHTML=formatNumber(getNum(parseInt(jumlahKlaim)*1000000));
       document.getElementById("id2").innerHTML=formatNumber(getNum(parseInt(jumlahIjp)*1000000));
       document.getElementById("id3").innerHTML=formatNumber(getNum(parseInt(jumlahRasioKlaim)))+" %";
      }
    );

  $.post("index.php/Beban/RatioWilayah", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        rasioBebanwilayah.push(getNum(parseInt(data[i]['beban_klaim'])),);
        rasioijpwilayah.push(getNum(parseInt(data[i]['ijp'])),);
        dataPersenRatioWilayah.push(getNum(((parseInt(data[i]['beban_klaim']) / parseInt(data[i]['ijp']))*(100))).toFixed(0),);
        categoriesRatioWilayah.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_ratio']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['beban_klaim'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['ijp'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['beban_klaim']) / parseInt(data[i]['ijp']))*(100)).toFixed(0))+'%</span>',);
      }
      chartRasioWilayah();
      }
    );
  $.post("index.php/Beban/RatioProduk", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        rasioBebanproduk.push(getNum(parseInt(data[i]['beban_klaim'])),);
        rasioijpproduk.push(getNum(parseInt(data[i]['ijp'])),);
        dataPersenRatioProduk.push(getNum(((parseInt(data[i]['beban_klaim']) / parseInt(data[i]['ijp']))*(100))).toFixed(0),);
        categoriesRatioProduk.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['produk_ratio']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['beban_klaim'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['ijp'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['beban_klaim']) / parseInt(data[i]['ijp']))*(100)).toFixed(0))+'%</span>',);
      }
      chartRasioProduk();
      }
    );
  $.post("index.php/Beban/RatioMitra", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        rasioBebanmitra.push(getNum(parseInt(data[i]['beban_klaim'])),);
        rasioijpmitra.push(getNum(parseInt(data[i]['ijp'])),);
        dataPersenRatioMitra.push(getNum(((parseInt(data[i]['beban_klaim']) / parseInt(data[i]['ijp']))*(100))).toFixed(0),);
        categoriesRatioMitra.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['penerima_jaminan']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['beban_klaim'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['ijp'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['beban_klaim']) / parseInt(data[i]['ijp']))*(100)).toFixed(0))+'%</span>',);
      }
      chartRasioMitra();
      }
    );
}

function printall(){

    window.open("?page=print_ijp&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTipeProduk="+filterTipeProduk+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank+"&totalrku="+tot_volume_pencapaian+"&tot_now_pencapaian="+tot_now_pencapaian+"&tot_before_pencapaian="+tot_before_pencapaian, '_blank');
          }
  

function chartRasioWilayah(){
    Highcharts.chart('chart_rasio_wilayah', {
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
    text: 'Rasio Klaim Per Wilayah',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesRatioWilayah,
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
    pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:8px">{series.name}: </td>' +
      '<td style="padding:0;font-size:8px"><b>{point.y:,.0f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF',
     width: 265,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
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
    name: 'Klaim',
    data: rasioBebanwilayah,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'IJP',
    data: rasioijpwilayah,
    color: '#FF9516',
  },{
    name: '% Rasio Klaim',
     data: dataPersenRatioWilayah,
     color: '#41A317',
  }
  ]
});
}


function chartRasioProduk(){
     Highcharts.chart('chart_rasio_produk', {
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
    text: 'Rasio Klaim Per Produk ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesRatioProduk,
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
    pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:8px">{series.name}: </td>' +
      '<td style="padding:0;font-size:8px"><b>{point.y:,.0f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF',
     width: 265,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
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
    name: 'Klaim',
    data: rasioBebanproduk,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'IJP',
    data: rasioijpproduk,
    color: '#FF9516',
  },{
    name: '% Rasio Klaim',
     data: dataPersenRatioProduk,
     color: '#41A317',
  }
  ]
});
 }

 function chartRasioMitra(){
     Highcharts.chart('chart_rasio_mitra', {
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
    text: 'Rasio Klaim Per Mitra ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesRatioMitra,
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
    pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:8px">{series.name}: </td>' +
      '<td style="padding:0;font-size:8px"><b>{point.y:,.0f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF',
     width: 265,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
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
    name: 'Klaim',
    data: rasioBebanmitra,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'IJP',
    data: rasioijpmitra,
    color: '#FF9516',
  },{
    name: '% Rasio Klaim',
     data: dataPersenRatioMitra,
     color: '#41A317',
  }
  ]
});
 }




</script>