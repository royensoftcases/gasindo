  <?php
  $gettahunNow=$_SESSION['tahun_param'];
  $gettahunBefore=$_SESSION['tahun_param']-1;
 ?>

 <style>
/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 4px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>

  <section class="browse-job">
      <div class="container"  style="padding-top: 40px;">
        <p style="font-size:18px;padding-top: 2%"><b>EKSPOSURE</b></p>
         <div class="modal-body col-lg-12">
                <form action="javascript:PostData()">
                  <div class="row col-lg-4"> 
                    <div class="ui-widget">
                       <label for="search_nasabah">Tracking: </label>
                       <input id="search_nasabah" style="width: 70%">
                   </div>
                  </div>
               <!--     <div class="row col-lg-1"><label>Periode :</label></div> -->
                  <div class="row col-lg-3">
                     <label for="date_periode">Periode: </label>
                     <input type="date" id="date_periode" name="date_periode" placeholder="" required style="width: 70%" />
                   </div>
                   <div class="row col-lg-2">
                    <input type="submit" name="tambah" value="SUBMIT" class="btns-xs btns-primary" style="width: 50%" >
                   </div><br><br>
                <div class="row col-lg-8">
               <div class="forms-group">
                    <div class="row col-lg-3"><label>Nama Nasabah :</label></div>
                    <div class="row col-lg-5">
                     <input type="text" id="nama_nasabah" name="nama_nasabah" placeholder="No Data" style="width: 100%" readonly="true" />
                   </div>
                </div>
              </div><br><br>
              <div class="row col-lg-8">
                <div class="forms-group">
                    <div class="row col-lg-3"><label>Total Eksposure On Risk :</label></div>
                    <div class="row col-lg-5">
                     <input type="text" id="on_risk" name="on_risk" placeholder="No Data" style="width: 100%" readonly="true"/>
                   </div>
                </div>
              </div><br><br>
               <div class="row col-lg-8">
                <div class="forms-group">
                    <div class="row col-lg-3"><label>Total Eksposure Off Risk :</label></div>
                    <div class="row col-lg-5">
                     <input type="text" id="off_risk" name="off_risk" placeholder="No Data" style="width: 100%" readonly="true"/>
                   </div>
                </div>
              </div><br><br>
               <div class="row col-lg-8">
                <div class="forms-group">
                    <div class="row col-lg-3"><label>Riwayat Penjaminan :</label></div>
                    <div class="row col-lg-5">
                     <input type="text" id="riwayat" name="riwayat" placeholder="No Data" style="width: 100%" readonly="true"/>
                   </div>
                </div>
              </div>
        </form>
            </div> 
        <div class="row">
               <div style="padding-top: 1%;padding-left: 1%;padding-right: 1%">
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
  </div>
               <table id="mytable" class="table table-striped table-bordered no-footer" style="width:100%;font-size:10px;height: 0px;">
        <thead>
           <tr>
                            <th>NO.</th>
                            <th>WIL. KERJA</th>
                            <th>PRODUK</th>
                            <th>TGL SP</th>
                            <th>NASABAH</th>
                            <th>PLAFOND</th>
                            <th>TGL JATUH TEMPO</th>
                            <th>PERUNTUKAN</th>
            </tr>
        </thead>
    </table>
</div>
      </div>
                  <div id="note">
                </div>
       <div class="pull-left">
                    <button class="btns-info btns-sm" data-toggle="modal" data-target="#add_new_record_excel" style="font-size: 13px;"><i class="fa fa-save"></i> Place New Order</button>
                </div>
    </div>
    </section>

<div class="modal fade in" id="add_new_record_excel" tabindex="-1" role="modal-dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6 class="modal-title" id="myModalLabel">UPLOAD DATA EXCEL</h6>
            </div>
            <div class="modal-body">

                <form action="index.php/Volume/upload_eksposure" method="post" enctype="multipart/form-data" onsubmit="proses();">
                     <div class="form-group">
                        <div class="row">
                            <div class="col-xs-5">
                               <label>TAHUN</label>
                                 <select id="period_years" name="period_years"class="forms-control" required>
                                    <option value=''>--Select Years--</option>
                                       <?php
                                       for ($year = (int)date('Y'); 2015 <= $year; $year--): ?>
                                         <option value="<?=$year;?>"><?=$year;?></option>
                                       <?php endfor; ?>
                                      </select>
                            </div>
                            <div class="col-xs-7">
                                <label>BULAN</label>
                                <select id="period_month" name="period_month"class="forms-control" required>
                                        <option value=''>--Pilih Bulan--</option>
                                            <option value='01'>January</option>
                                            <option value='02'>February</option>
                                            <option value='03'>March</option>
                                            <option value='04'>April</option>
                                            <option value='05'>May</option>
                                            <option value='06'>June</option>
                                            <option value='07'>July</option>
                                            <option value='08'>August</option>
                                            <option value='09'>September</option>
                                            <option value='10'>October</option>
                                            <option value='11'>November</option>
                                            <option value='12'>December</option>
                                      </select>
                            </div>
                        </div>
                    </div>
                    <div class="forms-group">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>CARI EXCEL <span style="color: #BFC1FF;"><b>(* Maksimal 1 Bulan Periode)</b></span></label>
                                <input type="file" id="file_excel" name="file_excel"  multiple placeholder="Input File Excel" class="forms-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btns btns-default" data-dismiss="modal">BATAL</button>
                        <input type="submit" name="tambah" value="PROSES UPLOAD" class="btns btns-primary"/>
                    </div>

                </form>
            </div>   
        </div>  
    </div>
</div>

<div class="modal fade in" id="modal_proses" role="modal-dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <h7 class="modal-title" id="myModalLabel">DATA EXCEL SEDANG DIPROSES</h7>
            </div>
            <div class="modal-body">
                     <div class="form-group">
                               <label>File excel sedang diupload mohon tunggu</label>
                                <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    </div>
  </div>
                    </div>
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
var dataNasabah=[];
function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}
function getNum(val) {
   val = +val || 0
   return val;
}

 function proses(){
 $("#add_new_record_excel").modal("hide");
 $("#modal_proses").modal("show");
}

 function PostData(search_nasabah,date_periode){
var search_nasabah = document.getElementById("search_nasabah").value ;
var date_periode = document.getElementById("date_periode").value ;
var data;
$.post("index.php/Volume/Pencarian", {
        search_nasabah: search_nasabah,
        date_periode: date_periode,
    }, function (data, status) {
                data = JSON.parse(data);
                $("#nama_nasabah").val(data.nasabah);
                $("#on_risk").val("Rp. "+formatNumber(getNum(parseInt(data.on_risk)))+",-");
                $("#off_risk").val("Rp. "+formatNumber(getNum(parseInt(data.off_risk)))+",-");
                $("#riwayat").val(data.riwayat);
  document.getElementById("note").innerHTML ="<p style='background-color: #FFFACD;'><b>Note</b><br>"+search_nasabah+" Telah dijamin sebanyak "+data.riwayat+" kali sejak tahun "+moment(data.tgl_tempo).format("YYYY")+" dengan total riwayat penjaminan Rp. "+formatNumber(getNum(parseInt(data.total_plafond)))+",-"+" dan penjaminan yang aktif pada tanggal "+moment(date_periode).format("DD MMMM YYYY")+" sebesar Rp. "+formatNumber(getNum(parseInt(data.on_risk)))+",-</p>";
            }
    );
cekTabel();
}
//moment(data).format("MMMM")
Array.prototype.clear = function() {
    this.splice(0, this.length);
};

$( function() {
  $.post("index.php/Volume/GetNasabah", {
    }, function (data, status) {
                var data = JSON.parse(data);
              for (var i = 0; i < data.length; i++) {
      dataNasabah.push(data[i]['nasabah'],);
      }
            }
    );
    $( "#search_nasabah" ).autocomplete({
      source: dataNasabah
    });
  } );

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
       
        var search_nasabah  =document.getElementById("search_nasabah").value ;
        $('#mytable').DataTable({
             searching: false,
             //retrieve: true,
            "bDestroy": true,
            "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 0, 'asc' ]],
           
            "processing": true,
            "serverSide": true,
            "select": true,
          ajax: {
            "url": 'index.php/Volume/dataEksposureFront',
            "type": 'POST',
            "data": {
           nasabahname: search_nasabah,
        },
        },
            "cache": false,
            "dataSrc": "",
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 0
            },
            "columnDefs": [
            
                 {
                    targets: 5,
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
                {"data": 7},
                {"data": 8},
    
               
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
</script>