<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tgl_awal").datepicker();
  });
  $(function() {
    $("#tgl_akhir").datepicker();
  });
</script>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel">
          <div style="background-color: #333;" class="panel-heading text-left">
            <div class="row">
              <div style="color: white;" class="col-sm-6 text-left">
                <h4><b>FILTER DATA SURAT KELUAR</b></h4>
                <p>cetak laporan berdasarkan y/m/d</p>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal text-center" action="" method="post">
                <div class="form-group">
                  <label class="control-label col-lg-3">Dari Tanggal</label>
                  <div class="col-lg-12">
                    <div class="input">
                      <input type="text" name="tgl1" class="form-control" id="tgl_awal" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required>
                    </div>
                  </div>
                  <label class="control-label col-lg-3">Sampai Tanggal</label>
                  <div class="col-lg-12">
                    <div class="input">
                      <input type="text" name="tgl2" class="form-control" id="tgl_akhir" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required>
                    </div>
                  </div>
                </div>
                <button style="background-color: #333; color:white;" type="submit" name="data_lap" class="btn col-lg-1"><span class="glyphicon glyphicon-search"></span>&nbsp;<b> FILTER DATA</b></button>
          </div>
          </form>
          </fieldset>
        </div>
      </div>
    </div>
  </div>
  <!-- /dashboard content -->