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
  $(function() {
    $("#tgl_kegiatan").datepicker();
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
$this->db->order_by('id_sk', 'DESC');
$this->db->limit(1);
$cek_ns = $this->db->get('tbl_sk');
// if ($cek_ns->num_rows() == 0) {
//   $no_surat       = "SK/" . date('Y') . "/MAN2/001";
// } else {
//   $noUrut          = substr($cek_ns->row()->no_surat, 14, 15);
//   $noUrut++;
//   $no_surat        = "SK/" . date('Y') . "/MAN2/" . sprintf("%03s", $noUrut);
// }
// if ($cek_ns->num_rows() == 0) {
//   $no_surat       = "001";
// } else {
//   $noUrut          = substr($cek_ns->row()->no_sk, 0, 3);
//   $noUrut++;
//   $no_surat        = sprintf("%03s", $noUrut);
// }
// 
?>
<style>
  .dropzone {
    margin-top: 10px;
    border: 2px dashed #0087F7;
  }
</style>
<!-- Main content -->
<div style="background-color: #333;" class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div style="background-color: #333; color:white" class="panel-heading text-left">
            <div class="row">
              <div style="font-size:large;" class="text-center">
                <b>TAMBAH SURAT KELUAR</b>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal" action="users/sk" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Asal Instansi Surat</span>
                      <input type="text" name="asal_instansi" id="asal_instansi" class="form-control" placeholder="Asal Instansi Surat">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Surat Keluar</span>
                        <input type="text" name="tgl_sk" class="form-control daterange-single" id="tgl_sk" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required placeholder="Tanggal Surat Keluar">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <div class="input-group">
                          <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">No S.K</span>
                          <!-- <input type="text" name="nsx" id="nsx" class="form-control" placeholder="" value="<?php echo $no_surat; ?>" required readonly> -->
                          <input type="text" name="ns" id="ns" class="form-control" placeholder="No S.K" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-lg-12">
                          <div class="input-group">
                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nomor Surat</span>
                            <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="No Surat">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Perihal Surat</span>
                              <input type="text" name="perihal" id="perihal" class="form-control" placeholder="Perihal Surat">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tanggal Kegiatan</span>
                                <input type="text" name="tgl_kegiatan" class="form-control daterange-single" id="tgl_kegiatan" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required placeholder="Tanggal Kegiatan">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-lg-3"><b>Tambahkan Lampiran</b>&nbsp;&nbsp;</label>
                              <div class="col-lg-12">
                                <div class="dropzone" id="myDropzone">
                                  <div class="dz-message">
                                    <h3> Klik atau Drop Lampiran disini</h3>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <hr>
                            <a style="background-color: #333; color: white;" href="users/sk" class="btn"> <- KEMBALI</a>
                                <button style="background-color: #333; color: white;" type="submit" id="submit-all" class="btn">SIMPAN</button>
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
        url: "<?php echo base_url('users/sk') ?>",
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
            formData.append("tgl_kegiatan", jQuery("#tgl_kegiatan").val());
            formData.append("tgl_ns", jQuery("#tgl_ns").val());
            formData.append("tgl_sk", jQuery("#tgl_sk").val());
            formData.append("no_surat", jQuery("#no_surat").val());
            formData.append("status", jQuery("#status").val());
            formData.append("perihal", jQuery("#perihal").val());
            formData.append("asal_instansi", jQuery("#asal_instansi").val());
            formData.append("pelaksana", jQuery("#pelaksana").val());

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
              '     BERHASIL! SURAT KELUAR BERHASIL DISIMPAN' +
              '  </div>');
            $("#penerima").focus();

            alert('BERHASIL! SURAT KELUAR BERHASIL DISIMPAN');
            window.location = "<?php echo base_url(); ?>users/sk/t";
            //     }
            // });

            myDropzone.removeFile(file);
          });

        }
      };
    </script>