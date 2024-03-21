<style>
  .content-wrapper {
    font-family: monospace;
  }
</style>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div style="background-color: #333; color:white" class="panel-heading">
            <div class="row">
              <div class="text-center">
                <b style="font-size:large;">EDIT DATA PEGAWAI</b><br>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nama Lengkap :</span>
                      <input type="text" name="nama_pegawai" class="form-control" value="<?php echo $query->nama_pegawai; ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">nip_pegawai :</span>
                      <input type="text" name="nip_pegawai" class="form-control" value="<?php echo $query->nip_pegawai; ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tempat Tanggal Lahir :</span>
                      <input type="text" name="ttl" class="form-control" value="<?php echo $query->ttl; ?>" required>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Jenis Kelamin :</span>
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="<?php echo $query->jenis_kelamin; ?>"><?php echo $query->jenis_kelamin; ?></option>
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Agama :</span>
                      <input type="text" name="agama" class="form-control" value="<?php echo $query->agama; ?>" required>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Pangkat Golongan :</span>
                      <input type="text" name="pangkat" class="form-control" value="<?php echo $query->pangkat; ?>" required>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Jabtan :</span>
                      <input type="text" name="jabatan" class="form-control" value="<?php echo $query->jabatan; ?>" required>
                    </div>
                  </div>
                </div>

                <hr>
                <a style="background-color: #333; color:white;" href="users/pegawai" class="btn "><b> <- KEMBALI</b></a>
                <button style="background-color: #333; color:white;" type="submit" name="btnupdate" class="btn "><b>UPDATE DATA</b></button>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->