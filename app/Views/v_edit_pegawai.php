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
              <li class="breadcrumb-item active">Edit Pegawai Page</li>
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
              
      <?php foreach($data_pegawai as $i)  ?>
              <?php
      echo form_open('Admin/update_pegawai'.'/'. $i->id);
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
                    <label for="exampleInputEmail1">Name</label>
                    <input name="name" type="text" class="form-control" value="<?= $i->name ?>" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">User Number</label>
                    <input name="user_number" type="text" class="form-control" value="<?= $i->user_number ?>" placeholder="User Number">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input name="phone_number" type="text" class="form-control" value="<?= $i->phone_number ?>" placeholder="phone_number">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-Mail</label>
                    <input name="email" type="text" class="form-control" value="<?= $i->email ?>" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input name="password" type="text" class="form-control" value="<?= $i->password ?>" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input name="username" type="text" class="form-control" value="<?= $i->username ?>" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sex</label>
                    <select name="sex" id="sex" class="form-control">
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>
                </div>
                
        
        <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
          </div>
          <div class="col-2">
            <a href="<?= site_url('Admin/data_pegawai')?>" type="button" class="btn btn-danger btn-block">Cancel</a>
          </div>
        </div>
          
                </div>
                <?php echo form_close() ?>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->