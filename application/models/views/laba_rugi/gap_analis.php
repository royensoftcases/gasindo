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
                    <input type="radio" name="filterTahun" id="<?php echo $each_tahun['tahun'];?>" value="<?php echo $each_tahun['tahun'];?>" checked class="checkbox_tahun" onclick="cekFilter();"/>
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
               <div class="category-title"><input type="checkbox" id="allFilterwilayah" name="allFilterwilayah" checked><label style="font-size: 13px;" for="allFilterwilayah">Kantor Cabang</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                   <?php 
                       foreach ($dapat_wilayah as $each_wilayah) {?>
                         <li>
                    <input type="checkbox" name="filterWilayah" id="<?php echo $each_wilayah['wilayah_kerja'];?>" value="<?php echo $each_wilayah['wilayah_kerja'];?>" checked class="checkbox_wilayah" onclick="cekFilter()"/>
                    <label style="font-size: 12px;" for="<?php echo $each_wilayah['wilayah_kerja'];?>"><?php echo $each_wilayah['wilayah_kerja'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
          </div>
            <div class="col-md-10 col-sm-9" style="padding-left:0px;">
                  <div>
           <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_volume" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_defiasi_volume" style="height: 270px"></div>
</figure>
        </div>

         <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_ijp" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_defiasi_ijp" style="height: 270px"></div>
</figure>
        </div>

        <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_beban" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_defiasi_beban" style="height: 270px"></div>
</figure>
        </div>

        <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_subrogasi" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_defiasi_subrogasi" style="height: 270px"></div>
</figure>
        </div>

        <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_laba" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_defiasi_laba" style="height: 270px"></div>
</figure>
        </div>
       
      </div>
      <div>      
             
    </div>
   <!--  <div>
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

var categoriesPencapaianVolume=[];
var PencapianVolume=[];
var TargetVolume=[];
var DefisiasiVolume=[];

var categoriesPencapaianVolumeDef=[];
var PencapianVolumeDef=[];
var TargetVolumeDef=[];
var DefisiasiVolumeDef=[];

var categoriesPencapaianIjp=[];
var PencapianIjp=[];
var TargetIjp=[];
var DefisiasiIjp=[];

var categoriesPencapaianIjpDef=[];
var PencapianIjpDef=[];
var TargetIjpDef=[];
var DefisiasiIjpDef=[];

var categoriesPencapaianBeban=[];
var PencapianBeban=[];
var TargetBeban=[];
var DefisiasiBeban=[];

var categoriesPencapaianBebanDef=[];
var PencapianBebanDef=[];
var TargetBebanDef=[];
var DefisiasiBebanDef=[];

var categoriesPencapaianSubrogasi=[];
var PencapianSubrogasi=[];
var TargetSubrogasi=[];
var DefisiasiSubrogasi=[];

var categoriesPencapaianSubrogasiDef=[];
var PencapianSubrogasiDef=[];
var TargetSubrogasiDef=[];
var DefisiasiSubrogasiDef=[];

var categoriesPencapaianLaba=[];
var PencapianLaba=[];
var TargetLaba=[];
var DefisiasiLaba=[];

var categoriesPencapaianLabaDef=[];
var PencapianLabaDef=[];
var TargetLabaDef=[];
var DefisiasiLabaDef=[];

var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

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
 $.post("index.php/LabaRugi/getMonthGap", {
        filterTahun: filterTahun,
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
           getbulandata=[data[i]['bulan']];
          getbulan.push("<li><input type='radio' name='filterBulan' class='checkbox_bulan' id='"+data[i]['bulan_nama']+"' value='"+data[i]['bulan']+"' checked onclick='cekFilter();'/> <label style='font-size: 11px;' for='"+data[i]['bulan_nama']+"'>"+data[i]['bulan_nama']+"</label></li>");
      }
      document.getElementById("dapat_bulan").innerHTML=getbulan.toString().replaceAll(',','');
         cekFilter();
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

categoriesPencapaianVolume.clear();
PencapianVolume.clear();
TargetVolume.clear();
DefisiasiVolume.clear();

categoriesPencapaianVolumeDef.clear();
PencapianVolumeDef.clear();
TargetVolumeDef.clear();
DefisiasiVolumeDef.clear();

categoriesPencapaianIjp.clear();
PencapianIjp.clear();
TargetIjp.clear();
DefisiasiIjp.clear();

categoriesPencapaianIjpDef.clear();
PencapianIjpDef.clear();
TargetIjpDef.clear();
DefisiasiIjpDef.clear();

categoriesPencapaianBeban.clear();
PencapianBeban.clear();
TargetBeban.clear();
DefisiasiBeban.clear();

categoriesPencapaianBebanDef.clear();
PencapianBebanDef.clear();
TargetBebanDef.clear();
DefisiasiBebanDef.clear();

categoriesPencapaianSubrogasi.clear();
PencapianSubrogasi.clear();
TargetSubrogasi.clear();
DefisiasiSubrogasi.clear();

categoriesPencapaianSubrogasiDef.clear();
PencapianSubrogasiDef.clear();
TargetSubrogasiDef.clear();
DefisiasiSubrogasiDef.clear();

categoriesPencapaianLaba.clear();
PencapianLaba.clear();
TargetLaba.clear();
DefisiasiLaba.clear();

categoriesPencapaianLabaDef.clear();
PencapianLabaDef.clear();
TargetLabaDef.clear();
DefisiasiLabaDef.clear();


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
chartPencapianVolume();
chartDefiasiVolume();
chartPencapianIjp();
chartDefiasiIjp()
chartPencapianBeban();
chartDefiasiBeban();
chartPencapianSubrogasi();
chartDefiasiSubrogasi();
chartPencapianLaba();
chartDefiasiLaba();
  }

  $.post("index.php/LabaRugi/filterVolumeGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianVolume.push(getNum(parseInt(data[i]['pokok_kredit'])),);
        TargetVolume.push(getNum(parseInt(data[i]['volume'])),);
        DefisiasiVolume.push(getNum(((parseInt(data[i]['pokok_kredit']) - parseInt(data[i]['volume'])))),);
        categoriesPencapaianVolume.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit']) - parseInt(data[i]['volume']))))+'</span>',);
      }
      chartPencapianVolume();
      }
    );

  $.post("index.php/LabaRugi/filterDefVolumeGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianVolumeDef.push(getNum(parseInt(data[i]['pokok_kredit'])),);
        TargetVolumeDef.push(getNum(parseInt(data[i]['volume'])),);
        DefisiasiVolumeDef.push(getNum(((parseInt(data[i]['pokok_kredit']) - parseInt(data[i]['volume'])))),);
        categoriesPencapaianVolumeDef.push('</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit']) - parseInt(data[i]['volume']))))+'</span>',);
      }
      chartDefiasiVolume();
      }
    );

  $.post("index.php/LabaRugi/filterIjpGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianIjp.push(getNum(parseInt(data[i]['ijp'])),);
        TargetIjp.push(getNum(parseInt(data[i]['target_ijp'])),);
        DefisiasiIjp.push(getNum(((parseInt(data[i]['ijp']) - parseInt(data[i]['target_ijp'])))),);
        categoriesPencapaianIjp.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['ijp'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target_ijp'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['ijp']) - parseInt(data[i]['target_ijp']))))+'</span>',);
      }
      chartPencapianIjp();
      }
    );

  $.post("index.php/LabaRugi/filterDefIjpGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianIjpDef.push(getNum(parseInt(data[i]['ijp'])),);
        TargetIjpDef.push(getNum(parseInt(data[i]['target_ijp'])),);
        DefisiasiIjpDef.push(getNum(((parseInt(data[i]['ijp']) - parseInt(data[i]['target_ijp'])))),);
        categoriesPencapaianIjpDef.push('</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['ijp'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target_ijp'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['ijp']) - parseInt(data[i]['target_ijp']))))+'</span>',);
      }
      chartDefiasiIjp();
      }
    );

   $.post("index.php/LabaRugi/filterBebanGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianBeban.push(getNum(parseInt(data[i]['jumlah_beban'])),);
        TargetBeban.push(getNum(parseInt(data[i]['target'])),);
        DefisiasiBeban.push(getNum(((parseInt(data[i]['jumlah_beban']) - parseInt(data[i]['target'])))),);
        categoriesPencapaianBeban.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['jumlah_beban']) - parseInt(data[i]['target']))))+'</span>',);
      }
      chartPencapianBeban();
      }
    );

   $.post("index.php/LabaRugi/filterDefBebanGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianBebanDef.push(getNum(parseInt(data[i]['jumlah_beban'])),);
        TargetBebanDef.push(getNum(parseInt(data[i]['target'])),);
        DefisiasiBebanDef.push(getNum(((parseInt(data[i]['jumlah_beban']) - parseInt(data[i]['target'])))),);
        categoriesPencapaianBebanDef.push('</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_beban'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['jumlah_beban']) - parseInt(data[i]['target']))))+'</span>',);
      }
      chartDefiasiBeban();
      }
    );

   $.post("index.php/LabaRugi/filterSubroGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianSubrogasi.push(getNum(parseInt(data[i]['jumlah_subro'])),);
        TargetSubrogasi.push(getNum(parseInt(data[i]['target'])),);
        DefisiasiSubrogasi.push(getNum(((parseInt(data[i]['jumlah_subro']) - parseInt(data[i]['target'])))),);
        categoriesPencapaianSubrogasi.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_subro'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['jumlah_subro']) - parseInt(data[i]['target']))))+'</span>',);
      }
      chartPencapianSubrogasi();
      }
    );

   $.post("index.php/LabaRugi/filterDefSubroGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianSubrogasiDef.push(getNum(parseInt(data[i]['jumlah_subro'])),);
        TargetSubrogasiDef.push(getNum(parseInt(data[i]['target'])),);
        DefisiasiSubrogasiDef.push(getNum(((parseInt(data[i]['jumlah_subro']) - parseInt(data[i]['target'])))),);
        categoriesPencapaianSubrogasiDef.push('</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_subro'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['jumlah_subro']) - parseInt(data[i]['target']))))+'</span>',);
      }
      chartDefiasiSubrogasi();
      }
    );

   $.post("index.php/LabaRugi/filterLabaGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianLaba.push(getNum(parseInt(data[i]['realisasi'])),);
        TargetLaba.push(getNum(parseInt(data[i]['target'])),);
        DefisiasiLaba.push(getNum(((parseInt(data[i]['realisasi']) - parseInt(data[i]['target'])))),);
        categoriesPencapaianLaba.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['unit_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi']) - parseInt(data[i]['target']))))+'</span>',);
      }
      chartPencapianLaba();
      }
    );

   $.post("index.php/LabaRugi/filterDefLabaGap", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah
    },
           function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        PencapianLabaDef.push(getNum(parseInt(data[i]['realisasi'])),);
        TargetLabaDef.push(getNum(parseInt(data[i]['target'])),);
        DefisiasiLabaDef.push(getNum(((parseInt(data[i]['realisasi']) - parseInt(data[i]['target'])))),);
        categoriesPencapaianLabaDef.push('</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['realisasi']) - parseInt(data[i]['target']))))+'</span>',);
      }
      chartDefiasiLaba();
      }
    );
}




function printall(){

    window.open("?page=print_ijp&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTipeProduk="+filterTipeProduk+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank+"&totalrku="+tot_volume_pencapaian+"&tot_now_pencapaian="+tot_now_pencapaian+"&tot_before_pencapaian="+tot_before_pencapaian, '_blank');
          }
  

function chartPencapianVolume(){
    Highcharts.chart('chart_pencapaian_volume', {
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
    text: 'Defiasi Pencapian Volume',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianVolume,
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
    name: 'Realisasi',
    data: PencapianVolume,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetVolume,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiVolume,
     color: '#41A317',
  }
  ]
});
}

function chartDefiasiVolume(){
    Highcharts.chart('chart_defiasi_volume', {
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
    text: 'Total Defisiasi Pencapian Volume',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianVolumeDef,
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
    name: 'Realisasi',
    data: PencapianVolumeDef,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetVolumeDef,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiVolumeDef,
     color: '#41A317',
  }
  ]
});
}

function chartPencapianIjp(){
    Highcharts.chart('chart_pencapaian_ijp', {
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
    text: 'Defiasi Pencapian IJP',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianIjp,
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
    name: 'Realisasi',
    data: PencapianIjp,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetIjp,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiIjp,
     color: '#41A317',
  }
  ]
});
}

function chartDefiasiIjp(){
    Highcharts.chart('chart_defiasi_ijp', {
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
    text: 'Total Defisiasi Pencapian IJP',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianIjpDef,
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
    name: 'Realisasi',
    data: PencapianIjpDef,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetIjpDef,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiIjpDef,
     color: '#41A317',
  }
  ]
});
}

function chartPencapianBeban(){
    Highcharts.chart('chart_pencapaian_beban', {
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
    text: 'Defiasi Pencapian Klaim',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianBeban,
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
    name: 'Realisasi',
    data: PencapianBeban,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetBeban,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiBeban,
     color: '#41A317',
  }
  ]
});
}

function chartDefiasiBeban(){
    Highcharts.chart('chart_defiasi_beban', {
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
    text: 'Total Defisiasi Pencapian Beban',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianBebanDef,
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
    name: 'Realisasi',
    data: PencapianBebanDef,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetBebanDef,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiBebanDef,
     color: '#41A317',
  }
  ]
});
}

function chartPencapianSubrogasi(){
    Highcharts.chart('chart_pencapaian_subrogasi', {
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
    text: 'Defiasi Pencapian Subrogasi',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianSubrogasi,
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
    name: 'Realisasi',
    data: PencapianSubrogasi,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetSubrogasi,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiSubrogasi,
     color: '#41A317',
  }
  ]
});
}

function chartDefiasiSubrogasi(){
    Highcharts.chart('chart_defiasi_subrogasi', {
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
    text: 'Total Defisiasi Pencapian Subrogasi',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianSubrogasiDef,
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
    name: 'Realisasi',
    data: PencapianSubrogasiDef,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetSubrogasiDef,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiSubrogasiDef,
     color: '#41A317',
  }
  ]
});
}

function chartPencapianLaba(){
    Highcharts.chart('chart_pencapaian_laba', {
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
    text: 'Defiasi Pencapian Laba',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianLaba,
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
    name: 'Realisasi',
    data: PencapianLaba,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetLaba,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiLaba,
     color: '#41A317',
  }
  ]
});
}

function chartDefiasiLaba(){
    Highcharts.chart('chart_defiasi_laba', {
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
    text: 'Total Defisiasi Pencapian Laba',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPencapaianLabaDef,
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
    name: 'Realisasi',
    data: PencapianLabaDef,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Seharusnya',
    data: TargetLabaDef,
    color: '#FF9516',
  },{
    name: 'Defisiasi',
     data: DefisiasiLabaDef,
     color: '#41A317',
  }
  ]
});
}

</script>
