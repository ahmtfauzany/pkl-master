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
<link rel="stylesheet" type="text/css" href="assets/upload/dropzone.min.css">
<script type="text/javascript" src="assets/upload/dropzone.min.js"></script>
<style>
  .dropzone {
    margin-top: 10px;
    border: 2px dashed #0087F7;
  }
</style>

<?php
$this->db->order_by('id_sm', 'DESC');
$this->db->limit(1);
$cek_ns = $this->db->get('tbl_sm');
// if ($cek_ns->num_rows() == 0) {
//   $no_sm       = "SM/" . date('Y') . "/MAN2/001";
// } else {
//   $noUrut          = substr($cek_ns->row()->no_sm, 14, 15);
//   $noUrut++;
//   $no_sm        = "SM/" . date('Y') . "/MAN2/" . sprintf("%03s", $noUrut);
// }
// if ($cek_ns->num_rows() == 0) {
//   $no_sm       = "001";
// } else {
//   $noUrut          = substr($cek_ns->row()->no_sm, 0, 3);
//   $noUrut++;
//   $no_sm        = sprintf("%03s", $noUrut);
// }
?>
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
                <b style="font-size:large;">TAMBAH SURAT MASUK</b><br>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <div class="msg"></div>
              <form class="form-horizontal" action="users/sm" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Asal Instansi Surat</span>
                      <input type="text" name="asal_instansi" id="asal_instansi" class="form-control" placeholder="Masukkan Asal Instansi Surat">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Surat Masuk</span>
                        <input type="text" name="tgl_sm" class="form-control daterange-single" id="tgl_sm" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required placeholder="Masukkan Tanggal Surat Masuk">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-12">
                        <div class="input-group">
                          <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">No S.M</span>
                          <input type="text" name="ns" id="ns" class="form-control" placeholder="Masukkan No S.M">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-12">
                          <div class="input-group">
                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nomor Surat</span>
                            <input type="text" name="no_surat" id="no_surat" required class="form-control" placeholder="Masukkan Nomor Surat">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Perihal</span>
                              <input type="text" name="perihal" id="perihal" class="form-control" placeholder="Masukkan Perihal">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                                <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required placeholder="Masukkan Tanggal Surat">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-lg-12">
                                <div class="input-group">
                                  <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                                  <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required placeholder="Masukkan Tanggal Surat">
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-lg-12">
                                  <div class="input-group">
                                    <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Lampiran</span>
                                    <select class="form-control" name="lampiran" id="lampiran">
                                      <option value="-">Pilih Lampiran</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="form-group">
                                  <label class="control-label col-lg-3"><b>Tambahkan Lampiran</b>&nbsp;&nbsp;</label>
                                  <div class="col-lg-12">
                                    <div class="dropzone" id="myDropzone">
                                      <div class="dz-message">
                                        <h3> KLIK/DROP FILE DISINI</h3>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <a style="background-color: #333; color:white;" href="users/sm" class="btn btn-xs"><b> <- KEMBALI</b></a>
                                <button style="background-color: #333; color:white;" type="submit" id="submit-all" class="btn btn-xs"><b>SIMPAN</b></button>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->

    <script type="text/javascript">
      $('.msg').html('');
      Dropzone.options.myDropzone = {
        // Prevents Dropzone from uploading dropped files immediately
        url: "<?php echo base_url('users/sm') ?>",
        paramName: "userfile",
        // acceptedFiles:"'file/doc','file/xls','file/xlsx','file/docx','file/pdf','file/txt',image/jpg,image/jpeg,image/png,image/bmp",
        autoProcessQueue: false,
        maxFilesize: 10, //MB
        parallelUploads: 10,
        maxFiles: 10,
        addRemoveLinks: true,
        dictCancelUploadConfirmation: "Yakin ingin membatalkan upload ini?",
        dictInvalidFileType: "Type file ini tidak dizinkan",
        dictFileTooBig: "File yang Anda Upload terlalu besar {{filesize}} MB. Maksimal Upload {{maxFilesize}} MB",
        dictRemoveFile: "Hapus",

        init: function() {
          var submitButton = document.querySelector("#submit-all")
          myDropzone = this; // closure

          submitButton.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue(); // Tell Dropzone to process all queued files.
          });
          // You might want to show the submit button only when
          this.on("error", function(file, message) {
            alert(message);
            this.removeFile(file);
            errors = true;
          });
          // files are dropped here:
          this.on("addedfile", function(file) {
            // Show submit button here and/or inform user to click it.
            //  alert("Apakah anda yakin");
          });

          this.on("sending", function(data, xhr, formData) {
            formData.append("ns", jQuery("#ns").val());
            formData.append("tgl_ns", jQuery("#tgl_ns").val());
            formData.append("no_surat", jQuery("#no_surat").val());

            formData.append("tgl_awal", jQuery("#tgl_awal").val());
            formData.append("tgl_akhir", jQuery("#tgl_akhir").val());
            formData.append("asal_instansi", jQuery("#asal_instansi").val());
            formData.append("disposisi", jQuery("#disposisi").val());
            formData.append("perihal", jQuery("#perihal").val());
            formData.append("tgl_sm", jQuery("#tgl_sm").val());
            formData.append("pegawai", jQuery("#pegawai").val());
            formData.append("lampiran", jQuery("#lampiran").val());

          });

          this.on("complete", function(file) {
            //Event ketika Memulai mengupload
            myDropzone.removeFile(file);
          });

          this.on("success", function(file, response) {
            //Event ketika Memulai mengupload
            // console.log(response);
            //           $(response).each(function (index, element) {
            //               if (element.status) {
            //               }
            //               else {

            $(".cari_ns").select2({
              placeholder: "Pilih nomor",
              allowClear: true
            });
            $(".cari_ns").val('').trigger('change');
            $('.form-horizontal')[0].reset();
            $('.msg').html('<div class="alert alert-success alert-dismissible" role="alert">' +
              '     <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
              '       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>' +
              '     </button>' +
              '     <strong>BERHASIL!</strong> DATA BERHASIL DISIMPAN.' +
              '  </div>');
            $("#no_surat").focus();

            alert('BERHASIL! DATA BERHASIL DISIMPAN.');
            window.location = "<?php echo base_url(); ?>users/sm/";
            //     }
            // });
            myDropzone.removeFile(file);
          });

        }
      };
    </script>