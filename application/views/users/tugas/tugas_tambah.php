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
<script type="text/javascript" src="assets/js/core/app.js"></script>
<link rel="stylesheet" type="text/css" href="assets/upload/dropzone.min.css">
<script type="text/javascript" src="assets/upload/dropzone.min.js"></script>
<style>
  .dropzone {
    margin-top: 10px;
    border: 2px dashed #0087F7;
  }

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
                <b style="font-size:large;">TAMBAH DATA TUGAS</b><br>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal" action="users/tugas" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nama Pegawai</span>
                      <select class="form-control cari_penerima" name="id_pegawai" id="id_pegawai" required>
                        <option value=""></option>
                        <?php
                        $this->db->order_by('nama_pegawai', 'ASC');
                        $pegawai = $this->db->get('tbl_pegawai')->result();
                        foreach ($pegawai as $baris) { ?>
                          <option value="<?php echo $baris->id_pegawai; ?>"><?php echo $baris->nama_pegawai; ?></option>
                        <?php
                        } ?>
                      </select>
                    </div>
                  </div>
                  <br>

                  <div class="form-group">
                    <div class="col-lg-12">
                      <div class="input-group">
                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Acuan Surat Masuk</span>
                        <select class="form-control cari_acuan" name="id_sm" id="id_sm" required>
                          <option value=""></option>
                          <?php
                          $this->db->order_by('id_sm', 'ASC');
                          $pegawai = $this->db->get('tbl_sm')->result();
                          foreach ($pegawai as $baris) { ?>
                            <option value="<?php echo $baris->no_surat; ?>"><?php echo $baris->no_surat; ?></option>
                          <?php
                          } ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <div class="input-group">
                          <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Kegiatan</span>
                          <input name="kegiatan" id="kegiatan" class="form-control" placeholder="Tambahkan Deskripsi Kegiatan tugas" required></input>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-lg-12">
                          <div class="input-group">
                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Lokasi</span>
                            <input name="lokasi" id="lokasi" class="form-control" placeholder="Tambahkan Keterangan Lokasi/Tempat" required></input>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                              <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                                <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-lg-12"><b>Tambahkan Lampiran Surat Masuk Dan Surat Tugas</b></label>
                              <div class="col-lg-12">
                                <div class="dropzone" id="myDropzone">
                                  <div class="dz-message">
                                    <h3> KLIK/DROP FILE DISINI</h3>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <hr>
                            <a style="background-color: #333; color:white;" href="users/tugas" class="btn"><b> <- KEMBALI</b></a>
                            <button style="background-color: #333; color:white;" type="submit" id="submit-all" class="btn"><b>SIMPAN DATA</b></button>
              </form>
              <script>
                $(document).ready(function() {
                  $(".cari_sm").select2({
                    placeholder: "Cari Berdasarkan Surat"
                  });

                  $(".cari_penerima").select2({
                    placeholder: "Pilih Nama Yang Melaksanakan"
                  });
                  $(".cari_acuan").select2({
                    placeholder: "Pilih Acuan Surat Masuk"
                  });
                });
              </script>
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
        url: "<?php echo base_url('users/tugas') ?>",
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
            formData.append("id_sm", jQuery("#id_sm").val());
            formData.append("id_pegawai", jQuery("#id_pegawai").val());
            formData.append("kegiatan", jQuery("#kegiatan").val());
            formData.append("lokasi", jQuery("#lokasi").val());
            formData.append("tgl_awal", jQuery("#tgl_awal").val());
            formData.append("tgl_akhir", jQuery("#tgl_akhir").val());
            // formData.append("no_surat", jQuery("#no_surat").val());
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

            $(".cari_sm").select2({
              placeholder: "Pilih nomor",
              allowClear: true
            });
            $(".cari_sm").val('').trigger('change');
            $('.form-horizontal')[0].reset();
            $('.msg').html('<div class="alert alert-success alert-dismissible" role="alert">' +
              '     <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
              '       <span aria-hidden="true">&times;&nbsp; &nbsp;</span>' +
              '     </button>' +
              '     SURAT BERHASIL DISIMPAN' +
              '  </div>');
            $("#id_pegawai").focus();

            alert('SURAT BERHASIL DISIMPAN');
            window.location = "<?php echo base_url(); ?>users/tugas/t";
            //     }
            // });

            myDropzone.removeFile(file);
          });
        }
      };
    </script>