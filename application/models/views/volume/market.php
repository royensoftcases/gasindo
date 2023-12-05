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
            <div class="col-md-10 col-sm-9"  style="padding-left:0px;">
           <div class="col-md-3 col-sm-3">
                    <address style="background-color: #0B3BB6;color: #7D14FF">
                      <span id="label1" style="color: #FFFFFF;font-size: 20px;"><b></b></span><br>
                    <span id="id1" style="color:#FFFFFF;font-size: 20px;">0</span>
                    </address>
                  </div>
                   <div class="col-md-3 col-sm-3">
                     <address style="background-color: #9A0000;color: #7D14FF">
                      <span id="label2" style="color: #FFFFFF;font-size: 20px;"><b></b></span><br>
                      <span id="id2" style="color: #FFFFFF;font-size: 20px;">0</span>
                    </address>
                  </div>
                   <div class="col-md-3 col-sm-3">
                    <address style="background-color: #FD961B;color: #7D14FF">
                     <span id="label3" style="color: #FFFFFF;font-size: 20px;"><b></b></span><br>
                     <span id="id3" style="color: #FFFFFF;font-size: 20px;">0</span>
                    </address>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <address style="background-color: #D11BFD;color: #7D14FF">
                     <span style="color: #FFFFFF;font-size: 20px;"><b>TOTAL</b></span><br>
                     <span id="idtotal_bank" style="color: #FFFFFF;font-size: 20px;">0</span>
                    </address>
                  </div>

        <div>
           <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_bank" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_bri" style="height: 310px"></div>
</figure>
        </div>
      </div>


       <div>
           <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_bni" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_mandiri" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">

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
      <script src="<?php echo base_url()?>assets/js/lodash.min.js"></script>


      <script type="text/javascript">
var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

var filterTahun=[];
var filterBulan=[];
var filterWilayah=[];

var tot_bank = 0;
var tot_penjaminan=0;
var tot_penyaluran=0;

var categoriesBank=[];
var bankBri=[];
var bankBni=[];
var bankMandiri=[];

var categoriesBri=[];
var onlyBri=[];
var onlyBriwilayah=[];
var briWilayahdistict=[];
var categoriesBridistinct=[];
var bandungBri=[];
var cirebonBri=[];
var purwakartaBri=[];
var sukabumiBri=[];
var tasikmalayaBri=[];

var categoriesBni=[];
var onlyBni=[];
var onlyBniwilayah=[];
var bniWilayahdistict=[];
var categoriesBnidistinct=[];
var bandungBni=[];
var cirebonBni=[];
var purwakartaBni=[];
var sukabumiBni=[];
var tasikmalayaBni=[];

var categoriesMandiri=[];
var onlyMandiri=[];
var onlyMandiriwilayah=[];
var mandiriWilayahdistict=[];
var categoriesMandiridistinct=[];
var bandungMandiri=[];
var cirebonMandiri=[];
var purwakartaMandiri=[];
var sukabumiMandiri=[];
var tasikmalayaMandiri=[];

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
 $.post("index.php/Volume/getMonth", {
        filterTahun: filterTahun,
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
          getbulandata=[data[i]['bulan']];
          getbulan.push("<li><input type='radio' name='filterBulan' class='checkbox_bulan' id='"+data[i]['bulan_nama']+"' value='"+data[i]['bulan']+"' checked onclick='cekFilter();'/> <label style='font-size: 11px;' for='"+data[i]['bulan_nama']+"'>"+data[i]['bulan_nama']+"</label></li>");
      }
      document.getElementById("dapat_bulan").innerHTML=getbulan.toString().replaceAll(',',' ');
      $.post("index.php/Volume/Marketbank", {
        filterTahun: filterTahun,
        filterBulan: getbulandata,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        tot_penjaminan=(getNum(parseInt(data[i]['penjaminan'])));
        tot_penyaluran=(getNum(parseInt(data[i]['penyaluran'])));
      }
      tot_bank=(getNum(parseInt(tot_penjaminan))/getNum(parseInt(tot_penyaluran)))*(100);
       document.getElementById("label1").innerHTML=data[0]['bank'];
       document.getElementById("id1").innerHTML=formatNumber(getNum(((parseInt(data[0]['penjaminan']) / parseInt(data[0]['penyaluran']))*(100)).toFixed(0))+' %');
       document.getElementById("label2").innerHTML=data[1]['bank'];
       document.getElementById("id2").innerHTML=formatNumber(getNum(((parseInt(data[1]['penjaminan']) / parseInt(data[1]['penyaluran']))*(100)).toFixed(0))+' %');
       document.getElementById("label3").innerHTML=data[2]['bank'];
       document.getElementById("id3").innerHTML=formatNumber(getNum(((parseInt(data[2]['penjaminan']) / parseInt(data[2]['penyaluran']))*(100)).toFixed(0))+' %');
       document.getElementById("idtotal_bank").innerHTML=formatNumber(parseInt(tot_bank)+' %');
      }
    );
      }
    );
  cekFilter();
}

Array.prototype.clear = function() {
    this.splice(0, this.length);
};
function cekFilter() {
filterTahun.clear();
filterBulan.clear();
filterWilayah.clear();

tot_bank = 0;
tot_penjaminan=0;
tot_penyaluran=0;

categoriesBank.clear();
bankBri.clear();
bankBni.clear();
bankMandiri.clear();

categoriesBri.clear();
onlyBri.clear();
onlyBriwilayah.clear();
briWilayahdistict.clear();
categoriesBridistinct.clear();
bandungBri.clear();
cirebonBri.clear();
purwakartaBri.clear();
sukabumiBri.clear();
tasikmalayaBri.clear();

categoriesBni.clear();
onlyBni.clear();
onlyBniwilayah.clear();
bniWilayahdistict.clear();
categoriesBnidistinct.clear();
bandungBni.clear();
cirebonBni.clear();
purwakartaBni.clear();
sukabumiBni.clear();
tasikmalayaBni.clear();

categoriesMandiri.clear();
onlyMandiri.clear();
onlyMandiriwilayah.clear();
mandiriWilayahdistict.clear();
categoriesMandiridistinct.clear();
bandungMandiri.clear();
cirebonMandiri.clear();
purwakartaMandiri.clear();
sukabumiMandiri.clear();
tasikmalayaMandiri.clear();

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
document.getElementById("idtotal_bank").innerHTML="0";
document.getElementById("label1").innerHTML="";
document.getElementById("label2").innerHTML="";
document.getElementById("label3").innerHTML="";
document.getElementById("dapat_bulan").innerHTML="";
  }
  $.post("index.php/Volume/Marketbank", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        tot_penjaminan=(getNum(parseInt(data[i]['penjaminan'])));
        tot_penyaluran=(getNum(parseInt(data[i]['penyaluran'])));
      }
      tot_bank=(getNum(parseInt(tot_penjaminan))/getNum(parseInt(tot_penyaluran)))*(100);
       document.getElementById("label1").innerHTML=data[0]['bank'];
       document.getElementById("id1").innerHTML=formatNumber(getNum(((parseInt(data[0]['penjaminan']) / parseInt(data[0]['penyaluran']))*(100)).toFixed(0))+' %');
       document.getElementById("label2").innerHTML=data[1]['bank'];
       document.getElementById("id2").innerHTML=formatNumber(getNum(((parseInt(data[1]['penjaminan']) / parseInt(data[1]['penyaluran']))*(100)).toFixed(0))+' %');
       document.getElementById("label3").innerHTML=data[2]['bank'];
       document.getElementById("id3").innerHTML=formatNumber(getNum(((parseInt(data[2]['penjaminan']) / parseInt(data[2]['penyaluran']))*(100)).toFixed(0))+' %');
       document.getElementById("idtotal_bank").innerHTML=formatNumber(parseInt(tot_bank)+' %');
      }
    );
  $.post("index.php/Volume/Allbank", {
      filterTahun: filterTahun,
      filterWilayah: filterWilayah
    },
            function (data, status) {
            var data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        bankBri.push(getNum(((parseInt(data[i]['penjaminan_bri']) / parseInt(data[i]['penyaluran_bri']))*(100)).toFixed(0)),);
        bankBni.push(getNum(((parseInt(data[i]['penjaminan_bni']) / parseInt(data[i]['penyaluran_bni']))*(100)).toFixed(0)),);
        bankMandiri.push(getNum(((parseInt(data[i]['penjaminan_mandiri']) / parseInt(data[i]['penyaluran_mandiri']))*(100)).toFixed(0)),);
        categoriesBank.push(data[i]['bulan_singkat'],);
      }
      chartBank();
            }
    );


   $.post("index.php/Volume/Marketbri", {
      filterTahun: filterTahun,
    },
            function (data, status) {

            var data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        onlyBri.push(data[i]['wilayah_kerja']+","+getNum(((parseInt(data[i]['penjaminan']) / parseInt(data[i]['penyaluran']))*(100)).toFixed(0)));
        onlyBriwilayah.push(data[i]['wilayah_kerja']);
        categoriesBri.push(data[i]['bulan_singkat'],);
      }
      $.each(onlyBriwilayah, function(i, el){
          if($.inArray(el, briWilayahdistict) === -1) briWilayahdistict.push(el);
      });
      $.each(categoriesBri, function(i, el){
          if($.inArray(el, categoriesBridistinct) === -1) categoriesBridistinct.push(el);
      });
onlyBri = onlyBri.map(function(o){
  var d = o.split(',').map(function(b){
      return String( b.replace(/(|name:|isi:)/g,'') );   
  });
  return {
     name: d[0],
     isi: d[1]
  };
});
const grouped = _.groupBy(onlyBri, onlyBri => onlyBri.name);
bandungBri=grouped["Bandung"];
cirebonBri=grouped["Cirebon"];
purwakartaBri=grouped["Purwakarta"];
sukabumiBri=grouped["Sukabumi"];
tasikmalayaBri=grouped["Tasikmalaya"];

var arrBandungBri = [];
for (var i = 0; i < grouped["Bandung"].length; i++) {
    arrBandungBri.push(grouped["Bandung"][i].isi);
}
bandungBri=arrBandungBri.map(Number);

var arrCirebonBri = [];
for (var i = 0; i < grouped["Cirebon"].length; i++) {
    arrCirebonBri.push(grouped["Cirebon"][i].isi);
}
cirebonBri=arrCirebonBri.map(Number);

var arrPurwakartaBri = [];
for (var i = 0; i < grouped["Purwakarta"].length; i++) {
    arrPurwakartaBri.push(grouped["Purwakarta"][i].isi);
}
purwakartaBri=arrPurwakartaBri.map(Number);

var arrSukabumiBri = [];
for (var i = 0; i < grouped["Sukabumi"].length; i++) {
    arrSukabumiBri.push(grouped["Sukabumi"][i].isi);
}
sukabumiBri=arrSukabumiBri.map(Number);

var arrTasikmalayaBri = [];
for (var i = 0; i < grouped["Tasikmalaya"].length; i++) {
    arrTasikmalayaBri.push(grouped["Tasikmalaya"][i].isi);
}
tasikmalayaBri=arrTasikmalayaBri.map(Number);

 chartBri();
  }
);

    $.post("index.php/Volume/Marketbni", {
      filterTahun: filterTahun,
      filterWilayah: filterWilayah
    },
            function (data, status) {

            var data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        onlyBni.push(data[i]['wilayah_kerja']+","+getNum(((parseInt(data[i]['penjaminan']) / parseInt(data[i]['penyaluran']))*(100)).toFixed(0)));
        onlyBniwilayah.push(data[i]['wilayah_kerja']);
        categoriesBni.push(data[i]['bulan_singkat'],);
      }
      $.each(onlyBniwilayah, function(i, el){
          if($.inArray(el, bniWilayahdistict) === -1) bniWilayahdistict.push(el);
      });
      $.each(categoriesBni, function(i, el){
          if($.inArray(el, categoriesBnidistinct) === -1) categoriesBnidistinct.push(el);
      });
onlyBni = onlyBni.map(function(o){
  var d = o.split(',').map(function(b){
      return String( b.replace(/(|name:|isi:)/g,'') );   
  });
  return {
     name: d[0],
     isi: d[1]
  };
});
const grouped = _.groupBy(onlyBni, onlyBni => onlyBni.name);
bandungBni=grouped["Bandung"];
cirebonBni=grouped["Cirebon"];
purwakartaBni=grouped["Purwakarta"];
sukabumiBni=grouped["Sukabumi"];
tasikmalayaBni=grouped["Tasikmalaya"];

var arrBandungBni = [];
for (var i = 0; i < grouped["Bandung"].length; i++) {
    arrBandungBni.push(grouped["Bandung"][i].isi);
}
bandungBni=arrBandungBni.map(Number);

var arrCirebonBni = [];
for (var i = 0; i < grouped["Cirebon"].length; i++) {
    arrCirebonBni.push(grouped["Cirebon"][i].isi);
}
cirebonBni=arrCirebonBni.map(Number);

var arrPurwakartaBni = [];
for (var i = 0; i < grouped["Purwakarta"].length; i++) {
    arrPurwakartaBni.push(grouped["Purwakarta"][i].isi);
}
purwakartaBni=arrPurwakartaBni.map(Number);

var arrSukabumiBni = [];
for (var i = 0; i < grouped["Sukabumi"].length; i++) {
    arrSukabumiBni.push(grouped["Sukabumi"][i].isi);
}
sukabumiBni=arrSukabumiBni.map(Number);

var arrTasikmalayaBni = [];
for (var i = 0; i < grouped["Tasikmalaya"].length; i++) {
    arrTasikmalayaBni.push(grouped["Tasikmalaya"][i].isi);
}
tasikmalayaBni=arrTasikmalayaBni.map(Number);
 chartBni();
  }
);

    $.post("index.php/Volume/Marketmandiri", {
      filterTahun: filterTahun,
      filterWilayah: filterWilayah
    },
            function (data, status) {

            var data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        onlyMandiri.push(data[i]['wilayah_kerja']+","+getNum(((parseInt(data[i]['penjaminan']) / parseInt(data[i]['penyaluran']))*(100)).toFixed(0)));
        onlyMandiriwilayah.push(data[i]['wilayah_kerja']);
        categoriesMandiri.push(data[i]['bulan_singkat'],);
      }
      $.each(onlyMandiriwilayah, function(i, el){
          if($.inArray(el, mandiriWilayahdistict) === -1) mandiriWilayahdistict.push(el);
      });
      $.each(categoriesMandiri, function(i, el){
          if($.inArray(el, categoriesMandiridistinct) === -1) categoriesMandiridistinct.push(el);
      });
onlyMandiri = onlyMandiri.map(function(o){
  var d = o.split(',').map(function(b){
      return String( b.replace(/(|name:|isi:)/g,'') );   
  });
  return {
     name: d[0],
     isi: d[1]
  };
});
const grouped = _.groupBy(onlyMandiri, onlyMandiri => onlyMandiri.name);
bandungMandiri=grouped["Bandung"];
cirebonMandiri=grouped["Cirebon"];
purwakartaMandiri=grouped["Purwakarta"];
sukabumiMandiri=grouped["Sukabumi"];
tasikmalayaMandiri=grouped["Tasikmalaya"];

var arrBandungMandiri = [];
for (var i = 0; i < grouped["Bandung"].length; i++) {
    arrBandungMandiri.push(grouped["Bandung"][i].isi);
}
bandungMandiri=arrBandungMandiri.map(Number);

var arrCirebonMandiri = [];
for (var i = 0; i < grouped["Cirebon"].length; i++) {
    arrCirebonMandiri.push(grouped["Cirebon"][i].isi);
}
cirebonMandiri=arrCirebonMandiri.map(Number);

var arrPurwakartaMandiri = [];
for (var i = 0; i < grouped["Purwakarta"].length; i++) {
    arrPurwakartaMandiri.push(grouped["Purwakarta"][i].isi);
}
purwakartaMandiri=arrPurwakartaMandiri.map(Number);

var arrSukabumiMandiri = [];
for (var i = 0; i < grouped["Sukabumi"].length; i++) {
    arrSukabumiMandiri.push(grouped["Sukabumi"][i].isi);
}
sukabumiMandiri=arrSukabumiMandiri.map(Number);

var arrTasikmalayaMandiri = [];
for (var i = 0; i < grouped["Tasikmalaya"].length; i++) {
    arrTasikmalayaMandiri.push(grouped["Tasikmalaya"][i].isi);
}
tasikmalayaMandiri=arrTasikmalayaMandiri.map(Number);
 chartMandiri();
  }
);
}

function printall(){

    window.open("?page=print_volume&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTipeProduk="+filterTipeProduk+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank+"&totalrku="+tot_volume_pencapaian+"&tot_now_pencapaian="+tot_now_pencapaian+"&tot_before_pencapaian="+tot_before_pencapaian, '_blank');
          }
  
function chartBank(){
Highcharts.chart('chart_bank', {
credits: {
        enabled: false
    },
    title: {
        text: 'Market Share Per Bank',
        style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
    },
    xAxis: {
    categories:categoriesBank,
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

    legend: {
        align: 'center',
     backgroundColor: '#D9FBFF',
     width: 193,
     padding: 1,
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
        name: 'BRI',
        data: bankBri,
        color: '#0B3BB6',
    }, {
        name: 'BNI',
        data: bankBni,
        color: '#9A0000',
    }, {
        name: 'Mandiri',
        data: bankMandiri,
        color: '#FD961B',
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
}

function chartBri(){
Highcharts.chart('chart_bri', {
credits: {
        enabled: false
    },
    title: {
        text: 'Market Share BRI',
        style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
    },


    xAxis: {
    categories:categoriesBridistinct,
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

    legend: {
        align: 'center',
     backgroundColor: '#D9FBFF',
     width: 453,
     padding: 1,
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
        name: briWilayahdistict[0],
        data: bandungBri,
        color: '#0B3BB6',
    }, {
        name: briWilayahdistict[1],
        data: cirebonBri,
        color: '#FD961B',
    }, {
        name: briWilayahdistict[2],
        data: purwakartaBri,
        color: '#708D87',
    }, {
        name: briWilayahdistict[3],
        data: sukabumiBri,
        color: '#F8E71D',
    }, {
        name: briWilayahdistict[4],
        data: tasikmalayaBri,
        color: '#1DF6F8',
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
}

function chartBni(){
Highcharts.chart('chart_bni', {
credits: {
        enabled: false
    },
    title: {
        text: 'Market Share BNI',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
    },


    xAxis: {
    categories:categoriesBnidistinct,
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

    legend: {
        align: 'center',
     backgroundColor: '#D9FBFF',
     width: 453,
     padding: 1,
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
        name: bniWilayahdistict[0],
        data: bandungBni,
        color: '#0B3BB6',
    }, {
        name: bniWilayahdistict[1],
        data: cirebonBni,
        color: '#FD961B',
    }, {
        name: bniWilayahdistict[2],
        data: purwakartaBni,
        color: '#708D87',
    }, {
        name: bniWilayahdistict[3],
        data: sukabumiBni,
        color: '#F8E71D',
    }, {
        name: bniWilayahdistict[4],
        data: tasikmalayaBni,
        color: '#1DF6F8',
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
}

function chartMandiri(){
Highcharts.chart('chart_mandiri', {
credits: {
        enabled: false
    },
    title: {
        text: 'Market Share Mandiri',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
    },


    xAxis: {
    categories:categoriesMandiridistinct,
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

    legend: {
        align: 'center',
     backgroundColor: '#D9FBFF',
     width: 453,
     padding: 1,
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
        name: mandiriWilayahdistict[0],
        data: bandungMandiri,
        color: '#0B3BB6',
    }, {
        name: mandiriWilayahdistict[1],
        data: cirebonMandiri,
        color: '#FD961B',
    }, {
        name: mandiriWilayahdistict[2],
        data: purwakartaMandiri,
        color: '#708D87',
    }, {
        name: mandiriWilayahdistict[3],
        data: sukabumiMandiri,
        color: '#F8E71D',
    }, {
        name: mandiriWilayahdistict[4],
        data: tasikmalayaMandiri,
        color: '#1DF6F8',
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
}


</script>