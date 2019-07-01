<!DOCTYPE html>
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/css/matrix-login.css" />
        <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script> 

    </head>
    <body>
        <div id="loginbox">            
            <form id="signIn" class="form-vertical" action="#" method="post">
                 <div class="control-group normal_text"> <h3>Restoran Barokah Pelanggan</h3>
                    <span class="alert alert-warning" id="pesan"></span>
                </div>  
                <div class="control-group" >
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" id="username" name="username" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull left"><a class="btn btn-primary" data-target="#tabDaftar" data-toggle="modal">Registrasi</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success">Login</button></span>
                </div>
            </form>
</div>



     <div class="modal hide" id="tabDaftar">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pendaftaran Pelanggan</h4>
            </div>
            <div class="modal-body">
            <form id="registrasi" method="post" action="#">
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
                
                <div id="msg" class="alert alert-warning"></div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="daftar" value="DAFTAR" class="btn btn-success">
            </div>
            </form>  
            </div>
        </div>
     </div>


        <script>  

            $("#signIn").submit((e) => {
                e.preventDefault();
                var datalogin=$("#signIn").serialize();
                $("#pesan").html("Loading......");
                $.ajax({
                    url:"<?=base_url()?>index.php/login_pelanggan/loginProses",
                    type:"post",
                    data:datalogin,
                    dataType:"json",
                    success:function(hasil){
                        if(hasil['status']==1){
                            $("#pesan").html("Anda Sukses Login");
                            setTimeout(function(){
                                location.href="<?=base_url()?>index.php/dashboard_pelanggan";
                            }, 3000);
                        } else {
                            $("#pesan").html("Username dan password tidak cocok");
                        }
                    }
                });
            });

    $("#registrasi").submit((e) => {
			e.preventDefault();
			var data_input = $('#registrasi').serialize();
			$("#msg").html("<ul><li>Sedang Memeriksa...</li></ul>");
			$.ajax({
				url: "<?=base_url()?>index.php/login_pelanggan/simpanDataPelanggan",
				type:"post",
				data:data_input,
				dataType:"json",
				success:function(hasil){
					if(hasil['status']==1){
						$("#msg").html(hasil['keterangan']);
                		$("[name=nama_pel]").val('');
                		$("[name=alamat_pel]").val('');
                		$("[name=telp_pel]").val('');
                		$("[name=username]").val('');
                		$("[name=password]").val('');
                setTimeout(function(){
                    $("#tabDaftar").modal("hide");
                }, 3000);
					} else {
						$("#msg").html(hasil["keterangan"]);
					}
				}
			});
		});
        </script>
    </body>

