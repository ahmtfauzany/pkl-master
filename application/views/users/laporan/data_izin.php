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
                            <div class="col-sm-6 text-left">
                                <span class="" aria-hidden="true"></span><b class="">DATA SURAT IZIN</b><br>
                            </div>
                            <div class="col-md-6 text-right">
                                <?php
                                if ($user->row()->level == 'admin') { ?>
                                    <form action="" method="post" target="_blank">
                                        <button type="submit" name="btncetak" class="btn btn-xs" style="margin-top: 7px; background-color: #333; color:white;"><b>CETAK LAPORAN</b></button>
                                    </form>
                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="margin-top: -20px;">
                        <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
                            <thead>
                                <tr>
                                    <th>Nama Siswa | NIM</th>
                                    <th>Alasan</th>
                                    <th>keterangan</th>
                                    <th>Dari Tanggal</th>
                                    <th>Dari Tanggal</th>
                                    <th>Sampai Tanggal</th>
                                    <th>Hari</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($sql->result() as $baris) {
                                ?>
                                    <tr>
                                        <td><?php echo $baris->nama_siswa; ?> | <?php echo $baris->nim; ?></td>
                                        <td><?php echo $baris->alasan; ?></td>
                                        <td><?php echo $baris->keterangan; ?></td>
                                        <td><?php echo $baris->tgl_awal; ?></td>
                                        <td><?php echo $baris->tgl_awal; ?></td>
                                        <td><?php echo $baris->tgl_akhir; ?></td>
                                        <td><?php echo $baris->lama; ?> Hari</td>
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