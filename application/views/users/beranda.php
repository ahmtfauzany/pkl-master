<?php
$cek    = $user->row();
$id_user = $cek->id_user;
$nama    = $cek->nama_lengkap;
$nip = $cek->nip;
$alamat = $cek->alamat;
$telp = $cek->telp;
$level   = $cek->level;
$username   = $cek->username;

$tgl = date('m-Y');
?>
<style>
  hr.w {
    width: 100%;
    /* Sesuaikan dengan panjang yang diinginkan */
    margin: 10px auto;
    /* Memberi jarak di atas dan di bawah garis pembatas */
    border: 1px solid #ccc;
    /* Garis pembatas solid berwarna abu-abu */
  }
</style>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-12">

        <?php if ($user->row()->level == 'admin') { ?>
          <?php
          // Dapatkan tanggal saat ini
          $tanggalSekarang = new DateTime();

          // Periksa apakah tanggal saat ini adalah tanggal 30
          if ($tanggalSekarang->format('d') == '4') {
            // Cetak alert card
          ?>
            <div class="col-md-12">
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h3 class="panel-title">Perhatian!</h3>
                </div>
                <div class="panel-body">
                  <p>Harap print laporan surat cuti pegawai sebelum tanggal 1 bulan depan.</p>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        <?php } ?>

        <?php if ($user->row()->level == 'pegawai' or 'admin' or 'kepsek' or 's_admin') { ?>
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading text-left">
                <h1>HALO <?php echo ucwords($nama); ?></h1>
                <p>Selamat datang di hari yang penuh semangat! Kami ingin mengucapkan terima kasih atas dedikasi dan kerja keras Anda.</p>
                <p>Saatnya untuk bersama-sama menciptakan hari yang produktif dan penuh prestasi.</p>
                <p>Terima kasih atas kontribusi Anda dan semangat untuk mencapai tujuan bersama.</p>
                <p>Ingatlah, setiap langkah kecil Anda memiliki dampak besar.</p>
                <p>Teruskan Berkilau!</p>
              </div>
            </div>
          </div>
        <?php } ?>

        <?php
        // Dapatkan tanggal saat ini
        $tanggalSekarang = new DateTime();
        $akhirBulanIni = new DateTime('last day of this month');

        // Periksa apakah masih sebelum tanggal 1 bulan depan
        if ($tanggalSekarang < $akhirBulanIni) {
          // Cetak data pengajuan cuti
          // Gantilah ini dengan kode sebenarnya untuk mencetak data
          echo '<p>Cetak data pengajuan cuti sebelum tanggal 1 bulan depan.</p>';
        }
        ?>

        <?php
        if ($user->row()->level != 's_admin' and $user->row()->level != 'admin' and $user->row()->level != 'kepsek' and $user->row()->level != 'pegawai') { ?>

          <?php if ($user->row()->level == 'ktu') { ?>
            <div class="col-md-3">
              <div class="panel panel-warning">
                <div class="panel-heading text-right">
                  <i class="icon-alarm icon-3x"></i>
                  <h1><b>BELUM DIAJUKAN</b></h1>
                </div>
                <div class="panel-body">
                  <h1 style="margin-top: 0px; margin-bottom: -10px;"><b>
                      <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='1'")->num_rows(), 0, ",", "."); ?> DATA
                    </b><a href="users/ktu" class="btn btn-sm btn-warning" style="float: right;">CEK</a>
                  </h1>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="panel panel-primary">
                <div class="panel-heading text-right">
                  <i class="icon-cart icon-3x"></i>
                  <h1><b>SEDANG DIAJUKAN</b></h1>
                </div>
                <div class="panel-body">
                  <h1 style="margin-top: 0px; margin-bottom: -10px;"><b>
                      <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='2'")->num_rows(), 0, ",", "."); ?> DATA
                    </b><a href="users/ktu" class="btn btn-sm btn-primary" style="float: right;">CEK</a>
                  </h1>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="panel panel-success">
                <div class="panel-heading text-right">
                  <i class="icon-books icon-3x"></i>
                  <h1><b>SURAT TERDISPOSISI</b></h1>
                </div>
                <div class="panel-body">
                  <h1 style="margin-top: 0px; margin-bottom: -10px;"><b>
                      <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='3'")->num_rows(), 0, ",", "."); ?> DATA
                    </b><a href="users/historysm" class="btn btn-sm btn-success" style="float: right;">CEK</a>
                  </h1>
                </div>
              </div>
            </div>
          <?php } elseif ($user->row()->level == 'kepsek') { ?>

            <div class=" col-md-2">
              <div class="panel">
                <div style="background-color: #333;" class="panel-heading">
                  <h1 style="font-size:large; text-align: left; color:white;"><b>KONFIRMASI : <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='2'")->num_rows(), 0, ",", "."); ?></b></h1>
                </div>
                <div style="text-align: right;" class="panel-body">
                  </b><a style="background-color: #333; color:white;" href="users/user" class="btn btn-sm">CEK</a>
                </div>
              </div>
            </div>

            <div class=" col-md-2">
              <div class="panel">
                <div style="background-color:#333;" class="panel-heading">
                  <h1 style="font-size:large; text-align: left; color:white;"><b>SURAT TERDISPOSISI : <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='3'")->num_rows(), 0, ",", "."); ?></b></h1>
                </div>
                <div style="text-align: right;" class="panel-body">
                  </b><a style="background-color: #333; color:white;" href="users/user" class="btn btn-sm">CEK</a>
                </div>
              </div>
            </div>


          <?php } else { ?>
            <?php
            if ($user->row()->level != 'admin' and $user->row()->level != 'pegawai') { ?>
              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="font-size:large; text-align: left; color:white;"><b>DATA USER : <?php echo number_format($this->db->query("SELECT * FROM tbl_user")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/user" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php
            if ($user->row()->level != 's_admin' and $user->row()->level != 'pegawai') { ?>
              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="font-size:large; text-align: left; color:white;"><b>DATA PEGAWAI : <?php echo number_format($this->db->query("SELECT * FROM tbl_pegawai")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/pegawai" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>DATA SISWA : <?php echo number_format($this->db->query("SELECT * FROM tbl_siswa")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/siswa" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php
            if ($user->row()->level != 's_admin' and $user->row()->level != 'pegawai') { ?>
              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>SURAT MASUK : <?php echo number_format($this->db->query("SELECT * FROM tbl_sm")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/sm" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>SURAT KELUAR : <?php echo number_format($this->db->query("SELECT * FROM tbl_sk")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/sk" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>SURAT TUGAS : <?php echo number_format($this->db->query("SELECT * FROM tbl_tugas")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/tugas" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>SURAT CUTI : <?php echo number_format($this->db->query("SELECT * FROM tbl_cuti")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/cuti" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>SURAT IZIN : <?php echo number_format($this->db->query("SELECT * FROM tbl_izin")->num_rows(), 0, ",", "."); ?></b></h1>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/izin" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

            <?php } ?>
            <?php if ($user->row()->level == 's_admin') { ?>
              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>AJUAN SURAT MASUK : <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='1'")->num_rows(), 0, ",", "."); ?>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/ktu" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>SURAT DI AJUKAN : <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='2'")->num_rows(), 0, ",", "."); ?>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/ktu" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>

              <div class=" col-md-2">
                <div class="panel">
                  <div style="background-color:#333;" class="panel-heading">
                    <h1 style="text-align: left; font-size:large; color:white;"><b>SURAT TERDISPOSISI : <?php echo number_format($this->db->query("SELECT * FROM tbl_sm where dibaca='3'")->num_rows(), 0, ",", "."); ?>
                  </div>
                  <div style="text-align: right;" class="panel-body">
                    </b><a style="background-color: #333; color:white;" href="users/historysm" class="btn btn-sm">CEK</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
          <hr class="w short-hr">
          <br>
        <?php } ?>
        <!-- Basic datatable -->
        <!-- /dashboard content -->
        <script type="text/javascript">
          $(function() {
            function onClickHandler(date, obj) {
              var $calendar = obj.calendar;
              var $box = $calendar.parent().siblings('.box').show();
              var text = 'Anda memilih tanggal ';
              if (date[0] !== null) {
                text += date[0].format('DD MMMM YYYY');
              }
              if (date[0] !== null && date[1] !== null) {
                text += ' ~ ';
              } else if (date[0] === null && date[1] == null) {
                text += 'tidak ada';
              }
              if (date[1] !== null) {
                text += date[1].format('DD MMMM YYYY');
              }
              $box.text(text);
            }
            $('.calendar').pignoseCalendar({
              lang: 'ind',
              select: onClickHandler,
              theme: 'blue' // light, dark, blue
            });
          });
        </script>