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
                <span class="" aria-hidden="true"></span><b class="">&nbsp; DATA IZIN</b><br>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level == 'admin'  or 'pegawai') { ?>
                  <a style="background-color: #333; color:white;" href="users/izin/t" class="btn btn-xs" style="margin-top: 5px;"><b>TAMBAH DATA</b></a>
                <?php
                } ?>
              </div>
            </div>
          </div>
          <div class="panel-body" style="margin-top: -20px;">
            <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
              <thead>
                <tr class="bg-info">
                  <th width="10">No.</th>
                  <th>Nama Siswa | NIM</th>
                  <th>Alasan</th>
                  <th>keterangan</th>
                  <th>Dari Tanggal</th>
                  <th>Dari Tanggal</th>
                  <th>Sampai Tanggal</th>
                  <th>Hari</th>
                  <?php
                  if ($user->row()->level == 'admin'  or 'pegawai') { ?>
                    <th class="text-center" width="140px">Aksi</th>
                  <?php
                  } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($izin->result() as $baris) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td><?php echo $baris->nama_siswa; ?> | <?php echo $baris->nim; ?></td>
                    <td><?php echo $baris->alasan; ?></td>
                    <td><?php echo $baris->keterangan; ?></td>
                    <td><?php echo $baris->tgl_awal; ?></td>
                    <td><?php echo $baris->tgl_awal; ?></td>
                    <td><?php echo $baris->tgl_akhir; ?></td>
                    <td><?php echo $baris->lama; ?> Hari</td>
                    <?php
                    if ($user->row()->level == 'admin' or 'pegawai') { ?>
                      <td class="text-center">
                        <a style="background-color: #333; color:white;" href="users/izin/d/<?php echo $baris->id_izin; ?>" class="btn btn-xs"><i class="icon-eye"></i></a>
                        <a style="background-color: #333; color:white;" href="users/izin/e/<?php echo $baris->id_izin; ?>" class="btn btn-xs"><i class="icon-pencil7"></i></a>
                        <a style="background-color: #333; color:white;" href="users/izin/h/<?php echo $baris->id_izin; ?>" class="btn btn-xs" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
                      </td>
                    <?php
                    } ?>
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