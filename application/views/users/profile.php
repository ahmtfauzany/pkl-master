<?php
$user = $user->roW();
if ($user->level == "s_admin") {
  $level = "Super Admin";
} else {
  $level = $user->level;
} ?>
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
            <div class="text-center ">
              <legend style="font-size: large;" class="text-bold">PROFILE</legend>
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
                  <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $user->nama_lengkap; ?>" placeholder="Nama Lengkap" maxlength="100" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Nip</label>
                <div class="col-lg-9">
                  <input type="text" name="nip" class="form-control" value="<?php echo $user->nip; ?>" placeholder="Nip" maxlength="100" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Telp</label>
                <div class="col-lg-9">
                  <input type="text" name="telp" class="form-control" value="<?php echo $user->telp; ?>" placeholder="telp" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Level</label>
                <div class="col-lg-9">
                  <input type="text" name="" class="form-control" value="<?php echo $level; ?>" placeholder="Role" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Alamat</label>
                <div class="col-lg-9">
                  <textarea name="alamat" rows="4" cols="80" class="form-control" placeholder="Alamat" required><?php echo $user->alamat; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Skill</label>
                <div class="col-lg-9">
                  <textarea name="pengalaman" rows="4" cols="80" class="form-control" placeholder="Skill" required><?php echo $user->pengalaman; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-3">Hoby</label>
                <div class="col-lg-9">
                  <textarea name="hoby" rows="4" cols="80" class="form-control" placeholder="Hoby" required><?php echo $user->hoby; ?></textarea>
                </div>
              </div>
          </fieldset>
          <div class="col-md-12">
            <a style="background-color: #333; color:white;" href="users" class="btn"><b> <- KEMBALI</b></a>
            <button style="background-color : #333; color:white;" type="submit" name="btnupdate" class="btn"><b>UPDATE</b></button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /dashboard content -->