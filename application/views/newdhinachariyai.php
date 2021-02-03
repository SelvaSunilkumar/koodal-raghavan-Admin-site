
	<br>
	<div class="container">
		<div class="alert alert-info" role="alert">
			<b>Note:</b><br>
			Please upload <b>.mp3</b> audio file for better run in App. If you try to upload any other file other than <b>.mp3</b> please try to <i>change the format</i> and Upload
		</div>
		<div class="alert alert-danger" role="alert">
			<b>Note:</b><br>
			You can Upload <b><i>3 files</i></b> at a time. And also you can Upload without any files. <b style="color: red;"><i>Audio files are not Compulsory*</i></b>
		</div>
		<div class="card mycard">
			<div class="card-header text-center">
				<h4>Dhinachariyai</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<input type="date" id="date" class="form-control">
					</div>
					<div class="col">
						<input type="text" id="tml_month" class="form-control" placeholder="Tamil Month (சார்வரி ஆடி)">
					</div>
				</div>
				<br>
				<input type="text" id="heading" placeholder="Heading (சார்வரி வருஷம் ஆடி மாதம் கலி 5121 உத்தராயணம் வஸந்த.)" class="form-control">
				<br>
				<div class="row">
					<div class="col">
						<input type="number" id="tml_day" class="form-control" placeholder="Tamil day (1-31)">
					</div>
					<div class="col">
						<input type="text" id="day" class="form-control" placeholder="Day (சனி)">
					</div>
					<div class="col">
						<input type="text" id="star" class="form-control" placeholder="Star (அவிட்டம்)">
					</div>
				</div>
				<br>
				<input type="text" id="thidhi" class="form-control" placeholder="Thidhi (சதுர்தசி)">
				<br>
				<textarea placeholder="Events (உய்ய ஒரே வழி உடையவர் திருவடி)" id="event" class="form-control" rows="2"></textarea>
				<br>
				<label>Audio File 1</label>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<input type="file" onchange="fileOne()" id="fileOne" placeholder="file" class="form-control">
						</div>
					</div>
					<div class="col align-middle">
						<input type="text" id="titleOne" placeholder="File name 1" class="form-control">
						<br>
						<div class="progress">
						  	<div class="progress-bar progress-bar-striped" id="progressOne" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div>
							<p id="attachOne">No file attached</p>
						</div>
					</div>
				</div>
				<br>
				<label>Audio File 2</label>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<input type="file" onchange="fileTwo()" id="fileTwo" placeholder="file" class="form-control">
						</div>
					</div>
					<div class="col">
						<input type="text" id="titleTwo" placeholder="File name 2" class="form-control">
						<br>
						<div class="progress">
						  	<div class="progress-bar progress-bar-striped" id="progressTwo" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div>
							<p id="attachTwo">No file attached</p>
						</div>
					</div>
				</div>
				<br>
				<label>Audio File 3</label>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<input type="file" onchange="fileThree()" id="fileThree" placeholder="file" class="form-control">
						</div>
					</div>
					<div class="col">
						<input type="text" id="titleThree" placeholder="File name 3" class="form-control">
						<br>
						<div class="progress">
						  	<div class="progress-bar progress-bar-striped" id="progressThree" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div>
							<p id="attachThree">No file attached</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="alert alert-success text-center" role="alert" id="success" style="display: none;">
					Date is Successfully Uploaded
				</div>
				<div class="alert alert-danger text-center" role="alert" id="failed" style="display: none;">
					Date Upload failed
				</div>
				<div class="alert alert-danger text-center" role="alert" id="warning" style="display: none;">
					Please fill the input fields, and try again
				</div>
				<div class="alert alert-danger text-center" role="alert" id="filewarn" style="display: none;">
					Please attach file 1, and then go for remaining
				</div>
				<div class="alert alert-danger text-center" role="alert" id="filewarning" style="display: none;">
					Please fill file name for corresponding File attachments
				</div>
				<div class="alert alert-warning text-center" role="alert" id="error" style="display: none;">
					Error occurred while Uploading Date
				</div>
				<button type="button" class="btn btn-success btn-lg btn-block" onclick="validateForm()">Upload New Date</button>
			</div>
		</div>
	</div>
	<br><br>
	<div class="alert alert-dark" role="alert">
	  <br>
	  <h6>About the form</h6>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Date : </b> <i>(Most important)</i> Please ensure that the date is unique. If the date is already uploaded, please go to editing site to edit the contents on the particular date. <b>Click this</b> <i class="fa fa-hand-o-right"></i> <a href="">Link to Edit Dhinachariyai Contents</a>
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Tamil Month : </b> This refers to the name of Month in <b><i>Tamil</i></b>.
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Heading : </b> This is the heading of particular date, this heading is shown sperately in the app.
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Tamil Day : </b> This refers to the particular tamil day number corresponding to English day.
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Day : </b> This refers to the particular day corresponding to the tamil date and English Date.
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Star : </b> Star details has to be provided here
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Thidhi : </b> Thidhi details has to be provided here
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>Events : </b> The events corresponding to the particular date.
	  <br>
	  <i class="fa fa-hand-o-right"></i>
	  <b>File Attachments : </b> Attach a file and fill the file name corresponding to the attachment section.
	  <br><br>
	  <p style="color: red;">
	  	<b><i>Examples are provided along with the input fields, please refer that.</i></b>
	  </p>
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
	
	function fileThree() {
		_("attachThree").innerHTML = "Ready to be Uploaded";
	}

	function fileTwo() {
		_("attachTwo").innerHTML = "Ready to be Uploaded";
	}

	function fileOne() {
		_("attachOne").innerHTML = "Ready to be Uploaded";
	}

	function validateForm() {
		var date = _("date").value;
		var tml_month = _("tml_month").value;
		var heading = _("heading").value;
		var tml_day = _("tml_day").value;
		var day = _("day").value;
		var star = _("star").value;
		var thidhi = _("thidhi").value;
		var event = _("event").value;

		var file1 = _("fileOne").value;
		var file2 = _("fileTwo").value;
		var file3 = _("fileThree").value;
		var title1 = _("titleOne").value;
		var title2 = _("titleTwo").value;
		var title3 = _("titleThree").value;

		var inputFlag = true;
		var fileFlag = true;

		//code for formatting date
		var d = new Date(date);
		var dmonth = d.getMonth() + 1;
		var dyear = d.getFullYear();
		var dday = d.getDate();
		var date = dday + "-" + dmonth + "-" + dyear;

		_("success").style.display = "none";
		_("error").style.display = "none";
		_("failed").style.display = "none";
		_("warning").style.display = "none";
		_("filewarn").style.display = "none";

		if (date == "" || tml_month == "" || heading == "" || tml_day == "" || day == "" || star == "" || thidhi == "" || event == "") {
			inputFlag = false;
		}
			//code for file name and other related process...
		if ( (file1 != "" && title1 == "") || (file2 != "" && title2 == "") || (file3 != "" && title3 == "")) {
			fileFlag = false;
		}

		if (!inputFlag || !fileFlag) {
			_("warning").style.display = "block";
		} else {
			if (file1 == "" && file2 == "" && file3 == "") {
				var formdata = new FormData();
				formdata.append("date",date);
				formdata.append("tml_month",tml_month);
				formdata.append("heading",heading);
				formdata.append("tml_day",tml_day);
				formdata.append("day",day);
				formdata.append("star",star);
				formdata.append("thidhi",thidhi);
				formdata.append("event",event);

				$.ajax({
					url:"<?php echo base_url(); ?>index.php/home/newDhinachariyaiWithoutFile",
					method:"POST",
					data:{date:date,tml_month:tml_month,heading:heading,tml_day:tml_day,day:day,star:star,thidhi:thidhi,event:event},
					success:function(data) {
						if (data == "ok") {
							_("success").style.display = "block";
						} else if (data == "fail") {
							_("danger").style.display = "block";
						}
						dhinachariyaiLog(date,data,"New");
					},
					error:function() {
						_("warning").style.display = "block";
						dhinachariyaiLog(date,"Error","New");
					}
				});
			} else {
				if (file1 == "" && (file2 != "" || file3 != "")) {
					_("filewarn").style.display = "block";
				} else if (file1 != "" && file2 == "" && file3 != "") {
					_("filewarn").style.display = "block";
				} else {
					var fileOne = _("fileOne").files[0];
					var fileTwo = _('fileTwo').files[0];
					var fileThree = _("fileThree").files[0];

					if (file1 != "") {
						var formdata = new FormData();
						formdata.append("file",fileOne);
						formdata.append("filename",title1);
						
						$.ajax({
							xhr:function() {
								var xhr = new window.XMLHttpRequest();
								xhr.upload.addEventListener("progress",function(evt) {
									var percentageComplete =((evt.loaded / evt.total) * 100);
									_("progressOne").style.width = percentageComplete + "%";
									_("attachOne").innerHTML = percentageComplete + "%";
								},false);
								return xhr;
							},
							url:"<?php echo base_url(); ?>index.php/home/uploadDhinachariyaiFile",
							method:"POST",
							data:formdata,
							contentType:false,
							cache:false,
							processData:false,
							beforeSend:function() {
								_("progressOne").style.width = "0%";
							},
							success:function(data) {
								var response = JSON.parse(data);

								if (response.status == "fail") {
									_("danger"),style.display = "block";
								} else {
									var urlOne = response.url;
									var nuller = "null";
									if (file2 != "") {
										var filedata = new FormData();
										filedata.append("file",fileTwo);
										filedata.append("filename",title2);
										$.ajax({
											xhr:function() {
												var xhr = new window.XMLHttpRequest();
												xhr.upload.addEventListener("progress",function(evnt) {
													var completePercentage = ((evnt.loaded / evnt.total) * 100);
													_("progressTwo").style.width = completePercentage + "%";
													_("attachTwo").innerHTML = completePercentage + "%";
												},false);
												return xhr;
											},
											url:"<?php echo base_url(); ?>index.php/home/uploadDhinachariyaiFile",
											method:"POST",
											data:filedata,
											contentType:false,
											cache:false,
											processData:false,
											beforeSend:function() {
												_("progressTwo").style.width = "0%";
											},
											success:function(data) {
												var response = JSON.parse(data);
												if (response.status == "fail") {
													_("danger").style.display = "block";
												} else {
													var urlTwo = response.url;
													var nuller = "null";

													if (file3 != "") {
														var datafile = new FormData();
														datafile.append("file",fileThree);
														datafile.append("filename",title3);

														$.ajax({
															xhr:function() {
																var xhr = new window.XMLHttpRequest();
																xhr.upload.addEventListener("progress",function(event) {
																	var completed = ((event.loaded / event.total) * 100);
																	_("progressThree").style.width = completed + "%";
																	_("attachThree").style.width = Math.round(completed) + "%";
																},false);
																return xhr;
															},
															url:"<?php echo base_url(); ?>index.php/home/uploadDhinachariyaiFile",
															method:"POST",
															data:datafile,
															contentType:false,
															cache:false,
															processData:false,
															beforeSend:function() {
																_("progressThree").style.width = "0%";
															},
															success:function(data) {
																var response = JSON.parse(data);
																var nuller = "null";
																if (response.status == "fail") {
																	_("danger").style.display = "block";
																} else {
																	var urlThree = response.url;
																	$.ajax({
																		url:"<?php echo base_url(); ?>index.php/home/newDhinachariyaiWithFile",
																		method:"POST",
																		data:{date:date,heading:heading,tml_month:tml_month,tml_day:tml_day,day:day,thidhi:thidhi,star:star,event:event,urlOne:urlOne,title1:title1,urlTwo:urlTwo,title2:title2,urlThree:urlThree,title3:title3},
																		success:function(data) {
																			if (data == "ok") {
																				_("success").style.display = "block";
																			} else {
																				_("danger").style.display = "block";
																			}
																		}
																	});
																}
															}
														});

													} else {
														$.ajax({
															url:"<?php echo base_url(); ?>index.php/home/newDhinachariyaiWithFile",
															method:"POST",
															data:{date:date,heading:heading,tml_month:tml_month,tml_day:tml_day,day:day,thidhi:thidhi,star:star,event:event,urlOne:urlOne,title1:title1,urlTwo:urlTwo,title2:title2,urlThree:nuller,title3:nuller},
															success:function(data) {
																if (data == "fail") {
																	_("danger").style.display = "block";
																} else {
																	_("success").style.display = "block";
																}
															},
															error:function(data) {
																alert(data + "1");
																_("errorg").style.display = "block";
															}
														});
													}
												}
											},
											error:function(data) {
												alert(data + "2");
												console.log(data);
												_("error").style.display = "block";
											}
										});
									} else {
										$.ajax({
											url:"<?php echo base_url(); ?>index.php/home/newDhinachariyaiWithFile",
											method:"POST",
											data:{date:date,heading:heading,tml_month:tml_month,tml_day:tml_day,day:day,thidhi:thidhi,star:star,event:event,urlOne:urlOne,title1:title1,urlTwo:nuller,title2:nuller,urlThree:nuller,title3:nuller},
											success:function(data) {
												if (data == "fail") {
													_("danger").style.display = "block";
												} else {
													_("success").style.display = "block";
												}
											},
											error:function() {
												_("error").style.display = "block";
											}
										});
									}
								}
							}
						});
					}
				}
			}
		}	
	
	}

</script>
</html>