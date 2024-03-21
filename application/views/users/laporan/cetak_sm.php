<?php
$cek    = $user->row();
$nama   = $cek->nama_lengkap;
$email  = $cek->telp;
$level  = $cek->level;
if ($level == "pegawai") {
  $level = "Super Admin";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo date('d_m_Y'); ?>_Rekap_Laporan_Surat_Masuk</title>
  <base href="<?php echo base_url(); ?>" />
</head>
<style type="text/css">
  @page {
    margin-top: 0.5cm;
    /*margin-bottom: 0.1em;*/
    margin-left: 1cm;
    margin-right: 1cm;
    margin-bottom: 0.1cm;
  }

  .name-school {
    font-size: 15pt;
    font-weight: bold;
    text-transform: uppercase;
  }

  .alamat {
    font-size: 11pt;
    margin-top: -15px;
    margin-bottom: -10px;
  }

  .alamat2 {
    font-size: 9pt;
  }

  .ttd-kiri {
    font-size: 9pt;
    margin-left: 50px;
  }

  .ttd-kanan {
    font-size: 9pt;
    margin-left: 250px;
    text-align: left;
  }

  .detail {
    font-size: 10pt;
    font-weight: bold;
    padding-top: -15px;
    padding-bottom: -12px;
  }

  body {
    font-family: sans-serif;
  }

  table {
    font-family: verdana, arial, sans-serif;
    font-size: 11px;
    color: #333333;
    border-width: none;
    border-collapse: collapse;
    page-break-after: auto;
    width: 100%;
  }

  th {
    padding-bottom: 8px;
    padding-top: 8px;
    border-color: #666666;
    background-color: #dedede;
    /*border-bottom: solid;*/
    text-align: center;
  }

  td {
    /* page-break-inside: avoid;
    page-break-after: auto; */
    padding-bottom: 8px;
    padding-top: 8px;
    padding-left: 8px;
    border-color: #666666;
    background-color: #ffffff;
    text-align: left;
  }

  hr {
    border: 1;
    height: 2px;
    /* Set the hr color */
    color: #333;
    /* old IE */
    background-color: #333;
    /* Modern Browsers */
  }

  .container {
    position: relative;
  }

  .topright {
    position: absolute;
    top: 0;
    right: 0;
    font-size: 18px;
    border-width: thin;
    padding: 5px;
  }

  .topright2 {
    position: absolute;
    top: 30px;
    right: 50px;
    font-size: 18px;
    border: 1px solid;
    padding: 5px;
    color: red;
  }
</style>

<body onload="window.print()">

  <table width="100%">
    <tr>
      <td width="120">
        <img src="foto/logo1.png" alt="logo1" width="80">
      </td>
      <td align="left">
        <p class="name-school"><?php echo $md->madrasah; ?></p>
        <p class="alamat"><b><?php echo $md->alamat; ?></b></p>
        <p class="alamat2"><?php echo $md->telp; ?></p>
      </td>
    </tr>
  </table>
  <hr>
  <h3 align="center">DAFTAR LAPORAN DATA SURAT MASUK<br>TAHUN<?php echo date('Y') ?></h3>
  <p class="alamat2">Laporan tanggal: <b><u><?php echo $t_awal ?></u></b> s/d <b><u><?php echo $t_akhir ?></u></b></p>
  <table border="1" width="100%">
    <thead>
      <tr>
        <th width="1%" rowspan="2">No.</th>
        <th colspan="4">Surat</th>
        <th width="15%" rowspan="2">Perihal</th>
        <th width="10%" rowspan="2">Tanggal Kegiatan</th>
      </tr>
      <tr>
        <th width="10%">Asal Instansi Surat</th>
        <th width="10%">Tanggal Surat Masuk</th>
        <th width="10%">No S.M</th>
        <th width="15%">Nomor Surat</th>

      </tr>
    </thead>
    <?php
    $no = 1;
    foreach ($sql->result() as $baris) { ?>
      <tr style="page-break-inside:avoid; page-break-after:auto;">
        <td><?php echo $no; ?></td>
        <td><?php echo $baris->asal_instansi; ?></td>
        <td><?php echo $baris->tgl_sm; ?></td>
        <td><?php echo $baris->no_sm; ?></td>
        <td><?php echo $baris->no_surat; ?></td>
        <td><?php echo $baris->perihal; ?></td>
        <td><?php echo $baris->tgl_awal; ?> s/d <?php echo $baris->tgl_akhir; ?></td>
      </tr>
    <?php
      $no++;
    } ?>
  </table>
  <table>
    <tr>
      <br>
      <td></td>
      <td width="90%">
        <p style="margin-left: 80%;" class="ttd-kanan"><?php echo format_indo(date('Y-m-d')); ?></p>
        <p style="margin-left: 80%;" class="ttd-kanan">&nbsp;</p>
        <p style="margin-left: 82%;" class="ttd-kanan">Mengetahui,</p>
        <p style="margin-left: 81%;" class="ttd-kanan"><?php echo $md->jabatan; ?></p>
        <br><br><br>
        <p style="margin-left: 80%;"><b><?php echo $md->nm_kepala; ?></b></p>
      </td>

    </tr>
  </table>
</body>

</html>