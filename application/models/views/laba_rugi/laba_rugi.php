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

               <div class="category-title"><input type="checkbox" id="allFilterwilayah" name="allFilterwilayah" checked><label style="font-size: 13px;" for="allFilterwilayah">Kantor Cabang</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>

              <div class="filter-list">

                <ul>

                   <?php 

                       foreach ($dapat_wilayah as $each_wilayah) {?>

                         <li>

                    <input type="checkbox" name="filterWilayah" id="<?php echo $each_wilayah['unit_kerja'];?>" value="<?php echo $each_wilayah['unit_kerja'];?>" checked class="checkbox_wilayah" onclick="cekFilter()"/>

                    <label style="font-size: 12px;" for="<?php echo $each_wilayah['unit_kerja'];?>"><?php echo $each_wilayah['unit_kerja'];?></label>

                  </li>

                      <?php };?>

                </ul>

              </div>

            </div>

          </div>

            <div class="col-md-10 col-sm-9" style="padding-left:0px;">

              <div class="col-md-3 col-sm-3">

                    <address style="background-color: #9DDFFF;color: #7D14FF">

                      <span style="color: #9A0000;font-size: 11px;"><b>TOTAL RKU <?php echo $gettahunNow; ?></b></span><br>

                     <span id="idtotal_rku" style="font-size: 12px;">0</span>

                    </address>

                  </div>

                   <div class="col-md-3 col-sm-3">

                     <address style="background-color: #E0C8FF;color: #7D14FF">

                      <span style="color: #9A0000;font-size: 11px;"><b>REALISASI <?php echo $gettahunNow; ?></b></span><br>

                      <span id="idrealisasi_now" style="font-size: 12px;">0</span>

                    </address>

                  </div>

                   <div class="col-md-3 col-sm-3">

                    <address style="background-color: #FFE8A2;color: #7D14FF">

                     <span style="color: #9A0000;font-size: 11px;"><b>REALISASI <?php echo $gettahunBefore; ?></b></span><br>

                     <span id="idrealisasi_before" style="font-size: 12px;">0</span>

                    </address>

                  </div>



                  <div>

           <div class="col-md-10 col-sm-9" style="padding-top: 3%;padding-left:0px;">

                   <figure class="highcharts-figure">

  <div id="chart_pencapaian_wilayah" style="height: 270px"></div>

</figure>

        </div>

        <div class="col-md-2 col-sm-3" style="padding-top: 3%;padding-left:0px;">

                     <figure class="highcharts-figure">

  <div id="chart_pencapaian_sekanwil" style="height: 270px"></div>

</figure>

        </div>

        <div class="col-md-10 col-sm-9" style="padding-top: 3%;padding-left:0px;">

                     <figure class="highcharts-figure">

  <div id="chart_growth_wilayah" style="height: 270px"></div>

</figure>

        </div>

         <div class="col-md-2 col-sm-3" style="padding-top: 3%;padding-left:0px;">

                    <figure class="highcharts-figure">

    <div id="chart_growth_sekanwil" style="height: 270px"></div>

</figure>

        </div> 

      </div>

      <div>      

             <div class="col-md-6 col-sm-12" style="padding-left:0px;">

                       <figure class="highcharts-figure">

      <div id="chart_beban_pemasaran" style="height: 270px;padding-top: 3%;"></div>

    </figure>

            </div>

            <div class="col-md-6 col-sm-12" style="padding-left:0px;">

                       <figure class="highcharts-figure">

      <div id="chart_beban_sosialisasi" style="height: 270px;padding-top: 3%;"></div>

    </figure>

            </div>

            <div class="col-md-6 col-sm-12" style="padding-left:0px;">

                       <figure class="highcharts-figure">

      <div id="chart_beban_perjalanan" style="height: 270px;padding-top: 3%;"></div>

    </figure>

            </div>

            <div class="col-md-6 col-sm-12" style="padding-left:0px;">

                       <figure class="highcharts-figure">

      <div id="chart_beban_promosi" style="height: 270px;padding-top: 3%;"></div>

    </figure>

            </div>

            <div class="col-md-6 col-sm-12" style="padding-left:0px;">

                       <figure class="highcharts-figure">

      <div id="chart_beban_rapat" style="height: 270px;padding-top: 3%;"></div>

    </figure>

            </div>

            <div class="col-md-6 col-sm-12" style="padding-left:0px;">

                       <figure class="highcharts-figure">

      <div id="chart_beban_umum" style="height: 270px;padding-top: 3%;"></div>

    </figure>

            </div>

            <div class="col-md-6 col-sm-12" style="padding-left:0px;">

                       <figure class="highcharts-figure">

      <div id="chart_beban_representasi" style="height: 270px;padding-top: 3%;"></div>

    </figure>

            </div>

    </div>

    <div>

           <div class="col-md-12" style="padding-top: 40px;text-align: center;">

              <button class="btn-blank btn-lg" onClick="var temp = printall();"><i class="fa fa-print"></i> Print res</button>

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

   $(".radio_tahun").each(function(){

 $(this).find("input[type='radio']").first().prop('checked',true);

 cekFilter();

  });

$("#allFilterwilayah").change(function(){

  $(".checkbox_wilayah").prop("checked", $(this).prop("checked"));

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



/*window.onload = function () {

  cekFilter();

  }*/

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

filterTahun.clear();

filterBulan.clear();

filterWilayah.clear();



targetWilayah.clear();

realisasiwilayah.clear();

realisasiBeforewilayah.clear();

categoriesWilayah.clear();

dataPersenWilayah.clear();

categoriesGrotwhWilayah.clear();

dataPersenGrowthWilayah.clear();

categoriesUnitKerja.clear();



pencapaian_target=0;

pencapaian_total= 0;

pencapaian_total_before= 0;

tot_before_pencapaian = 0;

tot_volume_pencapaian = 0;



growthSekanwil=0;

pencapaianSekanwil=0;



realisasiPasar.clear();

targetPasar.clear();

categoriesPasar.clear();



realisasiSosialisasi.clear();

targetSosialisasi.clear();

categoriesSosialisasi.clear();



realisasiPerjalanan.clear();

targetPerjalanan.clear();

categoriesPerjalanan.clear();



realisasiPromosi.clear();

targetPromosi.clear();

categoriesPromosi.clear();



realisasiRapat.clear();

targetRapat.clear();

categoriesRapat.clear();



realisasiUmum.clear();

targetUmum.clear();

categoriesUmum.clear();



realisasiRepresentasi.clear();

targetRepresentasi.clear();

categoriesRepresentasi.clear();



/*$("input:radio[name=filterBulan]:checked").each(function(){

        var myStr = $(this).val();

        var strArray = myStr.split("-");

        for(var i = 0; i < strArray.length; i++){

          if(i%2==0){

            filterBulan.push(strArray[i]);

          }else{

            filterTahun.push(strArray[i]);

          }

        }

});*/

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

chartPencapaianWilayah();

chartPencapaianSekanwil();

chartGrowthWilayah();

chartGrowthSekanwil();

chartPencapaianBebanPemasaran();

chartPencapaianBebanSosialisasi();

chartPencapaianBebanPerjalanan();

chartPencapaianBebanPromosi();

chartPencapaianBebanRapat();

chartPencapaianBebanUmum();

chartPencapaianBebanRepresentasi();

chartPencapaianBebanEbt();



 }

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

        document.getElementById("idtotal_rku").innerHTML=formatNumber(parseInt(pencapaian_target)*1000000);

        document.getElementById("idrealisasi_now").innerHTML=formatNumber(parseInt(pencapaian_total)*1000000);

        document.getElementById("idrealisasi_before").innerHTML=formatNumber(parseInt(pencapaian_total_before)*1000000);

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



function printall(){

    window.open("?page=print_laba_rugi&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTahun="+filterTahun+"&totalrku="+pencapaian_target+"&pencapaian_total="+pencapaian_total+"&pencapaian_total_before="+pencapaian_total_before, '_blank');

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 315,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 315,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

        }

  },

  subtitle: {

    text: ''

  },

  xAxis: {

    categories: ['<span style="font-size:10px;">Growth</span><br><span style="color: #FF9516;font-size:24px;">'+growthSekanwil.toFixed(0)+'%</span>'],

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

    align: 'center',

     backgroundColor: '#D9FBFF',

    width: 90,

     padding: 4,

     align: 'left',

    itemStyle: {

            fontWeight: 'bold',

            fontSize: '10px',

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

        }

  },

  subtitle: {

    text: ''

  },

  xAxis: {

    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: rgb(124, 181, 236);font-size:24px;">'+pencapaianSekanwil.toFixed(0)+'%</span>'],

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

    align: 'center',

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 310,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 310,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 310,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 310,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 310,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 310,

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

            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'

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

     width: 310,

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

