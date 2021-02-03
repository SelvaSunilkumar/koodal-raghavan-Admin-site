
	<br>
	<div class="container">
		<div class="card mycard shadow">
			<div class="card-header">
				<h4>New Baby Name - Girl</h4>
			</div>
			<div class="card-body">
				<br>
				<input type="text" id="name" required="" placeholder="Enter the Baby Name" class="form-control">
				<br>
			</div>
			<div class="card-footer text-center">
				<button class="btn btn-primary" onclick="uploadName()">Upload Name</button>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container" style="display: none;" id="container">
		<div class="card mycard">
			<div class="card-header text-center">
				<div class="alert alert-success" role="alert" id="success" style="display: none;">
					Name uploaded Successfully!
				</div>
				<div class="alert alert-danger" role="alert" id="danger" style="display: none;">
					Name upload Failed!
				</div>
				<div class="alert alert-danger" role="alert" id="exist" style="display: none;">
					Name already Exists!
				</div>
				<div class="alert alert-danger" role="alert" id="misconnection" style="display: none;">
					Request to Connect with Database failed to Establish Connection.
				</div>
				<div class="alert alert-danger" role="alert" id="noName" style="display: none;">
					Please enter the Name.
				</div>
				<div class="alert alert-warning" role="alert" id="warning" style="display: none;">
					Name upload Stopped! Name Upload Error...
				</div>
			</div>
		</div>
	</div>
</body>
<style type="text/css">
	
	.mycard {
		-webkit-box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
		-moz-box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
		box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
	}

</style>
<script type="text/javascript">

	function _(el) {
		return document.getElementById(el);
	}

	function uploadName() {
		var name = _("name").value;

		_("noName").style.display = "none";
		_("success").style.display = 'none';
		_("danger").style.display = 'none';
		_("warning").style.display = 'none';
		_("exist").style.display = 'none';
		_("misconnection").style.display = 'none';

		if (name == '') {
			_("noName").style.display = "block";
		} else {
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/home/insertNewNameGirl",
				method:"POST",
				data:{name:name},
				success:function(data) {
					if (data == "ok") {
						_("success").style.display = 'block';
					} else if (data == "fail") {
						_("danger").style.display = 'block';
					} else if (data == "exist") {
						_("exist").style.display = 'block';
					} else if (data == "nocon") {
						_("misconnection").style.display = 'block';
					}
					babyname(name,"girl","new",data);
				},
				error:function() {
					_("warning").style.display = 'block';
					babyname(name,"girl","new","Error");
				}
			});
		}

		_("container").style.display = "block";
	}
</script>
</html>