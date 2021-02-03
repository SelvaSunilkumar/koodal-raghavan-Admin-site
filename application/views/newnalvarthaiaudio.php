
	<br>
	<div class="container">
		<div class="alert alert-info" role="alert" id="info">
			<p><b>Note:</b></p>
			Please upload <b>.mp3</b> file for better run in App. If you try to upload any other file other than <b>.mp3</b> please try to <i>change the format</i> and Upload.
		</div>
		<div class="card mycard">
			<div class="card-header">
				<h4>New Dhinam Oru Nalvarthai -Audio</h4>
			</div>
			<div class="card-body shadow">
				<select class="form-control" id="folder">
					<option class="dropdown-item" value="" disabled selected>-- Select your Folder --</option>
					<option class="dropdown-item" value="Nalvarthai">Thinam Oru Nalvarthai</option>
					<option class="dropdown-item" value="Thirumalai Patri">Thinam Oru Nalvarthai Thirumalai Patri</option>
				</select>
				<br>
				<input type="text" id="filename" required="" placeholder="Enter the File Name / Display Name" class="form-control">
				<br>
				<input type="File" id="file" class="form-control">
			</div>
			<div class="card-footer text-center">
				<button class="btn btn-primary" onclick="uploadFile()">Upload File and Data</button>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container" style="display: none;" id="container">
		<div class="card mycard">
			<div class="card-header text-center">
				<div class="alert alert-success" role="alert" id="success" style="display: none;">
					File uploaded Successfully!
				</div>
				<div class="alert alert-danger" role="alert" id="danger" style="display: none;">
					File upload Failed!
				</div>
				<div class="alert alert-danger" role="alert" id="missing" style="display: none;">
					Form details found Missing.
				</div>
				<div class="alert alert-warning" role="alert" id="warning" style="display: none;">
					File upload Stopped! File Upload Error...
				</div>
			</div>
			<div class="card-body text-center">
				<div class="form-inline">
					<progress id="progress" value="50" max="100" style="width: 80%;">
					</progress>
					<p id="status" class="card-text" style="padding-left: 5px; width: 20%; text-align: center;"> 0% Uploaded</p>
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
<script>

	function _(el) {
		return document.getElementById(el);
	}

	function uploadFile() {
		//alert("Done");
		var folderName = _("folder").value;
		var filename = _("filename").value;
		var file = _("file").value;

		_("success").style.display = "none";
		_("danger").style.display = "none";
		_("missing").style.display = "none";
		_("warning").style.display = "none";

		if (folderName == "" || filename == "" || file == "") {
			_("missing").style.display = "block";
		} else {
			file = _("file").files[0];

			var formdata = new FormData();
			formdata.append("folder",folderName);
			formdata.append("filename",filename);
			formdata.append("file",file);
			$.ajax({
				xhr:function() {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress",function(evt) {
						var percentComplete = ((evt.loaded / evt.total) * 100);
						_("progress").value = percentComplete;
						_("status").innerHTML = Math.round(percentComplete) + "%";
					},false);
					return xhr;
				},
				url:"<?php echo base_url(); ?>index.php/home/uploadNalvarthaiAudio",
				method:"POST",
				data:formdata,
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function() {
					_("progress").value = 0;
				},
				success:function(data) {
					if (data == "ok") {
						_("success").style.display = "block";
					} else if (data == "fail") {
						_("danger").style.display = "block";
					}
					nalvarthaiLog("Dhinam Oru Nalvarthai",folderName + "/" + filename,"audio",data,"new");
				},
				error:function() {
					_("warning").style.display = "block";
					nalvarthaiLog("Dhinam Oru Nalvarthai",folderName + "/" + filename,"audio","error","new");
				}
			});
		}

		_("container").style.display = "block";
	}
</script>
</html>