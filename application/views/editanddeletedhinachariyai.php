<?php include 'dbconnector.php'; ?>

	<input type="hidden" id="urlOne"><input type="hidden" id="urlTwo"><input type="hidden" id="urlThree">

	<?php 
        if (!$connection) {
            ?> 
            <div id="invalid" class="alert alert-danger" role="alert" style="text-align: center;">
                Request for connection with database failed to be established
            </div>
            <?php
        }
    ?>
    <div class="table-responsive-lg">
    	<table class="table table-striped table-danger table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Date</th>
					<th scope="col">Heading</th>
					<th scope="col">tml_month</th>
					<th scope="col">tml_day</th>
					<th scope="col">Day</th>
					<th scope="col">Thidhi</th>
					<th scope="col">Star</th>
					<th scope="col">Event</th>
					<th scope="col" hidden>url1</th>
					<th scope="col" hidden>url2</th>
					<th scope="col" hidden>url3</th>
					<th scope="col">Audio 1</th>
					<th scope="col">Audio 2</th>
					<th scope="col">Audio 3</th>
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
	                $select_query = "SELECT * FROM dhinachariyai";
	                $select_result = mysqli_query($connection,$select_query);
	                
	                while ($select_row = mysqli_fetch_array($select_result)) {
	                    $date = $select_row["date"];
	                    $heading = $select_row["heading"];
	                    $tml_month = $select_row["tml_month"];
	                    $tml_day = $select_row["tml_day"];
	                    $day = $select_row["day"];
	                    $thidhi = $select_row["thidhi"];
	                    $star = $select_row["star"];
						$event = $select_row["event"];
						$urlOne = $select_row["url"];
						$urlTwo = $select_row["url"];
						$urlThree = $select_row["url"];
	                    $audioOne = $select_row["title1"];
	                    $audioTwo = $select_row["title2"];
	                    $audioThree = $select_row["title3"];

	                    $data .= '<tr>
	                    <th scope="row">'.$date.'</th>
	                    <td>'.$heading.'</td>
	                    <td>'.$tml_month.'</td>
	                    <td>'.$tml_day.'</td>
	                    <td>'.$day.'</td>
	                    <td>'.$thidhi.'</td>
	                    <td>'.$star.'</td>
						<td>'.$event.'</td>
						<td hidden>'.$urlOne.'</td>
						<td hidden>'.$urlTwo.'</td>
						<td hidden>'.$urlThree.'</td>
	                    <td>'.$audioOne.'</td>
	                    <td>'.$audioTwo.'</td>
	                    <td>'.$audioThree.'</td>
	                	</tr>';
	                }
	                echo $data;
	            }
	            ?>
			</tbody>
		</table>
    </div>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit or Delete Dhinachariyai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<input type="date" id="date" class="form-control" readonly>
								</div>
								<div class="col">
									<span class="" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									  <input type="text" id="tml_month" class="form-control">
									</span>
								</div>
							</div>
							<br>
							<span class="" tabindex="0" data-toggle="tooltip" title="Heading">
							  <input type="text" id="heading" class="form-control">
							</span>
							<br>
							<div class="row">
								<div class="col">
									<span class="" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									  <input type="number" id="tml_day" class="form-control">
									</span>
								</div>
								<div class="col">
									<span class="" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									  <input type="text" id="day" class="form-control" onchange="">
									</span>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col">
									<span class="" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									  <input type="text" id="star" class="form-control" onchange="">
									</span>
								</div>
								<div class="col">
									<span class="" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
									  <input type="text" id="thidhi" class="form-control" onchange="">
									</span>
								</div>
							</div>
							<br>
							<span class="" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
							  	<textarea class="form-control" rows="3" id="event"></textarea>
							</span>
						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header">
							<b>Audio File Attachment 1</b>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<input type="file" id="file1" class="form-control">
								</div>
								<div class="col">
									<div class="input-group mb-3">
							            <input type="text" class="form-control" placeholder="Search by Name" id="title1" aria-label="Recipient's username" aria-describedby="basic-addon2">
							            <div class="input-group-append">
							            	<span class="d-inline-block" data-toggle="popover" data-content="File Not uploaded yet" id="linkOne"></span>
							            	<button class="btn btn-outline-secondary" type="button" onclick="redirectOne()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
							            </div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col">
									<progress id="progressOne" value="50" max="100" style="width: 100%;">
								</div>
								<div class="col text-center">
									<p id="attachOne">No file attached</p>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header">
							<b>Audio File Attachment 2</b>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<input type="file" id="file2" class="form-control">
								</div>
								<div class="col">
									<div class="input-group mb-3">
							            <input type="text" class="form-control" placeholder="Search by Name" id="title2" aria-label="Recipient's username" aria-describedby="basic-addon2">
							            <div class="input-group-append">
							                <span class="d-inline-block" data-toggle="popover" data-content="File Not uploaded yet" id="linkTwo"></span>
						            		<button class="btn btn-outline-secondary" type="button" onclick="redirectTwo()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
							            </div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col">
									<progress id="progressTwo" value="50" max="100" style="width: 100%;"></progress>
								</div>
								<div class="col text-center">
									<p id="attachTwo">No file attached</p>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="card">
						<div class="card-header">
							<b>Audio File Attachment 3</b>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<input type="file" id="file3" class="form-control">
								</div>
								<div class="col">
									<div class="input-group mb-3">
							            <input type="text" class="form-control" placeholder="Search by Name" id="title3" aria-label="Recipient's username" aria-describedby="basic-addon2">
							            <div class="input-group-append">
							                <span class="d-inline-block" data-content="File Not uploaded yet" id="linkThree"></span>
											<button class="btn btn-outline-secondary" type="button" onclick="redirectThree()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
							            </div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col">
									<progress id="progressThree" value="50" max="100" style="width: 100%;">
								</div>
								<div class="col text-center">
									<p id="attachThree">No file attached</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="container">
						<div class="alert alert-danger" id="danger" role="alert" style="display: none;">
						  	Date Couldn't be Edited
						</div>
						<div class="alert alert-danger" id="deleteFail" role="alert" style="display: none;">
						  	Date Couldn't be Deleted
						</div>
						<div class="alert alert-danger" id="invalid" role="alert" style="display: none;">
						  	Please select a Date from table, to edit or Delete
						</div>
						<div class="alert alert-success" id="deleteSuccess" role="alert" style="display: none;">
						  	Date Deleted from Database Successfully
						</div>
						<div class="alert alert-success" id="editSuccess" role="alert" style="display: none;">
						  	Date Edited in Database Successfully
						</div>
						<div class="alert alert-warning" id="deleteError" role="alert" style="display: none;">
						  	Error occured while Deleting Date
						</div>
						<div class="alert alert-warning" id="editError" role="alert" style="display: none;">
						  	Error occured while Editing Date
						</div>
						<div class="alert alert-warning" id="uploadError" role="alert" style="display: none;">
						  	Error occured while Uploading File
						</div>
						<div class="alert alert-warning" id="fileEntry" role="alert" style="display: none;">
						  	Please Enter a valid File name
						</div>
					</div>
					<button type="button" class="btn btn-outline-danger" onclick="deleteDate()">Delete Date</button>
					<button type="button" class="btn btn-outline-success" onclick="editDate()">Update Date</button>
				</div>
			</div>
		</div>
	</div>
</body>
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
			tname = tr[i].getElementsByTagName("th")[0];

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
		$("#table tr").click(function() {
			var tableHeadData = $(this).children("th").map(function() {
				return $(this).text();
			}).get();

			var tableData = $(this).children("td").map(function() {
				return $(this).text();
			}).get();

			var date = tableHeadData[0];
			var fields = date.split('-');
			var string;
			if (fields[0] < 10) {
				string = "0" + fields[0];
			} else {
				string = fields[0];
			}
			var dmonth;
			if (fields[1] < 10) {
				dmonth = "0" + fields[1];
			} else {
				dmonth = fields[1];
			}
			date = fields[2] + "-" + dmonth + "-" + string;
			var heading = tableData[0];
			var tml_month = tableData[1];
			var tml_day = tableData[2];
			var day = tableData[3];
			var thidhi = tableData[4];
			var star = tableData[5];
			var event = tableData[6];
			var url1 = tableData[7];
			var url2 = tableData[8];
			var url3 = tableData[9];
			var title1 = tableData[10];
			var title2 = tableData[11];
			var title3 = tableData[12];

			_("date").value = date;
			_("heading").value = heading;
			_("tml_month").value = tml_month;
			_("tml_day").value = tml_day;
			_("day").value = day;
			_("thidhi").value = thidhi;
			_("star").value = star;
			_("event").innerHTML = event;
			_("title1").value = title1;
			_("title2").value = title2;
			_("title3").value = title3;
			_("urlOne").value = url1;
			_("urlTwo").value = url2;
			_("urlThree").value = url3;

			$('#myModal').modal("toggle");
		});
	});

	function redirectOne() {
		var url = _("urlOne").value;
		if (url == "") {
			_("invalid").style.display = "block";
		} else {
			if (url == "null") {
				$("#linkOne").popover("show");
			} else {
				window.open(url,"_blank");
			}
		}
	}

	function redirectTwo() {
		var url = _("urlOne").value;
		if (url == "") {
			_("invalid").style.display = "block";
		} else {
			if (url == "null") {
				$("#linkTwo").popover("show");
			} else {
				window.open(url,"_blank");
			}
		}
	}

	function redirectThree() {
		var url = _("urlOne").value;
		if (url == "") {
			_("invalid").style.display = "block";
		} else {
			if (url == "null") {
				$("#linkThree").popover("show");
			} else {
				window.open(url,"_blank");
			}
		}
	}

	function deleteDate() {
		var date = _("date").value;
		var d = new Date(date);
		var dmonth = d.getMonth() + 1;
		var dyear = d.getFullYear();
		var dday = d.getDate();

		date = dday + "-" + dmonth + "-" + dyear;
		$.ajax({
			url:"<?php echo base_url(); ?>index.php/home/deleteDhinachariyai",
			method:"POST",
			data:{date:date},
			success:function(data) {
				if (data == "ok") {
					_("deleteSuccess").style.display = "block";
				} else {
					_("deleteFail").style.display = "block";
				}
				dhinachariyaiLog(date,data,"Delete");
			},
			error:function() {
				_("deleteError").style.display = "block";
				dhinachariyaiLog(date,"Error","Delete");
			}
		});
	}

	var urlONE = "null";
	var urlTWO = "null";
	var urlTHREE = "null";

	function uploadDatabase() {
		var date = _("date").value;
		var heading = _("heading").value;
		var tml_month = _("tml_month").value;
		var tml_day = _("tml_day").value;
		var day = _("day").value;
		var thidhi = _("thidhi").value;
		var star = _("star").value;
		var event = _("event").value;
		var title1 = _("title1").value;
		var title2 = _("title2").value;
		var title3 = _("title3").value;
		var url1 = urlONE;
		var url2 = urlTWO;
		var url3 = urlTHREE;

		var d = new Date(date);
		var dmonth = d.getMonth() + 1;
		var dyear = d.getFullYear();
		var dday = d.getDate();
		var date = dday + "-" + dmonth + "-" + dyear;

		console.log(url1 + ":" + url2 + ":" + url3);

		$.ajax({
			url:"<?php echo base_url(); ?>index.php/home/editDhinachariyaiWithoutFile",
			method:"POST",
			data:{date:date,heading:heading,tml_month:tml_month,tml_day:tml_day,day:day,thidhi:thidhi,star:star,event:event,title1:title1,title2:title2,title3:title3,url1:url1,url2:url2,url3:url3},
			success:function(data) {
				if (data == "ok") {
					_("editSuccess").style.display = "block";
				} else {
					_("danger").style.display = "block";
				}
				dhinachariyaiLog(date,data,"Edit");
			},
			error:function() {
				_("editError").style.display = "block";
				dhinachariyaiLog(date,"Error","Edit");
			}
		});
	}

	function fileOneUpload() {
		var file = _("file1").files[0];
		var title = _("title1").value;
		var formdata = new FormData();
		formdata.append("file",file);
		formdata.append("filename",title);
		$.ajax({
			xhr:function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt) {
					var percentComplete = ((evt.loaded / evt.total) * 100);
					_("progressOne").value = percentComplete;
					_("attachOne").innerHTML = Math.round(percentComplete) + "%";
				},false);
				return xhr;
			},
			url:"<?php echo base_url(); ?>index.php/home/uploadDhinachariyaiFileEdit",
			method:"POST",
			data:formdata,
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function() {
				_("progressOne").value = 0;
			},
			success:function(data) {
				var response = JSON.parse(data);
				if (response.status == "ok") {
					urlONE = response.url;
					_("attachOne").innerHTML = "File Uploaded Successfully";
				} else {
					urlONE = "null";
					_("attachOne").innerHTML = "File Upload failed";
				}
				if (_("file2").value != "") {
					fileTwoUpload();
				} else if (_("file3").value != "") {
					fileThreeUpload();
				} else {
					uploadDatabase();
				}
			},
			error:function(data) {
				console.log(data);
				_("uploadError").style.display = "block";
			}
		});
	}

	function fileTwoUpload() {
		var file = _("file2").files[0];
		var title = _("title2").value;
		var formdata = new FormData();
		formdata.append("file",file);
		formdata.append("filename",title);
		$.ajax({
			xhr:function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt) {
					var percentComplete = ((evt.loaded / evt.total) * 100);
					_("progressTwo").value = percentComplete;
					_("attachTwo").innerHTML = Math.round(percentComplete) + "%";
				},false);
				return xhr;
			},
			url:"<?php echo base_url(); ?>index.php/home/uploadDhinachariyaiFileEdit",
			method:"POST",
			data:formdata,
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function() {
				_("progressTwo").value = 0;
			},
			success:function(data) {
				var response = JSON.parse(data);
				if (response.status == "ok") {
					urlTWO = response.url;
					_("attachTwo").innerHTML = "File uploaded Successfully";
				} else {
					urlTWO = "null";
					_("attachTwo").innerHTML = "File upload Failed";
				}
				if (_("file3").value != "") {
					fileThreeUpload();
				} else {
					uploadDatabase();
				}
			},
			error:function() {
				_("uploadError").style.display = "block";
			}
		});
	}

	function fileThreeUpload() {
		var file = _("file3").files[0];
		var title = _("title3").value;
		var formdata = new FormData();
		formdata.append("file",file);
		formdata.append("filename",title);
		$.ajax({
			xhr:function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt) {
					var percentComplete = ((evt.loaded / evt.total) * 100);
					_("progressThree").value = percentComplete;
					_("attachThree").innerHTML = Math.round(percentComplete) + "%";
				},false);
				return xhr;
			},
			url:"<?php echo base_url(); ?>index.php/home/uploadDhinachariyaiFileEdit",
			method:"POST",
			data:formdata,
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function() {
				_("progressThree").value = 0;
			},
			success:function(data) {
				var response = JSON.parse(data);
				if (response.status == "ok") {
					urlONE = response.url;
					_("attachThree").innerHTML = "File uploaded Successfully";
					uploadDatabase();
				} else {
					urlTHREE = "null";
					_("attachThree").innerHTML = "File Upload Failed";
				}
			},
			error:function() {
				_("uploadError").style.display = "block";
			}
		})
	}

	function editDate() {
		//code for editing and updating date
		var date = _("date").value;
		var heading = _("heading").value;
		var tml_month = _("tml_month").value;
		var tml_day = _("tml_day").value;
		var day = _("day").value;
		var thidhi = _("thidhi").value;
		var star = _("star").value;
		var event = _("event").value;
		var file1 = _("file1").value;
		var file2 = _("file2").value;
		var file3 = _("file3").value;
		var title1 = _("title1").value;
		var title2 = _("title2").value;
		var title3 = _("title3").value;
		var url1 = _("urlOne").value;
		var url2 = _("urlTwo").value;
		var url3 = _("urlThree").value;

		var d = new Date(date);
		var dmonth = d.getMonth() + 1;
		var dyear = d.getFullYear();
		var dday = d.getDate();
		var date = dday + "-" + dmonth + "-" + dyear;

		console.log(date + ":" + heading + ":" + tml_month + ":" + tml_day + ":" + thidhi);

		if (file1 == "" && file2 == "" && file3 == "") {
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/home/editDhinachariyaiWithoutFile",
				method:"POST",
				data:{date:date,heading:heading,tml_month:tml_month,tml_day:tml_day,day:day,thidhi:thidhi,star:star,event:event,title1:title1,title2:title2,title3:title3,url1:url1,url2:url2,url3:url3},
				success:function(data) {
					if (data == "ok") {
						_("editSuccess").style.display = "block";
					} else {
						_("danger").style.display = "block";
					}
					dhinachariyaiLog(date,data,"Edit");
				},
				error:function() {
					_("editError").style.display = "block";
					dhinachariyaiLog(date,"Error","Edit");
				}
			});
		} else {
			if ((file1 != "" && (title1 == ""  || title1 == "null")) || (file2 != "" && (title2 == ""  || title2 == "null")) || (file3 != "" && (title3 == ""  || title3 == "null"))) {
				_("fileEntry").style.display = "block";
			} else {
				if (file1 != "") {
					//upload file One
					fileOneUpload();
				} else {
					if (file2 != "") {
						fileTwoUpload();
					} else if (file3 != "") {
						fileThreeUpload();
					}
				}
			}
		}
	}

</script>
</html>