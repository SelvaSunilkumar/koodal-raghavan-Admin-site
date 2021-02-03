<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
    <link rel="shortcut icon" type="image/icon" href="<?php echo base_url(); ?>icons/title_icon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<meta charset="utf-8">
	<script src="<?php echo base_url(); ?>js/logs.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #ccc;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="<?php echo base_url(); ?>index.php/home/dashboard" class="navbar-brand">Koodal Raghavan Admin</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggl navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a href="#" class="nav-link"><i class="fa fa-home" style="padding-right: 4px;"></i>Home</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>index.php/home/sambavanai" class="nav-link"><i class="fa fa-rupee" style="padding-right: 4px;"></i>Sambavanai</a>
				</li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Services
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="#" class="dropdown-item">Dhinam Oru Nalvarthai - Video</a>
						<a href="#" class="dropdown-item">Dhinachariyai</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">Boy baby Name</a>
						<a href="#" class="dropdown-item">Girl baby Name</a>
					</div>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>index.php/home/logout" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
				</li>
			</ul>
		</div>
	</nav>