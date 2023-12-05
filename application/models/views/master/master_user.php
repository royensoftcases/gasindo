<section class="browse-jobs">
         <div class="container">
            <div class="row justify-content-center">
                <br>
                <br>
                <h5 class="text-center" style="color: blue">LIST USER</h5>
            </div>
        </div>
        <br>
        <div class="col-md-12">
                <div class="pull-left">
                    <button class="btns-success btns-sm" data-toggle="modal" data-target="#add_new_record_modal" style="font-size: 13px;"><i class="fa fa-plus"></i> ADD NEW DATA</button>
                </div>
            </div>
            <br>
             <br>
         <div class="panels-body tables-responsive">
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
  </div>
                <table id="mytable" class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%">
        <thead>
           <tr>
                            <th>No.</th>
                            <th>Date Create</th>
                            <th>Username</th>
                            <th>User Role</th>
                            <th>Status</th>
                            <th style="width: 10%;">Action</th>
            </tr>
        </thead>
    </table>
</div>
    </section>


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
                    <label>Username <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="username" name="username" placeholder="Username" class="forms-control" required/>
                </div>
                  <div class="forms-group">
                    <label>Password <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                    <input type="text" id="password" name="password" placeholder="Password" maxlength="100" class="forms-control" required/>
                </div>
                 <div class="form-group">
                    <label>User Role <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="level"  class="forms-control" required name="level"> 
                       <option selected="selected" value="1">Admin</option>
                       <option value='2'>User</option>
                       </select>
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
                    <label>Username <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="username_edit" name="username_edit" placeholder="Username" class="forms-control" required/>
                </div>
                  <div class="forms-group">
                    <label>Password <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                    <input type="text" id="password_edit" name="password_edit" placeholder="Password" maxlength="100" class="forms-control" required/>
                </div>
                 <div class="form-group">
                    <label>User Role <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="level_edit"  class="forms-control" required name="level_edit"> 
                       <option selected="selected" value="1">Admin</option>
                       <option value='2'>User</option>
                       </select>
                </div>
                 <div class="form-group">
                    <label>Status</label>
                     <select id="status_edit"  class="forms-control" required name="status_edit">    
                      <option value="1">Active</option>
                      <option value="2">Non Active</option>     
                      </select> 
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

   <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>
    <script>
        function SaveNew(username,password,level){
var username = document.getElementById("username").value ;
var password = document.getElementById("password").value ;
var level = document.getElementById("level").value ;
 $("#add_new_record_modal").modal("hide");
$.post("index.php/Master/addUser", {
        username: username,
        password: password,
        level: level
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

function GetEdit(id) {
    $.post("index.php/Master/dataUser", {
        id: id
    },
            function (data, status) {
                var data = JSON.parse(data);
                $("#id_edit").val(data.id);
                $("#username_edit").val(data.username);
                $("#password_edit").val(data.password);
                $("#level_edit").val(data.rule);
                $("#status_edit").val(data.status);
            }
    );
    $("#edit_record_modal").modal("show");
}
function SaveEdit(id,username,password,level,status) {
var id = document.getElementById("id_edit").value ;
var username = document.getElementById("username_edit").value ;
var password = document.getElementById("password_edit").value ;
var level = document.getElementById("level_edit").value ;
var status = document.getElementById("status_edit").value ;
 $("#edit_record_modal").modal("hide");
   $.post("index.php/Master/editUser", {
        id: id,
        username: username,
        password: password,
        level: level,
        status: status
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
  $.post("index.php/Master/deleteuser", {
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

    $(document).ready(function () {
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
        var row_count = $("#row_count").val();
        var t = $('#mytable').DataTable({
             "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 0, 'desc' ]],
           /* "deferLoading": 40,*/
            autoWidth: true,
            scrollX: true,
            "processing": true,
            "serverSide": true,
            "ajax": "index.php/Master/",
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
                {"data": "id"},
                {"data": "tanggal",
                 "render": function (data, type, row) {
                       return moment(data).format("DD/MMMM/YY");
                    }
                },
                {"data": "username"},
                {"data": "rule",
                "render": function (data, type, row) {
                    if(data=="1"){
                return "<p style='color: blue'><b>Admin</b></p>";
                    }else{
                 return "<p style='color: green'><b>User</b></p>";
                    }
                    }
                },
                {"data": "status",
                "render": function (data, type, row) {
                    if(data=="1"){
                return "<p style='color: purple'><b>Active</b></p>";
                    }else{
                 return "<p style='color: red'>Non Active</p>";
                    }
                    }
                },
                {"data":{},
                    "render": function (data, type, row) {
                        if(data["status"]>1){
                          return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEdit(\'' + data["id"] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"> EDIT </i></button>&nbsp;<button class="btns btns-danger btns-xs" style="border-width:2px" data-toggle="modal" onclick="Delete(\'' + data["id"] + '\')" title="DELETE DATA"><i  class="menu-icon fa fa-trash-o"> DELETE </i></button>';
                        }else{
                          return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEdit(\'' + data["id"] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"> EDIT </i></button>';
                        }
                    }
                },
                /*{data: {},
                    "render": function (data, type, row) {
                         return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEdit(\'' + data[0] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"> EDIT </i></button>&nbsp;<button class="btns btns-danger btns-xs" style="border-width:2px" data-toggle="modal" onclick="Delete(\'' + data[0] + '\')" title="DELETE DATA"><i  class="menu-icon fa fa-trash-o"> DELETE </i></button>';
                    }
                },*/
             
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
                $("#username").val("");
                $("#password").val("");
                $("#level").val("1");
        }
</script>