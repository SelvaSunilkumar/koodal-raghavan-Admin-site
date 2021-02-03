
<html>
<head>
	<title>Authentication - Koodal Raghavan Admin</title>
    <link rel="shortcut icon" type="image/icon" href="<?php echo base_url(); ?>icons/title_icon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/auth.css">
	<script src="<?php echo base_url(); ?>js/logs.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="sidenav">
		<div class="login-main-text">
			<h2>Koodal Raghavan<br>Login Page</h2>
			<p>Login here to access the Admin site</p>
		</div>
	</div>
	<div class="main">
		<div class="col-md-6 col-sm-12">
			<div class="login-form">
				<form>
					<div class="form-group">
						<label>User Name</label>
						<input type="text" id="username" class="form-control" placeholder="Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" class="form-control" placeholder="Password">
					</div>
                    <div id="invalid" class="alert alert-danger" role="alert" style="display: none;">
                        Invalid Username or Password!
                    </div>
                    <div id="error" class="alert alert-danger" role="alert" style="display: none;">
                        <b>Internal Error !!!</b>
                    </div>
                    <div id="warning" class="alert alert-warning" role="alert" style="display: none;">
                        Please fill the missing credentials!
                    </div>
                    <input type="button" class="btn btn-black" action="javascript:void(0)" value="Let me in..." id="login" onclick="validateUser()">
				</form>
			</div>
		</div>
	</div>
</body>
<script>
	
	function _(el) {
		return document.getElementById(el);
	}

	function validateUser() {
		var username = _("username").value;
		var password = _("password").value;

		if (username == '' || password == '') {
			document.getElementById('warning').style.display = 'block';
		} else {
            $.ajax({
                url:"<?php echo base_url();?>index.php/home/isUser",
                method:"POST",
                data:{username:username,password:password},
                success:function(data) {
                    if (data == "ok") {
						loginLog("Valid Credentials","Login Successfull");
                        window.location.href = "<?php echo base_url(); ?>index.php/home/dashboard";
                    } else {
                        document.getElementById('warning').style.display = 'block';
						loginLog("Invalid Credentials","Login Failed");
                    }
                }
            });
        }
	}

</script>
</html>