
	<br>
	<div class="container">
		<div class="alert alert-info" role="alert" id="info">
			<p><b>Note:</b></p>
			<i class="fa fa-hand-o-right"></i> <b><i>Image Upload : </i></b> Uploading an Image is compulsory. The software accept only <b>.jpg</b> image files. <br>
			<i class="fa fa-hand-o-right"></i> <b><i>Audio Upload : </i></b> Uploading an Audio is also compulsory. The software accepts only <b>.mp3</b> audio files. If the audio file that your are searching is not found, then the file exists in other format other than <b>.mp3</b>
		</div>
		<div class="card mycard shadow">
			<div class="card-header">
				<h4>New Dhinam Oru Nalvarthai -Video</h4>
			</div>
			<div class="card-body">
				<label><b>Enter Display/File name</b></label>
				<input type="text" id="folder" placeholder="Enter the folder Name here" class="form-control">
				<br>
				<label><b>Upload Image</b></label>
				<input type="file" id="image" placeholder="Enter the File Name / Display Name" class="form-control">
				<br>
				<label><b>Upload Audio file</b></label>
				<input type="File" id="file" class="form-control">
			</div>
			<div class="card-footer text-center">
				<button class="btn btn-primary" onclick="uploadFile()">Upload File and Data</button>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container" style="display: block;" id="container">
		<div class="card mycard shadow">
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
			<div class="card-body">
				<label><b>Image</b></label>
				<div class="form-inline">
					<progress id="imageprogress" value="10" max="100" style="width: 80%;">
					</progress>
					<p class="card-text" id="imagestatus" style="padding-left: 5px; width: 20%; text-align: center;">0% Uploaded</p>
				</div>
				<br>
				<label><b>Audio</b></label>
				<div class="form-inline">
					<progress id="fileprogress" value="10" max="100" style="width: 80%;">
					</progress>
					<p class="card-text" id="filestatus" style="padding-left: 5px; width: 20%; text-align: center;">0% Uploaded</p>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</body>
<script>

	var imageUrl = "null";
	var audioUrl = "null";

	function _(el) {
		return document.getElementById(el);
	}
	
	function uploadFile() {
		var image = _("image").value;
		var audio = _("file").value;
		var filename = _("folder").value;

		_("success").style.display = "none";
		_("danger").style.display = "none";
		_("warning").style.display = "none";
		_("missing").style.display = "none";

		if (image == "" || audio == "" || filename == "") {
			_("missing").style.display = "block";
		} else {
			image = _("image").files[0];
			var formdata = new FormData();
			formdata.append("file",image);
			formdata.append("filename",filename);
			formdata.append("extension",".jpg");

			$.ajax({
				xhr:function() {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress",function(evt) {
						var percentComplete = ((evt.loaded / evt.total) * 100);
						_("imageprogress").value = percentComplete;
						_("imagestatus").innerHTML = Math.round(percentComplete) + "%";
					},false);
					return xhr;
				},
				url:"<?php echo base_url(); ?>index.php/home/uploadNewStory",
				method:"POST",
				data:formdata,
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function() {
					_("imagestatus").innerHTML = "Ready to be Uploaded";
					_("imageprogress").value = 0;
				},
				success:function(data) {
					console.log(data);
					var response = JSON.parse(data);

					if (response.status == "ok") {
						_("imagestatus").innerHTML = "Image Uploaded Successfully";
						imageUrl = response.url;

						file = _("file").files[0];
						var dataForm = new FormData();
						dataForm.append("file",file);
						dataForm.append("filename",filename);
						dataForm.append("extension",".mp3");

						$.ajax({
							xhr:function() {
								var xhr = new window.XMLHttpRequest();
								xhr.upload.addEventListener("progress",function(event) {
									var percentCompleted = ((event.loaded / event.total) * 100);
									_("fileprogress").value = percentCompleted;
									_("filestatus").value = Math.round(percentCompleted) + "%";
								},false);
								return xhr;
							},
							url:"<?php echo base_url(); ?>index.php/home/uploadNewStory",
							method:"POST",
							data:dataForm,
							contentType:false,
							cache:false,
							processData:false,
							beforeSend:function() {
								_("filestatus").innerHTML = "Ready to be Uploaded";
								_("fileprogress").value = 0;
							},
							success:function(data) {
								console.log(data);
								var response = JSON.parse(data);
								if (response.status == "ok") {
									_("filestatus").innerHTML = "Auido Uploaded Successfully";
									audioUrl = response.url;

									console.log(imageUrl + " : " + audioUrl);

									$.ajax({
										url:"<?php echo base_url(); ?>index.php/home/uploadStoryDatabase",
										method:"POST",
										data:{filename:filename,audioUrl:audioUrl,imageUrl:imageUrl},
										success:function(data) {
											if (data == "ok") {
												_("success").style.display = "block";
											} else {
												_("danger").style.display = "block";
											}
											storyLog(filename,data);
										},
										error:function() {
											_("warning").style.display = "block";
											storyLog(filename,"Error");
										}
									});

								} else {
									_("filestatus").innerHTML = "Audio Upload Failed";
									_("danger").style.display = "block";
									storyLog(filename,"fail");
								}
							}
						});

					} else {
						_("danger").style.display = "block";
						_("imagestatus").innerHTML = "Image upload Failed";
						_("filestatus").innerHTML = "Audio Uploaded failed";
						storyLog(filename,"fail");
					}
				},
				error:function() {
					_("warning").style.display = "block";
					storyLog(filename,"fail");
				}
			});
		}
	}

</script>
</html>