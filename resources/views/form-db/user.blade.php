<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 class="title">Form Pembuatan User Baru/Reset Password</h2>
        <div class="col-md-8">
            <form method="post" action="page2/user/proses.php?act=create">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nomor Induk Karyawan</label>
                            <input type="text" class="form-control ui-autocomplete-input" name="nik" id="user" required="" autofocus="" autocomplete="off"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" readonly="">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" readonly="">
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Divisi/Cabang</label>
                            <input type="text" class="form-control" name="divisi_cabang" id="divisi_cabang" readonly="">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Aplikasi</label>
                            <p>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="EMAIL"> EMAIL</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="SDMS"> SDMS</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="ITS"> ITS</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="HRIS"> HRIS</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="PURCHASE"> PURCHASE</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="ASET"> ASET</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="ATT"> ATT</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="INDENT"> INDENT</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="AUDIT"> AUDIT</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="E-PART"> E-PART</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="ACCESS DOOR"> ACCESS DOOR</label>
                                <label style="margin-right: 20px;"><input type="checkbox" name="aplikasi[]" value="INTERNET"> INTERNET</label>
                                <input type="text" class="form-control" name="aplikasi_lainnya" placeholder="Lainnya">
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Modul</label>
                            <!-- <input type="text" class="form-control" name="modul" placeholder="Modul/Menu yang ingin diakses. Contoh : Service, Sales, Sparepart, Finance, HCD, ESS Dll." required /> -->
                            <textarea class="form-control" name="modul" placeholder="isi menu yang ingin diakses" rows="5" required=""></textarea>
                        </div>
                    </div>
                </div>
    
                <button type="submit" class="btn btn-info" onclick="return confirm('Save Form ?')">Save</button>
            </form>
        </div>
</body>
</html>