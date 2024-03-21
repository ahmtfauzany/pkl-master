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
                                <span class="" aria-hidden="true"></span><b class="">&nbsp; HISTORY SURAT MASUK</b><br>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="margin-top: -20px;">
                        <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
                            <thead>
                                <tr class="bg-info">
                                    <th>Status</th>
                                    <th>Asal Instansi</th>
                                    <th>Tgl. Diterima</th>
                                    <th>No S.M</th>
                                    <th>Nomor Surat</th>
                                    <th>Nomor Surat</th>
                                    <th width="40%">Perihal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($historysm->result() as $baris) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php
                                            if ($baris->pegawai == "Arsip") { ?>
                                                <b>Diarsip</b>
                                            <?php } else { ?>
                                                <b>Disposisi</b>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $baris->asal_instansi; ?></td>
                                        <td><?php echo $baris->tgl_sm; ?></td>
                                        <td><?php echo $baris->no_sm; ?></td>
                                        <td><?php echo $baris->no_surat; ?></td>
                                        <td><?php echo $baris->no_surat; ?></td>
                                        <td><?php echo $baris->perihal; ?></td>
                                        <td class="text-center">
                                            <a style="background-color: #333; color:white;" href="users/historysm/d/<?php echo $baris->id_sm; ?>" class="btn btn-sm"><i class="icon-eye"></i></a>
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