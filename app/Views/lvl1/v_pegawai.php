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