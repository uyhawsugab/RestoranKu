<h3 class="text-center">Berikut list pesanan Anda</h3>

<div class="span12" style="background:white">
    <div class="row">
        <a href="<?=base_url('index.php/dashboard_pelanggan')?>" class="btn btn-primary">Belanja Lagi</a>
        <a href="#bayar" data-toggle="modal" onclick="addDataCartToDB()" class="btn btn-warning">Bayar</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
            <th>NO</th>
            <th>Nama Masakan</th>
            <th>Nomor Meja</th>
            <th>Jumlah Masakan</th>
            <th>Subtotal</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="showPesan">
        </tbody>
    </table>
    <div id="notif"></div>
    </div> 
</div> 

<div class="modal hide fade" id="payment">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Resto Barokah Paymeny</h4>
      </div>
      <div class="modal-body">
        <h3>Terimakasih telah membeli makanan di tempat kami</h3>
        <p>untuk menyelesaikan pembelian, silahkan membayarkan sejumlah Rp. <span id="allTotal">0</span> ke kasir </p>
        <form method="post" id="popup payment">
              <input type="hidden" name="id_pesan" id="id_pesan">               
        </form>       
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url()?>assets/js/jquery.min.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script> 

<script>
    function MuatSemuaCart(){
      $("#showPesan").html('');
        $.getJSON("<?=base_url()?>index.php/transaksi/showPesanan", function(hasil){
        var no=0;
        $.each(hasil['data_cart'],function (key, dta){
        no++;
        $("#showPesan").append(
            '<tr>'+
                '<td>'+no+'</td>'+
                '<td>'+dta['name']+'</td>'+
                '<td>'+dta['no_meja']+'</td>'+
                '<td>'+dta['qty']+'</td>'+
                '<td align="right">'+dta['subtotal']+'</td>'+
                '<td><a href="#" onclick="if(confirm(\'Apakah Yakin?\')){ deleteCartOne(\''+dta['rowid']+'\')}"><i class="icon-trash"></i></a></td>'+
            '</tr>'    
            );
        });
        $("#showPesan").append(
            '<tr>'+
            '<td colspan="4">Total yang Harus dibayar</td><td align="right">'+hasil['total_seluruh']+'</td><td><a href="#" onclick="if(confirm(\'Apakah Anda Yakin Menghapus Data Ini?\')){deleteAllCart()}"><i class="icon-trash"></i></a></td>'+
            '</tr>'
                );
            });
        }
        MuatSemuaCart();

        function addDataCartToDB() {
            $.getJSON("<?=base_url()?>index.php/transaksi/simpanBayar", function(hasil){
                if(hasil['status']==1){
                    $("#notif").html('Sukses melakukan pembayaran');
                    $("#notif").show('animate');
                    $("#notif").addClass("alert alert-success");
                    setTimeout(function(){
                        $("#notif").hide('animate');
                        $("#notif").removeClass("alert alert-success");
                        setTimeout(function(){
                            $("#allTotal").html(hasil['total']);
                            $("#payment").modal("show");
                            $("#id_pesan").val(hasil['id_pesan']);
                            load_total_cart();
                            MuatSemuaCart();
                        },500);
                    }, 3000);
                }
            });
        }

        function deleteCartOne(id){
            $.getJSON("<?=base_url()?>index.php/transaksi/deleteCart/"+id,function(hasil){
                if(hasil['status']==1){
                    MuatSemuaCart();
                    load_total_cart();
                    $("#notif").html('Sukses Menghapus Item');
                    $("#notif").show('animate');
                    $("#notif").addClass("alert alert-success");
                } else {
                    $("#notif").html('Gagal Menghapus Item');
                    $("#notif").show('animate');
                    $("#notif").addClass("alert alert-danger");
                }
                setTimeout(function(){
                    $("#notif").hide('animate');
                    $("#notif").removeClass("alert alert-danger");
                }, 3000);
            });
        }

        function deleteAllCart(){
            $.getJSON("<?=base_url()?>index.php/transaksi/deleteAllCart", function(hasil){
                load_total_cart();
                MuatSemuaCart();
                $("#notif").html('Sukses Menghapus Item');
                $("#notif").show('animate');
                $("#notif").addClass("alert alert-success");
                setTimeout(function(){
                    $("#notif").hide('animate');
                    $("#notif").removeClass("alert alert-success");
                }, 3000);
            });
        }

</script>
