 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approve Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Table Data Pegawai</h3>

          <div class="card-tools">
            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button> -->
          </div>
        </div>
        <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>User ID</th>
                            <th>Mulai Cuti</th>
                            <th>Cuti berakhir</th>
                            <th>Keterangan</th>
                            <th>Total Cuti</th>
                            <th>Status</th>
                            <th>Validation</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_cuti as $i) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $i->user_id ?></td>
                            <td><?= $i->leave_start ?></td>
                            <td><?= $i->leave_end ?></td>
                            <td><?= $i->reason ?></td>
                            <td><?= $i->total_leave ?> - Hari</td>
                            <td>
                                <?php if($i->lvl1 == 1) { ?>
                                    <a type="button" href="" class="btn btn-warning">Level 1</a>
                                <?php }elseif($i->lvl1 == 3) { ?>
                                    <a type="button" href="" class="btn btn-danger">Level 1</a>
                                <?php }elseif($i->lvl1 == 2) { ?>
                                    <a type="button" href="" class="btn btn-success">Level 1</a>
                                <?php } ?>
                                <?php if($i->lvl2 == 1) { ?>
                                    <a type="button" href="" class="btn btn-warning">Level 2</a>
                                <?php }elseif($i->lvl2 == 3) { ?>
                                    <a type="button" href="" class="btn btn-danger">Level 2</a>
                                <?php }elseif($i->lvl2 == 2) { ?>
                                    <a type="button" href="" class="btn btn-success">Level 2</a>
                                <?php } ?>
                                <?php if($i->lvl3 == 1) { ?>
                                    <a type="button" href="" class="btn btn-warning">Level 3</a>
                                <?php }elseif($i->lvl3 == 3) { ?>
                                    <a type="button" href="" class="btn btn-danger">Level 3</a>
                                <?php }elseif($i->lvl3 == 2) { ?>
                                    <a type="button" href="" class="btn btn-success">Level 3</a>
                                <?php } ?>
                            </td>
                            <td><?php if($i->validation == 1) { ?>
                                    <a type="button" href="" class="btn btn-warning">Pending</a>
                                <?php }elseif($i->validation == 2) { ?>
                                    <a type="button" href="" class="btn btn-danger">Not Valid</a>
                                <?php }else { ?>
                                    <a type="button" href="" class="btn btn-success">Valid</a>
                                <?php } ?>
                            </td>
                            <td>
                                 <div class="table-responsive">
                                      <div class="table table-striped table-hover ">
                                                            <a onclick="fun1()" class="btn btn-outline-primary">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a onclick="fun2()" class="btn btn-outline-danger">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>                                     
                        </tr>
                    </tbody>
                        <?php endforeach ?>
                </table>
            </div>
            <!-- /.card-body -->
        <!-- /.card-body -->
        <div class="card-footer">
        <!-- <a href="" class="btn btn-sm btn-default"><i class="fa fa-plus"></i> Tambah Karyawan</a> -->
        <!-- Button trigger modal -->

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
$(function(){
    <?php if(session()->has("success")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session("success") ?>'
        })
    <?php } ?>
});
</script>
<script>
$(function(){

    <?php if(session()->has("errors")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session("errors") ?>'
        })
    <?php } ?>
});
</script>
<script>  
  function fun1() {  
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
  if (willDelete) {
    <?php
    foreach ($data_cuti as $i) : ?>
    window.location.href = '<?= site_url('Admin/accept_data_lvl1').'/'.$i->id ?>'
    <?php endforeach ?>
  }
});
  }  
  </script>
  <script>  
  function fun2() {  
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
  if (willDelete) {
    <?php
    foreach ($data_cuti as $i) : ?>
    window.location.href = '<?= site_url('Admin/decline_data_lvl1').'/'.$i->id ?>'
    <?php endforeach ?>
  }
});
  }  
  </script>  