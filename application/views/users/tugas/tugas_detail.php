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
                    <div style="background-color: #333; color:white" class="panel-heading text-left">
                        <div class="row">
                            <div style="font-size:large;" class="text-center">
                                <b>DETAIL DATA TUGAS</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <form class="form-horizontal" action="users/tugas" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Pegawai</span>
                                            <input type="text" class="form-control" value="<?php echo $querytugas->nama_pegawai; ?>" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Acuan Surat Masuk</span>
                                                <input type="text" class="form-control " value="<?php echo $querytugas->id_sm; ?>" readonly>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Kegiatan</span>
                                                    <input class="form-control" value="<?php echo $querytugas->kegiatan; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <div class="input-group">
                                                        <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Lokasi</span>
                                                        <input class="form-control" value="<?php echo $querytugas->lokasi; ?>" readonly>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Dari Tanggal</span>
                                                            <input type="text" class="form-control" value="<?php echo $querytugas->tgl_awal; ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Sampai Tanggal</span>
                                                                <input type="text" class="form-control" value="<?php echo $querytugas->tgl_akhir; ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-lg-12">
                                                                <div class="input-group">
                                                                    <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Lamanya</span>
                                                                    <input type="text" class="form-control" value="<?php echo $querytugas->lama; ?> Hari" readonly>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <div class="form-group">
                                                                <label class="control-label col-lg-3"><b>Lampiran Surat</b></label>
                                                                <div class="col-lg-12">
                                                                    <table class="table table-xs table-bordered">
                                                                        <tr>
                                                                            <th width='5%'><b>No.</b></th>
                                                                            <th><b>Nama File</b></th>
                                                                            <th><b>Ukuran</b></th>
                                                                            <th class="text-center"><b>Aksi</b></th>
                                                                        </tr>
                                                                        <?php
                                                                        $lampiran = $this->db->get_where('tbl_lampiran', "token_lampiran='$querytugas->token_lampiran'");
                                                                        $no = 1;
                                                                        foreach ($lampiran->result() as $baris) { ?>
                                                                            <tr>
                                                                                <td><?php echo $no; ?></td>
                                                                                <td><?php echo $baris->nama_berkas; ?></td>
                                                                                <td><?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB</td>
                                                                                <td class="text-center"><a style="background-color: #333; color:white;" href="lampiran/piagam/<?php echo $baris->nama_berkas; ?>" target="_blank" title="<?php echo substr($baris->ukuran / 1024, 0, 5); ?> MB" class="btn btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                                                            </tr>
                                                                        <?php
                                                                            $no++;
                                                                        } ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a style="background-color: #333; color:white;" href="users/tugas" class="btn"><b> <- KEMBALI</b></a>
                                <?php if ($user->row()->level == 'admin') { ?>
                                    <a style="background-color: #333; color:white;" href="users/tugas/e/<?php echo $querytugas->id_tugas; ?>" class="btn"><b>EDIT DATA</b></a>
                                <?php } ?>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>