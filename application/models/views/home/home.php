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
                              <label style="font-size: 10px;" for="februari">February</label>
                              <?php break;
                            case '03' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="maret" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="maret">March</label>
                              <?php break;
                            case '04' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="april" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="april">April</label>
                              <?php break;
                            case '05' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="mei" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="mei">May</label>
                              <?php break;
                            case '06' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="juni" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="juni">June</label>
                              <?php break;
                            case '07' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="juli" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="juli">July</label>
                              <?php break;
                            case '08' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="agustus" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="agustus">August</label>
                              <?php break;
                            case '09' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="september" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="september">September</label>
                              <?php break;
                            case '10' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="oktober" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="oktober">October</label>
                              <?php break;
                            case '11' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="november" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="november">November</label>
                              <?php break;
                            case '12' :?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="desember" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                              <label style="font-size: 10px;" for="desember">December</label>
                              <?php break;
                            default : ?>
                            <input type="checkbox" name="filterBulan" class="checkbox_bulan" id="januari" value="<?php echo $each_bulan['bulan'];?>" checked onclick="cekFilter();"/>
                             <label style="font-size: 10px;" for="januari">January</label>
                          <?php }
                    ?>
                  </li>
                         <?php }?>
                </ul>
              </div>
            </div>
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
              <div class="category-title"><input type="checkbox" id="allFilterWilayah" name="allFilterWilayah" checked><label style="font-size: 11px;" for="allFilterWilayah">Wilayah Kerja</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
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
             
           
          </div>
            <div class="col-md-10 col-sm-9" style="padding-left: 0px;">
       <div>
           <div class="col-md-9 col-sm-9" style="padding-left: 0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_volume" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total_volume" style="height: 270px"></div>
</figure>
        </div>
      </div>
      <div>
           <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left: 0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_ijp" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total_ijp" style="height: 270px"></div>
</figure>
        </div>
      </div>

      <div>
           <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left: 0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_beban" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total_beban" style="height: 270px"></div>
</figure>
        </div>
      </div>
       <div>
           <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left: 0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_kdp" style="height: 270px"></div>
</figure>
        </div>
         <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total_kdp" style="height: 270px"></div>
</figure>
        </div>
      </div>
        <div>
           <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left: 0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_subro" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total_subro" style="height: 270px"></div>
</figure>
        </div>
      </div>
       <div>
           <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left: 0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_piutang" style="height: 252px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total_piutang" style="height: 270px"></div>
</figure>
        </div>
      </div>
      <div>
           <div class="col-md-9 col-sm-9" style="padding-top: 3%;padding-left: 0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pencapaian_laba" style="height: 270px"></div>
</figure>
        </div>
        <div class="col-md-3 col-sm-3" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_pencapaian_total_laba" style="height: 270px"></div>
</figure>
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
$("#allFilterBulan").change(function(){
  $(".checkbox_bulan").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
$("#allFilterWilayah").change(function(){
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
var filterTahun=[];
var filterBulan=[];
var filterWilayah=[];
var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;

var realisasiVolume=[];
var targetVolume=[];
var dataPersenVolume=[];
var tot_realisasi_volume=0;
var tot_target_volume=0;
var categoriesVolume=[];
var pencapaian_total_volume=0;

var realisasiIjp=[];
var targetIjp=[];
var dataPersenIjp=[];
var tot_realisasi_ijp=0;
var tot_target_ijp=0;
var categoriesIjp=[];
var pencapaian_total_ijp=0;

var realisasiBeban=[];
var targetBeban=[];
var dataPersenBeban=[];
var tot_realisasi_beban=0;
var tot_target_beban=0;
var categoriesBeban=[];
var pencapaian_total_beban=0;

var lengkapKdp=[];
var belumlengkapKdp=[];
var lunasKdp=[];
var daluarsaKdp=[];
var categoriesKdp=[];
var tot_lengkapKdp=0;
var tot_belumlengkapKdp=0;
var tot_lunasKdp=0;
var tot_daluarsaKdp=0;
var tot_pencapaian_kdp=0;

var realisasiSubro=[];
var targetSubro=[];
var dataPersenSubro=[];
var tot_realisasi_subro=0;
var tot_target_subro=0;
var categoriesSubro=[];
var pencapaian_total_subro=0;

var realisasiPiutang=[];
var tot_realisasi_piutang=0;
var categoriesPiutang=[];

var realisasiLaba=[];
var targetLaba=[];
var dataPersenLaba=[];
var tot_realisasi_laba=0;
var tot_target_laba=0;
var categoriesLaba=[];
var pencapaian_total_laba=0;

Array.prototype.clear = function() {
    this.splice(0, this.length);
};
  function cekFilter(){
filterTahun.clear();
filterBulan.clear();
filterWilayah.clear();

realisasiVolume.clear();
targetVolume.clear();
dataPersenVolume.clear();
tot_realisasi_volume=0;
tot_target_volume=0;
categoriesVolume.clear();
pencapaian_total_volume=0;

realisasiIjp.clear();
targetIjp.clear();
dataPersenIjp.clear();
tot_realisasi_ijp=0;
tot_target_ijp=0;
categoriesIjp.clear();
pencapaian_total_ijp=0;

realisasiBeban.clear();
targetBeban.clear();
dataPersenBeban.clear();
tot_realisasi_beban=0;
tot_target_beban=0;
categoriesBeban.clear();
pencapaian_total_beban=0;

lengkapKdp.clear();
belumlengkapKdp.clear();
lunasKdp.clear();
daluarsaKdp.clear();
categoriesKdp.clear();
tot_lengkapKdp=0;
tot_belumlengkapKdp=0;
tot_lunasKdp=0;
tot_daluarsaKdp=0;
tot_pencapaian_kdp=0;

realisasiSubro.clear();
targetSubro.clear();
dataPersenSubro.clear();
tot_realisasi_subro=0;
tot_target_subro=0;
categoriesSubro.clear();
pencapaian_total_subro=0;

realisasiPiutang.clear();
tot_realisasi_piutang=0;
categoriesPiutang.clear();

realisasiLaba.clear();
targetLaba.clear();
dataPersenLaba.clear();
tot_realisasi_laba=0;
tot_target_laba=0;
categoriesLaba.clear();
pencapaian_total_laba=0;

  $("input:radio[name=filterTahun]:checked").each(function(){
    filterTahun.push($(this).val());
});
  $("input:checkbox[name=filterBulan]:checked").each(function(){
    filterBulan.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});
  
  if(filterBulan==""||filterWilayah==""){
chartPencapaianVolume();
chartPencapaianTotalVolume();
chartPencapaianIjp();
chartPencapaianTotalIjp();
chartPencapaianBeban();
chartPencapaianTotalBeban();
chartPencapaianKdp();
chartPencapaianTotalKdp();
chartPencapaianSubro();
chartPencapaianTotalSubro();
chartPencapaianPiutang();
chartPencapaianTotalPiutang();
chartPencapaianLaba();
chartPencapaianTotalLaba();
  }

$.post("index.php/Home/PencapaianVolume", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
    },
        function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiVolume.push(getNum(parseInt(data[i]['pokok_kredit_now'])),);
        targetVolume.push(getNum(parseInt(data[i]['volume'])),);
        dataPersenVolume.push(getNum(((parseInt(data[i]['pokok_kredit_now']) / parseInt(data[i]['volume']))*(100)).toFixed(0)),);
        tot_realisasi_volume+=(getNum(parseInt(data[i]['pokok_kredit_now'])));
        tot_target_volume+=(getNum(parseInt(data[i]['volume'])));

        categoriesVolume.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['volume'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['pokok_kredit_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['pokok_kredit_now']) / parseInt(data[i]['volume']))*(100)).toFixed(0))+'%</span>',);
      }
        pencapaian_total_volume=getNum((parseInt(tot_realisasi_volume)/parseInt(tot_target_volume))*(100));
        chartPencapaianVolume();
        chartPencapaianTotalVolume();
      }      
    );
      
$.post("index.php/Home/PencapaianIjp", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
    },
        function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiIjp.push(getNum(parseInt(data[i]['ijp_now'])),);
        targetIjp.push(getNum(parseInt(data[i]['ijp'])),);
        dataPersenIjp.push(getNum(((parseInt(data[i]['ijp_now']) / parseInt(data[i]['ijp']))*(100)).toFixed(0)),);
        tot_realisasi_ijp+=(getNum(parseInt(data[i]['ijp_now'])));
        tot_target_ijp+=(getNum(parseInt(data[i]['ijp'])));

        categoriesIjp.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['ijp'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['ijp_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+getNum(((parseInt(data[i]['ijp_now']) / parseInt(data[i]['ijp']))*(100)).toFixed(0))+'%</span>',);
      }
        pencapaian_total_ijp=getNum((parseInt(tot_realisasi_ijp)/parseInt(tot_target_ijp))*(100));
        chartPencapaianIjp();
        chartPencapaianTotalIjp();
      }      
    );

$.post("index.php/Home/PencapaianBeban", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
    },
        function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiBeban.push(getNum(parseInt(data[i]['beban_now'])),);
        targetBeban.push(getNum(parseInt(data[i]['target'])),);
        dataPersenBeban.push(getNum(((parseInt(data[i]['beban_now']) / parseInt(data[i]['target']))*(100))).toFixed(0),);
        tot_realisasi_beban+=(getNum(parseInt(data[i]['beban_now'])));
        tot_target_beban+=(getNum(parseInt(data[i]['target'])));

        categoriesBeban.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['beban_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+(getNum((parseInt(data[i]['beban_now']) / parseInt(data[i]['target']))*(100))).toFixed(0)+'%</span>',);
      }
        pencapaian_total_beban=getNum((parseInt(tot_realisasi_beban)/parseInt(tot_target_beban)))*(100);
        chartPencapaianBeban();
        chartPencapaianTotalBeban();
      }      
    );

$.post("index.php/Home/PencapaianKdp", {
        filterWilayah: filterWilayah,
    },
        function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        lengkapKdp.push(getNum(parseInt(data[i]['lengkap'])),);
        belumlengkapKdp.push(getNum(parseInt(data[i]['belum_lengkap'])),);
        lunasKdp.push(getNum(parseInt(data[i]['lunas_batal'])),);
        daluarsaKdp.push(getNum(parseInt(data[i]['daluarsa'])),);

        tot_lengkapKdp+=getNum(parseInt(data[i]['lengkap']));
        tot_belumlengkapKdp+=getNum(parseInt(data[i]['belum_lengkap']));
        tot_lunasKdp+=getNum(parseInt(data[i]['lunas_batal']));
        tot_daluarsaKdp+=getNum(parseInt(data[i]['daluarsa']));

        categoriesKdp.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lengkap'])))+'</span>'+' <br>'+'<span style="color: #FCAD05;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['belum_lengkap'])))+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lunas_batal'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #FA8EFF;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['daluarsa'])))+'</span>',);
      }
       tot_pencapaian_kdp=getNum(parseInt(tot_lengkapKdp)+parseInt(tot_belumlengkapKdp)+parseInt(tot_lunasKdp)+parseInt(tot_daluarsaKdp));
        chartPencapaianKdp();
        chartPencapaianTotalKdp();
      }      
    );

$.post("index.php/Home/PencapaianSubro", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
    },
        function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiSubro.push(getNum(parseInt(data[i]['jumlah_subro_now'])),);
        targetSubro.push(getNum(parseInt(data[i]['target'])),);
        dataPersenSubro.push(getNum(((parseInt(data[i]['jumlah_subro_now']) / parseInt(data[i]['target']))*(100))).toFixed(0),);
        tot_realisasi_subro+=(getNum(parseInt(data[i]['jumlah_subro_now'])));
        tot_target_subro+=(getNum(parseInt(data[i]['target'])));

        categoriesSubro.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['jumlah_subro_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+(getNum((parseInt(data[i]['jumlah_subro_now']) / parseInt(data[i]['target']))*(100))).toFixed(0)+'%</span>',);
      }
        pencapaian_total_subro=getNum((parseInt(tot_realisasi_subro)/parseInt(tot_target_subro)))*(100);
        chartPencapaianSubro();
        chartPencapaianTotalSubro();
      }      
    );

$.post("index.php/Home/PencapaianPiutang", {
        filterWilayah: filterWilayah,
    },
        function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiPiutang.push(getNum(parseInt(data[i]['piutang_subro'])),);
        tot_realisasi_piutang+=(getNum(parseInt(data[i]['piutang_subro'])));

        categoriesPiutang.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;;">'+formatNumber(getNum(parseInt(data[i]['piutang_subro'])))+'</span>',);
      }
        chartPencapaianPiutang();
        chartPencapaianTotalPiutang();
      }      
    );

$.post("index.php/Home/PencapaianLaba", {
        filterTahun: filterTahun,
        filterBulan: filterBulan,
        filterWilayah: filterWilayah,
    },
        function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        realisasiLaba.push(getNum(parseInt(data[i]['realisasi_now'])),);
        targetLaba.push(getNum(parseInt(data[i]['target'])),);
        dataPersenLaba.push(getNum(((parseInt(data[i]['realisasi_now']) / parseInt(data[i]['target']))*(100))).toFixed(0),);
        tot_realisasi_laba+=(getNum(parseInt(data[i]['realisasi_now'])));
        tot_target_laba+=(getNum(parseInt(data[i]['target'])));

        categoriesLaba.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['unit_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['target'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['realisasi_now'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+(getNum((parseInt(data[i]['realisasi_now']) / parseInt(data[i]['target'])))*(100)).toFixed(0)+'%</span>',);
      }
        pencapaian_total_laba=getNum((parseInt(tot_realisasi_laba)/parseInt(tot_target_laba)))*(100);
        chartPencapaianLaba();
        chartPencapaianTotalLaba();
      }      
    );
      
  }
  

function chartPencapaianVolume(){
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
    text: 'Pencapaian Volume ',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesVolume,
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
     width: 260,
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
    data: targetVolume,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi ',
    data: realisasiVolume,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: dataPersenVolume,
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianTotalVolume(){
     Highcharts.chart('chart_pencapaian_total_volume', {
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
    text: 'Pencapaian Total Volume ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+pencapaian_total_volume.toFixed(0)+'%</span>'],
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
        data: [pencapaian_total_volume],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

function chartPencapaianIjp(){
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
    text: 'Pencapaian IJP ',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesIjp,
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
     width: 260,
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
    data: targetIjp,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi ',
    data: realisasiIjp,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: dataPersenIjp,
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianTotalIjp(){
     Highcharts.chart('chart_pencapaian_total_ijp', {
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
    text: 'Pencapaian Total IJP ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+pencapaian_total_ijp.toFixed(0)+'%</span>'],
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
        data: [pencapaian_total_ijp],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

 function chartPencapaianBeban(){
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
    text: 'Pencapaian Beban Klaim ',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesBeban,
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
     width: 270,
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
    data: targetBeban,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi ',
    data: realisasiBeban,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: dataPersenBeban,
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianTotalBeban(){
     Highcharts.chart('chart_pencapaian_total_beban', {
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
    text: 'Pencapaian Total Beban Klaim ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+pencapaian_total_beban.toFixed(0)+'%</span>'],
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
        data: [pencapaian_total_beban],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

 function chartPencapaianKdp(){
    Highcharts.chart('chart_pencapaian_kdp', {
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
    text: 'Pencapaian KDP ',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesKdp,
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
     width: 375,
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
    name: 'Lengkap',
    data: lengkapKdp,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Belum Lengkap',
    data: belumlengkapKdp,
    color: '#FCAD05',
  },{
    name: 'Lunas / Batal',
     data: lunasKdp,
     color: '#41A317',
  },{
    name: 'Daluarsa',
     data: daluarsaKdp,
     color: '#FA8EFF',
  }
  ]
});
}

function chartPencapaianTotalKdp(){
     Highcharts.chart('chart_pencapaian_total_kdp', {
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
    text: 'Total Pencapaian KDP',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Total KDP</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+formatNumber(tot_pencapaian_kdp)+'</span>'],
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
    width: 72,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
        }
        
},
  series: [{
        name: 'Total',
        data: [tot_pencapaian_kdp],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

function chartPencapaianSubro(){
    Highcharts.chart('chart_pencapaian_subro', {
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
    text: 'Pencapaian Pendapatan Subrogasi',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesSubro,
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
     width: 260,
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
    data: targetSubro,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi ',
    data: realisasiSubro,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: dataPersenSubro,
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianTotalSubro(){
     Highcharts.chart('chart_pencapaian_total_subro', {
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
    text: 'Pencapaian Total Pendapatan Subrogasi',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+pencapaian_total_subro.toFixed(0)+'%</span>'],
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
        data: [pencapaian_total_subro],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

 function chartPencapaianPiutang(){
    Highcharts.chart('chart_pencapaian_piutang', {
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
    text: 'Pencapaian Piutang Subrogasi',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesPiutang,
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
     width: 72,
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
    name: 'Total',
    data: realisasiPiutang,
    color: 'rgb(124, 181, 236)',

  }
  ]
});
}

function chartPencapaianTotalPiutang(){
     Highcharts.chart('chart_pencapaian_total_piutang', {
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
    text: 'Total Piutang Subrogasi',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Total Piutang</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+formatNumber(tot_realisasi_piutang)+'</span>'],
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
    width: 72,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
        }
        
},
  series: [{
        name: 'Total',
        data: [tot_realisasi_piutang],
        color: 'rgb(124, 181, 236)',

    }]
});
 }

 function chartPencapaianLaba(){
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
    text: 'Pencapaian Laba Rugi',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesLaba,
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
     width: 260,
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
    data: targetLaba,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Realisasi ',
    data: realisasiLaba,
    color: '#FF9516',
  },{
    name: '% Pencapaian',
     data: dataPersenLaba,
     color: '#41A317',
  }
  ]
});
}

function chartPencapaianTotalLaba(){
     Highcharts.chart('chart_pencapaian_total_laba', {
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
    text: 'Pencapaian Total Laba Rugi ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['<span style="font-size:10px;">Pencapaian</span><br><span style="color: rgb(124, 181, 236);font-size:27px;">'+pencapaian_total_laba.toFixed(0)+'%</span>'],
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
        data: [pencapaian_total_laba],
        color: 'rgb(124, 181, 236)',

    }]
});
 }
</script>