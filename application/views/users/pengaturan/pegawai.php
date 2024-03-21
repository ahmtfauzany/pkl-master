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
                <span class="" aria-hidden="true"></span><b class="">&nbsp; DAFTAR PEGAWAI</b><br>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level == 'admin') { ?>
                  <a href="users/pegawai/t" class="btn btn-xs" style="background-color: #333; color:white; margin-top: 5px;"><b>TAMBAH DATA</b></a>
                <?php
                } ?>
              </div>
            </div>
          </div>
          <div class="panel-body" style="margin-top: -20px;">
            <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
              <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th>Nama Pegawai</th>
                  <th>NIP</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Pangkat Golongan</th>
                  <th>Jabatan</th>
                  <?php
                  if ($user->row()->level == 'admin') { ?>
                    <th class="text-center" width="170"> Aksi</th>
                  <?php
                  } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($pegawai->result() as $baris) {
                ?>
                  <tr>
                    <td><?php echo $no . '.'; ?></td>
                    <td><?php echo $baris->nama_pegawai; ?></td>
                    <td><?php echo $baris->nip_pegawai; ?></td>
                    <td><?php echo $baris->ttl; ?></td>
                    <td><?php echo $baris->jenis_kelamin; ?></td>
                    <td><?php echo $baris->agama; ?></td>
                    <td><?php echo $baris->pangkat; ?></td>
                    <td><?php echo $baris->jabatan; ?></td>
                    <?php
                    if ($user->row()->level == 'admin') { ?>
                      <td class="text-center">
                        <a style="background-color: #333; color:white;" href="users/pegawai/e/<?php echo $baris->id_pegawai; ?>" class="btn btn-xs"><i class="icon-eye"></i></a>
                        <a style="background-color: #333; color:white;" href="users/pegawai/h/<?php echo $baris->id_pegawai; ?>" class="btn btn-xs " onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
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
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->