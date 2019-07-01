<h3 class="text-center">Selamat Datang di Halaman Pelanggan Restoran Barokah</h3>

<div class="span12">
    <!-- <div class ="row"><input type="text" id="cari" name="cari" class="form-control" placeholder="Cari disini"></div> <br> -->
    <div class="row-fluid">
    <ul class="thumbnails">
    <div id="showMasakanWithJSON"></div>
    </ul>
    </div> 
</div> 

<div class="modal fade" id="detailMasakan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Masakan</h4>
      </div>
      <div class="modal-body">
        <div class="span6">
            <div id="gambar"></div>
        </div>
        <div class="span6">
            <div id="deskripsi"></div>
            <div id="no_meja"></div>
            <div id="jumlah"></div>
            <br>
            <div id="btn"></div>
            <br>
            <div id="pesan"></div>
        </div>
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
//Show dataMasakan From Database
    $.getJSON("<?=base_url()?>index.php/getMasakan",
        (data) => {
            var datanya = "";
            $.each(data,(key,dt) => {
                datanya +=
            
              '<li class="span3">'+
                '<div class="thumbnail" >'+
                  '<img alt="300x200" src="<?=base_url('assets/img/gambar/')?>'+dt['gambar']+'" style="width: 500px; height: 200px;">'+
                  '<div class="caption">'+
                    '<h3>Keterangan Masakan</h3>'+
                    '<p style="font-size:15px;">Nama Masakan : '+dt['nama_masakan']+'</p>'+
                    '<p style="font-size:15px;">Harga : '+dt['harga']+'</p>'+
                    '<p><a href="#detailMasakan" data-toggle="modal" onclick="showDetail('+dt['id_masakan']+')" class="btn btn-primary">Detail</a></p>'+
                  '</div>'+
                '</div>'+
              '</li>';
            });
            $("#showMasakanWithJSON").html(datanya);
        });

//Show DetailMasakan from function showDetail
    function showDetail(id_masakan){
        $.getJSON("<?=base_url()?>index.php/getMasakan/detailData/"+id_masakan,(data) => {
            $("#gambar").html(
                '<img src="<?=base_url()?>assets/img/gambar/'+data['gambar']+'" style="width:100%">'
            );

            $("#deskripsi").html(
                '<table class="table table-striped">'+
                '<tr><td>Nama Masakan</td><td>'+data['nama_masakan']+'</td></tr>'+
                '<tr><td>Harga Masakan</td><td>'+data['harga']+'</td></tr>'+
                '<tr><td>Status Masakan</td><td>'+data['status_masakan']+'</td></tr>'+
                '</table>'
            );
            $("#no_meja").html(
                '<label>Nomor Meja</label>'+
                '<input type="number" id="nomor_meja" value="1" class="form-control">'
            );
            $("#jumlah").html(
                '<label>Jumlah Masakan</label>'+
                '<input type="number" id="jumlah_msk" value="1" class="form-control">'
            );
            $("#btn").html(
                '<button id="beli" onclick="buy('+data['id_masakan']+')" class="btn btn-info">Beli</button>'+
                '<a href="<?=base_url()?>index.php/transaksi" class="btn btn-success">Check Out</a>'
            );
        });
    }

    function buy(id_masakan){
        var jumlah=$("#jumlah_msk").val();
        var no_meja=$("#nomor_meja").val();
        $("#pesan").hide();
        $("#pesan").removeClass("alert alert-success");
        $.getJSON("<?=base_url()?>index.php/transaksi/addCart/"+id_masakan+"/"+jumlah+"/"+no_meja, (hasil) => {
            $("#cart").html(hasil['total_cart']);
            $("#pesan").html("Item anda telah ditambah ke Cart");            
            $("#pesan").addClass("alert alert-success");            
            $("#pesan").show("animate");
            setTimeout(function(){
                $("#pesan").hide('fade');
            }, 3000);            
        });
    }
</script>