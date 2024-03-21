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
      <div class="col-md-12"></div>
      <div class="">
        <div class="panel panel-flat">

          <div class="panel-body">

            <fieldset class="content-group">
              <div style="font-size:large;" class="text-center">
                <b class="text-bold">TAMBAH USER</b>
              </div>
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <label class="control-label col-lg-3">User</label>
                  <div class="col-lg-12">
                    <select class="form-control" name="level" required>
                      <option value="">- Pilih Level User -</option>
                      <option value="S_Admin">S_Admin</option>
                      <option value="Admin">Admin</option>
                      <option value="Kepsek">Kepsek</option>
                      <option value="Pegawai">Pegawai</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Nama User</label>
                  <div class="col-lg-12">
                    <input type="text" name="username" class="form-control" value="" placeholder="Nama User" maxlength="100" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3">Katasandi</label>
                  <div class="col-lg-12">
                    <input type="password" name="password" class="form-control" value="" placeholder="Katasandi" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3">Ulangi Katasandi</label>
                  <div class="col-lg-12">
                    <input type="password" name="password2" class="form-control" value="" placeholder="Ulangi Katasandi" required>
                  </div>
                </div>

                <a style="background-color: #333; color:white;" href="users/user" class="btn"> <- Kembali</a>
                    <button type="submit" name="btnsimpan" class="btn" style="background-color: #333; color:white;">Simpan</button>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- /dashboard content -->