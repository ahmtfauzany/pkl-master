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
                <b>DAFTAR SURAT MASUK</b>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level == 'admin') { ?>
                  <a style="background-color: #333; color:white;" href="users/sm/t" class="btn btn-xs"><b>TAMBAH DATA</b></a>
                <?php
                } ?>
              </div>
            </div>
          </div>
          <div class="panel-body" style="margin-top: -20px;">
            <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
              <thead>
                <tr class="bg-info">
                  <th width="5%">Status</th>
                  <th>Asal Instansi Surat</th>
                  <th>Tanggal Surat Masuk</th>
                  <th>No S.M</th>
                  <th>Nomor Surat</th>
                  <th>Nomor Surat</th>
                  <th>Perihal</th>
                  <th>Dari Tanggal</th>
                  <th>Sampai Tanggal</th>
                  <th width="11%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($sm->result() as $baris) {
                ?>
                  <tr>
                    <td class="text-center">
                      <?php
                      if ($baris->dibaca == 3) { ?>
                        <span>DISETUJUI</span>
                      <?php } elseif ($baris->dibaca == 2) { ?>
                        <span>DIARSIP</span>
                      <?php } elseif ($baris->dibaca == 1) { ?>
                        <span>DIPENDING</span>
                      <?php } else { ?>
                        <span>DITOLAK</span>
                      <?php } ?>
                    </td>
                    <td><?php echo $baris->asal_instansi; ?></td>
                    <td><?php echo $baris->tgl_sm; ?></td>
                    <td><?php echo $baris->no_sm; ?></td>
                    <td><?php echo $baris->no_surat; ?></td>
                    <td><?php echo $baris->no_surat; ?></td>
                    <td><?php echo $baris->perihal; ?></td>
                    <td><?php echo $baris->tgl_awal; ?></td>
                    <td><?php echo $baris->tgl_akhir; ?></td>
                    <td class="text-left">
                      <a style="background-color: #333; color:white;" href="users/sm/d/<?php echo $baris->id_sm; ?>" class="btn btn-xs"><i class="icon-eye"></i></a>
                      <a style="background-color: #333; color:white;" href="users/sm/e/<?php echo $baris->id_sm; ?>" class="btn btn-xs"><i class="icon-pencil7"></i></a>
                      <a style="background-color: #333; color:white;" href="users/sm/h/<?php echo $baris->id_sm; ?>" class="btn btn-xs" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>

                      <?php if ($baris->dibaca == 3) { ?>
                        <a style="background-color: #333; color:white;" href="users/sm/c/<?php echo $baris->id_sm; ?>" class="btn btn-xs" target="_blank"><i class="icon-printer"></i></a>
                      <?php } ?>
                      <?php if ($user->row()->level == 'admin') { ?>
                        <?php if ($baris->dibaca == 0) { ?>
                        <?php } ?>
                      <?php } ?>
                    </td>
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