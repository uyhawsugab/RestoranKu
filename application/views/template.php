<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/fullcalendar.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/matrix-style.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/matrix-media.css" />
<link href="<?=base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="d"ropdown id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <?php if($this->session->userdata('id_level') == 1) :?>
        <li><a href="<?=base_url()?>index.php/login_admin"><i class="icon-key"></i> Log Out</a></li>
        <?php elseif($this->session->userdata('id_level') == 2) :?>
        <li><a href="<?=base_url()?>index.php/login_admin"><i class="icon-key"></i> Log Out</a></li>
        <?php else : ?>        
        <li><a href="<?=base_url()?>index.php/login_pelanggan"><i class="icon-key"></i> Log Out</a></li>
      </ul>
        <?php endif ; ?>
    </li>
    <li id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
    </li>
  
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
   <?php if ($this->session->userdata('id_level') == 1) : ?>   
    <li><a href="<?=base_url()?>index.php/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="<?=base_url()?>index.php/pelanggan"><i class="icon icon-group"></i> <span>Pelanggan</span></a> </li>
    <li> <a href="<?=base_url()?>index.php/masakan"><i class="icon icon-glass"></i> <span>Masakan</span></a> </li>
    <li><a href="<?=base_url()?>index.php/"><i class="icon icon-fullscreen"></i> <span>Verifikasi Order</span></a></li>
    <li> <a href="#"><i class="icon icon-th-list"></i> <span>Generate Laporan</span></a></li>
   <?php elseif ($this->session->userdata('id_level') == 2) : ?>
    <li class="active"><a href="<?=base_url()?>index.php/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Verifikasi Order</span></a></li>
    <li> <a href="#"><i class="icon icon-th-list"></i> <span>Generate Laporan</span></a></li>
   <?php else : ?>
   <li class="active"><a href="<?=base_url()?>index.php/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
  </ul>
   <?php endif ; ?>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
<!--End-Action boxes-->    

<!--Chart-box-->    
<!--End-Chart-box--> 
    <hr/>
    <div class="row-fluid">
      <div class="span12">
            <?php
			$this->load->view($konten)
		?>
      </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->


<!--end-Footer-part-->

<script src="<?=base_url()?>assets/js/excanvas.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.ui.custom.js"></script> 
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.flot.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.flot.resize.min.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.peity.min.js"></script> 
<script src="<?=base_url()?>assets/js/fullcalendar.min.js"></script> 
<script src="<?=base_url()?>assets/js/matrix.js"></script> 
<script src="<?=base_url()?>assets/js/matrix.dashboard.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.gritter.min.js"></script> 
<script src="<?=base_url()?>assets/js/matrix.interface.js"></script> 
<script src="<?=base_url()?>assets/js/matrix.chat.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.validate.js"></script> 
<script src="<?=base_url()?>assets/js/matrix.form_validation.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.wizard.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.uniform.js"></script> 
<script src="<?=base_url()?>assets/js/select2.min.js"></script> 
<script src="<?=base_url()?>assets/js/matrix.popover.js"></script> 
<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script> 
<script src="<?=base_url()?>assets/js/matrix.tables.js"></script> 

<script>
    function load_total_cart(){
        $.getJSON("<?=base_url()?>index.php/transaksi/showCartItems", function(hasil){
            $("#cart").html(hasil['total_cart']);
        });
    }
    load_total_cart();
</script>

</body>
</html>
