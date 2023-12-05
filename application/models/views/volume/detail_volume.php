<?php 
 $tahun= $_GET['tahun'];
  ?>
<section class="browse-jobs">
         <div class="container">
            <div class="row justify-content-center">
                <br>
                <br>
                <h5 class="text-center" style="color: blue">LIST DATA TARGET VOLUME TAHUN <?php echo $tahun;?></h5>
            </div>
        </div>
        <br>
        <div class="col-md-12">
                 <div class="pull-right">
                 <a href="?page=upload_target_volume"><button class="btns-success btns-sm"style="font-size: 13px;"><i class="fa fa-backward"></i> KEMBALI SEBELUMNYA</button></a>
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
                            <th>NO.</th>
                            <th>PRODUK</th>
                            <th>kode 3 digit SP</th>
                            <th>JENIS PRODUK</th>
                            <th>BANDUNG</th>
                            <th>CIREBON</th>
                            <th>PURWAKARTA</th>
                            <th>TASIKMALAYA</th>
                            <th>SUKABUMI</th>
                            <th>VOLUME</th>
            </tr>
        </thead>
    </table>
</div>
    </section>

   <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>
    <script>
        

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
        var tahun  ='<?php echo $tahun;?>'
        var t = $('#mytable').DataTable({
             "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '},
            order: [[ 0, 'asc' ]],
            autoWidth: true,
            scrollX: true,
            "processing": true,
            "serverSide": true,
            "ajax": "index.php/Volume/dataVolume/"+tahun,
            fixedColumns: {
                leftColumns: 5,
                rightColumns: 0
            },
            "columnDefs": [
                {
                    targets: 4,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
                },
                 {
                    targets: 5,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
                },
                 {
                    targets: 6,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
                },
                 {
                    targets: 7,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
                },
                 {
                    targets: 8,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
                },
                 {
                    targets: 9,
                    render: $.fn.dataTable.render.number( '.', '.', 0, ''  )
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
                {"data": 6},
                {"data": 7},
                {"data": 8},
                {"data": 9},

                
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
</script>