<style>
  .content-wrapper {
    font-family: monospace;
  }
</style>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tgl_sm").datepicker();
  });
  $(function() {
    $("#tgl_awal").datepicker();
  });
  $(function() {
    $("#tgl_akhir").datepicker();
  });
</script>
<script type="text/javascript" src="assets/js/core/app.js"></script>
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
              <div class="text-center">
                <b style="font-size:large;">EDIT SURAT MASUK</b>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <?php
              ?>
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Asal Instansi Surat</span>
                      <input type="text" name="asal_instansi" class="form-control" id="asal_instansi" value="<?php echo $query->asal_instansi; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Surat Masuk</span>
                        <input type="text" name="tgl_sm" id="tgl_sm" class="form-control daterange-single" value="<?php echo $query->tgl_sm; ?>" placeholder="">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <div class="input-group">
                          <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">No S.M</span>
                          <input type="text" name="ns" id="ns" class="form-control" value="<?php echo $query->no_sm; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-lg-12">
                          <div class="input-group">
                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nomor Surat</span>
                            <input type="text" name="no_surat" id="no_surat" class="form-control" value="<?php echo $query->no_surat; ?>" placeholder="" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Perihal</span>
                              <input type="text" name="perihal" id="perihal" class="form-control" value="<?php echo $query->perihal; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                                <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo $query->tgl_awal; ?>" maxlength="10" required placeholder="Masukkan Tanggal">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-lg-12">
                                <div class="input-group">
                                  <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Kegiatan</span>
                                  <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo $query->tgl_akhir; ?>" maxlength="10" required placeholder="Masukkan Tanggal">
                                </div>
                              </div>

                              <div class="col-lg-12">
                                <div class="input-group">
                                  <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Lampiran</span>
                                  <select class="form-control" name="lampiran" id="lampiran">
                                    <option value="<?php echo $query->lampiran; ?>"><?php echo $query->lampiran; ?></option>
                                    <option value="">Lampiran</option>
                                    <option value="1 Lampiran">1 Lampiran</option>
                                    <option value="2 Lampiran">2 Lampiran</option>
                                    <option value="3 Lampiran">3 Lampiran</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-lg-3"><b>Lampiran</b></label>
                                <div class="col-lg-12">
                                  <table class="table table-xs table-bordered">
                                    <tr>
                                      <th><b>Nama Berkas</b></th>
                                      <th width='15%'><b>Tanggal Berkas</b></th>
                                      <th width='10%'><b>Ukuran</b></th>
                                      <th width='5%' class="text-center"><b>Aksi</b></th>
                                    </tr>
                                    <?php
                                    $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$query->token_lampiran'");
                                    $no = 1;
                                    foreach ($lampiran->result() as $baris) { ?>
                                      <tr>
                                        <td><?php echo $baris->nama_berkas; ?></td>
                                        <td><?php echo $query->tgl_sm; ?></td>
                                        <td><?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB</td>
                                        <td class="text-center"><a style="background-color: #333; color:white;" href="lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" title="<?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB" class="btn btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                      </tr>
                                    <?php
                                      $no++;
                                    } ?>
                                  </table>
                                  <hr>
                                  <a style="background-color: #333; color:white;" href="users/sm" class="btn"><b> <- KEMBALI</b></a>
                                  <button style="background-color: #333; color:white;" type="submit" name="btnupdate" id="submit-all" class="btn"><b>UPDATE</b></button>
                                </div>
                              </div>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /dashboard content -->