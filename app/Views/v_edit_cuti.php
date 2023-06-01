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
              <li class="breadcrumb-item active">Edit Leave Page</li>
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
                <h3 class="card-title">Silahkan Ubah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
      <?php foreach($data_cuti as $i)  ?>
              <?php
      echo form_open('Admin/update_cuti'.'/'. $i->id);
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
                    <label for="exampleInputEmail1">User Id</label>
                    <input name="user_id" value="<?= $i->user_id ?>" hidden>
                    <a class="form-control" placeholder="name"><?= $i->user_id ?></a>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Leave Start : <?= $i->leave_start ?></label>
                    <input name="leave_start" type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Leave End : <?= $i->leave_end ?></label>
                    <input name="leave_end" type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Reason</label>
                    <input name="reason" type="text" class="form-control" value="<?= $i->reason ?>">
                </div>
                
        
        <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>
          <div class="col-2">
            <a href="<?= site_url('Admin/data_cuti')?>" type="button" class="btn btn-danger btn-block">Cancel</a>
          </div>
        </div>
          
                </div>
                <?php echo form_close() ?>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->