<?php
$user = $user->roW();
if ($user->level == "s_admin") {
  $level = "Super Admin";
} else {
  $level = $user->level;
} ?>
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
    <div class="col-md-12">
      <div class="panel panel-flat">
        <div class="panel-body">
          <fieldset class="content-group">
            <div style="font-size:large;" class="text-center">
              <b>DETAIL USER</b>
            </div>
            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                <label class="control-label col-lg-3">User</label>
                <div class="col-lg-9">
                  <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" placeholder="User" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Nama Lengkap</label>
                <div class="col-lg-9">
                  <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $user->nama_lengkap; ?>" placeholder="Nama Lengkap" maxlength="100" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Nip</label>
                <div class="col-lg-9">
                  <input type="text" name="nip" class="form-control" value="<?php echo $user->nip; ?>" placeholder="Nip" maxlength="100" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Telp</label>
                <div class="col-lg-9">
                  <input type="text" name="telp" class="form-control" value="<?php echo $user->telp; ?>" placeholder="telp" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Level</label>
                <div class="col-lg-9">
                  <select class="form-control" name="level">
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
                <div class="col-lg-9">
                  <textarea name="alamat" rows="4" cols="80" class="form-control" placeholder="Alamat" readonly><?php echo $user->alamat; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Skill</label>
                <div class="col-lg-9">
                  <textarea name="pengalaman" rows="4" cols="80" class="form-control" placeholder="Skill" readonly><?php echo $user->pengalaman; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Hoby</label>
                <div class="col-lg-9">
                  <textarea name="hoby" rows="4" cols="80" class="form-control" placeholder="Hoby" readonly><?php echo $user->hoby; ?></textarea>
                </div>
              </div>
          </fieldset>
          <div class="col-md-12">
            <a style="background-color: #333; color:white;" href="users/user" class="btn"><b> <- KEMBALI</b></a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /dashboard content -->