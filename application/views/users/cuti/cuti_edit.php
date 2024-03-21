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
    $("#tgl_cuti").datepicker();
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
          <div style="background-color: #333; color:white" class="panel-heading">
            <div class="row">
              <div class="text-center">
                <b style="font-size:large;">EDIT PENGAJUAN CUTI</b><br>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal" action="" method="post">
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
                      <input type="text" name="tgl_cuti" class="form-control daterange-single" id="tgl_cuti" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required placeholder="Masukkan Tanggal">
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Alasan</span>
                      <input type="text" name="alasan" id="alasan" class="form-control" value="<?php echo $query->alasan; ?>">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                      <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo $query->tgl_awal ?>" maxlength="10" required>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                      <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo $query->tgl_akhir; ?>" maxlength="10" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-3"><b>Lampiran</b></label>
                    <div class="col-lg-12">
                      <table class="table table-xs table-bordered">
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
                            <td class="text-center"><a style="background-color: #333; color:white;" href="lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" title="<?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB" class="btn btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          </tr>
                        <?php
                          $no++;
                        } ?>
                      </table>
                    </div>
                  </div>
                  <script>
                    $(document).ready(function() {
                      $(".cari_penerima").select2({
                        placeholder: "Pilih Penerima"
                      });
                    });
                  </script>
                  <hr>
                  <a style="background-color: #333; color:white;" href="users/cuti/t" class="btn"><b> <- KEMBALI</b></a>
                  <button style="background-color: #333; color:white;" type="submit" name="btnupdate" id="submit-all" class="btn"><b>UPDATE</b></button>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /dashboard content -->