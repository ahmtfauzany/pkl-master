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
                                <span class="" aria-hidden="true"></span><b class="">&nbsp; DAFTAR SURAT MASUK</b>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style="margin-top: -20px;">
                        <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
                            <thead>
                                <tr class="bg-info">
                                    <th>Status</th>
                                    <th>Nomor Surat</th>
                                    <th>Tgl. Diterima</th>
                                    <th>Instansi</th>
                                    <th width="40%">Perihal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($ktu->result() as $baris) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php
                                            if ($baris->dibaca == 3) { ?>
                                                <button class="btn btn-sm btn-success"><i class="icon-checkmark4"></i>&nbsp; <b>Disposisi</b></button>
                                            <?php } elseif ($baris->dibaca == 2) { ?>
                                                <b>Diajukan</b>
                                            <?php } elseif ($baris->dibaca == 1) { ?>
                                                <b>DiPending</b>
                                            <?php } else { ?>
                                                <b>Perbaikan</b>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $baris->no_surat; ?></td>
                                        <td><?php echo $baris->tgl_sm; ?></td>
                                        <td><?php echo $baris->asal_instansi; ?></td>
                                        <td><?php echo $baris->perihal; ?></td>
                                        <td class="text-center">
                                            <a style="background-color: #333; color:white;" href="users/ktu/d/<?php echo $baris->id_sm; ?>" class="btn btn-sm"><i class="icon-eye"></i></a>
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