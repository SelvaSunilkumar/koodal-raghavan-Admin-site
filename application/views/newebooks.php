
	<br>
	<div class="container">
		<div class="alert alert-info" role="alert" id="info">
			<p><b>Note:</b></p>
			Please upload <b>.pdf</b> file for better run in App. If you try to upload any other file other than <b>.pdf</b> please try to <i>change the format</i> and Upload.
		</div>
		<div class="card mycard">
			<div class="card-header">
				<h4>eBooks - New</h4>
			</div>
			<div class="card-body shadow">
				<div class="form-group">
					<input type="text" id="filename" required="" placeholder="Enter the Book Name" class="form-control">
					<span style="float: right; display: none;" id="filenameError"><p class="text-danger"><small>** Missing file name</small></p></span>
				</div>
				<div class="form-group">
					<select class="form-control" id="type">
						<option class="dropdown-item" value="" disabled selected>-- Select your Upload Type --</option>
						<option class="dropdown-item" value="sample">Sample e-book   &nbsp; --Upload</option>
						<option class="dropdown-item" value="book">Actual Book    &ensp;--Upload</option>
					</select>
					<span style="float: right; display: none;" id="typeError"><p class="text-danger"><small>** Please select a Upload type</small></p></span>
				</div>
                <div class="form-group" style="display: none;" id="priceDiv">
                    <input type="number" id="price" required="" placeholder="Price of Book (accepts only Number)" class="form-control">
                    <span style="float: right; display: none;" id="prizeError"><p class="text-danger"><small>** Missing Book prize</small></p></span>
                </div>
				<div class="form-group">
					<input type="File" id="file" class="form-control">
					<span style="float: right; display: none;" id="fileError"><p class="text-danger"><small>** Missing file</small></p></span>
				</div>
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
				<div>
					<div class="progress">
                        <div class="progress-bar" id="progress" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">None Selected</div>
                    </div>
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

    $("#type").change(function() {
        var type = _("type").value;

        if (type == "sample") {
            _("priceDiv").style.display = "none";
        } else {
            _("priceDiv").style.display = "block";
        }
    });

    function uploadFile() {
    	var filename = _("filename").value;
    	var type = _("type").value;
    	var file = _("file").value;

    	_("success").style.display = "none";
    	_("danger").style.display = "none";
    	_("missing").style.display = "none";
    	_("warning").style.display = "none";
    	_("container").style.display = "none";
    	_("filenameError").style.display = "none";
    	_("typeError").style.display = "none";
    	_("prizeError").style.display = "none";
    	_("fileError").style.display = "none";

    	if (type == "" || filename == "" || file == "") {
    		if (type == "") {
    			_("typeError").style.display = "block";
    		}
    		if (filename == "") {
    			_("filenameError").style.display = "block";
    		}
    		if (file == "") {
    			_("fileError").style.display = "block";
    		}
    		_("missing").style.display = "block";
    	} else {
    		if (type == "sample") {
    			//upload sample file code
    			file = _("file").files[0];
    			var formdata = new FormData();
    			formdata.append("filename",filename);
    			formdata.append("file",file);

    			$.ajax({
    				xhr:function() {
    					var xhr = new window.XMLHttpRequest();
    					xhr.upload.addEventListener("progress",function(evt) {
    						var percentComplete = ((evt.loaded / evt.total) * 100);
    						_("progress").style.width = percentComplete + "%";
    						_("status").innerHTML = Math.round(percentComplete) + "% Uploaded";
    					},false);
    					return xhr;
    				},
    				url:"<?php echo base_url(); ?>index.php/home/uploadSampleBookFile",
    				method:"POST",
    				data:formdata,
    				contentType:false,
    				cache:false,
    				processData:false,
    				beforeSend:function() {
    					_("progress").style.width = "0%";
    				}, success:function(data) {
    					console.log(data);
    					if (data == "ok") {
    						_("success").style.display = "block";
    						_("progress").innerHTML = "File Uploaded Successfully";
    					} else {
    						_("danger").style.display = "block";
    						_("progress").innerHTML = "File Upload Failed";
    					}
    				}, error:function() {
    					_("warning").style.display = "block";
    					_("progress").innerHTML = "Error Occured on uploading";
    				}
    			});
    		} else {
    			var prize = _("price").value;
    			if (prize == "") {
    				_("prizeError").style.display = "block";
    			} else {
    				//upload actual file code
					file = _("file").files[0];
					var formdata = new FormData();
					formdata.append("filename",filename);
					formdata.append("file",file);
					formdata.append("price",prize);

					$.ajax({
						xhr:function() {
							var xhr = new window.XMLHttpRequest();
							xhr.upload.addEventListener("progress",function(evt) {
								var percentComplete = ((evt.loaded / evt.total) * 100);
								_("progress").style.width = percentComplete + "%";
								_("progress").innerHTML = Math.round(percentComplete) + "% Uploaded";
							},false);
							return xhr;
						},
						url:"<?php echo base_url(); ?>index.php/home/uploadActualBookFile",
						method:"POST",
						data:formdata,
						contentType:false,
						cache:false,
						processData:false,
						beforeSend:function() {
							_("progress").style.width = "0%";
						}, success:function(data) {
							console.log(data);
							if (data == "ok") {
								_("success").style.display = "block";
								_("progress").innerHTML = "File Uploaded Successfully";
							} else {
								_("danger").style.display = "block";
								_("progress").innerHTML = "File Upload Failed";
							}
						}, error:function() {
							_("warning").style.display = "block";
							_("progress").innerHTML = "Error Occured on uploading";
						}
					});
    			}
    		}
    	}

    	_("container").style.display = "block";
    }

</script>
</html>