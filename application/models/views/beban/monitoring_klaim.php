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
        <div class="col-md-10 col-sm-9"  style="padding-left:0px;">
        <div>
           <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_wilayah" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_jenis" style="height: 310px"></div>
</figure>
        </div>
      </div>


       <div>
           <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_produk" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-6 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_mitra" style="height: 310px"></div>
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
var filterWilayah=[];

var categoriesWilayahBulan=[];
var categoriesWilayahNama=[];
var categoriesBulanWilayahdistinct=[];
var categoriesWilayahdistinct=[];
var categoriesWilayahSeries=[];

var categoriesJenisBulan=[];
var categoriesJenisNama=[];
var categoriesBulanJenisdistinct=[];
var categoriesJenisdistinct=[];
var categoriesJenisSeries=[];

var categoriesProdukBulan=[];
var categoriesProdukNama=[];
var categoriesBulanProdukdistinct=[];
var categoriesProdukdistinct=[];
var categoriesProdukSeries=[];

var categoriesMitraBulan=[];
var categoriesMitraNama=[];
var categoriesBulanMitradistinct=[];
var categoriesMitradistinct=[];
var categoriesMitraSeries=[];


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

Array.prototype.clear = function() {
    this.splice(0, this.length);
};
function cekFilter() {
filterTahun.clear();
filterWilayah.clear();

categoriesWilayahBulan.clear();
categoriesWilayahNama.clear();
categoriesBulanWilayahdistinct.clear();
categoriesWilayahdistinct.clear();
categoriesWilayahSeries.clear();

categoriesJenisBulan.clear();
categoriesJenisNama.clear();
categoriesBulanJenisdistinct.clear();
categoriesJenisdistinct.clear();
categoriesJenisSeries.clear();

categoriesProdukBulan.clear();
categoriesProdukNama.clear();
categoriesBulanProdukdistinct.clear();
categoriesProdukdistinct.clear();
categoriesProdukSeries.clear();

categoriesMitraBulan.clear();
categoriesMitraNama.clear();
categoriesBulanMitradistinct.clear();
categoriesMitradistinct.clear();
categoriesMitraSeries.clear();


chartWilayah();
chartJenis();
chartProduk();
chartMitra();

$("input:radio[name=filterTahun]:checked").each(function(){
    filterTahun.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});

  if(filterTahun==""||filterWilayah==""){
  } 
  $.post("index.php/Beban/monitoringWilayah", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesWilayahBulan.push(data[i]['bulan_singkat'],);
      categoriesWilayahNama.push(data[i]['wilayah_kerja'],);
      categoriesWilayahSeries.push(data[i]['wilayah_kerja']+","+getNum(parseInt(data[i]['jumlah_beban'])),);
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
      chartWilayah();
      }
    );


  $.post("index.php/Beban/monitoringJenis", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesJenisBulan.push(data[i]['bulan_singkat'],);
      categoriesJenisNama.push(data[i]['jenis_produk'],);
      categoriesJenisSeries.push(data[i]['jenis_produk']+","+getNum(parseInt(data[i]['jumlah_beban'])),);
      }
      $.each(categoriesJenisBulan, function(i, el){
          if($.inArray(el, categoriesBulanJenisdistinct) === -1) categoriesBulanJenisdistinct.push(el);
      });
       $.each(categoriesJenisNama, function(i, el){
          if($.inArray(el, categoriesJenisdistinct) === -1) categoriesJenisdistinct.push(el);
      });
       categoriesJenisSeries = categoriesJenisSeries.map(function(o){
        var d = o.split(',').map(function(b){
            return String( b.replace(/(|name:|data:)/g,'') );   
        });
        return {
           name: d[0],
           data: d[1]
        };
      });
      const res = Array.from(categoriesJenisSeries.reduce((m, {name, data}) => 
          m.set(name, [...(m.get(name) || []), parseInt(data)]), new Map
        ), ([name, data]) => ({name, data})
      );
      categoriesJenisSeries=res;
      chartJenis();
      }
    );

  $.post("index.php/Beban/monitoringProduk", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesProdukBulan.push(data[i]['bulan_singkat'],);
      categoriesProdukNama.push(data[i]['produk'],);
      categoriesProdukSeries.push(data[i]['produk']+","+getNum(parseInt(data[i]['jumlah_beban'])),);
      }
      $.each(categoriesProdukBulan, function(i, el){
          if($.inArray(el, categoriesBulanProdukdistinct) === -1) categoriesBulanProdukdistinct.push(el);
      });
       $.each(categoriesProdukNama, function(i, el){
          if($.inArray(el, categoriesProdukdistinct) === -1) categoriesProdukdistinct.push(el);
      });
       categoriesProdukSeries = categoriesProdukSeries.map(function(o){
        var d = o.split(',').map(function(b){
            return String( b.replace(/(|name:|data:)/g,'') );   
        });
        return {
           name: d[0],
           data: d[1]
        };
      });
      const res = Array.from(categoriesProdukSeries.reduce((m, {name, data}) => 
          m.set(name, [...(m.get(name) || []), parseInt(data)]), new Map
        ), ([name, data]) => ({name, data})
      );
      categoriesProdukSeries=res;
      chartProduk();
      }
    );

  $.post("index.php/Beban/monitoringMitra", {
        filterTahun: filterTahun,
        filterWilayah: filterWilayah
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
      categoriesMitraBulan.push(data[i]['bulan_singkat'],);
      categoriesMitraNama.push(data[i]['penerima_jaminan'],);
      categoriesMitraSeries.push(data[i]['penerima_jaminan']+","+getNum(parseInt(data[i]['jumlah_beban'])),);
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
}



function printall(){

    window.open("?page=print_volume&filterBulan="+filterBulan+"&filterWilayah="+filterWilayah+"&filterTipeProduk="+filterTipeProduk+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank+"&totalrku="+tot_volume_pencapaian+"&tot_now_pencapaian="+tot_now_pencapaian+"&tot_before_pencapaian="+tot_before_pencapaian, '_blank');
          }
  
function chartWilayah(){
Highcharts.chart('chart_wilayah', {
credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Klaim Per wilayah',
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
    column: {
      pointPadding: 0.2,
      borderWidth: 0,
      fontSize:'13px'
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

function chartJenis(){
Highcharts.chart('chart_jenis', {
credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Klaim Per Jenis Produk',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
    xAxis: {
    categories:categoriesBulanJenisdistinct,
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
     width: 164,
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
      fontSize:'13px'
    }
  },

    series: 
    categoriesJenisSeries,
    
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

function chartProduk(){
Highcharts.chart('chart_produk', {
credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Klaim Per Produk',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
    xAxis: {
    categories:categoriesBulanProdukdistinct,
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
      fontSize:'13px'
    }
  },

    series: 
    categoriesProdukSeries,
    
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
credits: {
        enabled: false
    },
    title: {
    text: 'Monitoring Klaim Per Mitra',
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
    column: {
      pointPadding: 0.2,
      borderWidth: 0,
      fontSize:'13px'
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


</script>