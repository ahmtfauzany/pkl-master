<?php
$user = $query; ?>
<STyle>
  .content-wrapper {
    font-family: monospace;
  }
</STyle>
<!-- Main content -->
<div style="background-color: #333;" class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading text-left">
            <div class="row">
              <div style="font-size:large;" class="text-center">
                <b class="text-bold">EDIT USER</b>
              </div>
            </div>
            <div class="panel-body">
              <fieldset class="content-group">
                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label class="control-label col-lg-3">Nama User</label>
                    <div class="col-lg-12">
                      <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" placeholder="Nama User" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Nama Lengkap</label>
                    <div class="col-lg-12">
                      <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $user->nama_lengkap; ?>" placeholder="Nama Lengkap" maxlength="100" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Nip</label>
                    <div class="col-lg-12">
                      <input type="text" name="nip" class="form-control" value="<?php echo $user->nip; ?>" placeholder="Nama Lengkap" maxlength="100" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Nomer Telepon</label>
                    <div class="col-lg-12">
                      <input type="text" name="telp" class="form-control" value="<?php echo $user->telp; ?>" placeholder="Telp" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Level</label>
                    <div class="col-lg-12">
                      <select class="form-control" name="level" required>
                        <option value="">- Pilih Level user -</option>
                        <option value="admin" <?php if ($user->level == "admin") {
                                                echo "selected";
                                              } ?>>Admin</option>
                        <option value="pegawai" <?php if ($user->level == "S_Admin") {
                                                  echo "selected";
                                                } ?>>S_Admin</option>
                        <option value="pegawai" <?php if ($user->level == "Kepsek") {
                                                  echo "selected";
                                                } ?>>Kepsek</option>
                        <option value="pegawai" <?php if ($user->level == "Pegawai") {
                                                  echo "selected";
                                                } ?>>Pegawai</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Alamat</label>
                    <div class="col-lg-12">
                      <textarea name="alamat" rows="3" cols="80" class="form-control" placeholder="Alamat" required><?php echo $user->alamat; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Skill</label>
                    <div class="col-lg-12">
                      <textarea name="pengalaman" rows="3" cols="80" class="form-control" placeholder="Pengalaman" required><?php echo $user->pengalaman; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-lg-3">Hoby</label>
                    <div class="col-lg-12">
                      <textarea name="hoby" rows="3" cols="80" class="form-control" placeholder="Hoby" required><?php echo $user->hoby; ?></textarea>
                    </div>
                  </div>
                  <a style="background-color: #333; color:white;" href="users/user" class="btn"><b> <- KEMBALI</b></a>
                  <button style="background-color : #333; color:white;" type="submit" name="btnupdate" class="btn"><b>UPDATE</b></button>
                </form>

              </fieldset>


            </div>

          </div>
        </div>
      </div>
      <!-- /dashboard content -->