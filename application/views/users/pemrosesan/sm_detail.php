<style>
  .content-wrapper {
    font-family: monospace;
  }
</style>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tgl_ns").datepicker();
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
                <b style="font-size:large;">DETAIL SURAT MASUK</b>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <?php
              ?>
              <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Asal Instansi Surat</span>
                      <input type="text" name="asal_instansi" id="asal_instansi" class="form-control" value="<?php echo $query->asal_instansi; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Surat Masuk</span>
                        <input type="text" class="form-control" value="<?php echo $query->tgl_sm; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <div class="input-group">
                          <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">No S.M</span>
                          <input type="text" name="ns" id="ns" class="form-control" value="<?php echo $query->no_sm; ?>" placeholder="" required readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-12">
                          <div class="input-group">
                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nomor Surat</span>
                            <input type="text" name="no_surat" id="no_surat" class="form-control" value="<?php echo $query->no_surat; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Perihal</i></span>
                              <input type="text" class="form-control" value="<?php echo $query->perihal; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                                <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo $query->tgl_awal; ?>" maxlength="10" required placeholder="Masukkan Tanggal" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-lg-12">
                                <div class="input-group">
                                  <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                                  <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo $query->tgl_akhir; ?>" maxlength="10" required placeholder="Masukkan Tanggal" readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-lg-12">
                                  <div class="input-group">
                                    <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Lampiran</span>
                                    <select class="form-control" name="lampiran" id="lampiran" disabled>
                                      <option value="<?php echo $query->lampiran; ?>"><?php echo $query->lampiran; ?></option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-lg-12"><b>Lampiran</b></label>
                                  <div class="col-lg-12 col-sm-12" style="overflow-x:auto;">
                                    <table class="table table-xs table-responsive table-striped table-bordered" style="width: 100%;">
                                      <tr>
                                        <th><b>Nama Berkas</b></th>
                                        <th width='15%'><b>Tanggal Berkas</b></th>
                                        <th width='10%'><b>Ukuran</b></th>
                                        <th width='5%' td class="text-center"><b>Aksi</b></th>
                                      </tr>
                                      <?php
                                      $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$query->token_lampiran'");
                                      $no = 1;
                                      foreach ($lampiran->result() as $baris) { ?>
                                        <tr>
                                          <td><?php echo $baris->nama_berkas; ?></td>
                                          <td><?php echo $query->tgl_sm; ?></td>
                                          <td><?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB</td>
                                          <td class="text-center">
                                            <a style="background-color: #333; color:white;" href="https://docs.google.com/viewerg/viewer?url=ALAMAT-WEBSITE/lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" class="btn btn-sm"><span class="glyphicon glyphicon-eye-open"></a>
                                          </td>
                                          </td>
                                        </tr>
                                      <?php
                                        $no++;
                                      } ?>
                                    </table>
                                    <hr>
                                    <a style="background-color: #333; color:white;" href="users/sm" class="btn"><b> <- KEMBALI</b></a>
                                  </div>
                                </div>
              </form>

            </fieldset>


          </div>

        </div>
      </div>
    </div>
    <!-- /dashboard content -->