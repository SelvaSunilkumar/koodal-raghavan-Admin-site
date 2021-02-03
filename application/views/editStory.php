<?php include 'dbconnector.php'; ?>

	<br>
	<div class="row">
		<div class="col">
			<div class="container">
		    	<div class="card mycard" style="width: 100%;">
		    		<div class="card-body">
		    			<div class="input-group mb-3">
	                        <input type="text" class="form-control" placeholder="Search by Name" id="search" aria-label="Recipient's username" aria-describedby="basic-addon2" onkeyup="searchFunction()">
	                        <div class="input-group-append">
	                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
	                        </div>
						</div>
		    		</div>
		    	</div>
                <div class="card mycar" style="width: 100%; display: block;" id="details">
                	<div class="card-header">
                		<h5>Edit Audio here</h5>
                	</div>
		    		<div class="card-body content-center">
		    			<img src="" class="img-fluid" id="picture" style="display: none;" alt="Responsive image">
		    			<br>
		    			<div class="input-group mb-3">
	                        <input type="text" class="form-control" placeholder="Audio URL here" id="divert" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
	                        <div class="input-group-append">
	                            <button class="btn btn-outline-secondary" type="button" onclick="redirectTo()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
	                        </div>
						</div>
		    			<input type="text" id="filename" class="form-control" placeholder="Enter the File Name">
		    			<br>
		    			<label><b>Upload Image</b></label>
		    			<input type="file" id="image" class="form-control">
		    			<br>
		    			<progress id="imageprogress" value="10" max="100" style="width: 100%;"></progress>
		    			<p id="imagestatus">0%</p>
		    			<br>
		    			<label><b>Upload Audio</b></label>
		    			<input type="file" id="file" class="form-control">
		    			<br>
		    			<progress id="audioprogress" value="10" max="100" style="width: 100%;"></progress>
		    			<p id="audiostatus">0%</p>
		    		</div>
		    		<br>
		    		<div class="card-footer text-center" id="editStatus">
                        <button type="button" class="btn btn-success" onclick="editStory()">Edit Now</button>&emsp;&emsp;
                        <button type="button" class="btn btn-danger" onclick="deleteStory()">Delete Now</button>
                        <br>
                        
		    			<div class="alert alert-success" role="alert" id="success" style="display: none;">
							Data edited Successfully
						</div>
						<div class="alert alert-danger" role="alert" id="danger" style="display: none;">
						  	Data couldn't be Edited
						</div>
						<div class="alert alert-warning" role="alert" id="warning" style="display: none;">
						 	Error occured on Editing Data. Data not Edited
						</div>
						<div class="alert alert-warning" role="alert" id="missingName" style="display: none;">
						  	Please select a Data
						</div>
						<div class="alert alert-success" role="alert" id="dsuccess" style="display: none;">
							Data Deleted Successfully
						</div>
						<div class="alert alert-danger" role="alert" id="ddanger" style="display: none;">
						  	Data couldn't be Deleted
						</div>
						<div class="alert alert-warning" role="alert" id="dwarning" style="display: none;">
						 	Error occured on Deleting data. Data not Deleted
						</div>
						<div class="alert alert-warning" role="alert" id="dmissingName" style="display: none;">
						  	Please select Data to delete the Existing data
						</div>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="col col-sm-8">
			<div class="alert alert-info text-center" role="alert" id="info">
				Please select a File/Folder from the table to Edit or Delete Audio in Database
			</div>
            <?php 
                if (!$connection) {
                    ?> 
                    <div id="invalid" class="alert alert-danger" role="alert" style="text-align: center;">
                        Request for connection with database failed to be established
                    </div>
                    <?php
                }
            ?>
			<table class="table table-hover text-center shadow">
				<thead>
					<tr>
						<th scope="col">File Name</th>
						<th scope="col" hidden>URL</th>
					</tr>
				</thead>
				<tbody  id="table">
                    <?php 
                    if (!$connection) {
                        echo '<tr>
						<td>-</td>
						<th scope="row">Connection Failed</td>
					</tr>';
                    } else {
                        $data = '';
                        $select_query = "SELECT * FROM kadhaikekumneram";
                        $select_result = mysqli_query($connection,$select_query);
                        
                        while ($select_row = mysqli_fetch_array($select_result)) {
                            $name = $select_row["name"];
                            $url = $select_row["url"];
                            $image = $select_row["image"];
                            

                            $data .= '<tr>
                            <td scope="row">'.$name.'</td>
                            <td scope="row" hidden>'.$url.'</td>
                            <td scope="row" hidden>'.$image.'</td>
                        	</tr>';
                        }
                        echo $data;
                    }
                    ?>
				</tbody>
			</table>
		</div>
		<button class="btn btn-primary float text-center" onclick="refresh()">
			<i class="fa fa-refresh"></i>
		</button>
	</div>
</body>
<style type="text/css">

	.container {
		padding-top: 15px;
	}

	.mycard, .mycar {
		margin-left: 10px;
		border-radius: 10px;
		-webkit-box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
		-moz-box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
		box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
	}

	.mycar {
		margin-top: 30px;
	}

	.bod {
		padding: 10px;
    }

    .float{
		position:fixed;
		width:60px;
		height:60px;
		bottom:40px;
		right:40px;
		color:#FFF;
		border-radius:50px;
		text-align:center;
		box-shadow: 2px 2px 3px #999;
	}

	.my-float{
		margin-top:22px;
	}
</style>
<script>

	function _(el) {
		return document.getElementById(el);
	}

	$(document).ready(function() {
		$('#table tr').click(function() {
			var tableData = $(this).children("td").map(function() {
				return $(this).text();
			}).get();

			var fileName = tableData[0];
			var url = tableData[1];
			var imageUrl = tableData[2];

			_("divert").value = url;
			_("filename").value = fileName;
			_("picture").src = imageUrl;
			_("picture").style.display = "block";
		});
	});
	
	function searchFunction() {
		var input,filter,table,tr,td,i,txtvalue;

		input = document.getElementById("search");
		filter = input.value.toUpperCase();
		table = document.getElementById("table");
		tr = table.getElementsByTagName("tr");
		for (i=0; i< tr.length; i++) {
			tname = tr[i].getElementsByTagName("td")[0];

			if (tname) {
				txtvalue = tname.textContent || tname.innerText;
				if (txtvalue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}

	var oldUrl;
	var newImageUrl;
	var newAudioUrl;

	function modifyDatabase(fileName,oldaudioUrl,newimageUrl,newaudioUrl) {
		console.log(fileName + " : " + newimageUrl + " : " + newaudioUrl);
		$.ajax({
			url:"<?php echo base_url(); ?>index.php/home/editStoryWithFile",
			method:"POST",
			data:{fileName:fileName,oldaudioUrl:oldaudioUrl,newimageUrl:newimageUrl,newaudioUrl:newaudioUrl},
			success:function(data) {
				if (data == "ok") {
					_("success").style.display = "block";
				} else {
					_("danger").style.display = "block";
				}
				storyLog(fileName,data + " edit");
			},
			error:function() {
				_("warning").style.display = "block";
				storyLog(fileName,"error edit");
			}
		})
	}

	function editStory() {
		_("success").style.display = "none";
		_("danger").style.display = "none";
		_("warning").style.display = "none";
		_("missingName").style.display = "none";
		_("dsuccess").style.display = "none";
		_("ddanger").style.display = "none";
		_("dwarning").style.display = "none";
		_("dmissingName").style.display = "none";

		var filename = _("filename").value;
		var audioFile = _("file").value;
		var imageFile = _("image").value;
		oldUrl = _("divert").value;
		var imageUrl = _("picture").src;
		console.log(imageUrl);

		if (filename == "") {
			_("missingName").style.display = "block";
		} else {
			if (audioFile == "" && imageFile == "") {
				$.ajax({
					url:"<?php echo base_url(); ?>index.php/home/editStoryWithoutFile",
					method:"POST",
					data:{filename:filename,oldUrl:oldUrl},
					success:function(data) {
						if (data == "ok") {
							_("success").style.display = "block";
						} else {
							_("danger").style.display = "block";
						}
					},
					error:function() {
						_("warning").style.display = "block";
					}
				});
			} else {
				//code for uploading file
				if (imageFile != "") {
					file = _("image").files[0];
					var formdata = new FormData();
					formdata.append("filename",filename);
					formdata.append("file",file);
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
							_("imageprogress").value = 0;
						},
						success:function(data) {
							var response = JSON.parse(data);
							console.log(data);
							if (response.status == "ok") {
								console.log("Server status ok");
								if (_("file").value != "") {
									console.log("some thing" + filename);
									newImageUrl = response.url;
									file = _("file").files[0];
									var dataform = new FormData();
									dataform.append("file",file);
									dataform.append("filename",filename);
									dataform.append("extension",".mp3");
									$.ajax({
										xhr:function() {
											var xhr = new window.XMLHttpRequest();
											xhr.upload.addEventListener("progress",function(event) {
												var uploaded = ((event.loaded / event.total) * 100);
												_("audioprogress").value = uploaded;
												_("audiostatus").innerHTML = Math.round(uploaded) + "%";
											},false);
											return xhr;
										},
										url:"<?php echo base_url(); ?>index.php/home/uploadNewStory",
										method:"POST",
										data:dataform,
										contentType:false,
										cache:false,
										processData:false,
										beforeSend:function() {
											_("audioprogress").value = 0;
										},
										success:function(data) {
											console.log(data);
											var reply = JSON.parse(data);
											if (reply.status == "ok") {
												var newAudioUrl = reply.url;
												modifyDatabase(filename,oldUrl,newImageUrl,newAudioUrl);
											} else {
												_("danger").style.display = "block";
											}
										},
										error:function() {
											_("warning").style.display = "block";
										}
									});
								} else {
									newImageUrl = response.url;
									modifyDatabase(filename,oldUrl,newImageUrl,oldUrl);
								}
							} else {
								_("danger").style.display = "block";
							}
						},
						error:function() {
							_("warning").style.display = "block";
						}
					});
				} else {
					file = _("file").files[0];
					var dataform = new FormData();
					dataform.append("file",file);
					dataform.append("filename",filename);
					dataform.append("extension",".mp3");
					$.ajax({
						xhr:function() {
							var xhr = new window.XMLHttpRequest();
							xhr.upload.addEventListener("progress",function(event) {
								var uploaded = ((event.loaded / event.total) * 100);
								_("audioprogress").value = uploaded;
								_("audiostatus").innerHTML = Math.round(uploaded) + "%";
							},false);
							return xhr;
						},
						url:"<?php echo base_url(); ?>index.php/home/uploadNewStory",
						method:"POST",
						data:dataform,
						contentType:false,
						cache:false,
						processData:false,
						beforeSend:function() {
							_("audioprogress").value = 0;
						},
						success:function(data) {
							var reply = JSON.parse(data);
							if (reply.status == "ok") {
								var newAudioUrl = reply.url;
								modifyDatabase(filename,oldUrl,newImageUrl,oldUrl);
							} else {
								_("danger").style.display = "block";
							}
						},
						error:function() {
							_("warning").style.display = "block";
						}
					});
				}
			}
		}
	}

	function deleteStory() {
		_("success").style.display = "none";
		_("danger").style.display = "none";
		_("warning").style.display = "none";
		_("missingName").style.display = "none";
		_("dsuccess").style.display = "none";
		_("ddanger").style.display = "none";
		_("dwarning").style.display = "none";
		_("dmissingName").style.display = "none";

		var url = _("divert").value;
		var filename = _("filename").value;

		if (url == "") {
			_("dmissingName").style.display = "block";
		} else {
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/home/deleteStory",
				method:"POST",
				data:{url:url},
				success:function(data) {
					if (data == "ok") {
						_("dsuccess").style.display = "block";
					} else {
						_("ddanger").style.display = "block";
					}
					storyLog(filename,data + " delete");
				},
				error:function() {
					_("dwarning").style.display = "block";
					storyLog(filename,"Error Delete");
				}
			});
		}
	}

	function redirectTo() {
		var url = _("divert").value;

		if (url == "") {
			_("missingName").style.display = "block";
		} else {
			window.open(url,"_blank");
		}
	}

	function refresh() {
		location.reload();
	}

</script>
</html>