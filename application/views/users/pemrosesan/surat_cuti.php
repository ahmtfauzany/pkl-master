<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-md-12">
                <!-- Basic datatable -->
                <div class="panel panel-default">
                    <div class="panel-heading text-left">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <b>DAFTAR SURAT CUTI</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="margin-top: -20px;">
                        <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
                            <thead>
                                <tr class="bg-info">
                                    <th>Status</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Surat Diajukan</th>
                                    <th width="40%">Alasan</th>
                                    <th>Aksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($surat_cuti->result() as $baris) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php
                                            if ($baris->dibaca == 3) { ?>
                                                <b>Disposisi</b>
                                            <?php } elseif ($baris->dibaca == 2) { ?>
                                                <b>Disetujui</b>
                                            <?php } elseif ($baris->dibaca == 1) { ?>
                                                <b>Dipending</b>
                                            <?php } else { ?>
                                                <b>Ditolak</b>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $baris->nama_pegawai; ?></td>
                                        <td><?php echo $baris->tgl_cuti; ?></td>
                                        <td><?php echo $baris->alasan; ?></td>
                                        <td class="text-center">
                                            <a style="background-color: #333; color:white;" href="users/surat_cuti/d/<?php echo $baris->id_cuti; ?>" class="btn  btn-sm"><i class="icon-eye"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a style="background-color: #333; color:white;" href="users/surat_cuti/d/<?php echo $baris->id_cuti; ?>" class="btn  btn-sm"><i class="icon-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /basic datatable -->
            </div>
        </div>
        <!-- /dashboard content -->