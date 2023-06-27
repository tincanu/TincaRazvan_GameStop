<?php
ob_start();
session_start();
include("inc/config.php");
include("inc/functions.php");
include("inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
	header('location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Panou administrare - GameStop</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css"/>
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="style.css">

</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="index.php" class="logo">
				<span class="logo-lg">GameStop</span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Restrangere navigare</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Panou administrare</span>
    <!-- Top Bar ... User Inforamtion .. Login/Log out Area -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="../assets/uploads/<?php echo $_SESSION['user']['photo']; ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['user']['full_name']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="profile-edit.php" class="btn btn-default btn-flat">Editeaza Profil</a>
									</div>
									<div>
										<a href="logout.php" class="btn btn-default btn-flat">Deconectare</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>

  		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
<!-- Side Bar to Manage Shop Activities -->
  		<aside class="main-sidebar">
    		<section class="sidebar">
      
      			<ul class="sidebar-menu">

			        <li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
			          <a href="index.php">
			            <i class="fa fa-dashboard"></i> <span>Panou administrare</span>
			          </a>
			        </li>

					
			        <li class="treeview <?php if( ($cur_page == 'settings.php') ) {echo 'active';} ?>">
			          <a href="settings.php">
			            <i class="fa fa-sliders"></i> <span>Website Settings</span>
			          </a>
			        </li>

                    <li class="treeview <?php if( ($cur_page == 'size.php') || ($cur_page == 'size-add.php') || ($cur_page == 'size-edit.php') || ($cur_page == 'color.php') || ($cur_page == 'color-add.php') || ($cur_page == 'color-edit.php') || ($cur_page == 'country.php') || ($cur_page == 'country-add.php') || ($cur_page == 'country-edit.php') || ($cur_page == 'shipping-cost.php') || ($cur_page == 'shipping-cost-edit.php') || ($cur_page == 'top-category.php') || ($cur_page == 'top-category-add.php') || ($cur_page == 'top-category-edit.php') || ($cur_page == 'mid-category.php') || ($cur_page == 'mid-category-add.php') || ($cur_page == 'mid-category-edit.php') || ($cur_page == 'end-category.php') || ($cur_page == 'end-category-add.php') || ($cur_page == 'end-category-edit.php') ) {echo 'active';} ?>">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>Setari Magazin</span>
                            <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="size.php"><i class="fa fa-circle-o"></i>Spatiu Hardisk</a></li>
                            <li><a href="color.php"><i class="fa fa-circle-o"></i>Memorie</a></li>
                            <li><a href="country.php"><i class="fa fa-circle-o"></i>Tara</a></li>
                            <li><a href="top-category.php"><i class="fa fa-circle-o"></i>Categori Principale</a></li>
                            <li><a href="mid-category.php"><i class="fa fa-circle-o"></i>Categori Secundare</a></li>
                            <li><a href="end-category.php"><i class="fa fa-circle-o"></i>Categori Finale</a></li>
                        </ul>
                    </li>


                    <li class="treeview <?php if( ($cur_page == 'product.php') || ($cur_page == 'product-add.php') || ($cur_page == 'product-edit.php') ) {echo 'active';} ?>">
                        <a href="product.php">
                            <i class="fa fa-shopping-bag"></i> <span>Produse</span>
                        </a>
                    </li>


                    <li class="treeview <?php if( ($cur_page == 'order.php') ) {echo 'active';} ?>">
                        <a href="order.php">
                            <i class="fa fa-sticky-note"></i> <span>Comenzi</span>
                        </a>
                    </li>

					<li class="treeview <?php if( ($cur_page == 'customer.php') || ($cur_page == 'customer-add.php') || ($cur_page == 'customer-edit.php') ) {echo 'active';} ?>">
			          <a href="customer.php">
			            <i class="fa fa-user-plus"></i> <span>Clienti</span>
			          </a>
			        </li>

			        <li class="treeview <?php if( ($cur_page == 'page.php') ) {echo 'active';} ?>">
			          <a href="page.php">
			            <i class="fa fa-tasks"></i> <span>Setari pagina</span>
			          </a>
			        </li>

		
      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper">