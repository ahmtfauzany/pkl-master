<?php
$cek    = $user->row();
$nama   = $cek->nama_lengkap;
$email  = $cek->email;
$level  = $cek->level;
$nip  = $cek->nip;
if ($level == "s_admin") {
  $level = "Super Admin";
}
$menu     = strtolower($this->uri->segment(1));
$sub_menu   = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));
?>
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
          <div style="background-color: #333; color:white" class="panel-heading">
            <div class="row">
              <div class="text-center">
                <b style="font-size:large;">DETAIL PENGAJUAN CUTI</b><br>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                <div class="form-group">

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nama Lengkap</span>
                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="<?php echo ucwords($nama); ?>" readonly>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nip</span>
                        <input type="text" name="ns" id="ns" class="form-control" value="<?php echo ucwords($nip); ?>" readonly>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Surat Diajukan</span>
                        <input type="text" name="tgl_cuti" class="form-control daterange-single" id="tgl_cuti" value="<?php echo $query->tgl_cuti; ?>" maxlength="10" required placeholder="Masukkan Tanggal" readonly>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Alasan</span>
                        <input type="text" class="form-control" value="<?php echo $query->alasan; ?>" readonly>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                        <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo $query->tgl_awal ?>" maxlength="10" readonly>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                        <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo $query->tgl_akhir; ?>" maxlength="10" readonly>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Hari</span>
                        <input type="text" class="form-control" value="<?php echo $query->lama; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="form-group">
                    <label class="control-label col-lg-3"><b>Lampiran</b></label>
                    <div class="col-lg-12 col-sm-12" style="overflow-x:auto;">
                      <table class="table table-xs table-responsive table-striped table-bordered" style="width: 100%;">
                        <tr>
                          <th><b>Nama Berkas</b></th>
                          <th width='10%'><b>Ukuran</b></th>
                          <th width='5%' td class="text-center"><b>Aksi</b></th>
                        </tr>
                        <?php
                        $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$query->token_lampiran'");
                        $no = 1;
                        foreach ($lampiran->result() as $baris) { ?>
                          <tr>
                            <td><?php echo $baris->nama_berkas; ?></td>
                            <td><?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB</td>
                            <td class="text-center">
                              <a style="background-color: #333; color:white;" href="lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" class="btn btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                            </td>
                            </td>
                          </tr>
                        <?php
                          $no++;
                        } ?>
                      </table>
                      <hr>
                      <a style="background-color: #333; color:white;" href="users/cuti/t" class="btn"><b> <- KEMBALI</b></a>
                    </div>
                  </div>
                </div>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->