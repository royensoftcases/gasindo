  <?php
  $gettahunNow=$_SESSION['tahun_param'];
  $gettahunBefore=$_SESSION['tahun_param']-1;
 ?>
  <section class="browse-job">
      <div class="container"  style="padding-top: 40px;">
        <div class="row">
          <div class="sidebar col-md-2 col-sm-3">
             <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
              <div class="category-title"><label style="font-size: 11px;">Periode Data</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list radio_tahun">
                <ul>
                   <?php 
                       foreach ($dapat_periode as $each_periode) {?>
                         <li>
                    <input type="radio" name="filterPeriode" id="<?php echo $each_periode['periode_date'];?>" value="<?php echo $each_periode['periode_date'];?>" checked class="checkbox_periode" onclick="cekFilter();"/>
                    <label style="font-size: 11px;" for="<?php echo $each_periode['periode_date'];?>"><?php echo $each_periode['periode_date'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;">
              <div class="category-title"><input type="checkbox" id="allFilterWilayah" name="allFilterWilayah" checked><label style="font-size: 11px;" for="allFilterWilayah">Kantor Cabang</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                   <?php 
                       foreach ($dapat_wilayah as $each_wilayah) {?>
                         <li>
                    <input type="checkbox" name="filterWilayah" id="<?php echo $each_wilayah['wilayah'];?>" value="<?php echo $each_wilayah['wilayah'];?>" checked class="checkbox_wilayah" onclick="cekFilter();"/>
                    <label style="font-size: 11px;" for="<?php echo $each_wilayah['wilayah'];?>"><?php echo $each_wilayah['wilayah'];?></label>
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
                    <label style="font-size: 9px;" for="<?php echo $each_produk['produk'];?>"><?php echo $each_produk['produk'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
            <div class="filters-wrap" style="margin-bottom: 20px;border: #55d3e1 3px solid;font-size: 11px;">
              <div class="category-title"><input type="checkbox" id="allFilterBank" name="allFilterBank" checked><label style="font-size: 11px;" for="allFilterBank">Bank</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                 <?php 
                       foreach ($dapat_bank as $each_bank) {?>
                         <li>
                    <input type="checkbox" name="filterBank" id="<?php echo $each_bank['bank'];?>" value="<?php echo $each_bank['bank'];?>" checked class="checkbox_bank" onclick="cekFilter();"/>
                    <label style="font-size: 8px;" for="<?php echo $each_bank['bank'];?>"><?php echo $each_bank['bank'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
            </div>
          </div>
            <div class="col-md-10 col-sm-9" style="padding-left: 0px;">
              <div class="col-md-2 col-sm-4">
                    <address style="background-color: #9DDFFF;color: #7D14FF">
                      <span style="color: #9A0000;font-size: 11px;"><b>LUNAS/BATAL</b></span><br>
                    <span id="idlunas" style="font-size: 12px;">0</span>
                    </address>
                  </div>
                   <div class="col-md-2 col-sm-4">
                     <address style="background-color: #E0C8FF;color: #7D14FF">
                      <span style="color: #9A0000;font-size: 11px;"><b>DALUARSA</b></span><br>
                      <span id="iddaluarsa" style="font-size: 12px;">0</span>
                    </address>
                  </div>
                   <div class="col-md-2 col-sm-4">
                    <address style="background-color: #FFE8A2;color: #7D14FF">
                     <span style="color: #9A0000;font-size: 11px;"><b>LENGKAP</b></span><br>
                     <span id="idberkaslengkap" style="font-size: 12px;">0</span>
                    </address>
                  </div>
                  <div class="col-md-2 col-sm-4">
                    <address style="background-color: #D9FF8C;color: #7D14FF">
                      <span style="color: #9A0000;font-size: 11px;"><b>BELUM LENGKAP</b></span><br>
                   <span id="idberkasbelumlengkap" style="font-size: 12px;">0</span>
                    </address>
                  </div>
                  <div class="col-md-2 col-sm-4">
                    <address style="background-color: #FFB1B2;color: #7D14FF">
                      <span style="color: #9A0000;font-size: 11px;"><b>TOTAL</b></span><br>
                     <span id="idtotal" style="font-size: 12px;">0</span>
                    </address>
                  </div>
<div>
           <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_wilayah_kerja" style="height: 310px"></div>
</figure>
        </div>
         <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                     <figure class="highcharts-figure">
  <div id="chart_perProduk" style="height: 310px"></div>
</figure>
        </div>
          <div class="col-md-12 col-sm-12" style="padding-top: 3%;padding-left:0px;">
                    <figure class="highcharts-figure">
    <div id="chart_mitra" style="height: 310px"></div>
</figure>
        </div>
      </div>
       <div>
           <div class="col-md-12 col-sm-12" style="padding-top: 40px;text-align: center;">
					    <button style="size: 20px;" class="btn-blank btn-lg" onClick="printall();"><i class="fa fa-print"></i> Print</button>
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
  var getlunas;
  var getdaluarsa;
  var getlengkap;
  var gettidaklengkap;
  var gettotal;
$(document).ready(function(){ 
  $(".radio_tahun").each(function(){
 $(this).find("input[type='radio']").first().prop('checked',true);
 cekFilter();
  });
$("#allFilterPeriode").change(function(){
  $(".checkbox_periode").prop("checked", $(this).prop("checked"));
  cekFilter();
  });
$("#allFilterWilayah").change(function(){
  $(".checkbox_wilayah").prop("checked", $(this).prop("checked"));
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

/*window.onload = function () {
  cekFilter();
  }*/
var filterPeriode=[];
var filterWilayah=[];
var filterPerProduk=[];
var filterBank=[];

var wilayahLengkap=[];
var wilayahBelumLengkap=[];
var wilayahLunasBatal=[];
var wilayahDaluarsa=[];
var wilayahTotalDaluarsa=[];
var wilayahTotalLengkap=[];
var wilayahTotalBelumLengkap=[];
var wilayahTotalLunasBatal=[];
var wilayahTotalJumlah=[];
var categoriesWilayah=[];

var produkLengkap=[];
var produkBelumLengkap=[];
var produkLunasBatal=[];
var produkDaluarsa=[];
var categoriesProduct=[];

var mitraLengkap=[];
var mitraBelumLengkap=[];
var mitraLunasBatal=[];
var mitraDaluarsa=[];
var categoriesMitra=[];

var gettahunNow=<?php echo $gettahunNow; ?>;
var gettahunBefore=<?php echo $gettahunBefore; ?>;


Array.prototype.clear = function() {
    this.splice(0, this.length);
};

function getNum(val) {
   val = +val || 0
   return val;
}

  function cekFilter(){
filterPeriode.clear();
filterWilayah.clear();
filterPerProduk.clear();
filterBank.clear();

wilayahLengkap.clear();
wilayahBelumLengkap.clear();
wilayahLunasBatal.clear();
wilayahDaluarsa.clear();
wilayahTotalDaluarsa.clear();
wilayahTotalLengkap.clear();
wilayahTotalBelumLengkap.clear();
wilayahTotalLunasBatal.clear();
wilayahTotalJumlah.clear();
categoriesWilayah.clear();

produkLengkap.clear();
produkBelumLengkap.clear();
produkLunasBatal.clear();
produkDaluarsa.clear();
categoriesProduct.clear();

mitraLengkap.clear();
mitraBelumLengkap.clear();
mitraLunasBatal.clear();
mitraDaluarsa.clear();
categoriesMitra.clear();


  $("input:radio[name=filterPeriode]:checked").each(function(){
    filterPeriode.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});
  $("input:checkbox[name=filterPerProduk]:checked").each(function(){
    filterPerProduk.push($(this).val());
});
  $("input:checkbox[name=filterBank]:checked").each(function(){
    filterBank.push($(this).val());
});

  if(filterPeriode==""||filterWilayah==""||filterPerProduk==""||filterBank==""){

chartWilayahKerja();
chartPerProduk();
chartMitra();
  }

$.post("index.php/Kdp/WilayahKerja", {
        filterPeriode: filterPeriode,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        wilayahLengkap.push(getNum(parseInt(data[i]['lengkap'])),);
        wilayahBelumLengkap.push(getNum(parseInt(data[i]['belum_lengkap'])),);
        wilayahLunasBatal.push(getNum(parseInt(data[i]['lunas_batal'])),);
        wilayahDaluarsa.push(getNum(parseInt(data[i]['daluarsa'])),);

        total=getNum(parseInt(data[i]['lengkap']))+getNum(parseInt(data[i]['belum_lengkap']))+getNum(parseInt(data[i]['lunas_batal']))+getNum(parseInt(data[i]['daluarsa']));

        categoriesWilayah.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah_wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lengkap'])))+'</span>'+' <br>'+'<span style="color: #FCAD05;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['belum_lengkap'])))+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lunas_batal'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #FF4E74;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['daluarsa'])))+'</span>'+' <br>'+'<span style="color: #7239FF;font-size:9px;">'+formatNumber(total)+'</span>',);
        }
		  getlunas=formatNumber(getNum(parseInt(data[0]['total_lunas_batal'])));
		  getdaluarsa=formatNumber(getNum(parseInt(data[0]['total_daluarsa'])));
		  getlengkap=formatNumber(getNum(parseInt(data[0]['total_lengkap'])));
		  gettidaklengkap=formatNumber(getNum(parseInt(data[0]['total_belum_lengkap'])));
		  gettotal=formatNumber(getNum(parseInt(data[0]['total_jumlah'])));
		  	document.getElementById("idlunas").innerHTML=getlunas;
	        document.getElementById("iddaluarsa").innerHTML=getdaluarsa;
	        document.getElementById("idberkaslengkap").innerHTML=getlengkap;
	        document.getElementById("idberkasbelumlengkap").innerHTML=gettidaklengkap;
	        document.getElementById("idtotal").innerHTML=gettotal;
              chartWilayahKerja();
            }
    );
	
  $.post("index.php/Kdp/PerProduk", {
        filterPeriode: filterPeriode,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        produkLengkap.push(getNum(parseInt(data[i]['lengkap'])),);
        produkBelumLengkap.push(getNum(parseInt(data[i]['belum_lengkap'])),);
        produkLunasBatal.push(getNum(parseInt(data[i]['lunas_batal'])),);
        produkDaluarsa.push(getNum(parseInt(data[i]['daluarsa'])),);
        total=getNum(parseInt(data[i]['lengkap']))+getNum(parseInt(data[i]['belum_lengkap']))+getNum(parseInt(data[i]['lunas_batal']))+getNum(parseInt(data[i]['daluarsa']));

        categoriesProduct.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['produk'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lengkap'])))+'</span>'+' <br>'+'<span style="color: #FCAD05;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['belum_lengkap'])))+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lunas_batal'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #FF4E74;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['daluarsa'])))+'</span>'+' <br>'+'<span style="color: #7239FF;font-size:9px;">'+formatNumber(total)+'</span>',);
        }
              chartPerProduk();
            }
    );

  $.post("index.php/Kdp/Mitra", {
        filterPeriode: filterPeriode,
        filterWilayah: filterWilayah,
        filterPerProduk: filterPerProduk,
        filterBank: filterBank
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        mitraLengkap.push(getNum(parseInt(data[i]['lengkap'])),);
        mitraBelumLengkap.push(getNum(parseInt(data[i]['belum_lengkap'])),);
        mitraLunasBatal.push(getNum(parseInt(data[i]['lunas_batal'])),);
        mitraDaluarsa.push(getNum(parseInt(data[i]['daluarsa'])),);
        total=getNum(parseInt(data[i]['lengkap']))+getNum(parseInt(data[i]['belum_lengkap']))+getNum(parseInt(data[i]['lunas_batal']))+getNum(parseInt(data[i]['daluarsa']));


        categoriesMitra.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['bank'].split(" ").join("<br>")+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lengkap'])))+'</span>'+' <br>'+'<span style="color: #FCAD05;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['belum_lengkap'])))+'</span>'+' <br>'+'<span style="color: #41A317;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['lunas_batal'])))+'</span>'+'</span>'+' <br>'+'<span style="color: #FF4E74;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['daluarsa'])))+'</span>'+' <br>'+'<span style="color: #7239FF;font-size:9px;">'+formatNumber(total)+'</span>',);
        }
              chartMitra();
            }
    );
  }
  
  function printall(){
  	window.open("?page=print_kdp&getlunas="+getlunas+"&getdaluarsa="+getdaluarsa+"&getlengkap="+getlengkap+"&gettidaklengkap="+gettidaklengkap+"&gettotal="+gettotal+"&filterPeriode="+filterPeriode+"&filterWilayah="+filterWilayah+"&filterPerProduk="+filterPerProduk+"&filterBank="+filterBank, '_blank');
          }

function chartWilayahKerja(){
    Highcharts.chart('chart_wilayah_kerja', {
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
    text: 'Per Wilayah Kerja '+gettahunNow,
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
     width: 440,
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
    data: wilayahLengkap,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Belum Lengkap',
    data: wilayahBelumLengkap,
    color: '#FCAD05',
  },{
    name: 'Lunas / Batal',
     data: wilayahLunasBatal,
     color: '#41A317',
  },{
    name: 'Daluarsa',
     data: wilayahDaluarsa,
     color: '#FF4E74',
  },{
    name: 'Total',
     data: '',
     color: '#7239FF',
  }
  ]
});
}

function chartPerProduk(){
    Highcharts.chart('chart_perProduk', {
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
    text: 'Per Produk '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesProduct,
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
     width: 440,
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
    data: produkLengkap,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Belum Lengkap',
    data: produkBelumLengkap,
    color: '#FCAD05',
  },{
    name: 'Lunas / Batal',
     data: produkLunasBatal,
     color: '#41A317',
  },{
    name: 'Daluarsa',
     data: produkDaluarsa,
     color: '#FF4E74',
  },{
    name: 'Total',
     data: '',
     color: '#7239FF',
  }
  ]
});
}

function chartMitra(){
    Highcharts.chart('chart_mitra', {
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
    text: 'Per Mitra '+gettahunNow,
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesMitra,
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
     width: 440,
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
    data: mitraLengkap,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Belum Lengkap',
    data: mitraBelumLengkap,
    color: '#FCAD05',
  },{
    name: 'Lunas / Batal',
     data: mitraLunasBatal,
     color: '#41A317',
  },{
    name: 'Daluarsa',
     data: mitraDaluarsa,
     color: '#FF4E74',
  },{
    name: 'Total',
     data: '',
     color: '#7239FF',
  }
  ]
});
}
</script>