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
                <span class="" aria-hidden="true"></span><b class="">&nbsp; DAFTAR SURAT KELUAR</b>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level == 'admin') { ?>
                  <a href="users/sk/t" class="btn btn-xs" style="background-color: #333; color:white;">TAMBAH DATA</a>
                <?php
                } ?>
              </div>
            </div>
          </div>

          <div class="panel-body" style="margin-top: -20px;">
            <table class="table table-xl table-hover table-striped table-bordered datatable-basic">
              <thead>
                <tr>
                  <th style="background-color: #333;">Asal Instansi Surat</th>
                  <th style="background-color: #333;">Tanggal Surat Keluar</th>
                  <th style="background-color: #333;">No S.K</th>
                  <th style="background-color: #333;">Nomor Surat</th>
                  <th style="background-color: #333;">Perihal</th>
                  <th style="background-color: #333;">Perihal</th>
                  <th style="background-color: #333;">Tanggal Kegiatan</th>
                  <?php
                  if ($user->row()->level == 'admin') { ?>
                    <th style="background-color: #333;" class="text-center">Aksi</th>
                  <?php
                  } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($sk->result() as $baris) {
                ?>
                  <td><?php echo $baris->asal_instansi; ?></td>
                  <td><?php echo $baris->tgl_sk; ?></td>
                  <td><?php echo $baris->no_sk; ?></td>
                  <td><?php echo $baris->no_surat; ?></td>
                  <td><?php echo $baris->perihal; ?></td>
                  <td><?php echo $baris->perihal; ?></td>
                  <td><?php echo $baris->tgl_kegiatan; ?></td>
                  <?php
                  if ($user->row()->level == 'admin') { ?>
                    <td class="text-center">
                      <a style=" background-color: #333; color:white;;" href="users/sk/d/<?php echo $baris->id_sk; ?>" class="btn btn-xs"><i class="icon-eye"></i></a>
                      <a style=" background-color: #333; color:white;;" href="users/sk/e/<?php echo $baris->id_sk; ?>" class="btn btn-xs"><i class="icon-pencil7"></i></a>
                      <a style=" background-color: #333; color:white;" href="users/sk/h/<?php echo $baris->id_sk; ?>" class="btn btn-xs" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
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