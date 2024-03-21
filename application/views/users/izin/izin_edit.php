<style>
    .content-wrapper {
        font-family: monospace;
    }
</style>
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
<style>
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
                    <div class="panel-heading text-left">
                        <div class="row">
                            <div style="font-size:large;" class="text-center">
                                <b>EDIT DATA izin</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label class="control-label col-lg-3">Nama siswa | NIM</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <select class="form-control" name="id_siswa" id="id_siswa" required>
                                                <option value="<?php echo $query->id_siswa; ?>"><?php echo $query->nama_siswa; ?> | <?php echo $query->nim; ?></option>
                                                <option value="">Pilih siswa</option>
                                                <?php
                                                $this->db->order_by('nama_siswa', 'ASC');
                                                $siswa = $this->db->get('tbl_siswa')->result();
                                                foreach ($siswa as $baris) { ?>
                                                    <option value="<?php echo $baris->id_siswa; ?>"><?php echo $baris->nama_siswa; ?> | <?php echo $query->nim; ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Alasan</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input name="alasan" id="alasan" value="<?php echo $query->alasan; ?>" class="form-control" placeholder="Masukkan Alasan izin" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Keterangan</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input name="keterangan" id="keterangan" value="<?php echo $query->keterangan; ?>" class="form-control" placeholder="Masukkan Keterangan izin" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Tanggal Awal</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input type="text" name="tgl_awal" class="form-control daterange-single" id="tgl_awal" value="<?php echo $query->tgl_awal ?>" maxlength="10" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Tanggal Akhir</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input type="text" name="tgl_akhir" class="form-control daterange-single" id="tgl_akhir" value="<?php echo $query->tgl_akhir; ?>" maxlength="10" required>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <a style="background-color: #333; color:white;" href="users/izin" class="btn"><b> <- KEMBALI</b></a>
                                <button style="background-color: #333; color:white;" type="submit" name="btnupdate" id="submit-all" class="btn"><b>SIMPAN DATA</b></button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->