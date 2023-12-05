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
               <div class="panels-body tables-responsive col-md-7 col-sm-7">
                <p style="font-size:14px;">Monitoring Deposito Eksiting</p>
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
  </div>
                <table id="mytable" class="table table-striped table-bordered no-footer" style="width:100%;font-size:8px;height: 0px;">
        <thead>
           <tr>
                            <th>NO.</th>
                            <th>UNIT KERJA</th>
                            <th>MITRA</th>
                            <th>WILAYAH KERJA</th>
                            <th>NO. BILYET</th>
                            <th>TANGGAL TEMPO</th>
                            <th>NOMINAL</th>
                            <th>JENIS DEPOSITO</th>
            </tr>
        </thead>
    </table>
</div>
 <div class="col-md-5 col-sm-5" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_deposito_mitra" style="height: 250px"></div>
</figure>
        </div>
<div class="col-md-5 col-sm-5" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_suku_bunga" style="height: 250px"></div>
</figure>
        </div>
 <div class="col-md-6 col-sm-6" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_deposito_terbesar" style="height: 310px"></div>
</figure>
        </div>
<div class="col-md-6 col-sm-12" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_wilayah" style="height: 310px"></div>
</figure>
        </div>
<div class="col-md-6 col-sm-12" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_mitra" style="height: 310px"></div>
</figure>
        </div>
<div class="col-md-6 col-sm-12" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_depo_bunga" style="height: 310px"></div>
</figure>
        </div>
<div class="col-md-12 col-sm-12" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_unit_kerja" style="height: 510px"></div>
</figure>
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
var filterWilayah=[];

var categoriesMitra=[];
var nominalMitra=[];

var categoriesTerbesar=[];
var nominalTerbesar=[];

var categoriesBunga=[];
var nominalMinBunga=[];
var nominalMaxBunga=[];

var categoriesWilayahBulan=[];
var categoriesWilayahNama=[];
var categoriesBulanWilayahdistinct=[];
var categoriesWilayahdistinct=[];
var categoriesWilayahSeries=[];

var categoriesMitraBulan=[];
var categoriesMitraNama=[];
var categoriesBulanMitradistinct=[];
var categoriesMitradistinct=[];
var categoriesMitraSeries=[];

var categoriesBungaBulan=[];
var categoriesBungaNama=[];
var categoriesBulanBungadistinct=[];
var categoriesBungadistinct=[];
var categoriesBungaSeries=[];

var categoriesUnitBulan=[];
var categoriesUnitNama=[];
var categoriesBulanUnitdistinct=[];
var categoriesUnitdistinct=[];
var categoriesUnitSeries=[];

var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;


$(document).ready(function(){ 
 $("#allFilterTahun").change(function(){
  $(".checkbox_tahun").prop("checked", $(this).prop("checked"));
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

window.onload = function () {
  cekFilter();
  }

function cekTabel(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
       
        var tahun  =filterTahun
        $('#mytable').DataTable({
             searching: false,
             //retrieve: true,
            "bDestroy": true,
            "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 0, 'asc' ]],
            autoWidth: true,
            scrollX: true,
            "processing": true,
            "serverSide": true,
            "select": true,
            "ajax": "index.php/LabaRugi/dataMonitoringDeposito/"+tahun,
            "cache": false,
            "dataSrc": "",
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 0
            },
            "columnDefs": [
            
                 {
                    targets: 6,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
                }

               
                ],
            "lengthMenu": [[10], [10]],
             
            "columns": [
                {"data": 0},
                {"data": 1},
                {"data": 2},
                {"data": 3},
                {"data": 5},
                {"data": 6},
                {"data": 9},
                {"data": 10},
    
               
            ],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
}
Array.prototype.clear = function() {
    this.splice(0, this.length);
};

function cekFilter() {
filterTahun.clear();
filterWilayah.clear();

categoriesMitra.clear();
nominalMitra.clear();

categoriesTerbesar.clear();
nominalTerbesar.clear();

categoriesBunga.clear();
nominalMinBunga.clear();
nominalMaxBunga.clear();

categoriesWilayahBulan.clear();
categoriesWilayahNama.clear();
categoriesBulanWilayahdistinct.clear();
categoriesWilayahdistinct.clear();
categoriesWilayahSeries.clear();

categoriesMitraBulan.clear();
categoriesMitraNama.clear();
categoriesBulanMitradistinct.clear();
categoriesMitradistinct.clear();
categoriesMitraSeries.clear();

categoriesBungaBulan.clear();
categoriesBungaNama.clear();
categoriesBulanBungadistinct.clear();
categoriesBungadistinct.clear();
categoriesBungaSeries.clear();

categoriesUnitBulan.clear();
categoriesUnitNama.clear();
categoriesBulanUnitdistinct.clear();
categoriesUnitdistinct.clear();
categoriesUnitSeries.clear();

  $("input:radio[name=filterTahun]:checked").each(function(){
    filterTahun.push($(this).val());
     // $('#mytable').DataTable().ajax.reload( null, false);
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});

  if(filterTahun==""||filterWilayah==""){
  cekTabel();
  chartDepositoMitra();
  chartDepositoTerbesar();
  chartSukuBunga();
  }
  cekTabel();
   $.post("index.php/LabaRugi/DepositoMitra", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        nominalMitra.push(getNum(parseInt(data[i]['nominal'])),);
        categoriesMitra.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['mitra']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['nominal'])))+'</span>',);
      }
        chartDepositoMitra();
      }
    );

   $.post("index.php/LabaRugi/SukuBunga", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        nominalMinBunga.push(getNum(data[i]['min_bunga']),);
        nominalMaxBunga.push(getNum(data[i]['max_bunga']),);
        categoriesBunga.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['mitra']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+data[i]['max_bunga']+'</span>'+' <br>'+'<span style="color: FF9516;font-size:9px;">'+data[i]['min_bunga']+'</span>',);
      }
        chartSukuBunga();
      }
    );


    $.post("index.php/LabaRugi/DepositoTerbesar", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        nominalTerbesar.push(getNum(parseInt(data[i]['nominal'])),);
        categoriesTerbesar.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['unit_kerja']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['nominal'])))+'</span>',);
      }
        chartDepositoTerbesar();
      }
    );
$.post("index.php/LabaRugi/depoBebanWilayah", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesWilayahBulan.push(data[i]['bulan_singkat'],);
      categoriesWilayahNama.push(data[i]['wilayah_kerja'],);
      categoriesWilayahSeries.push(data[i]['wilayah_kerja']+","+getNum(parseInt(data[i]['nominal'])),);
      }
      $.each(categoriesWilayahBulan, function(i, el){
          if($.inArray(el, categoriesBulanWilayahdistinct) === -1) categoriesBulanWilayahdistinct.push(el);
      });
       $.each(categoriesWilayahNama, function(i, el){
          if($.inArray(el, categoriesWilayahdistinct) === -1) categoriesWilayahdistinct.push(el);
      });
       categoriesWilayahSeries = categoriesWilayahSeries.map(function(o){
        var d = o.split(',').map(function(b){
            return String( b.replace(/(|name:|data:)/g,'') );   
        });
        return {
           name: d[0],
           data: d[1]
        };
      });
      const res = Array.from(categoriesWilayahSeries.reduce((m, {name, data}) => 
          m.set(name, [...(m.get(name) || []), parseInt(data)]), new Map
        ), ([name, data]) => ({name, data})
      );
      categoriesWilayahSeries=res;
      chartBebanKlaim();
      }
    );

$.post("index.php/LabaRugi/depoMitra", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesMitraBulan.push(data[i]['bulan_singkat'],);
      categoriesMitraNama.push(data[i]['mitra'],);
      categoriesMitraSeries.push(data[i]['mitra']+","+getNum(parseInt(data[i]['nominal'])),);
      }
      $.each(categoriesMitraBulan, function(i, el){
          if($.inArray(el, categoriesBulanMitradistinct) === -1) categoriesBulanMitradistinct.push(el);
      });
       $.each(categoriesMitraNama, function(i, el){
          if($.inArray(el, categoriesMitradistinct) === -1) categoriesMitradistinct.push(el);
      });
       categoriesMitraSeries = categoriesMitraSeries.map(function(o){
        var d = o.split(',').map(function(b){
            return String( b.replace(/(|name:|data:)/g,'') );   
        });
        return {
           name: d[0],
           data: d[1]
        };
      });
      const res = Array.from(categoriesMitraSeries.reduce((m, {name, data}) => 
          m.set(name, [...(m.get(name) || []), parseInt(data)]), new Map
        ), ([name, data]) => ({name, data})
      );
      categoriesMitraSeries=res;
      chartMitra();
      }
    );

$.post("index.php/LabaRugi/depoBunga", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesBungaBulan.push(data[i]['bulan_singkat'],);
      categoriesBungaNama.push(data[i]['mitra'],);
      categoriesBungaSeries.push(data[i]['mitra']+","+getNum(parseFloat(data[i]['suku_bunga'])),);
      }
      $.each(categoriesBungaBulan, function(i, el){
          if($.inArray(el, categoriesBulanBungadistinct) === -1) categoriesBulanBungadistinct.push(el);
      });
       $.each(categoriesBungaNama, function(i, el){
          if($.inArray(el, categoriesBungadistinct) === -1) categoriesBungadistinct.push(el);
      });
       categoriesBungaSeries = categoriesBungaSeries.map(function(o){
        var d = o.split(',').map(function(b){
            return String( b.replace(/(|name:|data:)/g,'') );   
        });
        return {
           name: d[0],
           data: d[1]
        };
      });
      const res = Array.from(categoriesBungaSeries.reduce((m, {name, data}) => 
          m.set(name, [...(m.get(name) || []), parseFloat(data)]), new Map
        ), ([name, data]) => ({name, data})
      );
      categoriesBungaSeries=res;
      console.log(categoriesBungaSeries);
      chartBunga();
      }
    );

$.post("index.php/LabaRugi/depoUnitKerja", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesUnitBulan.push(data[i]['bulan_singkat'],);
      categoriesUnitNama.push(data[i]['unit_kerja'],);
      categoriesUnitSeries.push(data[i]['unit_kerja']+","+getNum(parseInt(data[i]['nominal'])),);
      }
      $.each(categoriesUnitBulan, function(i, el){
          if($.inArray(el, categoriesBulanUnitdistinct) === -1) categoriesBulanUnitdistinct.push(el);
      });
       $.each(categoriesUnitNama, function(i, el){
          if($.inArray(el, categoriesUnitdistinct) === -1) categoriesUnitdistinct.push(el);
      });
       categoriesUnitSeries = categoriesUnitSeries.map(function(o){
        var d = o.split(',').map(function(b){
            return String( b.replace(/(|name:|data:)/g,'') );   
        });
        return {
           name: d[0],
           data: d[1]
        };
      });
      const res = Array.from(categoriesUnitSeries.reduce((m, {name, data}) => 
          m.set(name, [...(m.get(name) || []), parseInt(data)]), new Map
        ), ([name, data]) => ({name, data})
      );
      categoriesUnitSeries=res;
      chartUnitKerja();
      }
    );
  
}

function printall(){

    window.open("?page=print_ijp&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTipeProduk="+filterTipeProduk+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank+"&totalrku="+tot_volume_pencapaian+"&tot_now_pencapaian="+tot_now_pencapaian+"&tot_before_pencapaian="+tot_before_pencapaian, '_blank');
          }
  

function chartDepositoMitra(){
    Highcharts.chart('chart_deposito_mitra', {
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
    text: 'Deposito Per Mitra',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories:categoriesMitra,
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
     width: 95,
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
    name: 'Nominal',
    data: nominalMitra,
    color: 'rgb(124, 181, 236)',

  }
  ]
});
}


 function chartSukuBunga(){
     Highcharts.chart('chart_suku_bunga', {
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
    text: 'Suku Bunga ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesBunga,
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
    valueDecimals: 2,
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
     width: 235,
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
    name: 'Suku Bunga Max',
    data: nominalMaxBunga,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Suku Bunga Min',
    data: nominalMinBunga,
    color: '#FF9516',
  }
  ]
});
 }


function chartDepositoTerbesar(){
     Highcharts.chart('chart_deposito_terbesar', {
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
    text: '5 Deposito Terbesar ',
     style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories:categoriesTerbesar,
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
     width: 95,
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
    name: 'Nominal',
    data: nominalTerbesar,
    color: '#FF9516',

  }
  ]
});
 }

function chartBebanKlaim(){
Highcharts.chart('chart_wilayah', {
credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Deposito Per Cabang',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
    xAxis: {
    categories:categoriesBulanWilayahdistinct,
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
        line: {
            dataLabels: {
                enabled: false
            },
        }
    },

    series: 
    categoriesWilayahSeries,
    
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

function chartMitra(){
Highcharts.chart('chart_mitra', {
     chart: {
        type: 'line'
    },
credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Deposito Per Mitra',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
    xAxis: {
    categories:categoriesBulanMitradistinct,
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
        line: {
            dataLabels: {
                enabled: false
            },
        }
    },

    series: 
    categoriesMitraSeries,
    
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

function chartBunga(){
Highcharts.chart('chart_depo_bunga', {
  chart: {
        type: 'line'
    },
    credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Deposito Bunga Per bank',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
    xAxis: {
        categories:categoriesBulanBungadistinct,
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
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false,
            
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

     series: 
    categoriesBungaSeries,
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

function chartUnitKerja(){
Highcharts.chart('chart_unit_kerja', {
credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Deposito Per Unit Kerja',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
    xAxis: {
    categories:categoriesBulanUnitdistinct,
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
        line: {
            dataLabels: {
                enabled: false
            },
        }
    },

    series: 
    categoriesUnitSeries,
    
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