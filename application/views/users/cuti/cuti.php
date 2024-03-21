<?php
$cek    = $user->row();
$nama   = $cek->nama_lengkap;
$email  = $cek->email;
$nip  = $cek->nip;
$level  = $cek->level;
if ($level == "s_admin") {
  $level = "Super Admin";
} elseif ($user->row()->level == 'user') {
  // Hanya tampilkan cuti milik user saat ini
  $cuti->where('id_pengirim', $user->row()->id_user);
}
$menu     = strtolower($this->uri->segment(1));
$sub_menu   = strtolower($this->uri->segment(2));
$sub_menu3   = strtolower($this->uri->segment(3));
?>
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
                <b>DAFTAR SURAT CUTI PEGAWAI</b><br>
              </div>
              <div class="col-md-6 text-right">
                <?php
                if ($user->row()->level != 's_admin' and $user->row()->level != 'admin' and $user->row()->level != 'kepsek' and $user->row()->level != 'pegawai') { ?>
                  <a style="background-color: #333; color:white; text-align: left;" href="users/cuti/t" class="btn btn-sm"><b>TAMBAH DATA</b></a>
                <?php
                } ?>
              </div>
            </div>
          </div>
          <div class="panel-body" style="margin-top: -20px;">
            <table class="table table-xs table-hover table-striped table-bordered datatable-basic">
              <thead>
                <tr class="bg-info">
                  <th width="10%">Status</th>
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Tanggal Surat Diajukan</th>
                  <th>Alasan</th>
                  <th>Dari Tanggal</th>
                  <th>Sampai Tanggal</th>
                  <th>Hari</th>
                  <?php
                  if ($user->row()->level != 's_admin' and $user->row()->level != 'admin' and $user->row()->level != 'kepsek' and $user->row()->level != 'pegawai') { ?>
                    <th>Aksi</th>
                  <?php
                  } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($cuti->result() as $baris) {
                ?>
                  <tr>
                    <td class="text-center">
                      <?php
                      if ($baris->dibaca == 3) { ?>
                        <span class="badge badge-success"><i class="icon-checkmark4"></i> <?php echo $baris->no_surat; ?></span>
                      <?php } elseif ($baris->dibaca == 2) { ?>
                        <span>DISETUJUI</span>
                      <?php } elseif ($baris->dibaca == 1) { ?>
                        <span>TUNGGU</span>
                      <?php } else { ?>
                        <span>DITOLAK</span>
                      <?php } ?>
                    </td>
                    <td><?php echo $baris->nama_pegawai; ?></td>
                    <td><?php echo $baris->nip; ?></td>
                    <td><?php echo $baris->tgl_cuti; ?></td>
                    <td><?php echo $baris->alasan; ?></td>
                    <td><?php echo $baris->tgl_awal; ?></td>
                    <td><?php echo $baris->tgl_akhir; ?></td>
                    <td><?php echo $baris->lama; ?> Hari</td>
                    <?php
                    if ($user->row()->level != 's_admin' and $user->row()->level != 'admin' and $user->row()->level != 'kepsek' and $user->row()->level != 'pegawai') { ?>
                      <td class="text-left">
                        <a style="background-color: #333; color:white;" href="users/cuti/d/<?php echo $baris->id_cuti; ?>" class="btn btn-xs"><i class="icon-eye"></i></a>
                        <a style="background-color: #333; color:white;" href="users/cuti/e/<?php echo $baris->id_cuti; ?>" class="btn btn-xs"><i class="icon-pencil7"></i></a>
                        <a style="background-color: #333; color:white;" href="users/cuti/h/<?php echo $baris->id_cuti; ?>" class="btn btn-xs" onclick="return confirm('Apakah Anda yakin?')"><i class="icon-trash"></i></a>
                      </td>
                    <?php
                    } ?>
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