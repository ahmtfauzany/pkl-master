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
                                    <thead>
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
                                        <tr>
                                            <td style="background-color: #333; color:white;">Diteruskan kepada</td>
                                            <td colspan="2" class="text-bold"><?php echo $md->nm_kepala; ?> <?php echo $md->jabatan; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Tanggal</td>
                                            <td colspan="2" class="text-bold"><?php echo format_indo($query->tgl_ajuan) ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Disposisi</td>
                                            <td colspan="2" class="text-bold">
                                                <?php if ($query->pegawai == "Arsip") { ?>
                                                    <?php echo $query->pegawai; ?></span>
                                                <?php } else {
                                                    echo $query->pegawai;
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Penerima</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->disposisi; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Catatan Kepsek</td>
                                            <td colspan="2" class="text-bold"><?php echo $query->catatan ?></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #333; color:white;">Tanggal Penyelesaian</td>
                                            <td colspan="2" class="text-bold"><?php echo format_indo(substr($query->tgl_disposisi, 0, 10)) ?> / <?php echo substr($query->tgl_disposisi, 11, 18) ?> WIB</td>
                                        </tr>
                                        </tbody>
                                </table>
                                <br>
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
                                <a style="background-color: #333; color:white;" href="users/historysm" class="btn btn-sm"><b> <- KEMBALI</b></a>
                            </form>
                        </fieldset>
                        <script>
                            $(document).ready(function() {
                                $("#disposisi").select2({
                                    placeholder: "Pilih Pelaksana GTK"
                                });

                                $("#pegawai").select2({
                                    placeholder: "Pilih Disposisi Jabatan"
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->