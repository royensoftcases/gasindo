  <?php
  $gettahunNow=$_SESSION['tahun_param'];
  $gettahunBefore=$_SESSION['tahun_param']-1;
 ?>
  <section class="browse-job">
      <div class="container"  style="padding-top: 40px;">
        <div class="row">
            <div class="col-md-14 col-sm-14" style="padding-left:0px;">
               <div class="panels-body tables-responsive col-md-9 col-sm-9">
                <div class="pull-right">
                    <button class="btns-success btns-sm" data-toggle="modal" data-target="#add_new_komite" style="font-size: 13px;"><i class="fa fa-plus"></i> ADD KOMITE</button>
                </div>
                <p style="font-size:14px;"><b>List Komite</b></p><br>
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
  </div>
                <table id="table_komite" class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%">
        <thead>
           <tr>
                            <th>NO.</th>
                            <th>No. Komite</th>
                            <th>Terjamin</th>
                            <th>Produk</th>
                            <th>Mitra</th>
                            <th>PIC</th>
                            <th>Plafon</th>
                            <th>Jk Waktu</th>
                            <th>Status</th>
                            <th style="width: 5%">Action</th>
            </tr>
        </thead>
    </table>
</div>
<div class="col-md-3 col-sm-3" style="padding-left:0px;">
                   <figure class="highcharts-figure">
  <div id="chart_pic" style="height: 395px"></div>
</figure>
        </div>
</div>
</div>
 <div class="modal fade" id="add_new_komite" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ADD NEW KOMITE</h4>
            </div>
             <div class="modal-body">
                <form action="javascript:SaveNew()">
               <div class="forms-group">
                    <label>No. Komite <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="no_komite" name="no_komite" placeholder="No. Komite" class="forms-control" required/>
                </div>
                 <div class="forms-group">
                    <label>Jenis </label>
                     <input type="text" id="jenis" name="jenis" placeholder="Jenis" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Pengirim </label>
                     <input type="text" id="pengirim" name="pengirim" placeholder="Pengirim" class="forms-control"/>
                </div>
                 <div class="form-group">
                    <label>Bulan <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="bulan"  class="forms-control" required name="bulan"> 
                       <option value="">Pilih Bulan</option>
                       <option value="1">1</option>
                       <option value='2'>2</option>
                       <option value='3'>3</option>
                       <option value='4'>4</option>
                       <option value='5'>5</option>
                       <option value='6'>6</option>
                       <option value='7'>7</option>
                       <option value='8'>8</option>
                       <option value='9'>9</option>
                       <option value='10'>10</option>
                       <option value='11'>11</option>
                       <option value='12'>12</option>
                       </select>
                </div>
                <div class="form-group">
                               <label>TAHUN <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                                 <select id="period_years" name="period_years"class="forms-control" required>
                                    <option value=''>Pilih Tahun</option>
                                       <?php
                                       for ($year = (int)date('Y'); 2015 <= $year; $year--): ?>
                                         <option value="<?=$year;?>"><?=$year;?></option>
                                       <?php endfor; ?>
                                      </select>
                    </div>
                     <div class="forms-group">
                    <label>Tgl Bakom </label>
                     <input type="date" id="tgl_bakom" name="tgl_bakom" placeholder="Tgl Bakom" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Cabang <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="cabang" name="cabang" placeholder="Cabang" class="forms-control" required/>
                </div>
                <div class="forms-group">
                    <label>Perihal </label>
                     <input type="text" id="perihal" name="perihal" placeholder="Perihal" class="forms-control"/>
                </div>
                <div class="forms-group">
                    <label>Produk </label>
                     <input type="text" id="produk" name="produk" placeholder="Produk" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Terjamin </label>
                     <input type="text" id="terjamin" name="terjamin" placeholder="Terjamin" class="forms-control"/>
                </div>
                  <div class="forms-group">
                    <label>Mitra </label>
                     <input type="text" id="mitra" name="mitra" placeholder="Mitra" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Uker Mitra </label>
                     <input type="text" id="uker_mitra" name="uker_mitra" placeholder="Uker Mitra" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Plafond </label>
                     <input type="text" id="plafond" name="plafond" placeholder="Plafond" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Jangka Waktu <span style="color: gray;"><b>(Bulan)</b></span></label>
                     <input type="number" id="jk_waktu" name="jk_waktu" placeholder="Jangka Waktu" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>PIC </label>
                     <input type="text" id="pic" name="pic" placeholder="PIC" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Keterangan </label>
                     <input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="forms-control"/>
                </div>
                 <div class="form-group">
                    <label>Status <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="status"  class="forms-control" required name="status"> 
                       <option value="">Pilih Status</option>
                       <option value="Dalam Proses">Dalam Proses</option>
                       <option value='Terbit'>Terbit</option>
                       <option value='Batal'>Batal</option>
                       </select>
                </div>
                 <div class="form-group">
                    <label>Status SP <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="status_sp"  class="forms-control" required name="status_sp"> 
                        <option value="">Pilih Status SP</option>
                       <option value="Dalam Proses">Dalam Proses</option>
                       <option value='Terbit'>Terbit</option>
                       <option value='Batal'>Batal</option>
                       </select>
                </div>
                 <div class="forms-group">
                    <label>NO SP </label>
                     <input type="text" id="no_sp" name="no_sp" placeholder="NO SP" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Tgl SP </label>
                     <input type="date" id="tgl_sp" name="tgl_sp" placeholder="Tgl SP" class="forms-control"/>
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

    <div class="modal fade" id="edit_komite" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">EDIT KOMITE</h4>
            </div>
             <div class="modal-body">
              <form action="javascript:SaveEdit()">
               <div class="forms-group">
                    <label>No. Komite <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="edit_no_komite" name="edit_no_komite" placeholder="No. Komite" class="forms-control" required/>
                </div>
                 <div class="forms-group">
                    <label>Jenis </label>
                     <input type="text" id="edit_jenis" name="edit_jenis" placeholder="Jenis" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Pengirim </label>
                     <input type="text" id="edit_pengirim" name="edit_pengirim" placeholder="Pengirim" class="forms-control"/>
                </div>
                 <div class="form-group">
                    <label>Bulan <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="edit_bulan"  class="forms-control" required name="edit_bulan"> 
                       <option value="">Pilih Bulan</option>
                       <option value="1">1</option>
                       <option value='2'>2</option>
                       <option value='3'>3</option>
                       <option value='4'>4</option>
                       <option value='5'>5</option>
                       <option value='6'>6</option>
                       <option value='7'>7</option>
                       <option value='8'>8</option>
                       <option value='9'>9</option>
                       <option value='10'>10</option>
                       <option value='11'>11</option>
                       <option value='12'>12</option>
                       </select>
                </div>
                <div class="form-group">
                               <label>TAHUN <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                                 <select id="edit_period_years" name="edit_period_years"class="forms-control" required>
                                    <option value=''>Pilih Tahun</option>
                                       <?php
                                       for ($year = (int)date('Y'); 2015 <= $year; $year--): ?>
                                         <option value="<?=$year;?>"><?=$year;?></option>
                                       <?php endfor; ?>
                                      </select>
                    </div>
                     <div class="forms-group">
                    <label>Tgl Bakom </label>
                     <input type="date" id="edit_tgl_bakom" name="edit_tgl_bakom" placeholder="Tgl Bakom" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Cabang <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="edit_cabang" name="edit_cabang" placeholder="Cabang" class="forms-control" required/>
                </div>
                <div class="forms-group">
                    <label>Perihal </label>
                     <input type="text" id="edit_perihal" name="edit_perihal" placeholder="Perihal" class="forms-control"/>
                </div>
                <div class="forms-group">
                    <label>Produk </label>
                     <input type="text" id="edit_produk" name="edit_produk" placeholder="Produk" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Terjamin </label>
                     <input type="text" id="edit_terjamin" name="edit_terjamin" placeholder="Terjamin" class="forms-control"/>
                </div>
                  <div class="forms-group">
                    <label>Mitra </label>
                     <input type="text" id="edit_mitra" name="edit_mitra" placeholder="Mitra" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Uker Mitra </label>
                     <input type="text" id="edit_uker_mitra" name="edit_uker_mitra" placeholder="Uker Mitra" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Plafond </label>
                     <input type="text" id="edit_plafond" name="edit_plafond" placeholder="Plafond" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Jangka Waktu <span style="color: gray;"><b>(Bulan)</b></span></label>
                     <input type="number" id="edit_jk_waktu" name="edit_jk_waktu" placeholder="Jangka Waktu" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>PIC </label>
                     <input type="text" id="edit_pic" name="edit_pic" placeholder="PIC" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Keterangan </label>
                     <input type="text" id="edit_keterangan" name="edit_keterangan" placeholder="Keterangan" class="forms-control"/>
                </div>
                 <div class="form-group">
                    <label>Status <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="edit_status"  class="forms-control" required name="edit_status"> 
                       <option value="">Pilih Status</option>
                       <option value="Dalam Proses">Dalam Proses</option>
                       <option value='Terbit'>Terbit</option>
                       <option value='Batal'>Batal</option>
                       </select>
                </div>
                 <div class="form-group">
                    <label>Status SP <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                       <select id="edit_status_sp"  class="forms-control" required name="edit_status_sp"> 
                        <option value="">Pilih Status SP</option>
                       <option value="Dalam Proses">Dalam Proses</option>
                       <option value='Terbit'>Terbit</option>
                       <option value='Batal'>Batal</option>
                       </select>
                </div>
                 <div class="forms-group">
                    <label>NO SP </label>
                     <input type="text" id="edit_no_sp" name="edit_no_sp" placeholder="NO SP" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Tgl SP </label>
                     <input type="date" id="edit_tgl_sp" name="edit_tgl_sp" placeholder="Tgl SP" class="forms-control"/>
                </div>
                <input type="hidden" id="id_edit_komite" name="id_edit_komite"/>
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

<div class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_message_komite">
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
         <input type="hidden" id="id_delete_komite" name="id_delete_komite"/>
         <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
         <button type="button" class="btns btns-danger" onclick="SaveDeleteKomite();">DELETE</button>
      </div>
    </div>
  </div>
</div>


 <div class="row">
            <div class="col-md-16 col-sm-16" style="padding-left:0px;">
               <div class="panels-body tables-responsive col-md-12 col-sm-12">
                 <div class="pull-right">
                    <button class="btns-success btns-sm" data-toggle="modal" data-target="#add_new_pks" style="font-size: 13px;"><i class="fa fa-plus"></i> ADD PKS</button>
                </div>
                <p style="font-size:14px;"><b>List PKS</b></p><br>
            <div id="passwordsNoMatchRegister" role="alert" style="display:none;">
        <strong>Data On Proccess! </strong>Please Wait<img width="3%" height="3%" src="<?php echo base_url();?>/assets/images/Preloader_2.gif">
  </div>
                <table id="table_pks" class="tables tables-striped hover cell-border dataTables_scroll dataTable no-footer" style="width:100%">
        <thead>
           <tr>
                            <th>NO.</th>
                            <th>Nama Instansi</th>
                            <th>Nama PKS</th>
                            <th>No. PKS</th>
                            <th>Tgl Ttd</th>
                            <th>Tgl Berakhir</th>
                            <th>Status</th>
                            <th style="width: 5%">Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>
</div>
 <div class="modal fade" id="add_new_pks" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ADD NEW PKS</h4>
            </div>
             <div class="modal-body">
                <form action="javascript:SaveNewPks()">
               <div class="forms-group">
                    <label>Nama Instansi <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="nama_instansi" name="nama_instansi" placeholder="Nama Instansi" class="forms-control" required/>
                </div>
                 <div class="forms-group">
                    <label>Nama PKS </label>
                     <input type="text" id="nama_pks" name="nama_pks" placeholder="Nama PKS" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>No. PKS </label>
                     <input type="text" id="no_pks" name="no_pks" placeholder="No. PKS" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Tgl Ttd </label>
                     <input type="date" id="tgl_ttd" name="tgl_ttd" placeholder="Tgl Ttd" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Tgl Berakhir </label>
                     <input type="date" id="tgl_berakhir" name="tgl_berakhir" placeholder="Tgl Berakhir" class="forms-control"/>
                </div>
                <div class="forms-group">
                    <label>Produk </label>
                     <input type="text" id="produk_pks" name="produk_pks" placeholder="Produk" class="forms-control"/>
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

    <div class="modal fade" id="edit_pks" tabindex="-1" role="modal-dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modals-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">EDIT PKS</h4>
            </div>
             <div class="modal-body">
                <form action="javascript:SaveEditPks()">
               <div class="forms-group">
                    <label>Nama Instansi <span style="color: #BFC1FF;"><b>(* Must be filled)</b></span></label>
                     <input type="text" id="edit_nama_instansi" name="edit_nama_instansi" placeholder="Nama Instansi" class="forms-control" required/>
                </div>
                 <div class="forms-group">
                    <label>Nama PKS </label>
                     <input type="text" id="edit_nama_pks" name="edit_nama_pks" placeholder="Nama PKS" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>No. PKS </label>
                     <input type="text" id="edit_no_pks" name="edit_no_pks" placeholder="No. PKS" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Tgl Ttd </label>
                     <input type="date" id="edit_tgl_ttd" name="edit_tgl_ttd" placeholder="Tgl Ttd" class="forms-control"/>
                </div>
                 <div class="forms-group">
                    <label>Tgl Berakhir </label>
                     <input type="date" id="edit_tgl_berakhir" name="edit_tgl_berakhir" placeholder="Tgl Berakhir" class="forms-control"/>
                </div>
                <div class="forms-group">
                    <label>Produk </label>
                     <input type="text" id="edit_produk_pks" name="edit_produk_pks" placeholder="Produk" class="forms-control"/>
                </div>
                 <input type="hidden" id="id_edit_pks" name="id_edit_pks"/>
                <div class="modal-footer">
                <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
                <input type="submit" name="tambah" value="SUBMIT" class="btns btns-primary" >
            </div>
        </form>
            </div>  
     </div>
    </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_message_pks">
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
         <input type="hidden" id="id_delete_pks" name="id_delete_pks"/>
         <button type="button" class="btns btns-secondary" data-dismiss="modal">CANCEL</button>
         <button type="button" class="btns btns-danger" onclick="SaveDeletePks();">DELETE</button>
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
var baris=[];
var pic=[];
var categoriesPic=[];
var today = new Date();
var NewDate = new Date(new Date().setDate(today.getDate() - 30));
var ExpiredDate = new Date(new Date().setDate(today.getDate() - 90));
        function updateTextView(_obj){
  var num = getNumber(_obj.val());
  if(num==0){
    _obj.val('');
  }else{
    _obj.val(num.toLocaleString());
  }
}
function getNumber(_str){
  var arr = _str.split('');
  var out = new Array();
  for(var cnt=0;cnt<arr.length;cnt++){
    if(isNaN(arr[cnt])==false){
      out.push(arr[cnt]);
    }
  }
  return Number(out.join(''));
}

function getNum(val) {
   val = +val || 0
   return val;
}

$(document).ready(function(){
  $('#plafond').on('keyup',function(){
    updateTextView($(this));
  });
     $.post("index.php/Volume/Pic", {
    },
            function (data, status) {
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        baris.push(getNum(parseInt(data[i]['baris'])),);
        pic.push(data[i]['pic'],);
        categoriesPic.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['pic']+'</span>',);
        }
              chartPic();
            }
    );
});

function reloadchartPks(){
  baris=[];
pic=[];
categoriesPic=[];
   $.post("index.php/Volume/Pic", {
    },
            function (data, status) {
              /*data*/
              var data = JSON.parse(data);
              var total=0;
        for (var i = 0; i < data.length; i++) {
        baris.push(getNum(parseInt(data[i]['baris'])),);
        pic.push(data[i]['pic'],);
        categoriesPic.push('<span style="text-transform: uppercase;font-size:9px;">'+data[i]['pic']+'</span>',);
        }
              chartPic();
            }
    );
};

function SaveNew(no_komite,jenis,pengirim,bulan,period_years,tgl_bakom,cabang,perihal,produk,terjamin,mitra,uker_mitra,plafond,jk_waktu,pic,keterangan,status,status_sp,no_sp,tgl_sp){
var no_komite = document.getElementById("no_komite").value ;
var jenis = document.getElementById("jenis").value ;
var pengirim = document.getElementById("pengirim").value ;
var bulan = document.getElementById("bulan").value ;
var period_years = document.getElementById("period_years").value ;
var tgl_bakom = document.getElementById("tgl_bakom").value ;
var cabang = document.getElementById("cabang").value ;
var perihal = document.getElementById("perihal").value ;
var produk = document.getElementById("produk").value ;
var terjamin = document.getElementById("terjamin").value ;
var mitra = document.getElementById("mitra").value ;
var uker_mitra = document.getElementById("uker_mitra").value ;
var plafond = document.getElementById("plafond").value ;
var jk_waktu = document.getElementById("jk_waktu").value ;
var pic = document.getElementById("pic").value ;
var keterangan = document.getElementById("keterangan").value ;
var status = document.getElementById("status").value ;
var status_sp = document.getElementById("status_sp").value ;
var no_sp = document.getElementById("no_sp").value ;
var tgl_sp = document.getElementById("tgl_sp").value ;

 $("#add_new_komite").modal("hide");
$.post("index.php/Volume/addKomite", {
        no_komite: no_komite,
        jenis: jenis,
        pengirim: pengirim,
        bulan: bulan,
        period_years: period_years,
        tgl_bakom: tgl_bakom,
        cabang: cabang,
        perihal: perihal,
        produk: produk,
        terjamin: terjamin,
        mitra: mitra,
        uker_mitra: uker_mitra,
        plafond: plafond,
        jk_waktu: jk_waktu,
        pic: pic,
        keterangan: keterangan,
        status: status,
        status_sp: status_sp,
        no_sp: no_sp,
        tgl_sp: tgl_sp
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
    $.post("index.php/Volume/dataKomite", {
        id: id
    },
            function (data, status) {
                var data = JSON.parse(data);
                $("#id_edit_komite").val(data.id);
                $("#edit_no_komite").val(data.no_komite);
                $("#edit_jenis").val(data.jenis);
                $("#edit_pengirim").val(data.pengirim);
                $("#edit_bulan").val(data.bulan);
                $("#edit_period_years").val(data.tahun);
                $("#edit_tgl_bakom").val(data.tgl_bakom);
                $("#edit_cabang").val(data.cabang);
                $("#edit_perihal").val(data.perihal);
                $("#edit_produk").val(data.produk);
                $("#edit_terjamin").val(data.terjamin);
                $("#edit_mitra").val(data.mitra);
                $("#edit_uker_mitra").val(data.uker_mitra);
                $("#edit_plafond").val(data.plafond);
                $("#edit_jk_waktu").val(data.jk_waktu);
                $("#edit_pic").val(data.pic);
                $("#edit_keterangan").val(data.keterangan);
                $("#edit_status").val(data.status);
                $("#edit_status_sp").val(data.status_sp);
                $("#edit_no_sp").val(data.no_sp);
                $("#edit_tgl_sp").val(data.tgl_sp);

            }
    );
    $("#edit_komite").modal("show");
}

function SaveEdit(id,no_komite,jenis,pengirim,bulan,period_years,tgl_bakom,cabang,perihal,produk,terjamin,mitra,uker_mitra,plafond,jk_waktu,pic,keterangan,status,status_sp,no_sp,tgl_sp){
var id = document.getElementById("id_edit_komite").value ;
var no_komite = document.getElementById("edit_no_komite").value ;
var jenis = document.getElementById("edit_jenis").value ;
var pengirim = document.getElementById("edit_pengirim").value ;
var bulan = document.getElementById("edit_bulan").value ;
var period_years = document.getElementById("edit_period_years").value ;
var tgl_bakom = document.getElementById("edit_tgl_bakom").value ;
var cabang = document.getElementById("edit_cabang").value ;
var perihal = document.getElementById("edit_perihal").value ;
var produk = document.getElementById("edit_produk").value ;
var terjamin = document.getElementById("edit_terjamin").value ;
var mitra = document.getElementById("edit_mitra").value ;
var uker_mitra = document.getElementById("edit_uker_mitra").value ;
var plafond = document.getElementById("edit_plafond").value ;
var jk_waktu = document.getElementById("edit_jk_waktu").value ;
var pic = document.getElementById("edit_pic").value ;
var keterangan = document.getElementById("edit_keterangan").value ;
var status = document.getElementById("edit_status").value ;
var status_sp = document.getElementById("edit_status_sp").value ;
var no_sp = document.getElementById("edit_no_sp").value ;
var tgl_sp = document.getElementById("edit_tgl_sp").value ;

 $("#edit_komite").modal("hide");
$.post("index.php/Volume/editKomite", {
        id: id,
        no_komite: no_komite,
        jenis: jenis,
        pengirim: pengirim,
        bulan: bulan,
        period_years: period_years,
        tgl_bakom: tgl_bakom,
        cabang: cabang,
        perihal: perihal,
        produk: produk,
        terjamin: terjamin,
        mitra: mitra,
        uker_mitra: uker_mitra,
        plafond: plafond,
        jk_waktu: jk_waktu,
        pic: pic,
        keterangan: keterangan,
        status: status,
        status_sp: status_sp,
        no_sp: no_sp,
        tgl_sp: tgl_sp
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
function DeleteKomite(id) {
    $("#delete_message_komite").modal("show");
     $("#id_delete_komite").val(id);
}

function SaveDeleteKomite() {
var id = document.getElementById("id_delete_komite").value ;
 $("#delete_message_komite").modal("hide");
  $.post("index.php/Volume/deleteKomite", {
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

function SaveNewPks(nama_instansi,nama_pks,no_pks,tgl_ttd,tgl_berakhir,produk){
var nama_instansi = document.getElementById("nama_instansi").value ;
var nama_pks = document.getElementById("nama_pks").value ;
var no_pks = document.getElementById("no_pks").value ;
var tgl_ttd = document.getElementById("tgl_ttd").value ;
var tgl_berakhir = document.getElementById("tgl_berakhir").value ;
var produk_pks = document.getElementById("produk_pks").value ;

 $("#add_new_pks").modal("hide");
$.post("index.php/Volume/addPks", {
        nama_instansi: nama_instansi,
        nama_pks: nama_pks,
        no_pks: no_pks,
        tgl_ttd: tgl_ttd,
        tgl_berakhir: tgl_berakhir,
        produk: produk_pks
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

function GetEditPks(id) {
    $.post("index.php/Volume/dataPks", {
        id: id
    },
            function (data, status) {
                var data = JSON.parse(data);
                $("#id_edit_pks").val(data.id);
                $("#edit_nama_instansi").val(data.nama_instansi);
                $("#edit_nama_pks").val(data.nama_pks);
                $("#edit_no_pks").val(data.no_pks);
                $("#edit_tgl_ttd").val(data.tgl_ttd);
                $("#edit_tgl_berakhir").val(data.tgl_berakhir);
                $("#edit_produk_pks").val(data.produk);
            }
    );
    $("#edit_pks").modal("show");
}
function SaveEditPks(id,nama_instansi,nama_pks,no_pks,tgl_ttd,tgl_berakhir,produk){
var id = document.getElementById("id_edit_pks").value ;
var nama_instansi = document.getElementById("edit_nama_instansi").value ;
var nama_pks = document.getElementById("edit_nama_pks").value ;
var no_pks = document.getElementById("edit_no_pks").value ;
var tgl_ttd = document.getElementById("edit_tgl_ttd").value ;
var tgl_berakhir = document.getElementById("edit_tgl_berakhir").value ;
var produk = document.getElementById("edit_produk_pks").value ;

 $("#edit_pks").modal("hide");
$.post("index.php/Volume/editPks", {
        id: id,
        nama_instansi: nama_instansi,
        nama_pks: nama_pks,
        no_pks: no_pks,
        tgl_ttd: tgl_ttd,
        tgl_berakhir: tgl_berakhir,
        produk: produk
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
function DeletePks(id) {
    $("#delete_message_pks").modal("show");
     $("#id_delete_pks").val(id);
}

function SaveDeletePks() {
var id = document.getElementById("id_delete_pks").value ;
 $("#delete_message_pks").modal("hide");
  $.post("index.php/Volume/deletePks", {
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
        var t = $('#table_komite').DataTable({
             "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 0, 'asc' ]],
            autoWidth: true,
            scrollX: true,
            "processing": true,
            "serverSide": true,
            "ajax": "index.php/Volume/table_komite/",
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 1
            },
            "columnDefs": [
                {
                    targets: 9, "orderable": false,
                },
               
                ],
            "lengthMenu": [[5], [5]],
             
            "columns": [
                {"data": "id"},
                {"data": "no_komite"},
                {"data": "terjamin"},
                {"data": "produk"},
                {"data": "mitra"},
                {"data": "pic"},
                {"data": "plafond"},
                {"data": "jk_waktu"},
                {"data": "status"},
                {"data":{},
                    "render": function (data, type, row) {
                          return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEdit(\'' + data["id"] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"> EDIT </i></button>&nbsp;<button class="btns btns-danger btns-xs" style="border-width:2px" data-toggle="modal" onclick="DeleteKomite(\'' + data["id"] + '\')" title="DELETE DATA"><i  class="menu-icon fa fa-trash-o"> DELETE </i></button>';
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
        var t = $('#table_pks').DataTable({
             "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 0, 'asc' ]],
            autoWidth: true,
            scrollX: true,
            "processing": true,
            "serverSide": true,
            "ajax": "index.php/Volume/table_pks/",
            fixedColumns: {
                leftColumns: 0,
                rightColumns: 2
            },
            "columnDefs": [
                {
                    targets: 5, "orderable": false,
                },
                {
                    targets: 6, "orderable": false,
                }
               
                ],
            "lengthMenu": [[5], [5]],
             
            "columns": [
                {"data": "id"},
                {"data": "nama_instansi"},
                {"data": "nama_pks"},
                {"data": "no_pks"},
                {"data": "tgl_ttd",
                 "render": function (data, type, row) {
                       return moment(data).format("DD MMM YYYY");
                    }
                },
                {"data": "tgl_berakhir",
                 "render": function (data, type, row) {
                       return moment(data).format("DD MMM YYYY");
                    }
                },
                {"data": "tgl_berakhir",
                 "render": function (data, type, row) {
                  if(data=='0000-00-00'){
                    return "<span style='color: red;'><b>Expired</b></span>";
                  }
                  else if(data<=moment(ExpiredDate).format("YYYY-MM-DD")){
                  return "<span style='color: red;'><b>Expired</b></span>";
                  }
                  else if(data>=moment(today).format("YYYY-MM-DD")){
                  return "<span style='color: blue;'><b>Active</b></span>";
                  }
                    }
                },
                {"data":{},
                    "render": function (data, type, row) {
                          return '<button class="btns btns-warning btns-xs" style="border-width:2px" data-toggle="modal" onclick="GetEditPks(\'' + data["id"] + '\')" title="EDIT DATA"><i class="menu-icon fa fa-pencil-square-o"> EDIT </i></button>&nbsp;<button class="btns btns-danger btns-xs" style="border-width:2px" data-toggle="modal" onclick="DeletePks(\'' + data["id"] + '\')" title="DELETE DATA"><i  class="menu-icon fa fa-trash-o"> DELETE </i></button>';
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
        $('#table_komite').DataTable().ajax.reload( null, false);
        $("#no_komite").val("");
        $("#jenis").val("");
        $("#pengirim").val("");
        $("#bulan").val("");
        $("#period_years").val("");
        $("#tgl_bakom").val("");
        $("#cabang").val("");
        $("#perihal").val("");
        $("#produk").val("");
        $("#terjamin").val("");
        $("#mitra").val("");
        $("#uker_mitra").val("");
        $("#plafond").val("");
        $("#jk_waktu").val("");
        $("#pic").val("");
        $("#keterangan").val("");
        $("#status").val("");
        $("#status_sp").val("");
        $("#no_sp").val("");
        $("#tgl_sp").val("");
        
        $("#nama_instansi").val("");
        $("#nama_pks").val("");
        $("#no_pks").val("");
        $("#tgl_ttd").val("");
        $("#tgl_berakhir").val("");
        $("#produk_pks").val("");
        $('#table_pks').DataTable().ajax.reload( null, false);
        reloadchartPks();
        }

   
      function chartPic(){
    Highcharts.chart('chart_pic', {
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
    text: 'Monitoring Komite by AO',
    style: {
            color: '#000',
            font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
        }
  },
  xAxis: {
    categories: categoriesPic,
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
     width: 0,
     padding: 4,
     align: 'left',
    itemStyle: {
            fontWeight: 'bold',
            fontSize: '10px',
        }
        
},
  plotOptions: {
    column: {
      pointPadding: 0.4,
      borderWidth: 0,
      fontSize:'2px'
    }
  },
  series: [{
    name: "Jumlah",
    data: baris,
    color: 'rgb(124, 181, 236)',

  }
  ]
});
}
</script>