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
                <span class="" aria-hidden="true"></span><b class="">&nbsp; DAFTAR USER</b><br>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level == 's_admin') { ?>
                  <a style="background-color: #333; color:white;" href="users/user/t" class="btn btn-xs" style="margin-top: 5px;"><b>TAMBAH USER</b></a>
                <?php
                } ?>
              </div>
            </div>
          </div>
          <div class="panel-body" style="margin-top: -20px;">
            <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
              <thead>
                <tr>
                  <th width="30px;">No.</th>
                  <th style="background-color: #333;">Nama Lengkap</th>
                  <th style="background-color: #333;">Nip</th>
                  <th style="background-color: #333;">Nomer Telepon</th>
                  <th style="background-color: #333;">Level</th>
                  <th>Tgl Daftar</th>
                  <th>Login Terakhir</th>
                  <th class="text-center" width="140px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($level_users->result() as $baris) {
                ?>
                  <tr>
                    <td class="text-center"><?php echo $no . '.'; ?></td>
                    <td><?php echo $baris->nama_lengkap; ?></td>
                    <td><?php echo $baris->nip; ?></td>
                    <td><?php echo $baris->telp; ?></td>
                    <td><?php if ($baris->level == "s_admin") {
                          echo "Super Admin";
                        } else {
                          echo ucwords($baris->level);
                        } ?></td>
                    <td><?php if ($baris->tgl_daftar == "") {
                          echo "-";
                        } else {
                          echo $baris->tgl_daftar;
                        } ?></td>
                    <td><?php if ($baris->terakhir_login == "") {
                          echo "-";
                        } else {
                          echo $baris->terakhir_login;
                        } ?></td>
                    <td class="text-center">
                      <a style="background-color: #333; color:white;" href="users/user/d/<?php echo $baris->id_user; ?>" class="btn btn-xs"><i class="icon-eye"></i></a>
                      <a style="background-color: #333; color:white;" href="users/user/e/<?php echo $baris->id_user; ?>" class="btn btn-xs"><i class="icon-pencil7"></i></a>
                      <a style="background-color: #333; color:white;" href="users/user/h/<?php echo $baris->id_user; ?>" class="btn btn-xs" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
                    </td>
                  </tr>
                <?php
                  $no++;
                } ?>
              </tbody>
            </table>
          </div>
          <!-- /basic datatable -->
        </div>
      </div>
    </div>
    <!-- /dashboard content -->