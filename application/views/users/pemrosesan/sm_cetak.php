<?php
$cek    = $user->row();
$nama   = $cek->nama_lengkap;
$email  = $cek->telp;
$level  = $cek->level;
if ($level == "s_admin") {
    $level = "Super Admin";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo date('d_m_Y'); ?>_<?php echo $sql->no_sm; ?></title>
    <base href="<?php echo base_url(); ?>" />
</head>
<style type="text/css">
    @page {
        margin-top: 1cm;
        margin-left: 1.5cm;
        margin-right: 1.5cm;
        margin-bottom: 0.1cm;
    }

    .kop {
        font-size: 14pt;
        font-weight: bold;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        margin-bottom: -7px;
    }

    .alamat_1 {
        font-size: 11pt;
        margin-bottom: -28px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }

    .isi {
        font-size: 12pt;
        margin-top: 10px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
        padding-left: 10px;
    }

    .isi_paragraf {
        font-size: 13pt;
        margin-top: 10px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: left;
    }

    .ttd-kiri {
        font-size: 9pt;
        margin-left: 50px;
    }

    .ttd-kanan {
        font-size: 13pt;
        margin-left: 20px;
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
    }

    .detail {
        font-size: 10pt;
        font-weight: bold;
        padding-top: -15px;
        padding-bottom: -12px;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    table {
        font-family: Arial, Helvetica, sans-serif, arial, sans-serif;
        font-size: 14px;
        color: #333333;
        border-width: none;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        padding-bottom: 8px;
        padding-top: 8px;
        border-color: #666666;
        background-color: #dedede;
        text-align: center;
    }

    tr {
        text-align: left;
        border-top: 0.5px #666666 solid;
        border-bottom: 0.5px #666666 solid;
        border-left: 0.5px #666666 solid;
        border-right: 0.5px #666666 solid;
    }
</style>

<body onload="window.print()">
    <table>
        <tr>
            <td width="120">
                <img src="foto/kemenag.png" alt="logo1" width="100" style="padding-left: 10px;">
            </td>
            <td>
                <p class="kop" style="margin-top: 10px;"><?php echo $md->kop_1; ?></p>
                <p class="kop"><?php echo $md->kop_2; ?></p>
                <p class="kop"><?php echo $md->madrasah; ?></p>
                <p class="alamat_1"><?php echo $md->alamat; ?></p><br>
                <p class="alamat_1"><?php echo $md->telp; ?></p><br><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3 class="text-bold text-center">SURAT TUGAS</h3>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="isi">Asal Instansi Surat</td>
            <td class="isi" colspan="3">: <?php echo $sql->asal_instansi; ?></td>
        </tr>
        <tr>
            <td class="isi">Tanggal Surat Masuk</td>
            <td class="isi" colspan="3">: <?php echo format_indo($sql->tgl_sm) ?></td>
        </tr>

        <tr>
            <td class="isi" width="25%">No S.M</td>
            <td class="isi" width="40%">: <?php echo $sql->no_sm; ?></td>
        </tr>
        <tr>
            <td class="isi" width="25%">Nomor Surat</td>
            <td class="isi" width="40%">: <?php echo $sql->no_surat; ?></td>
        </tr>
        <tr>
            <td class="isi">Perihal</td>
            <td class="isi" colspan="3">: <?php echo $sql->perihal; ?></td>
        </tr>
        <tr>
            <td class="isi">Dari Tanggal</td>
            <td class="isi">: <?php echo $sql->tgl_awal; ?></td>
        </tr>
        <tr>
            <td class="isi">Sampai Tanggal</td>
            <td class="isi">: <?php echo $sql->tgl_akhir; ?></td>
        </tr>
        <tr>
            <td class="isi">Lampiran</td>
            <td class="isi" colspan="3">: <?php echo $sql->lampiran; ?></td>
        </tr>
        <tr>
            <td class="isi">Diteruskan Kepada</td>
            <td class="isi" colspan="3">: <?php echo $md->jabatan; ?></td>
        </tr>
        <tr>
            <td class="isi">Nama Pelaksana</td>
            <td class="isi" colspan="3">: <?php echo $sql->disposisi; ?></td>
        </tr>
        <tr>
            <td class="isi">Jabatan pelaksan</td>
            <td class="isi" colspan="3">: <?php echo $sql->pegawai; ?></td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
        </tr>
    </table>
    <table border="1">
        <tr>
            <td width="100%" class="text-center">
                <h5>Catatan</h5>
            </td>
        </tr>
        <tr>
            <h6>
                <td class="isi"><?php echo $sql->catatan; ?></td>
            </h6>
        </tr>
        <tr>

        </tr>
    </table>
    <br>
    <tr>
        <td width="20%">
            <p style="text-align: right; margin-right:8%" class="ttd-kanan"><?php echo date('d M Y'); ?></p>
            <p style="text-align: right; margin-right:8%" class="ttd-kanan">Mengetahui,</p>
            <br><br><br>
            <p style="text-align: right; margin-right:5%" class="ttd-kanan"><?php echo $md->jabatan; ?></p>
            <p style="text-align: right;" class="ttd-kanan"><b><?php echo $md->nm_kepala; ?></b></p>
        </td>
    </tr>
</body>

</html>