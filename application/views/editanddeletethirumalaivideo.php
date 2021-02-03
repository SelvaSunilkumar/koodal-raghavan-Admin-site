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
		    		<div class="card-body bo">
		    			<input type="text" value="Thinam Oru Nalvarthai Thirumalai Patri -Video" class="form-control" readonly>
		    			<br>
		    			<input type="text" id="foldername" class="form-control" placeholder="Folder Name">
		    			<br>
		    			<div class="input-group mb-3">
	                        <input type="text" class="form-control" placeholder="Search by Name" id="divert" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
	                        <div class="input-group-append">
	                            <button class="btn btn-outline-secondary" type="button" onclick="redirectTo()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
	                        </div>
						</div>
		    			<input type="text" id="filename" class="form-control" placeholder="Enter the File Name">
		    			<br>
		    			<input type="file" id="file" class="form-control">
		    			<br>
		    			<progress id="progress" value="50" max="100" style="width: 100%;"><p id="status">0%</p></progress>
		    		</div>
		    		<div class="card-footer text-center" id="editStatus">
                        <button type="button" class="btn btn-success" onclick="editVideo()">Edit Now</button>&emsp;&emsp;
                        <button type="button" class="btn btn-danger" onclick="deleteAudio()">Delete Now</button>
                        
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
						<th scope="col">Folder Name</th>
						<th scope="col">File Name</th>
						<th scope="col" hidden>URL</th>
					</tr>
				</thead>
				<tbody  id="table">
                    <?php 
                    if (!$connection) {
                        echo '<tr>
                        <td>-</td>
                        <td>-</td>
						<td>-</td>
						<td>-</td>
						<th scope="row">Connection Failed</td>
					</tr>';
                    } else {
                        $data = '';
                        $select_query = "SELECT * FROM dailyvideothirmalai";
                        $select_result = mysqli_query($connection,$select_query);
                        
                        while ($select_row = mysqli_fetch_array($select_result)) {
                            $folder = $select_row["folder"];
                            $name = $select_row["name"];
                            $url = $select_row["url"];
                            

                            $data .= '<tr>
                            <th scope="row">'.$folder.'</th>
                            <td scope="row">'.$name.'</td>
                            <td scope="row" hidden>'.$url.'</td>
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

	function searchFunction() {
		var input,filter,table,tr,td,i,txtvalue;

		input = document.getElementById("search");
		filter = input.value.toUpperCase();
		table = document.getElementById("table");
		tr = table.getElementsByTagName("tr");
		for (i=0; i< tr.length; i++) {
			tname = tr[i].getElementsByTagName("td")[1];

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

	$(document).ready(function() {
		$('#table tr').click(function() {
			var tableData = $(this).children("th").map(function() {
				return $(this).text();
			}).get();

			var folder = tableData[0];

			_("foldername").value = folder;
		});
		$('#table tr').click(function() {
			var tableData = $(this).children("td").map(function() {
				return $(this).text();
			}).get();

			var filename = tableData[0];
			var urllink = tableData[1];

			_("filename").value = filename;
			_("divert").value = urllink;
		});
	});

	function redirectTo() {
		var url = _("divert").value;

		_("missingName").style.display = "none";

		if (url == "") {
			_("missingName").style.display = "block";
		} else {
			window.open(url,"_blank");
		}
	}

	function deleteAudio() {
		_("dsuccess").style.display = "none";
		_("ddanger").style.display = "none";
		_("dwarning").style.display = "none";
		_("dmissingName").style.display = "none";

		var url = _("divert").value;
		var folderName = _("foldername").value;
		var fileName = _("filename").value;

		if (url == "") {
			_("dmissingName").style.display = "block";
		} else {
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/home/deleteThirumalaiVideo",
				method:"POST",
				data:{url:url},
				success:function(data) {
					if (data == "ok") {
						_("dsuccess").style.display = "block";
					} else if (data == "fail") {
						_("ddanger").style.display = "block";
					}
					nalvarthaiLog("Thirumalai Patri",folderName + "/" + fileName,"video",data,"Delete");
				},
				error:function() {
					_("dwarning").style.display = "block";
					nalvarthaiLog("Thirumalai Patri",folderName + "/" + fileName,"video","Error","Delete");
				}
			});
		}

	}

	function editVideo() {
		var folderName = _("foldername").value;
		var fileName = _("filename").value;
		var file = _("file").value;
		var url = _("divert").value;

		_("success").style.display = "none";
		_("danger").style.display = "none";
		_("warning").style.display = "none";
		_("missingName").style.display = "none";
		_("dsuccess").style.display = "none";
		_("ddanger").style.display = "none";
		_("dwarning").style.display = "none";
		_("dmissingName").style.display = "none";

		if (folderName == "" || filename == "") {
			_("missingName").style.display = "block";
		} else {
			if (file == "") {
				$.ajax({
					url:"<?php echo base_url(); ?>index.php/home/editThirumalaiVideoWithoutFile",
					method:"POST",
					data:{folderName:folderName,fileName:fileName,url:url},
					success:function(data) {
						if (data == "ok") {
							_("success").style.display = "block";
						} else {
							_("danger").style.display = "block";
						}
						nalvarthaiLog("Thirumalai Patri",folderName + "/" + fileName,"video",data,"Edit filename");
					},
					error:function() {
						_("warning").style.display = "block";
						nalvarthaiLog("Thirumalai Patri",folderName + "/" + fileName,"video","Error","Edit filename");
					}
				});
			} else {
				//code for file
				file = _("file").files[0];
				var formdata = new FormData();
				formdata.append("folderName",folderName);
				formdata.append("fileName",fileName);
				formdata.append("file",file);
				formdata.append("url",url);

				$.ajax({
					xhr:function() {
						var xhr = new window.XMLHttpRequest();
						xhr.upload.addEventListener("progress",function(evt) {
							var percentComplete = ((evt.loaded / evt.total) * 100);
							_("progress").value = percentComplete;
							_("status").innerHTML = Math.round(percentComplete);
						},false);
						return xhr;
					},
					url:"<?php echo base_url(); ?>index.php/home/editThirumalaiVideoWithFile",
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
						nalvarthaiLog("Thirumalai Patri",folderName + "/" + fileName,"video",data,"Edit file");
					},
					error:function() {
						_("warning").style.display = "block";
						nalvarthaiLog("Thirumalai Patri",folderName + "/" + fileName,"video","Error","Edit file");
					}
				});
			}
		}
	}

	function refresh() {
		location.reload();
	}

</script>
</html>