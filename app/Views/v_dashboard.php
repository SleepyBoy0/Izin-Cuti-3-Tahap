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
              <li class="breadcrumb-item active">HRMS</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $total_pegawai ?></h3>

                <p>Pegawai</p>
              </div>
              <div class="icon">
                <i class="far fa-user"></i>
              </div>
              <a href="<?= site_url('Admin/data_pegawai') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $total_cuti ?> </h3>

                <p>Leave</p>
              </div>
              <div class="icon">
                <i class="far fa-file-alt"></i>
              </div>
              <a href="<?= site_url('Admin/data_cuti') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $total_valid ?></h3>

                <p>Data Valid</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="<?= site_url('Admin/data_validation') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
        </div>
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
          <h3 class="card-title">Syarat Permohonan Cuti</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Tahunan
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Tahunan : 12 Hari Kerja</h5>
                                    <p class="card-text">Aturan cuti ini diberikan untuk PNS yang setidaknya sudah
                                        bekerja
                                        sekurang-kurangnya 1 tahun secara terus menerus. Dengan lamanya masa cuti adalah
                                        12 hari
                                        kerja.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Besar
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Besar : 3 Bulan</h5>
                                    <p class="card-text">Jenis cuti ini diberikan kepada mereka yang telah mengabdikan
                                        dirinya
                                        sekurang-kurangnya 6 tahun secara terus menerus. Durasi cuti besar yang boleh
                                        diambil
                                        adalah 3 bulan.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Sakit
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Besar : 3 Bulan</h5>
                                    <p class="card-text">Bila PNS jatuh sakit dan tidak memungkinkan untuk melakukan
                                        pekerjaan,
                                        yang bersangkutan berhak atas cuti sakit. Aturan cuti PNS yang sakit diberikan 1
                                        hari
                                        atau 2 hari kerja dengan ketentuan bahwa ia harus memberitahukan kepada
                                        atasannya
                                        dan
                                        melampirkan surat keterangan dokter.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Melahirkan
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Melahirkan : 3 Bulan</h5>
                                    <p class="card-text">Untuk persalinan anak yang pertama, kedua, dan ketiga, PNS
                                        wanita
                                        berhak atas cuti melahirkan. Namun, untuk persalinan anak keempat dan
                                        seterusnya,
                                        diberikan cuti di luar tanggungan negara. Ketentuan lamanya cuti melahirkan
                                        adalah 1
                                        bulan sebelum dan 2 bulan sesudah persalinan. Cuti ini diajukan secara tertulis
                                        dan
                                        selama menjalankan cuti ini, PNS wanita masih berhak mendapatkan penghasilannya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Alasan Penting
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Alasan Penting : Maksimal 2 bulan</h5>
                                    <p class="card-text">Cuti alasan penting ini diberikan ketika ibu, bapak, istri,
                                        suami,
                                        anak, adik, kakak, mertua, atau menantu yang sedang sakit keras atau meninggal
                                        dunia.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Cuti Bersama
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Cuti Bersama</h5>
                                    <p class="card-text">Salah satu jenis cuti yang pasti sudah tidak asing lagi. Cuti
                                        bersama
                                        ditetapkan oleh Presiden. Biasanya cuti bersama ada saat perayaan Idulfitri,
                                        Natal
                                        dan
                                        tahun baru. Tentu saja, karena namanya cuti bersama, cuti ini tidak perlu
                                        diajukan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Cuti di Luar Tanggungan Negara
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Cuti di Luar Tanggungan Negara</h5>
                            <p class="card-text">Jenis cuti ini diberikan kepada PNS yang telah bekerja
                                sekurang-kurangnya 5 tahun secara terus menerus karena alasan-alasan pribadi yang
                                penting dan mendesak dapat diberikan cuti di luar tanggungan negara. Cuti di luar
                                tanggungan negara dapat diberikan paling lama 3 tahun. Jangka waktu cuti di luar
                                tanggungan negara dapat diperpanjang paling lama 1 tahun apabila ada alasan-alasan yang
                                penting untuk memperpanjangnya.
                            </p>
                        </div>
                    </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->