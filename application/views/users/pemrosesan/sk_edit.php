<style>
  .content-wrapper {
    font-family: monospace;
  }
</style>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tgl_sk").datepicker();
  });
</script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
<style>
  .dropzone {
    margin-top: 10px;
    border: 2px dashed #0087F7;
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
          <div style="background-color: #333; color:white" class="panel-heading text-left">
            <div class="row">
              <div style="font-size:large;" class="text-center">
                <b>EDIT SURAT KELUAR</b><br>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Asal Instansi Surat</span>
                      <input type="text" name="asal_instansi" id="asal_instansi" value="<?php echo $query->asal_instansi; ?>" class="form-control" placeholder="Asal Instansi Surat">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Surat Keluar</span>
                        <input type="text" name="tgl_sk" class="form-control daterange-single" id="tgl_sk" value="<?php echo $query->tgl_sk; ?>" maxlength="10" required placeholder="Tanggal Surat Keluar">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <div class="input-group">
                          <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">No S.K</span>
                          <input type="text" name="no_sk" id="no_sk" value="<?php echo $query->no_sk; ?>" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-lg-12">
                          <div class="input-group">
                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nomor Surat</span>
                            <input type="text" name="no_surat" id="no_surat" value="<?php echo $query->no_surat; ?>" class="form-control" placeholder="No Surat">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Perihal Surat</span>
                              <input type="text" name="perihal" id="perihal" value="<?php echo $query->perihal; ?>" class="form-control" placeholder="Perihal Surat">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Kegiatan</span>
                                <input type="text" name="tgl_kegiatan" class="form-control daterange-single" id="tgl_kegiatan" value="<?php echo $query->tgl_kegiatan; ?>" maxlength="10" required placeholder="Tanggal Surat Keluar">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-lg-3"><b>Lampiran</b></label>
                              <div class="col-lg-12">
                                <table class="table table-xs table-bordered">
                                  <tr>
                                    <th width='5%'><b>No.</b></th>
                                    <th><b>Nama</b></th>
                                    <th><b>Tanggal</b></th>
                                    <th><b>Ukuran</b></th>
                                    <th class="text-center"><b>Aksi</b></th>
                                  </tr>
                                  <?php
                                  $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$query->token_lampiran'");
                                  $no = 1;
                                  foreach ($lampiran->result() as $baris) { ?>
                                    <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $baris->nama_berkas; ?></td>
                                      <td><?php echo $query->tgl_sk; ?></td>
                                      <td><?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB</td>
                                      <td class="text-center"><a style="background-color: #333; color:white;" href="lampiran/surat_keluar/<?php echo $baris->nama_berkas; ?>" target="_blank" title="<?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB" class="btn btn-xs"><span class="glyphicon glyphicon-eye-open"></a></td>
                                    </tr>
                                  <?php
                                    $no++;
                                  } ?>
                                </table>
                              </div>
                            </div>
                            <hr>
                            <a style="background-color: #333; color:white;" href="users/sk" class="btn"> <- KEMBALI</a>
                                <button style="background-color: #333; color:white;" type="submit" name="btnupdate" id="submit-all" class="btn">UPDATE</button>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->