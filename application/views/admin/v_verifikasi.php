<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <span class="pull-left"><h4>Tabel Verifikasi</h4></span>
          </div>
          <div class="widget-content">
            <table class="table table-bordered table-striped table-hover table-responsive">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pesan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Status Pesan</th>
                    <th>Keterangan</th>
                    <th>Nama User</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
            <?php
                $no=0;
                foreach ($dataVerif as $vrf) {
                $no++;
                echo '<tr>
                    <td>'.$no.'</td>
                    <td>'.$vrf->id_pesan.'</td>
                    <td>'.$vrf->nama_pel.'</td>
                    <td>'.$vrf->tanggal.'</td>
                    <td>'.$vrf->status_order.'</td>
                    <td>'.$vrf->keterangan.'</td>
                    <td>'.$vrf->nama_user.'</td>
                    <td>'.$vrf->total_bayar.'</td>
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