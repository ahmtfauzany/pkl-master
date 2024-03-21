<style>
  .content-wrapper {
    font-family: monospace;
  }
</style>

<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/core/app.js"></script>
<script src="assets/upload/dropzone.min.js"></script>

<link rel="stylesheet" type="text/css" href="assets/upload/dropzone.min.css">

<style>
  .dropzone {
    margin-top: 10px;
    border: 2px dashed #0087F7;
  }
</style>

<?php
$cek    = $user->row();
$nama   = $cek->nama_lengkap;
$nip  = $cek->nip;
$telp  = $cek->telp;
$level  = $cek->level;

if (date('d') == 1) {
  $this->db->empty_table('tbl_cuti');
}

if ($level == "s_admin") {
  $level = "Super Admin";
}

$menu     = strtolower($this->uri->segment(1));
$sub_menu   = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));

$this->db->where('nama_pegawai', $nama);
$totalAjuanCuti = $this->db->count_all_results('tbl_cuti');

$this->db->order_by('id_cuti', 'DESC');
$this->db->limit(1);
$cek_ns = $this->db->get('tbl_cuti');
?>

<script>
  $(function() {
    $("#tgl_awal").datepicker();
  });
  $(function() {
    $("#tgl_akhir").datepicker();
  });
</script>
<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div style="background-color: #333; color:white" class="panel-heading">
            <div class="row">
              <div class="text-center">
                <b style="font-size:large;">PENGAJUAN CUTI</b><br>
              </div>
            </div>
          </div>
          <div class="panel-body">
            <fieldset class="content-group">
              <form class="form-horizontal" action="users/cuti" enctype="multipart/form-data" method="post">
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
                      <input type="text" name="alasan" id="alasan" class="form-control" placeholder="Masukkan Alasan">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                      <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div class="input-group">
                      <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                      <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo date('Y-m-d'); ?>" maxlength="10" required>
                    </div>
                  </div>
                </div>

                <label class="control-label col-lg-3"><b>Tambahkan Surat Cuti Tertulis</b></label>
                <div class="col-lg-12">
                  <div class="dropzone" id="myDropzone">
                    <div class="dz-message">
                      <h3> KLIK/DROP FILE DISINI</h3>
                    </div>
                  </div>
                </div>

                <hr>
                <?php if ($user->row()->level == '') { ?>
                  <a style="background-color: #333; color:white;" href="users/cuti" class="btn btn-xs"><b> <- KEMBALI</b></a>
                <?php } ?>
                <button style="background-color: #333; color:white;" type="submit" id="submit-all" class="btn btn-xs"><b>AJUKAN</b></button>
                <hr>
                <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
                  <thead>
                    <tr class="bg-info">
                      <th width="10%">Status</th>
                      <th>Catatan Kepsek</th>
                      <th>Nama</th>
                      <th>Nip</th>
                      <th>Tgl Pengajuan</th>
                      <th>Alasan</th>
                      <th>Dari Tanggal</th>
                      <th>Sampai Tanggal</th>
                      <th>Hari</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $counter = 0;
                    foreach ($cuti->result() as $baris) {
                      if (date('d') == 1) {
                        continue;
                      }
                      if ($baris->nama_pegawai == $nama) {
                        if ($counter < 3) {
                    ?>
                          <tr>
                            <td class="text-center">
                              <?php if ($baris->dibaca == 3) { ?>
                                <span class="badge badge-success"><i class="icon-checkmark4"></i> <?php echo $baris->no_surat; ?></span>
                              <?php } elseif ($baris->dibaca == 2) { ?>
                                <span>DISETUJUI</span>
                              <?php } elseif ($baris->dibaca == 1) { ?>
                                <span>DIAJUKAN</span>
                              <?php } else { ?>
                                <span>DITOLAK</span>
                              <?php } ?>
                            </td>
                            <td><?php echo $baris->catatan; ?></td>
                            <td><?php echo $baris->nama_pegawai; ?></td>
                            <td><?php echo $baris->nip; ?></td>
                            <td><?php echo $baris->tgl_cuti; ?></td>
                            <td><?php echo $baris->alasan; ?></td>
                            <td><?php echo $baris->tgl_awal; ?></td>
                            <td><?php echo $baris->tgl_akhir; ?></td>
                            <td><?php echo $baris->lama; ?> Hari</td>
                            <td class="text-left">
                              <?php if ($baris->dibaca == 2) { ?>
                                <a style="background-color: #333; color:white;" href="users/cuti/d/<?php echo $baris->id_cuti; ?>" class="btn btn-xs"><i class="icon-eye"></i></a>
                              <?php } ?>
                              <?php if ($user->row()->level == 'pegawai' or 'admin' or 'kepsek' or 's_admin') { ?>
                                <?php if ($baris->dibaca == 1 or 2) { ?>
                                  <?php if ($baris->dibaca != 2) { ?>
                                    <a style="background-color: #333; color:white;" href="users/cuti/e/<?php echo $baris->id_cuti; ?>" class="btn btn-xs"><i class="icon-pencil7"></i></a>
                                    <a style="background-color: #333; color:white;" href="users/cuti/h/<?php echo $baris->id_cuti; ?>" class="btn btn-xs" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
                                  <?php } ?>
                                <?php } ?>
                              <?php } ?>
                            </td>
                          </tr>
                    <?php
                          $no++;
                          $counter++;
                        } else {
                          break;
                        }
                      }
                    } ?>
                  </tbody>
                </table>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.msg').html('');
  Dropzone.options.myDropzone = {
    url: "<?php echo base_url('users/cuti/t') ?>",
    paramName: "userfile",
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
      myDropzone = this;

      submitButton.addEventListener("click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        myDropzone.processQueue();
      });

      this.on("error", function(file, message) {
        alert(message);
        this.removeFile(file);
        errors = true;
      });

      this.on("addedfile", function(file) {});

      this.on("sending", function(data, xhr, formData) {
        formData.append("ns", jQuery("#ns").val());
        formData.append("tgl_ns", jQuery("#tgl_ns").val());
        formData.append("no_asal", jQuery("#no_asal").val());
        formData.append("tgl_cuti", jQuery("#tgl_cuti").val());
        formData.append("nama_pegawai", jQuery("#nama_pegawai").val());
        formData.append("penerima", jQuery("#penerima").val());
        formData.append("disposisi", jQuery("#disposisi").val());
        formData.append("alasan", jQuery("#alasan").val());
        formData.append("tgl_cuti", jQuery("#tgl_cuti").val());
        formData.append("tgl_disetujui", jQuery("#tgl_disetujui").val());

        formData.append("lampiran", jQuery("#lampiran").val());

        formData.append("tgl_awal", jQuery("#tgl_awal").val());
        formData.append("tgl_akhir", jQuery("#tgl_akhir").val());
      });

      this.on("complete", function(file) {
        myDropzone.removeFile(file);
      });

      this.on("success", function(file, response) {
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
        $("#no_asal").focus();

        alert('BERHASIL! DATA BERHASIL DISIMPAN.');
        window.location = "<?php echo base_url(); ?>users/cuti/t";
        myDropzone.removeFile(file);
      });
    }
  };
</script>

<?php if ($totalAjuanCuti >= 2) { ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#submit-all").hide();
      alert('Tidak bisa mengajukan cuti lagi,Anda sudah mengajukan cuti sebanyak 2 kali dalam bulan ini.');
    });
  </script>
<?php } ?>