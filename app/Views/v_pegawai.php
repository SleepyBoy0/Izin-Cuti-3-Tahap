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
              <li class="breadcrumb-item active">Pegawai Page</li>
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
                            <th>Name</th>
                            <th>User Number</th>
                            <th>Phone Number</th>
                            <th>E-mail</th>
                            <th>Username</th>
                            <th>Sex</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pegawai as $i) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $i->id ?></td>
                            <td><?= $i->name ?></td>
                            <td><?= $i->user_number ?></td>
                            <td><?= $i->phone_number ?></td>
                            <td><?= $i->email ?></td>
                            <td><?= $i->username ?></td>
                            <td><?php if($i->sex == 'M') { ?>
                                    <p>Male</p>
                                <?php }elseif($i->sex == 'F') { ?>
                                    <p>Female</p>
                                <?php } ?>
                            </td>
                            <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="<?= site_url('Admin/edit_pegawai').'/'.$i->id ?>" class="btn btn-outline-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a onclick="fun()" class="btn btn-outline-danger">
                                                                <i class="fas fa-trash"></i>
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
<button type="button" class="btn btn-sm btn-default" data-bs-toggle="modal" data-bs-target="#AdddataPegawai"><i class="fa fa-plus"></i>
  Add Data
</button>

<!-- Modal -->
<div class="modal fade" id="AdddataPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Silahkan Tambah Data</h5>
      </div>
      <div class="modal-body">
      <?php
      echo form_open('Auth/save_data_pegawai');
      ?>
        <div class="input-group mb-3">
          <input name="name" type="text" class="form-control" placeholder="Full Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="UserName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="user_number" type="text" class="form-control" placeholder="User Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="phone_number" type="text" class="form-control" placeholder="Phone Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="E-Mail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="sex" id="sex" class="form-control">
          <option value="">----- Sex -----</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
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
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
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
            icon: 'error',
            title: 'Oops...',
            text: '<?= session("error") ?>'
        })
    <?php } ?>
});
</script>
<script>  
  function fun() {  
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
    foreach ($data_pegawai as $i) : ?>
    window.location.href = '<?= site_url('Admin/delete_pegawai').'/'.$i->id ?>'
    <?php endforeach ?>
  }
});
  }  
  </script>  