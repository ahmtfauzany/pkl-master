<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-12">
        <!-- Basic datatable -->
        <div class="panel panel-default">
          <div class="panel-heading text-left">
            <div class="row">
              <div class="col-sm-6 text-left">
                <b>DAFTAR SURAT CUTI</b>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level == 'admin') { ?>
                  <form action="" method="post" target="_blank">
                    <button style="background-color: #333; color:white;" type="submit" name="btncetak" class="btn btn-xs" style="margin-top: 7px;"><b>CETAK LAPORAN</b></button>
                  </form>
                <?php
                } ?>
              </div>
            </div>
          </div>
          <div class="panel-body" style="margin-top: -20px;">
            <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Tgl Pengajuan</th>
                  <th>Alasan</th>
                  <th>Dari Tanggal</th>
                  <th>Sampai Tanggal</th>
                  <th>Hari</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($sql->result() as $baris) {
                ?>
                  <tr>
                    <td><?php echo $baris->nama_pegawai; ?></td>
                    <td><?php echo $baris->nip; ?></td>
                    <td><?php echo $baris->tgl_cuti; ?></td>
                    <td><?php echo $baris->alasan; ?></td>
                    <td><?php echo $baris->tgl_awal; ?></td>
                    <td><?php echo $baris->tgl_akhir; ?></td>
                    <td><?php echo $baris->lama; ?> Hari</td>
                  </tr>
                <?php
                  $no++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /basic datatable -->
      </div>
    </div>
    <!-- /dashboard content -->