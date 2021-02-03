<br>
	<div class="container">
        <div class="alert alert-info" role="alert">
			<p class="lead"><b>Note:</b></p>
			<b>Please select file type from the list to enable uploading file</b>
		</div>
		<div class="alert alert-info" role="alert" id="infoOne" style="display: none;">
			<p><b>Note:</b></p>
			Please upload <b>.mp4</b> file for better run in App. If you try to upload any other file other than <b>.mp4</b> please try to <i>change the format</i> and Upload.
		</div>
        <div class="alert alert-info" role="alert" id="infoTwo" style="display: none;">
			<p><b>Note:</b></p>
			Please upload <b>.mp3</b> file for better run in App. If you try to upload any other file other than <b>.mp3</b> please try to <i>change the format</i> and Upload.
		</div>
		<div class="card mycard shadow">
			<div class="card-header">
				<h4>New Upanyasam and Others</h4>
			</div>
			<div class="card-body">
				<input type="text" id="filename" required="" placeholder="Enter the File Name / Display Name" class="form-control">
                <br>
                <select class="form-control" onchange="optionChnged()" id="type">
                    <option selected disabled>--- SELECT TYPE OF FILE ---</option>
                    <option value="mp3">Audio - mp3</option>
                    <option value="mp4">Video - mp4</option>
                </select>
				<br>
				<input type="File" id="filevideo" class="form-control" accept=".mp4" style="display: none;">
                <input type="File" id="fileaudio" class="form-control" accept=".mp3" style="display: none;">
			</div>
			<div class="card-footer text-center">
				<button class="btn btn-primary" id="upload" onclick="upload()" disabled>Upload File and Data</button>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container" id="container">
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
<script>

    function _(el) {
        return document.getElementById(el);
    }

    function optionChnged() {
        var type = _("type").value;

        _("infoOne").style.display = "none";
        _("infoTwo").style.display = "none";
        _("filevideo").style.display = "none";
        _("fileaudio").style.display = "none";

        if (type == "mp3") {
            _("infoTwo").style.display = "block";
            _("fileaudio").style.display = "block";
        } else {
            _("infoOne").style.display = "block";
            _("filevideo").style.display = "block";
        }

        _("upload").disabled = false;
    }

    function upload() {
        var filename = _("filename").value;
        var file;
        var type = _("type").value;

        _("success").style.display = "none";
        _("danger").style.display = "none";
        _("missing").style.display = "none";
        _("warning").style.display = "none";

        if (type == "mp3") {
            file = _("fileaudio").value;
        } else {
            file = _("filevideo").value;
        }

        if (filename == "" || file == "") {
            _("missing").style.display = "block";
        } else {
            if (type == "mp3") {
                file = _("fileaudio").files[0];
            } else {
                file = _("filevideo").files[0];
            }

            var formdata = new FormData();
            formdata.append("filename",filename);
            formdata.append("file",file);
            formdata.append("type",type);

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
                url:"<?php echo base_url(); ?>index.php/others/newotherupload",
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

</script>
</html>