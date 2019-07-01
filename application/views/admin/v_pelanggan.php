<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <span class="pull-left"><h4>Tabel Pelanggan</h4></span>
            <span class="pull-right"><button data-target="#daftarPel" data-toggle="modal" class="btn btn-info btn-mini" style="margin-top:6px; margin-right:10px;">Tambah Data</button></span>
          </div>
          <div class="widget-content">
            <table class="table table-bordered table-striped table-hover table-responsive">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat Pelanggan</th>
                    <th>Telepon Pelanggan</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
            <?php
                $no=0;
                foreach ($dataPelanggan as $pel) {
                $no++;
                echo '<tr>
                    <td>'.$no.'</td>
                    <td>'.$pel->id_pel.'</td>
                    <td>'.$pel->nama_pel.'</td>
                    <td>'.$pel->alamat_pel.'</td>
                    <td>'.$pel->telp_pel.'</td>
                    <td>'.$pel->username.'</td>
                    <td>'.$pel->password.'</td>
                    <td><a href="#UpdatePel" class="btn btn-info" data-toggle="modal" onclick="showDetail('.$pel->id_pel.')"><i class="icon-pencil"></i></a>
                    <a href ='.base_url('index.php/pelanggan/deletePelanggan/'.$pel->id_pel).' class="btn btn-danger" onclick="return confirm(\'Anda yakin\')"><i class="icon-trash"></i></a></td>
                    </tr>';
                }
                ?>              
              </tbody>
            </table>
            <?php if ($this->session->flashdata('pesan')!=null): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div> 
        <?php endif ?>
          </div>
        </div>

     <div class="modal hide" id="daftarPel">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pendaftaran Pelanggan</h4>
            </div>
            <div class="modal-body">
            <form id="registrasi" method="post" action="<?=base_url()?>index.php/pelanggan/insertPelanggan">
                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="nama_pel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat Pelanggan</label>
                    <textarea name="alamat_pel" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Telepon Pelanggan</label>
                    <input type="text" name="telp_pel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="daftar" value="DAFTAR" class="btn btn-success">
            </div>
            </form>  
            </div>
        </div>
     </div>

     <div class="modal hide" id="UpdatePel">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pendaftaran Pelanggan</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="<?=base_url()?>index.php/pelanggan/updatePelanggan">

            <input type="hidden" name="id_pel" id="id_pel">
                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="nama_pel" class="form-control" id="nama_pel">
                </div>
                <div class="form-group">
                    <label for="">Alamat Pelanggan</label>
                    <textarea name="alamat_pel" class="form-control" id="alamat_pel"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Telepon Pelanggan</label>
                    <input type="text" name="telp_pel" class="form-control" id="telp_pel">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" id="user">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" id="pass">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="daftar" value="DAFTAR" class="btn btn-success">
            </div>
            </form>  
            </div>
        </div>
     </div>
     <script src="<?=base_url()?>assets/js/jquery.min.js"></script> 
<script>

    function showDetail(id_pel)
    {
        $.getJSON("<?=base_url()?>index.php/pelanggan/getDetailDataPelanggan/"+id_pel,function(data){
            $("#id_pel").val(data['id_pel']);
            $("#nama_pel").val(data['nama_pel']);
            $("#alamat_pel").val(data['alamat_pel']);
            $("#telp_pel").val(data['telp_pel']);
            $("#user").val(data['username']);
            $("#pass").val(data['password']);
        });
    }

</script>