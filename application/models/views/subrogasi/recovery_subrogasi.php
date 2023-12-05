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
                     <span style="color: #FFFFFF;font-size: 20px;"><b>SUBRO</b></span><br>
                     <span id="id2" style="color: #FFFFFF;font-size: 14px;">0</span>
                    </address>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <address style="background-color: #D11BFD;color: #7D14FF">
                     <span style="color: #FFFFFF;font-size: 20px;"><b>RECOVERY RATE</b></span><br>
                     <span id="id3" style="color: #FFFFFF;font-size: 14px;">0</span>
                    </address>
                  </div>

      <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_recovery_wilayah" style="height: 310px"></div>
</figure>
        </div>
      </div>

      <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_recovery_mitra" style="height: 310px"></div>
</figure>
        </div>
      </div>

      <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_recovery_produk" style="height: 310px"></div>
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

var categoriesRecoveryWilayah=[];
var Bebanwilayah=[];
var Subrogasiwilayah=[];
var dataPersenRecoveryWilayah=[];

var categoriesRecoveryMitra=[];
var BebanMitra=[];
var SubgrogasiMitra=[];
var dataPersenRecoveryMitra=[];

var categoriesRecoveryProduk=[];
var BebanProduk=[];
var SubrogasiProduk=[];
var dataPersenRecoveryProduk=[];

var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

var jumlahSubgrogasi = 0;
var jumlahBeban = 0;
var jumlahRecovery = 0;

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
 $.post("index.php/Subrogasi/getMonth", {
        filterTahun: filterTahun,
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
           getbulandata=[data[i]['bulan']];
          getbulan.push("<li><input type='radio' name='filterBulan' class='checkbox_bulan' id='"+data[i]['bulan_nama']+"' value='"+data[i]['bulan']+"' checked onclick='cekFilter();'/> <label style='font-size: 11px;' for='"+data[i]['bulan_nama']+"'>"+data[i]['bulan_nama']+"</label></li>");
      }
      document.getElementById("dapat_bulan").innerHTML=getbulan.toString().replaceAll(',','');
       $.post("index.php/Subrogasi/RecoveryTotal", {
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

jumlahSubgrogasi = 0;
jumlahBeban = 0;
jumlahRecovery = 0;

categoriesRecoveryWilayah.clear();
Bebanwilayah.clear();
Subrogasiwilayah.clear();
dataPersenRecoveryWilayah.clear();


categoriesRecoveryMitra.clear();
BebanMitra.clear();
SubgrogasiMitra.clear();
dataPersenRecoveryMitra.clear();

categoriesRecoveryProduk.clear();
BebanProduk.clear();
SubrogasiProduk.clear();
dataPersenRecoveryProduk.clear();


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

  $.post("index.php/Subrogasi/RecoveryTotal", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        jumlahSubgrogasi+=(getNum(parseInt(data[i]['jumlah_subro'])));
        jumlahBeban+=(getNum(parseInt(data[i]['jumlah_beban'])));
      }
       jumlahRecovery=(getNum(parseInt(jumlahSubgrogasi))/getNum(parseInt(jumlahBeban)))*(100);
       document.getElementById("id1").innerHTML=formatNumber(getNum(parseInt(jumlahBeban)*1000000));
       document.getElementById("id2").innerHTML=formatNumber(getNum(parseInt(jumlahSubgrogasi)*1000000));
       document.getElementById("id3").innerHTML=formatNumber(getNum(parseInt(jumlahRecovery)))+" %";
      }
    );

  $.post("index.php/Subrogasi/RecoveryWilayah", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        Subrogasiwilayah.push(getNum(parseInt(data[i]['jumlah_subro'])),);
        Bebanwilayah.push(getNum(parseInt(data[i]['jumlah_beban'])),);
        dataPersenRecoveryWilayah.push(getNum(((parseInt(data[i]['jumlah_subro']) / parseInt(data[i]['jumlah_beban']))*(100))).toFixed(0),);
        categoriesRecoveryWilayah.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_recovery']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_subro'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['jumlah_subro']) / parseInt(data[i]['jumlah_beban']))*(100)).toFixed(0))+'%</span>',);
      }
      chartRecoveryWilayah();
      }
    );
  $.post("index.php/Subrogasi/RecoveryMitra", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        SubgrogasiMitra.push(getNum(parseInt(data[i]['jumlah_subro'])),);
        BebanMitra.push(getNum(parseInt(data[i]['jumlah_beban'])),);
        dataPersenRecoveryMitra.push(getNum(((parseInt(data[i]['jumlah_subro']) / parseInt(data[i]['jumlah_beban']))*(100))).toFixed(0),);
        categoriesRecoveryMitra.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['bank']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_subro'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['jumlah_subro']) / parseInt(data[i]['jumlah_beban']))*(100)).toFixed(0))+'%</span>',);
      }
      chartRecoveryMitra();
      }
    );
  $.post("index.php/Subrogasi/RecoveryProduk", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        SubrogasiProduk.push(getNum(parseInt(data[i]['jumlah_subro'])),);
        BebanProduk.push(getNum(parseInt(data[i]['jumlah_beban'])),);
        dataPersenRecoveryProduk.push(getNum(((parseInt(data[i]['jumlah_subro']) / parseInt(data[i]['jumlah_beban']))*(100))).toFixed(0),);
        categoriesRecoveryProduk.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['produk_recovery']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_subro'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['jumlah_subro']) / parseInt(data[i]['jumlah_beban']))*(100)).toFixed(0))+'%</span>',);
      }
      chartRecoveryProduk();
      }
    );
}

function printall(){

    window.open("?page=print_ijp&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTipeProduk="+filterTipeProduk+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank+"&totalrku="+tot_volume_pencapaian+"&tot_now_pencapaian="+tot_now_pencapaian+"&tot_before_pencapaian="+tot_before_pencapaian, '_blank');
          }
  

function chartRecoveryWilayah(){
    Highcharts.chart('chart_recovery_wilayah', {
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
    text: 'Recovery Rate Per Cabang',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesRecoveryWilayah,
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
    data: Bebanwilayah,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Subro',
    data: Subrogasiwilayah,
    color: '#FF9516',
  },{
    name: '% Recovery Rate',
     data: dataPersenRecoveryWilayah,
     color: '#41A317',
  }
  ]
});
}

function chartRecoveryMitra(){
     Highcharts.chart('chart_recovery_mitra', {
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
    text: 'Recovery Rate Per Mitra ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesRecoveryMitra,
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
    data: BebanMitra,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Subro',
    data: SubgrogasiMitra,
    color: '#FF9516',
  },{
    name: '% Recovery Rate',
     data: dataPersenRecoveryMitra,
     color: '#41A317',
  }
  ]
});
 }

function chartRecoveryProduk(){
     Highcharts.chart('chart_recovery_produk', {
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
    text: 'Recovery Rate Per Produk ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesRecoveryProduk,
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
    data: BebanProduk,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Subro',
    data: SubrogasiProduk,
    color: '#FF9516',
  },{
    name: '% Recovery Rate',
     data: dataPersenRecoveryProduk,
     color: '#41A317',
  }
  ]
});
 }

</script>