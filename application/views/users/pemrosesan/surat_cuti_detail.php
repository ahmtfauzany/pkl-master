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
        $("#tgl_cuti").datepicker();
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
                                <b style="font-size:large;">DETAIL SURAT CUTI</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                <table class="table table-xs table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="13%" style="background-color: #333; color:white;">Nama</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->nama_pegawai; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Nip</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->nip; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Tanggal Surat Diajukan</td>
                                            <td colspan="2" class="text-bold"><?php echo format_indo($query->tgl_cuti) ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Alasan</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->alasan; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Dari Tanggal</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->tgl_awal; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Sampai Tanggal</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->tgl_akhir; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Hari</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->lama; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align:left;" class="input-group-addon width-200">Tanggal di setujui</span>
                                            <input type="text" class="form-control daterange-single" value="<?php echo format_indo(date('Y-m-d')) ?>" readonly>
                                            <input type="hidden" name="tgl_disetujui" class="form-control daterange-single" id="tgl_disetujui" value="<?php echo date('Y-m-d') ?>" readonly>
                                        </div>
                                    </div>
                                    <?php if ($query->dibaca == 2) { ?>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <span style="background-color: #333; color:white; text-align:left;" class="input-group-addon width-200">Persetujuan</span>
                                                <input type="text" class="form-control" value="Disetujui" readonly>
                                            </div>
                                        </div>
                                    <?php } elseif ($query->dibaca == 3) { ?>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <span style="background-color: #333; color:white; text-align:left;" class="input-group-addon width-200">Persetujuan</span>
                                                <input type="text" class="form-control" value="Disposisi" readonly>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <span style="background-color: #333; color:white; text-align:left;" class="input-group-addon width-200">Persetujuan</span>
                                                <select class="form-control" name="dibaca" id="dibaca" required>
                                                    <option value="">Pilih</option>
                                                    <option value="0">Di Tolak</option>
                                                    <option value="2">Di setujui</option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php
                                    // Ambil status persetujuan
                                    $status_persetujuan = $query->dibaca;

                                    // Tentukan apakah catatan dapat diedit atau tidak berdasarkan status persetujuan
                                    $catatan_editable = ($status_persetujuan == 2) ? 'readonly' : '';

                                    ?>
                                    <!-- Kemudian dalam form -->
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <span style="background-color: #333; color:white; text-align:left;" class="input-group-addon width-200">Catatan</span>
                                                <!-- Tambahkan atribut readonly berdasarkan kondisi -->
                                                <textarea class="form-control" name="catatan" id="catatan" placeholder="Masukkan catatan" <?php echo $catatan_editable; ?>><?php echo $query->catatan; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-lg-12 col-sm-12" style="overflow-x:auto;">
                                        <table class="table table-xs table-responsive table-striped table-bordered" style="width: 100%;">
                                            <tr>
                                                <th><b>Nama FIle</b></th>
                                                <th style="width: 10%; text-align:center;"><b>Download File</b></th>
                                            </tr>
                                            <?php
                                            $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$query->token_lampiran'");
                                            $no = 1;
                                            foreach ($lampiran->result() as $baris) { ?>
                                                <tr>
                                                    <td><?php echo $baris->nama_berkas; ?></td>
                                                    <td><a style="background-color: #333; color:white;" href="lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" title="<?php echo substr($baris->ukuran / 1024, 0, 5); ?> KB" class="btn btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                </tr>
                                            <?php
                                                $no++;
                                            } ?>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <a style="background-color: #333; color:white;" href="users/surat_cuti" class="btn"><b> <- KEMBALI</b></a>
                                <?php if ($query->dibaca == 1) { ?>
                                    <button style="background-color: #333; color:white;" type="submit" name="btnajuan" id="submit-all" class="btn"><b>SIMPAN</b></button>
                                <?php } ?>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->