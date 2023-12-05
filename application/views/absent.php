
<div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-list-alt home-icon"></i>
                <a href="#">List </a>
              </li>
              <li class="active">Absent</li>
            </ul><!-- /.breadcrumb -->
          </div>
        <div class="page-content">

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <section class="browse-jobs">
         <div class="container">
            <div class="row justify-content-center">
                <br>
                <br>
                <h5 class="text-center" style="color: red">List Absent</h5>
            </div>
        </div>
        <br>
        <div class="col-md-12">
                <div class="pull-left">
                    <button class="btns-success btns-sm" data-toggle="modal" data-target="#add_new_record_user" style="font-size: 13px;"><i class="fa fa-plus"></i> ADD NEW DATA</button>
                </div>
            </div>
            <br>
             <br>
         <div class="panels-body tables-responsive">
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
  </div>
                <table id="example" class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%">
        <thead>
           <tr>  
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Employee Name</th>
                            <th>Tanggal Cuti</th>
                            <th>Lama Cuti</th>
                            <th>Keterangan</th>
                            <th style="width: 10%">Action</th>
            </tr>
        </thead>
    </table>
</div>
    </section>

 <div class="modal fade" id="add_new_record_user" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ADD NEW DATA</h4>
            </div>
             <div class="modal-body">
               <div class="forms-group">
                <table id="employee" class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%">
                  <thead>
                     <tr>  
                                      <th>No.</th>
                                      <th>NIP</th>
                                      <th>Employee Name</th>
                                      <th style="width: 2%"></th>
                      </tr>
                  </thead>
              </table>
                </div>
                  
                <div class="modal-footer">
                <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
            </div>
            </div>  
     </div>
    </div>
    </div>

 <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ADD NEW DATA</h4>
            </div>
             <div class="modal-body">
                <form action="javascript:SaveNew()">
               <div class="forms-group">
                    <label>NIP</label>
                     <input type="text" id="nip" name="nip" placeholder="NIP" class="forms-control" readonly/>
                </div>
                  <div class="forms-group">
                    <label>Employee Name </label>
                    <input type="text" id="nama" name="nama" placeholder="Employee Name" class="forms-control" readonly/>
                </div>
                <div class="forms-group">
                    <label>Tanggal Cuti</label>
                     <input type="date" id="tgl" name="tgl" placeholder="Tanggal Cuti" class="forms-control" required/>
                </div>
                <div class="forms-group">
                    <label>Lama Cuti</label>
                     <input type="number" id="lama" name="lama" placeholder="Lama Cuti" class="forms-control" required/>
                </div>

                <div class="forms-group">
                    <label>Keterangan </label>
                    <input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="forms-control" required/>
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
    <div class="modal fade" id="edit_record_modal" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">EDIT DATA</h4>
            </div>
            <div class="modal-body">
                <form action="javascript:SaveEdit()">
        <div class="forms-group">
                    <label>NIP</label>
                     <input type="text" id="nip_edit" name="nip_edit" placeholder="NIP" class="forms-control" readonly/>
                </div>
                  <div class="forms-group">
                    <label>Employee Name </label>
                    <input type="text" id="nama_edit" name="nama_edit" placeholder="Employee Name" class="forms-control" readonly/>
                </div>
                <div class="forms-group">
                    <label>Tanggal Cuti</label>
                     <input type="date" id="tgl_edit" name="tgl_edit" placeholder="Tanggal Cuti" class="forms-control" required/>
                </div>
                <div class="forms-group">
                    <label>Lama Cuti</label>
                     <input type="number" id="lama_edit" name="lama_edit" placeholder="Lama Cuti" class="forms-control" readonly/>
                </div>

                <div class="forms-group">
                    <label>Keterangan </label>
                    <input type="text" id="keterangan_edit" name="keterangan_edit" placeholder="Keterangan" class="forms-control" required/>
                </div>
                <input type="hidden" id="id_edit" name="id_edit"/>
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
        <button type="button" class="btns btns-primary btn-minier" id="modal-btn-si" data-dismiss="modal" autofocus="true" onclick="reload_table();">OK</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_message">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class='modals-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Delete Data?</h4></div>
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
         <input type="hidden" id="id_delete" name="id_delete"/>
         <input type="hidden" id="id_log" name="id_log"/>
         <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
         <button type="button" class="btns btns-danger" onclick="SaveDelete();">DELETE</button>
      </div>
    </div>
  </div>
</div>
                
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
</div><!-- /.main-content -->
<script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>

    <script>
        function SaveNew(nip,tgl,lama,keterangan){
var nip = document.getElementById("nip").value ;
var tgl = document.getElementById("tgl").value ;
var lama = document.getElementById("lama").value ;
var keterangan = document.getElementById("keterangan").value ;
 $('#add_new_record_modal').modal('hide');
$.post("index.php/Crud/addAbsent", {
        nip: nip,
        tgl: tgl,
        lama: lama,
        keterangan: keterangan,
    },
            function (data, status) {
        data
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

function GetEmployee(nip) {
    $.post("index.php/Crud/dataEmployee", {
        nip: nip
    },
            function (data, status) {
                var data = JSON.parse(data);
                $("#nip").val(data.nip);
                $("#nama").val(data.name);
            }
    );
    $("#add_new_record_user").modal("hide");
    $("#add_new_record_modal").modal("show");
}
function GetEdit(id,nip) {
    $.post("index.php/Crud/dataAbsent", {
        id: id,
        nip: nip
    },
            function (data, status) {
                var data = JSON.parse(data);
                $("#id_edit").val(data.id);
                $("#nip_edit").val(data.nip);
                $("#nama_edit").val(data.name);
                $("#tgl_edit").val(data.date_start);
                $("#lama_edit").val(data.count_time);
                $("#keterangan_edit").val(data.keterangan);
            }
    );
    $("#edit_record_modal").modal("show");
}
function SaveEdit(id,tgl,keterangan) {
var id = document.getElementById("id_edit").value ;
var tgl = document.getElementById("tgl_edit").value ;
var lama = document.getElementById("lama_edit").value ;
var keterangan = document.getElementById("keterangan_edit").value ;
 $("#edit_record_modal").modal("hide");
   $.post("index.php/Crud/editAbsent", {
        id: id,
        tgl: tgl,
        lama: lama,
        keterangan: keterangan,
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
function Delete(id) {
    $("#delete_message").modal("show");
     $("#id_delete").val(id);
}

function SaveDelete() {
var id = document.getElementById("id_delete").value ;
 $("#delete_message").modal("hide");
  $.post("index.php/Crud/deleteAbsent", {
    id: id,
    },
            function (data, status) {
        $("#modal_message").modal("show");
        var header_message=document.getElementById("dialog-header");
        header_message.innerHTML="<h4 class='smaller'><i class='ace-icon fa fa-envelope'></i> Delete Mesage</h4>";
        var isi_message=document.getElementById("dialog-message");
        isi_message.innerHTML="<div class='form-group'><div class='alert alert-info bigger-110 form-group'><p class='bigger-110 bolder center grey'><i class='ace-icon fa fa-thumbs-o-up blue bigger-120'></i> <b>Success Delete Data !</b></p></div></div><div class='form-group'></div>";
       }
    );
}

    $(document).ready(function() {
    $('.modal').on('shown.bs.modal', function () {
    $(this).find('[autofocus]').focus();
});
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
    $('#example thead tr').clone(true).addClass('filters').appendTo( '#example thead' );
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
         "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 3, 'desc' ]],
            autoWidth: true,
           
        initComplete: function() {
            var api = this.api();
            // For each column
            api.columns([1,2]).eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '<input type="text" placeholder="'+title+'" />' );
                // On every keypress in this input
                $('input', $('.filters th').eq($(api.column([colIdx]).header()).index()) )
                    .off('keyup change')
                    .on('keyup change', function (e) {
                        e.stopPropagation();
                        // Get the search value
                        $(this).attr('title', $(this).val());
                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
                        var cursorPosition = this.selectionStart;
                        // Search the column for that value
                        api
                            .column(colIdx)
                            .search((this.value != "") ? regexr.replace('{search}', '((('+this.value+')))') : "", this.value != "", this.value == "")
                            .draw();
                        $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                    });
            });
        },
        "ajax": "index.php/Crud/Absent",
              fixedColumns: {
                  leftColumns: 0,
                  rightColumns: 1
              },
              "columnDefs": [
                  {
                      targets: 5, "orderable": false,
                  },
               
                ],
            "lengthMenu": [[10, 150, 250, 500, 1000], [10, 150, 250, 500, 1000]],
             
            "columns": [
                {"data": 0},
                {"data": 1},
                {"data": 2},
                {"data": 3},
                {"data": 4},
                {"data": 5},
                {"data": {},
                    "render": function (data, type, row) {
                        return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEdit(\'' + data[0] + '\',\'' + data[1] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"> EDIT </i></button>&nbsp;<button class="btns btns-danger btns-xs" style="border-width:2px" data-toggle="modal" onclick="Delete(\'' + data[0] + '\',\'' + data[1] + '\')" title="DELETE DATA"><i  class="menu-icon fa fa-trash-o"> DELETE </i></button>';
                    }
                },
             
            ],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
    } );

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
    var table = $('#employee').DataTable( {
        fixedHeader: true,
         "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 3, 'asc' ]],
            autoWidth: true,
        "ajax": "index.php/Crud/Employee",
              fixedColumns: {
                  leftColumns: 0,
                  rightColumns: 1
              },
              "columnDefs": [
                  {
                      targets: 3, "orderable": false,
                  },
               
                ],
            "lengthMenu": [[10, 150, 250, 500, 1000], [10, 150, 250, 500, 1000]],
             
            "columns": [
                {"data": "nip"},
                {"data": "nip"},
                {"data": "name"},
                {data: {},
                    "render": function (data, type, row) {
                        return '<button class="btns btns-info btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEmployee(\'' + data["nip"] + '\')" title="Choose"><i class="menu-icon fa fa-check"> </i></button>';
                    }
                },
             
            ],
            "rowCallback": function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
    } );
} );

function reload_table(){
        $('#example').DataTable().ajax.reload( null, false);
                $("#nama").val("");
                $("#gender").val("");
                $("#phone").val("");
                $("#address").val("");
                $("#birth_date").val("");
        }
</script>
