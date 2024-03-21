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
                                <b>DETAIL DATA izin</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <form class="form-horizontal" action="users/izin" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label class="control-label col-lg-3">Nama siswa | NIM</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input type="text" class="form-control" value="<?php echo $queryizin->nama_siswa . ' | ' . $queryizin->nim; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Alasan</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input class="form-control" value="<?php echo $queryizin->alasan; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Keterangan</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input class="form-control" value="<?php echo $queryizin->keterangan; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Tanggal</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input type="text" class="form-control" value="<?php echo $queryizin->tgl_awal; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Tanggal</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input type="text" class="form-control" value="<?php echo $queryizin->tgl_akhir; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Lamanya</label>
                                    <div class="col-lg-12">
                                        <div class="input">
                                            <input type="text" class="form-control" value="<?php echo $queryizin->lama; ?> Hari" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-lg-3"><b>Lampiran Piagam</b></label>
                                    <div class="col-lg-12">
                                        <table class="table table-xs table-bordered">
                                            <tr>
                                                <th width='5%'><b>No.</b></th>
                                                <th><b>Nama File</b></th>
                                                <th><b>Nama siswa</b></th>
                                                <th><b>Ukuran</b></th>
                                                <th class="text-center"><b>Aksi</b></th>
                                            </tr>
                                            <?php
                                            $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$queryizin->token_lampiran'");
                                            $no = 1;
                                            foreach ($lampiran->result() as $baris) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $baris->nama_berkas; ?></td>
                                                    <td><?php echo $queryizin->nama_siswa; ?></td>
                                                    <td><?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB</td>
                                                    <td class="text-center"><a style="background-color: #333; color:white;" href="lampiran/piagam/<?php echo $baris->nama_berkas; ?>" target="_blank" title="<?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB" class="btn btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                </tr>
                                            <?php
                                                $no++;
                                            } ?>
                                        </table>
                                    </div>
                                </div>
                                <a style="background-color: #333; color:white;" href="users/izin" class="btn"><b> <- KEMBALI</b></a>
                                <?php if ($user->row()->level == 'admin') { ?>
                                    <a style="background-color: #333; color:white;" href="users/izin/e/<?php echo $queryizin->id_izin; ?>" class="btn"><b> EDIT DATA</b></a>
                                <?php } ?>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>