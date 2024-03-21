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
                    <div style="background-color: #333; color:white" class="panel-heading">
                        <div class="row">
                            <div class="text-center">
                                <b style="font-size:large;">EDIT DATA SISWA</b><br>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Nama Lengkap :</span>
                                            <input type="text" name="nama_siswa" class="form-control" value="<?php echo $query->nama_siswa; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">nim :</span>
                                            <input type="text" name="nim" class="form-control" value="<?php echo $query->nim; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">nisn :</span>
                                            <input type="text" name="nisn" class="form-control" value="<?php echo $query->nisn; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Tempat Tanggal Lahir :</span>
                                            <input type="text" name="ttl" class="form-control" value="<?php echo $query->ttl; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Jenis Kelamin :</span>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                                <option value="<?php echo $query->jenis_kelamin; ?>"><?php echo $query->jenis_kelamin; ?></option>
                                                <option value="">Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Agama :</span>
                                            <input type="text" name="agama" class="form-control" value="<?php echo $query->agama; ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Kelas :</span>
                                            <select class="form-control" name="kelas" id="kelas" required>
                                                <option value="<?php echo $query->kelas; ?>"><?php echo $query->kelas; ?></option>
                                                <option value="">Kelas</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Jurusan :</span>
                                            <select class="form-control" name="jurusan" id="jurusan" required>
                                                <option value="<?php echo $query->jurusan; ?>"><?php echo $query->jurusan; ?></option>
                                                <option value="">Jurusan</option>
                                                <option value="IPA">IPA</option>
                                                <option value="IPS">IPS</option>
                                                <option value="BAHASA">BAHASA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span style="background-color: #333; color:white; text-align: left;" class="input-group-addon width-200">Telp :</span>
                                            <input type="telpon" name="telpon" class="form-control" value="<?php echo $query->telpon; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <a style="background-color: #333; color:white;" href="users/siswa" class="btn "><b> <- KEMBALI</b></a>
                                <button style="background-color: #333; color:white;" type="submit" name="btnupdate" class="btn "><b>UPDATE DATA</b></button>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <!-- /dashboard content -->