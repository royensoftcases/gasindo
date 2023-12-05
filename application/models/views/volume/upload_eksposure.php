<section class="browse-jobs">
         <div class="container">
            <div class="row justify-content-center">
                <br>
                <br>
                <h5 class="text-center" style="color: blue">DATA EKSPOSURE</span></h5>
            </div>
        </div>
         <div class="panels-body tables-responsive">
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
        
  </div>
                <table id="mytable" class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%">
        <thead>
           <tr>
                            <th>NOMOR</th>
                            <th>TAHUN</th>
                            <th>BULAN</th>
                            <th style="width: 15%;">AKSI</th>
            </tr>
        </thead>
    </table>
</div>
    </section>


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
       <div class='modals-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Hapus Data?</h4></div>
      <div class="modal-body">
         <div class="alert alert-info bigger-110">
                                                Data akan di hapus secara permanent.
                                            </div>

                                            <div class="space-6"></div>

                                            <p class="bigger-110 bolder center grey">
                                                <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                                                Apakah kamu yakin?
                                            </p>
      </div>
      <div class="modal-footer">
         <input type="hidden" id="tahun_delete" name="tahun_delete"/>
         <input type="hidden" id="bulan_delete" name="bulan_delete"/>
         <button type="button" class="btns btns-secondary" data-dismiss="modal">BATAL</button>
         <button type="button" class="btns btns-danger" onclick="SaveDelete();">HAPUS</button>
      </div>
    </div>
  </div>
</div>

   <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>
   <script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
    <script>
        $("#period_years").datepicker( {
    format: " yyyy", // Notice the Extra space at the beginning
    viewMode: "years", 
    minViewMode: "years"
});
    </script>

    <script>
           function proses(){
 $("#add_new_record_modal").modal("hide");
 $("#modal_proses").modal("show");
}
function Delete(tahun,bulan) {
    $("#delete_message").modal("show");
     $("#tahun_delete").val(tahun);
     $("#bulan_delete").val(bulan);
}

function SaveDelete() {
var tahun_delete = document.getElementById("tahun_delete").value ;
var bulan_delete = document.getElementById("bulan_delete").value ;
 $("#delete_message").modal("hide");
  $.post("index.php/Volume/deleteUploadEksposure", {
    tahun_delete: tahun_delete,
    bulan_delete: bulan_delete
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

    $(document).ready(function () {
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
        var row_count = $("#row_count").val();
        var t = $('#mytable').DataTable({
             "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
           /* "deferLoading": 40,*/
            autoWidth: true,
            scrollX: true,
            "processing": true,
            "serverSide": true,
            'order': [2, 'asc',1, 'desc'],
            "ajax": "index.php/Volume/eksposure_header",
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 2
            },
            "columnDefs": [
                {
                    targets: 3, "orderable": false,
                },
                ],
            "lengthMenu": [[10, 150, 250, 500, 1000], [10, 150, 250, 500, 1000]],
            "columns": [
                {"data": "id"},
                {"data": "tahun"},
                {"data": "bulan",
                 "render": function (data, type, row) {
                       return moment(data).format("MMMM");
                    }
                },
                 {"data":{},
                    "render": function (data, type, row) {
                          return '<button class="btns btns-danger btns-xs" style="border-width:2px" data-toggle="modal" onclick="Delete(\'' + data["tahun"] + '\',\'' + data["bulan"] + '\')" title="HAPUS DATA"><i  class="menu-icon fa fa-trash-o"> HAPUS DATA </i></button>&nbsp;&nbsp<a href="?page=view_detail_eksposure&tahun=' +  data['tahun'] + '&bulan=' +  data["bulan"] + '"><button class="btns btns-info btns-xs" style="border-width:2px" title="LIHAT DATA"><i  class="menu-icon fa fa-table"> LIHAT DATA</i></button></a>';
                        
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
        });
    }
    );
function reload_table(){
        $('#mytable').DataTable().ajax.reload( null, false);
        }
</script>