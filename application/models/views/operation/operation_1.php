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
              <div class="category-title"><label style="font-size: 11px;">Unit Kerja</label><a href="javascript:void(0);" class="expand pull-right"><i class="fa fa-minus"></i></a> </div>
              <div class="filter-list">
                <ul>
                   <?php 
                       foreach ($dapat_wilayah as $each_wilayah) {?>
                         <li>
                    <input type="radio" name="filterWilayah" id="<?php echo $each_wilayah['unit_kerja'];?>" value="<?php echo $each_wilayah['unit_kerja'];?>" checked class="checkbox_wilayah" onclick="cekFilter();"/>
                    <label style="font-size: 10px;" for="<?php echo $each_wilayah['unit_kerja'];?>"><?php echo $each_wilayah['unit_kerja'];?></label>
                  </li>
                      <?php };?>
                </ul>
              </div>
              

            </div>
             
           
          </div>
      
<div class="col-md-10 col-sm-10" style="padding-left:0px;">
               <div class="panels-body tables-responsive col-md-12 col-sm-12">
                <p style="font-size:14px;">Monitoring Cash Flow</p>

                    <p><button class="btns-info btns-sm" data-toggle="modal" data-target="#add_new_cash_flow" style="font-size: 13px;"><i class="fa fa-save"></i> Place New Order</button></p>
 
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
  </div>
                <table id="tbl_cash_flow" class="table table-striped table-bordered" style="width:100%;font-size:8px;height: 0px;">
        <thead>
           <tr>
                            <th>NO.</th>
                            <th>TANGGAL</th>
                            <th>UNIT KERJA</th>
                            <th>KETERANGAN</th>
                            <th>CASH OUT</th>
                            <th>CASH IN</th>
                            <th>SALDO</th>
                            <th>ACTION</th>
            </tr>
        </thead>
        <tfoot align="center">
    <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
  </tfoot>
    </table>
</div>
 <div class="col-md-6 col-sm-6" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_cash_flow" style="height: 260px"></div>
</figure>
        </div>
<div class="col-md-6 col-sm-6" style="padding-top: 1%;padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_saldo_cash" style="height: 250px"></div>
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

<div class="modal fade" id="add_new_cash_flow" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">NEW DATA CASH FLOW</h4>
            </div>
             <div class="modal-body">
                <form action="javascript:SaveNewCash()">
                 <div class="form-group">
                    <label>Unit Kerja <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="unit_kerja" class="forms-control" required name="unit_kerja"> 
                       <option selected="selected" value="">Unit Kerja</option>
                       <option value='Bandung'>Bandung</option>
                       <option value='Cirebon'>Cirebon</option>
                       <option value='Purwakarta'>Purwakarta</option>
                       <option value='Sukabumi'>Sukabumi</option>
                       <option value='Tasikmalaya'>Tasikmalaya</option>
                       </select>
                </div>
                 <div class="form-group">
                    <label>Tipe Transaksi <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="tipe" class="forms-control" required name="tipe"> 
                       <option selected="selected" value="">Tipe Transaksi</option>
                       <option value='in'>Cash In</option>
                       <option value='out'>Cash Out</option>
                       </select>
                </div>
                <div class="forms-group">
                    <label>Keterangan <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="forms-control" required/>
                </div>
                 <div class="forms-group">
                    <label>Tanggal <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="date" id="tanggal" name="tanggal" placeholder="Date" class="forms-control" required/>
                </div>
                <div class="forms-group">
                    <label>Nominal <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="nominal" name="nominal" placeholder="Nominal" class="forms-control" required onkeypress='validate(event)'/>
                </div>
                <div class="modal-footer">
                <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
                <input type="submit" name="tambah" value="SUBMIT" class="btns btns-primary" >
            </div>
        </form>
            </div>  
     </div>
    </div>
    </div>

   <div class="modal fade" id="edit_cash" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">EDIT DATA CASH FLOW</h4>
            </div>
            <div class="modal-body">
                <form action="javascript:SaveEditCash()">
               <div class="form-group">
                    <label>Unit Kerja <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                    <input type="text" id="unit_kerja_edit" name="unit_kerja_edit" placeholder="Unit Kerja" class="forms-control" readonly="true" />
                </div>
                 <div class="form-group">
                    <label>Tipe Transaksi <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="tipe_edit" name="tipe_edit" placeholder="Tipe" class="forms-control" readonly="true" />
                </div>
                <div class="forms-group">
                    <label>Keterangan <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="keterangan_edit" name="keterangan_edit" placeholder="Keterangan" class="forms-control" required/>
                </div>
                 <div class="forms-group">
                    <label>Tanggal <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="date" id="tanggal_edit" name="tanggal_edit" placeholder="Date" class="forms-control" readonly="true" />
                </div>
                <div class="forms-group">
                    <label>Nominal <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="nominal_edit" name="nominal_edit" placeholder="Nominal" class="forms-control" required onkeypress='validate(event)'/>
                </div>
                <input type="hidden" id="id_edit_cash" name="id_edit_cash"/>
                    <div class="modal-footer">
                        <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
                        <input type="submit" name="tambah" value="SUBMIT" class="btns btns-primary" >
                    </div>
                </form>
            </div>   
        </div>  
    </div>
</div>

    <div class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal_message">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div id='dialog-header' class='modals-header'></div>
      <div class="modal-body" id="dialog-message">
      </div>
      <div class="modal-footer">
        <button type="button" class="btns btns-primary btn-minier" id="modal-btn-si" data-dismiss="modal" autofocus="true" onclick="reload_table();reload_page();">OK</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_message_cash">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class='modals-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Delete Data Cash Flow?</h4></div>
      <div class="modal-body">
         <div class="alert alert-info bigger-110">
                                                These items will be permanently deleted and cannot be recovered.
                                            </div>

                                            <div class="space-6"></div>

                                            <p class="bigger-110 bolder center grey">
                                                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                                                Are you sure?
                                            </p>
      </div>
      <div class="modal-footer">
         <input type="hidden" id="id_delete_cash" name="id_delete_cash"/>
         <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
         <button type="button" class="btns btns-danger" onclick="SaveDeleteCash();">DELETE</button>
      </div>
    </div>
  </div>
</div>

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

var cashin=[];
var casout=[];
var categoriescash=[];

var saldo=[];
var categoriessaldo=[];

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


function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\-/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

window.onload = function () {
  cekBulantahun();
  }
function reload_page(){
location.reload(true);
}
  function cekBulantahun(){
  filterTahun.clear();
  filterBulan.clear();
  filterWilayah.clear();
  getbulan.clear();
  getbulandata.clear();

 $("input:radio[name=filterTahun]:checked").each(function(){
    filterTahun.push($(this).val());
});
  $("input:checkbox[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});
 $.post("index.php/Operation/getMonth", {
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

  $("input:radio[name=filterTahun]:checked").each(function(){
    filterTahun.push($(this).val());
});
  $("input:radio[name=filterBulan]:checked").each(function(){
    filterBulan.push($(this).val());
});
  $("input:radio[name=filterWilayah]:checked").each(function(){
    filterWilayah.push($(this).val());
});
  cekTabel();
  GetChart();
}

  function SaveNewCash(unit_kerja,tipe,keterangan,tanggal,nominal){
var unit_kerja = document.getElementById("unit_kerja").value ;
var tipe = document.getElementById("tipe").value ;
var keterangan = document.getElementById("keterangan").value ;
var tanggal = document.getElementById("tanggal").value ;
var nominal = document.getElementById("nominal").value ;
 $("#add_new_cash_flow").modal("hide");
$.post("index.php/Operation/addCash", {
        unit_kerja: unit_kerja,
        tipe: tipe,
        keterangan: keterangan,
        tanggal: tanggal,
        nominal: nominal
    },
            function (data, status) {
                if(data=='1'){
                    $("#modal_message").modal("show");
                  var header_message=document.getElementById("dialog-header");
                    header_message.innerHTML="<h4 class='smaller'><i class='ace-icon fa fa-envelope'></i> Saving Mesage</h4>";
                 var isi_message=document.getElementById("dialog-message");
        isi_message.innerHTML="<div class='form-group'><div class='alert alert-info bigger-110 form-group'><p class='bigger-110 bolder center grey'><i class='ace-icon fa fa-thumbs-o-up blue bigger-120'></i> <b>Success Saving Data !</b></p></div></div><div class='form-group'></div>";
                }else{
                    $("#modal_message").modal("show");
                  var header_message=document.getElementById("dialog-header");
                    header_message.innerHTML="<h5 class='smaller'><i class='ace-icon fa fa-envelope red'></i> Failed Mesage</h5>";
                 var isi_message=document.getElementById("dialog-message");
        isi_message.innerHTML="<div class='forms-group'><div class='alert alert-info bigger-110 forms-group'><p class='bigger-110 bolder center grey'><i class='ace-icon fa fa-exclamation-triangle red bigger-120'></i> <b class='red'>Failed Saving Data !</b></p></div></div><div class='forms-group'></div>";
                }
            }
    );
}

function GetEditCash(id) {
    $.post("index.php/Operation/dataCash", {
        id: id
    },
            function (data, status) {
                var data = JSON.parse(data);
                $("#id_edit_cash").val(data.id);
                $("#unit_kerja_edit").val(data.unit_kerja);
                $("#tanggal_edit").val(data.tanggal);
                $("#keterangan_edit").val(data.keterangan);
                if(data.cash_out=='0'){
                $("#tipe_edit").val('Cash In');
                $("#nominal_edit").val(data.cash_in);
                }else{
                $("#tipe_edit").val('Cash Out');
                $("#nominal_edit").val(data.cash_out);
                }
            }
    );
    $("#edit_cash").modal("show");
}
function SaveEditCash() {
var id = document.getElementById("id_edit_cash").value ;
var tanggal = document.getElementById("tanggal_edit").value ;
var unit_kerja = document.getElementById("unit_kerja_edit").value ;
var keterangan = document.getElementById("keterangan_edit").value ;
var tipe = document.getElementById("tipe_edit").value ;
var nominal = document.getElementById("nominal_edit").value ;
 $("#edit_cash").modal("hide");
   $.post("index.php/Operation/editCash", {
        id: id,
        tanggal: tanggal,
        unit_kerja: unit_kerja,
        keterangan: keterangan,
        tipe: tipe,
        nominal: nominal
    },
             function (data, status) {
                if(data=='1'){
                    $("#modal_message").modal("show");
                  var header_message=document.getElementById("dialog-header");
                    header_message.innerHTML="<h4 class='smaller'><i class='ace-icon fa fa-envelope'></i> Saving Mesage</h4>";
                 var isi_message=document.getElementById("dialog-message");
        isi_message.innerHTML="<div class='form-group'><div class='alert alert-info bigger-110 form-group'><p class='bigger-110 bolder center grey'><i class='ace-icon fa fa-thumbs-o-up blue bigger-120'></i> <b>Success Update Data !</b></p></div></div><div class='form-group'></div>";
                }else{
                    $("#modal_message").modal("show");
                  var header_message=document.getElementById("dialog-header");
                    header_message.innerHTML="<h5 class='smaller'><i class='ace-icon fa fa-envelope red'></i> Failed Mesage</h5>";
                 var isi_message=document.getElementById("dialog-message");
        isi_message.innerHTML="<div class='forms-group'><div class='alert alert-info bigger-110 forms-group'><p class='bigger-110 bolder center grey'><i class='ace-icon fa fa-exclamation-triangle red bigger-120'></i> <b class='red'>Failed Update Data !</b></p></div></div><div class='forms-group'></div>";
                }
            }
    );
}
function DeleteCash(id) {
    $("#delete_message_cash").modal("show");
     $("#id_delete_cash").val(id);
}

function SaveDeleteCash() {
var id = document.getElementById("id_delete_cash").value ;
 $("#delete_message_cash").modal("hide");
  $.post("index.php/Operation/deleteCash", {
    id: id,
    },
            function (data, status) {
        $("#modal_message").modal("show");
        var header_message=document.getElementById("dialog-header");
        header_message.innerHTML="<h4 class='smaller'><i class='ace-icon fa fa-envelope'></i> Delete Mesage</h4>";
        var isi_message=document.getElementById("dialog-message");
        isi_message.innerHTML="<div class='form-group'><div class='alert alert-info bigger-110 form-group'><p class='bigger-110 bolder center grey'><i class='ace-icon fa fa-thumbs-o-up blue bigger-120'></i> <b>Success Delete Data Cash Flow!</b></p></div></div><div class='form-group'></div>";

       }
    );
}


function reload_table(){
        $('#tbl_cash_flow').DataTable().ajax.reload( null, false);
                $("#unit_kerja").val("");
                $("#tipe").val("");
                $("#keterangan").val("");
                $("#tanggal").val("");
                $("#nominal").val("");
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
       
        var tahun  =filterTahun;
        var bulan  =filterBulan;
        var wilayah  =filterWilayah;
  var table= $('#tbl_cash_flow');
  var maxValue=[];
  //table.rows().count();
        table.DataTable({
             searching: false,
             //retrieve: true,
            "bDestroy": true,
            "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order:false,
            autoWidth: true,
            scrollX: true,
            "processing": true,
            "serverSide": true,
            "select": true,
            "ajax": "index.php/Operation/dataCashFlow/"+tahun+"/"+bulan+"/"+wilayah,
            "cache": false,
            "dataSrc": "",
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 1
            },
            "columnDefs": [
               {
                    targets: 0, "orderable": false,
                },
                {
                    targets: 1, "orderable": false,
                },
                {
                    targets: 2, "orderable": false,
                },
                {
                    targets: 3, "orderable": false,
                },
                 {
                    targets: 4,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  ), "orderable": false
                },
                {
                    targets: 5,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  ), "orderable": false
                },
                {
                    targets: 6,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  ), "orderable": false
                },
                 {
                    targets: 7, "orderable": false,
                },

                ],
            "lengthMenu": [[10], [10]],
             
            "columns": [
                {"data": 0},
                {"data": 6},
                {"data": 1},
                {"data": 2},
                {"data": 3},
                {"data": 4},
                {"data": 5},
                {"data":{},
                    "render": function (data, type, row) {
                      if(data[7]==data[8]){
                      return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEditCash(\'' + data[0] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"></i></button>&nbsp;<button class="btns btns-danger btns-xs" style="border-width:2px" data-toggle="modal" onclick="DeleteCash(\'' + data[0] +'\')" title="DELETE DATA">&nbsp;<i class="menu-icon fa fa-trash-o"></i>&nbsp;</button>';
                      }else{
                      return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEditCash(\'' + data[0] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"></i></button>';
                      }
                    }

                },        
            ],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            },"footerCallback": function (row, data, iDisplayIndex) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result    
        var outTotal = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
        
       var inTotal = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
        
            // Update footer by showing the total with the reference of the column index 
      $( api.column( 0 ).footer() ).html('Total');
      //render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
            $( api.column( 4 ).footer() ).html(formatNumber(outTotal));
            $( api.column( 5 ).footer() ).html(formatNumber(inTotal));
            $( api.column( 6 ).footer() ).html(formatNumber(inTotal-outTotal));
        },
        });
}
function GetChart(){
cashin.clear();
casout.clear();
categoriescash.clear();
saldo.clear();
categoriessaldo.clear();
$.post("index.php/Operation/GetCashFlow", {
        filterBulan: filterBulan,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        cashin.push(parseInt(data[i]['cash_in']),);
        casout.push(parseInt(data[i]['cash_out']),);
        categoriescash.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['cash_in'])))+'</span>'+' <br>'+'<span style="color: #FF9516;font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['cash_out'])))+'</span>'+'</span>',);
      }
        chartCashFlow();
      }
    );

$.post("index.php/Operation/GetSaldoCash", {
        filterBulan: filterBulan,
        filterTahun: filterTahun
    },
            function (data, status) {
         var data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
        saldo.push(parseInt(data[i]['saldo']),);
        categoriessaldo.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['wilayah']+'</span>'+' <br>'+'<span style="color: rgb(124, 181, 236);font-size:9px;">'+formatNumber(getNum(parseInt(data[i]['saldo'])))+'</span>',);
      }
        chartSaldoCash();
      }
    );
}

function chartCashFlow(){
    Highcharts.chart('chart_cash_flow', {
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
     text: 'Cash Flow ',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriescash,
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
     width: 180,
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
    name: 'Cash In',
    data: cashin,
    color: 'rgb(124, 181, 236)',

  }, {
    name: 'Cash Out ',
    data: casout,
    color: '#FF9516',
  }
  ]
});
}

function chartSaldoCash(){
    Highcharts.chart('chart_saldo_cash', {
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
     text: 'Saldo Cash Flow ',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriessaldo,
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
     width: 90,
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
    name: 'Saldo',
    data: saldo,
    color: 'rgb(552, 181, 236)',

  }
  ]
});
}

</script>