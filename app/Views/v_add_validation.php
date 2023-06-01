 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
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
                <h3 class="card-title">Silahkan Tambah Data Validation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
      <?php foreach($data_validation as $i)  ?>
              <?php
      echo form_open('Admin/update_validation'.'/'. $i->id);
      ?>
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
            
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Id : <?= $i->user_id ?></label>
                    <input name="user_id" value="<?= $i->user_id ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Leave Start : <?= $i->leave_start ?></label>
                    <input name="leave_start" type="date" class="form-control" value="<?= $i->leave_start ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Leave End : <?= $i->leave_end ?></label>
                    <input name="leave_end" type="date" class="form-control" value="<?= $i->leave_end ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Reason : <?= $i->reason ?></label>
                    <input name="reason" type="text" class="form-control" value="<?= $i->reason ?>" hidden>
                </div>
                <div class="form-group">
                  <label>lvl1</label>
                    <input type="hidden" name="lvl1" value="0">
                    <input type="checkbox" name="lvl1" value="1">
                    <label>lvl2</label>
                    <input type="hidden" name="lvl2" value="0">
                    <input type="checkbox" name="lvl2" value="1">
                    <label>lvl3</label>
                    <input type="hidden" name="lvl3" value="0">
                    <input type="checkbox" name="lvl3" value="1">
                </div>
                
        
        <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>
          <div class="col-2">
            <a href="<?= site_url('Admin/data_validation')?>" type="button" class="btn btn-danger btn-block">Cancel</a>
          </div>
        </div>
          
                </div>
                <?php echo form_close() ?>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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