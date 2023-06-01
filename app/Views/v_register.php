
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HRMS | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url('assets') ?>/index2.html"><b>Register</b>Page</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
        <div class="register-box-body">
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
        </div>

      <?php
      echo form_open('Auth/save_register');
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
            
              <a href="<?= site_url('Auth/login') ?>" class="text-center">Kembali ke Halaman Login</a>
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close() ?>

      <div class="social-auth-links text-center">
        
      </div>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets') ?>/dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
<script>
<script>
  window.setTimeout(function(){
    $(".alert").fadeTo(200,0).slideUp(100,function(){
      $(this).remove();
    })
  },2500);
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
</body>
</html>

