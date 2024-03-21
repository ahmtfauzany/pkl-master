<!-- Main content -->
<div style="background-color: #333;" class="content-wrapper">
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
                <span class="" aria-hidden="true"></span><b class="">DATA SURAT MASUK</b>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level == 'admin') { ?>
                  <form action="" method="post" target="_blank">
                    <button type="submit" name="btncetak" class="btn btn-xs" style="background-color: #333; color:white; margin-top: 7px; background-color: #333; color:white;"><b>PRINT LAPORAN</b></button>
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
                  <th>Asal Instansi Surat</th>
                  <th>Tanggal Surat Masuk</th>
                  <th>No S.M</th>
                  <th>Nomor Surat</th>
                  <th>Perihal</th>
                  <th>Perihal</th>
                  <th>Dari Tanggal</th>
                  <th>Sampai Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($sql->result() as $baris) {
                ?>
                  <tr>
                    <td><?php echo $baris->asal_instansi; ?></td>
                    <td><?php echo $baris->tgl_sm; ?></td>
                    <td><?php echo $baris->no_sm; ?></td>
                    <td><?php echo $baris->no_surat; ?></td>
                    <td><?php echo $baris->perihal; ?></td>
                    <td><?php echo $baris->perihal; ?></td>
                    <td><?php echo $baris->tgl_awal; ?></td>
                    <td><?php echo $baris->tgl_akhir; ?></td>
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