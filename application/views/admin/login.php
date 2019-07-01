<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/css/matrix-login.css" />
        <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <script src="<?=base_url()?>assets/js/jquery.min.js"></script>

    </head>
    <body>
        <div id="loginbox">            
            <form id="signIn" class="form-vertical" action="#" method="post">
                 <div class="control-group normal_text"> <h3>RestoranKU Admin</h3>
                <span class="alert alert-warning" id="pesan"></span>
                </div>
                 <div class="control-group">

  
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
                    <span class="pull-right"><button type="submit" class="btn btn-success">Login</button></span>
                </div>
            </form>
        </div>
        


        <script>  
            $("#signIn").submit(function(event){
                event.preventDefault();
                var datalogin=$("#signIn").serialize();
                $("#pesan").html("Loading......");
                $.ajax({
                    url:"<?=base_url()?>index.php/login_admin/prosesLogin",
                    type:"post",
                    data:datalogin,
                    dataType:"json",
                    success:function(hasil){
                        if(hasil['status']==1){
                            $("#pesan").html("Anda Sukses Login");
                            setTimeout(function(){
                                location.href="<?=base_url()?>index.php/dashboard";
                            }, 3000);
                        } else {
                            $("#pesan").html("Username dan password tidak cocok");
                        }
                    }
                });
            });
        </script>
    </body>

</html>
