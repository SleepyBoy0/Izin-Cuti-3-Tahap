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
              <li class="breadcrumb-item active">Validation Page</li>
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
        <?php
            //pesan validasi error
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) {?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </div> 
            <?php } ?>
            <?php
            if (session()->getFlashdata('pesan')) {
              echo '<div class="alert alert-success" role="alert">';
              echo session()->getFlashdata('pesan');
              echo '</div>';
            }
            ?>
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
                                                            <a href="<?= site_url('Admin/edit_validation').'/'.$i->id ?>" class="btn btn-outline-primary">
                                                                <i class="fas fa-edit"></i>
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
<button type="button" class="btn btn-sm btn-default" data-bs-toggle="modal" data-bs-target="#AdddataCuti"><i class="fa fa-plus"></i>
  Add Data Cuti
</button>

<!-- Modal -->
<div class="modal fade" id="AdddataCuti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Tambah Data</h5>
      </div>
      <div class="modal-body">
      <?php
      echo form_open('Admin/save_data_cuti');
      ?>
      
      <div class="input-group mb-3">
        <select name="user_id" id="user_id" class="form-control">
          <option value="">Select User</option>
          <?php foreach ($data_user as $i) : ?>
          <option value="<?= $i->id ?>"><?= $i->user_number ?> - <?= $i->name?></option>
          <?php endforeach ?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
    
        <div class="input-group mb-3">
          <label class="form-control">Leave Start</label>
          <input name="leave_start" type="date" class="form-control" placeholder="Leave Start">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <label class="form-control">Leave End</label>
          <input name="leave_end" type="date" class="form-control" placeholder="Leave End">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="reason" type="text" class="form-control" placeholder="Keterangan">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
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
<script>
$(function(){
    <?php if(session()->has("pesan")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session("pesan") ?>'
        })
    <?php } ?>
});
</script>
<script>
$(function(){

    <?php if(session()->has("errors")) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session("error") ?>'
        })
    <?php } ?>
});
</script>