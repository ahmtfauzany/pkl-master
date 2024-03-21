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
                    <div style="background-color: #333; color:white" class="panel-heading text-left">
                        <div class="row">
                            <div class="text-center">
                                <b style="font-size:large;">DETAIL SURAT MASUK</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
                                <table class="table table-xs table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Asal Instansi Surat</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->asal_instansi; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-2" style="background-color: #333; color:white;">Tanggal Surat Masuk</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->tgl_sm; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">No S.M</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->no_sm; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Nomor Surat</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->no_surat; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Perihal</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->perihal; ?></td>
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
                                            <td style="background-color: #333; color:white;">Lampiran</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->lampiran; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span style="text-align: left; background-color: #333; color:white;" class="input-group-addon width-200">Tanggal Pengajuan</span>
                                            <input type="text" class="form-control daterange-single" value="<?php echo format_indo(date('Y-m-d')) ?>" readonly>
                                            <input type="hidden" name="tgl_ajuan" class="form-control daterange-single" id="tgl_ajuan" value="<?php echo date('Y-m-d') ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php if ($query->dibaca == 2) { ?>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span style="text-align: left; background-color: #333; color:white;" class="input-group-addon width-200">Pilih Ajuan</span>
                                                    <input type="text" class="form-control" value="Sedang Diajukan" readonly>
                                                </div>
                                            </div>
                                        <?php } elseif ($query->dibaca == 3) { ?>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span style="text-align: left; background-color: #333; color:white;" class="input-group-addon width-200">Pilih Ajuan</span>
                                                    <input type="text" class="form-control" value="Disposisi" readonly>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span style="text-align: left; background-color: #333; color:white;" class="input-group-addon width-200">Pilih Ajuan</span>
                                                    <select class="form-control" name="dibaca" id="dibaca" required>
                                                        <option value="">Pilih Ajuan</option>
                                                        <option value="0">Perbaikan ke Admin</option>
                                                        <option value="2">Ajukan ke Kepsek</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-sm-12" style="overflow-x:auto;">
                                            <table class="table table-xs table-responsive table-striped table-bordered" style="width: 100%;">
                                                <tr>
                                                    <th><b>Nama FIle</b></th>
                                                    <th style="width: 20%; text-align:center;"><b>Aksi</b></th>
                                                </tr>
                                                <?php
                                                $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$query->token_lampiran'");
                                                $no = 1;
                                                foreach ($lampiran->result() as $baris) { ?>
                                                    <tr>
                                                        <td><?php echo $baris->nama_berkas; ?></td>
                                                        <td style="width: 20%; text-align:center;">
                                                            <a style="background-color: #333; color:white;" href="lampiran/surat_masuk/<?php echo $baris->nama_berkas; ?>" target="_blank" title="<?php echo substr($baris->ukuran / 1024, 0, 5); ?> KB" class="btn btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-lg-2">
                                            <a style="background-color: #333; color:white;" href="users/ktu" class="btn btn-sm"><b> <- KEMBALI</b></a>
                                            <?php if ($query->dibaca == 1) { ?>
                                                <button style="background-color: #333; color:white;" type="submit" name="btnajuan" id="submit-all" class="btn btn-sm"><b>AJUKAN</b></button>
                                            <?php } ?>
                                        </div>
                                    </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /dashboard content -->