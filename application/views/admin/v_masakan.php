<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <span class="pull-left"><h4>Tabel Masakan</h4></span>
            <span class="pull-right"><button data-target="#tambahMsk" data-toggle="modal" class="btn btn-info btn-mini" style="margin-top:6px; margin-right:10px;">Tambah Data</button></span>
          </div>
          <div class="widget-content">
            <table class="table table-bordered table-striped table-hover table-responsive">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Masakan</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Status Masakan</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
            <?php
                $no=0;
                foreach ($dataMasakan as $msk) {
                $no++;
                echo '<tr>
                    <td>'.$no.'</td>
                    <td>'.$msk->id_masakan.'</td>
                    <td>'.$msk->nama_masakan.'</td>
                    <td>'.$msk->harga.'</td>
                    <td><img src='.base_url("assets/img/gambar/$msk->gambar").' width="150" height="100"</td>
                    <td>'.$msk->status_masakan.'</td>
                    <td><a href="#UpdateMsk" class="btn btn-info" data-toggle="modal" onclick="showDetail('.$msk->id_masakan.')"><i class="icon-pencil"></i></a>
                    <a href ='.base_url('index.php/masakan/deleteMasakan/'.$msk->id_masakan).' class="btn btn-danger" onclick="return confirm(\'Anda yakin\')"><i class="icon-trash"></i></a></td>
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

     <div class="modal hide" id="tambahMsk">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Penambahan Makanan Baru</h4>
            </div>
            <div class="modal-body">
            <form id="registrasi" method="post" action="<?=base_url()?>index.php/masakan/tambahMasakan" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Nama Masakan</label>
                    <input type="text" name="nama_masakan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <textarea name="harga" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Status Masakan</label>
                    <select name="status_masakan" class="form-control">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Habis">Habis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="tambah" value="Tambah" class="btn btn-success">
            </div>
            </form>  
            </div>
        </div>
     </div>

     <div class="modal hide" id="UpdateMsk">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update data Masakan</h4>
            </div>
            <div class="modal-body">
            <form method="post" action="<?=base_url()?>index.php/masakan/updateMasakan" enctype="multipart/form-data">

            <input type="hidden" name="id_masakan" id="id_masakan">
            
            <div class="form-group">
                    <label for="">Nama Masakan</label>
                    <input type="text" name="nama_masakan" id="nm_msk" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <textarea name="harga" class="form-control" id="hrg"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Status Masakan</label>
                    <select name="status_masakan" class="form-control" id="stats_msk">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Habis">Habis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control">
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

    function showDetail(id_masakan)
    {
        $.getJSON("<?=base_url()?>index.php/masakan/getDataDetailMasakan/" +id_masakan,(data) => {
            $("#id_masakan").val(data['id_masakan']);
            $("#nm_msk").val(data['nama_masakan']);
            $("#hrg").val(data['harga']);
            $("#stats_msk").val(data['status_masakan']);
        });
    }

</script>