  <?php
  $gettahunNow=$_SESSION['tahun_param'];
  $gettahunBefore=$_SESSION['tahun_param']-1;
 ?>
  <section class="browse-job">
      <div class="container"  style="padding-top: 40px;">
        <div class="row">
          <div class="sidebar col-md-2 col-sm-3">
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
              <div class="category-title"><input type="checkbox" id="allFilterBulan" name="allFilterBulan" checked><label style="font-size: 11px;" for="allFilterBulan">Bulan</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                         <?php 
                         foreach ($dapat_bulan as $each_bulan) {?>
                          <li>
                    <?php 
                    switch ($each_bulan['bulan'])
                          {
                            case '02' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="februari" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="februari">February</label>
                              <?php break;
                            case '03' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="maret" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="maret">March</label>
                              <?php break;
                            case '04' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="april" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="april">April</label>
                              <?php break;
                            case '05' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="mei" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="mei">May</label>
                              <?php break;
                            case '06' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="juni" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="juni">June</label>
                              <?php break;
                            case '07' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="juli" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="juli">July</label>
                              <?php break;
                            case '08' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="agustus" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="agustus">August</label>
                              <?php break;
                            case '09' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="september" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="september">September</label>
                              <?php break;
                            case '10' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="oktober" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="oktober">October</label>
                              <?php break;
                            case '11' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="november" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="november">November</label>
                              <?php break;
                            case '12' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="desember" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 11px;" for="desember">December</label>
                              <?php break;
                            default : ?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="januari" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
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
                    <label style="font-size: 11px;" for="<?php echo $each_wilayah['wilayah_kerja'];?>"><?php echo $each_wilayah['wilayah_kerja'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
             <div class="category-title"><input type="checkbox" id="allFilterTipe" name="allFilterTipe" checked><label style="font-size: 11px;" for="allFilterTipe">Tipe Produk</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                  <?php 
                       foreach ($dapat_tipe as $each_tipe) {?>
                         <li>
                    <input type="checkbox" name="filterTipeProduk" id="<?php echo $each_tipe['jenis_produk'];?>" value="<?php echo $each_tipe['jenis_produk'];?>" checked class="checkbox_tipe" onclick="cekFilter();"/>
                    <label style="font-size: 9px;" for="<?php echo $each_tipe['jenis_produk'];?>"><?php echo $each_tipe['jenis_produk'];?></label>
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
                    <input type="checkbox" name="filterPerProduk" id="<?php echo $each_produk['produk'];?>" value="<?php echo $each_produk['produk'];?>" checked class="checkbox_produk" onclick="cekFilter();"/>
                    <label style="font-size: 9px;width: calc(100% - 0px);" for="<?php echo $each_produk['produk'];?>"><?php echo $each_produk['produk'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>

           <!--  <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
               <div class="category-title"><input type="checkbox" id="allFilterProduk" name="allFilterProduk" checked><label style="font-size: 13px;" for="allFilterProduk">Produk</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul id="nama_produk" name="nama_produk"></ul>
              </div>
            </div> -->
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;font-size: 11px;">
              <div class="category-title"><input type="checkbox" id="allFilterBank" name="allFilterBank" checked><label style="font-size: 11px;" for="allFilterBank">Bank/Lem.Keuangan</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                    <?php 
                       foreach ($dapat_bank as $each_bank) {?>
                         <li>
                    <input type="checkbox" name="filterBank" id="<?php echo $each_bank['bank'];?>" value="<?php echo $each_bank['bank'];?>" checked class="checkbox_bank" onclick="cekFilter();"/>
                    <label style="font-size: 8px;width: calc(100% - 0px);" for="<?php echo $each_bank['bank'];?>"><?php echo $each_bank['bank'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
          </div>
            <div class="col-md-10 col-sm-9"  style="padding-left:0px;">
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
           <div class="col-md-5 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_wilayah" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-5 col-sm-8" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_pencapaian_produk" style="height: 310px"></div>
</figure>
        </div>
          <div class="col-md-2 col-sm-4" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total" style="height: 310px"></div>
</figure>
        </div>
      </div>

      <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_perproduk" style="height: 310px"></div>
</figure>
        </div>
      </div>



       <div>
           <div class="col-md-10 col-sm-8" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_growth_wilayah" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-2 col-sm-4" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_growth_total" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_growth_produk" style="height: 310px"></div>
</figure>
        </div>
      </div>
       <div>
           <div class="col-md-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_growth_permitra" style="height: 310px"></div>
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
$("#allFilterTipe").change(function(){
  $(".checkbox_tipe").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
$("#allFilterProduk").change(function(){
  $(".checkbox_produk").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
$("#allFilterBank").change(function(){
  $(".checkbox_bank").prop("checked", $(this).prop("checked"));
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
function cekFilter() {
filterBulan.clear();
filterWilayah.clear();
filterTipeProduk.clear();
filterPerProduk.clear();
filterBank.clear();

targetWilayah.clear();
realisasiwilayah.clear();
realisasiBeforewilayah.clear();
categoriesWilayah.clear();
dataPersenWilayah.clear();
categoriesGrotwhWilayah.clear();
dataPersenGrowthWilayah.clear();


targetProduk.clear();
realisasiProduk.clear();
categoriesProduk.clear();
dataPersenProduk.clear();

pencapaian_total=0;
tot_now_pencapaian = 0;
tot_before_pencapaian = 0;
tot_volume_pencapaian = 0;


targetperProduk.clear();
realisasiperProdak.clear();
categoriesperProduk.clear();
dataPersenPerProduk.clear();

growth_total=0;

growthrealisasiProduk.clear();
growthrealisasiProdukBefore.clear();
categoriesGrowthProduk.clear();
dataPersenGrowthProduk.clear();

growthrealisasiMitra.clear();
growthrealisasiMitraBefore.clear();
categoriesGrowthMitra.clear();
dataPersenGrowthMitra.clear();


  $("input:checkbox[name=filterBulan]:checked").each(function(){
    filterBulan.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});
  $("input:checkbox[name=filterTipeProduk]:checked").each(function(){
    filterTipeProduk.push($(this).val());
});
   $("input:checkbox[name=filterPerProduk]:checked").each(function(){
    filterPerProduk.push($(this).val());
});
   $("input:checkbox[name=filterBank]:checked").each(function(){
    filterBank.push($(this).val());
});

  if(filterBulan==""||filterWilayah==""||filterTipeProduk==""||filterPerProduk==""||filterBank==""){
chartPencapaianTotal();
chartPencapaianWilayah();
chartPencapaianProduk();
chartPencapaianPerProduk();
chartPencapaianProduk();
chartGrowthWilayah();
chartGrowthProduk();
chartGrowthTotal();
chartGrowthMitra();
document.getElementById("idtotal_rku").innerHTML="0";
document.getElementById("idrealisasi_now").innerHTML="0";
document.getElementById("idrealisasi_before").innerHTML="0";
  }

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

        categoriesWilayah.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) / parseInt(data[i]['volume']))*(100)).toFixed(0))+'%</span>',);

        categoriesGrotwhWilayah.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) - parseInt(data[i]['pokok_kredit_before']))/ parseInt(data[i]['pokok_kredit_before'])*(100)).toFixed(0))+'%</span>',);
      }
       pencapaian_total=(getNum(parseInt(tot_now_pencapaian))/getNum(parseInt(tot_volume_pencapaian)))*(100);
       growth_total=(getNum(parseInt(tot_now_pencapaian))-getNum(parseInt(tot_before_pencapaian)))/(getNum(parseInt(tot_before_pencapaian)))*(100);
       document.getElementById("idtotal_rku").innerHTML=formatNumber(parseInt(tot_volume_pencapaian)*1000000);
       document.getElementById("idrealisasi_now").innerHTML=formatNumber(parseInt(tot_now_pencapaian)*1000000);
        document.getElementById("idrealisasi_before").innerHTML=formatNumber(parseInt(tot_before_pencapaian)*1000000);
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
        categoriesProduk.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['jenis_produk']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit']) / parseInt(data[i]['volume']))*(100)).toFixed(0))+'%</span>',);
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
        categoriesperProduk.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['produk_total'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit']) / parseInt(data[i]['volume']))*(100)).toFixed(0))+'%</span>',);
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
        categoriesGrowthProduk.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['produk_now'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) - parseInt(data[i]['pokok_kredit_before']))/parseInt(data[i]['pokok_kredit_before'])*(100)).toFixed(0))+'%</span>',);
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
        categoriesGrowthMitra.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['bank'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_before'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(parseInt(getNum(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) - parseInt(data[i]['pokok_kredit_before']))/parseInt(data[i]['pokok_kredit_before'])*(100))).toFixed(0)+'%</span>',);
        }
              chartGrowthMitra();
            }
    );
}

function printall(){

    window.open("?page=print_volume&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTipeProduk="+filterTipeProduk+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank+"&totalrku="+tot_volume_pencapaian+"&tot_now_pencapaian="+tot_now_pencapaian+"&tot_before_pencapaian="+tot_before_pencapaian, '_blank');
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
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
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
    pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:8px">{series.name}: </td>' +
      '<td style="padding:0;font-size:8px"><b>{point.y:,.0f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  legend:{
     align: 'center',
     backgroundColor: '#D9FBFF',
     width: 285,
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
        }
  },
  credits: {
        enabled: false
    },
  title: {
    text: 'Pencapaian Per Jenis Produk '+gettahunNow,
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
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
     width: 285,
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
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: #41A317;font-size:27px;">'+pencapaian_total.toFixed(0)+'%</span>'],
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
      pointPadding: 0.45  ,
      borderWidth: 0
    }
  },
  legend:{
    align: 'center',
     backgroundColor: '#D9FBFF',
    width: 110,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
        }
        
},
  series: [{
        name: '% Pencapaian',
        data: [pencapaian_total],
        color: '#41A317',

    }]
});
    /*chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'PENCAPAIAN TOTAL '+gettahunNow,
        style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
             size:'75%',
             height: '100%',
          }
    },
     series: [{
            name: 'Plot Area',
            colorByPoint: true,
            data: [
               {
            name: '',
            y: pencapaian_total,
            color: '#FF9516',
            style: {
            color: '#000',
            font: 'bold 50px "Trebuchet MS", Verdana, sans-serif'
        }  ,
            dataLabels: {
                enabled: true,
                format: '{point.percentage:.0f} %',
                distance: -57,
                style: {
                  fontSize: "16px",
                  }
            }
        },
               { 
                   name: "",
                   y:(100)-pencapaian_total,
                   "color": '#F7F7F7'
               }
            ],
            size: '65%',
            innerSize: '60%',
            showInLegend:false,
            dataLabels: {
                enabled: false
            }
        }]
});*/
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
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
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
     width: 285,
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
     width: 305,
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
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
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
     width: 305,
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
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Yoy</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+growth_total.toFixed(0)+'%</span>'],
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
    width: 75,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
        }
        
},
  series: [{
        name: '% Yoy',
        data: [growth_total],
        color: 'rgb(124, 181, 236)',

    }]
});
   /* chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
    },
    credits: {
        enabled: false
    },
    title: {
        text: 'YOY '+gettahunNow,
        style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
             size:'75%',
             height: '100%',
          }
    },
     series: [{
            name: 'Plot Area',
            colorByPoint: true,
            data: [
               {
            name: '',
            y: growth_total,
            color: '#3090C7',
            style: {
            color: '#000',
        }  ,
            dataLabels: {
              enabled: true,
              format: '{point.percentage:.0f} %',
                distance: -57,
                style: {
                  fontSize: "16px",
                  }
            }
        },
               { 
                   name: "",
                   y:100-growth_total,
                   "color": '#F7F7F7'
               }
            ],
            size: '65%',
            innerSize: '60%',
            showInLegend:false,
            dataLabels: {
                enabled: false
            }
        }]
});*/
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
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
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
     width: 305,
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