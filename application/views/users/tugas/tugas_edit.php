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
<style>
    .content-wrapper {
        font-family: monospace;
    }
</style>
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
                            <div style="font-size:large;" class="text-center">
                                <b>EDIT DATA TUGAS</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nama Pegawai</span>
                                            <select class="form-control" name="id_pegawai" id="id_pegawai" required>
                                                <option value="<?php echo $query->id_pegawai; ?>"><?php echo $query->nama_pegawai; ?></option>
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
                                                    <option value="<?php echo $query->id_sm; ?>"><?php echo $query->id_sm; ?></option>
                                                    <?php
                                                    $this->db->order_by('id_sm', 'ASC');
                                                    $bagian = $this->db->get('tbl_sm')->result();
                                                    foreach ($bagian as $baris) { ?>
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
                                                    <input type="kegiatan" name="kegiatan" class="form-control" id="kegiatan" value="<?php echo $query->kegiatan ?>" maxlength="10" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Lokasi</span>
                                                        <input type="lokasi" name="lokasi" class="form-control" id="lokasi" value="<?php echo $query->lokasi ?>" maxlength="10" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                                                            <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo $query->tgl_awal ?>" maxlength="10" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                                                                <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo $query->tgl_akhir; ?>" maxlength="10" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <a style="background-color: #333; color:white;" href="users/tugas" class="btn"><b> <- KEMBALI</b></a>
                                <button style="background-color: #333; color:white;" style="background-color: #333; color:white;" type="submit" name="btnupdate" id="submit-all" class="btn"><b>SIMPAN DATA</b></button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->