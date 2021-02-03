
	<br>	
	<div class="row">
		<div class="col-4 leftb">
			<div class="container">
                <div class="card mycar" style="width: 100%; display: block;" id="details">
                	<div class="card-header">
                		<h5>Notification Status</h5>
                	</div>
		    		<div class="card-body bo">
		    			<h4 class="card-title" id="title">Title</h4>
		    			<p class="card-text" id="message">Send Message</p>
		    			<p class="card-text" id="users"><b>Registered Users No</b></p>
		    			<p class="card-text" id="successfull"><b>Successfull</b></p>
		    			<p class="card-text" id="failure"><b>Failed</b></p>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="col-8 rightb">
			<div class="card mycar shadow" style="width: 80%; display: block;" id="details">
	    		<div class="card-header">
	    			<h4>Send Notification from Here</h4>
	    		</div>
	    		<div class="card-body">
	    			<input type="text" id="titleno" placeholder="Enter your Notification title here" class="form-control">
	    			<br>
	    			<div class="form-group">
                        <label for="message"><b>Message for your Notification here</b></label>
                        <textarea class="form-control" id="mess" rows="5" placeholder="Enter the message to be Displayed on the Notification box"></textarea>
                    </div>
	    		</div>
	    		<div class="card-footer">
	    			<div class="alert alert-success" role="alert" id="success" style="display: none;">
							Notification Send Successfully, refer status box
						</div>
						<div class="alert alert-danger" role="alert" id="danger" style="display: none;">
						  	Notification Send failed
						</div>
						<div class="alert alert-warning" role="alert" id="warning" style="display: none;">
						 	Error occured while sending Notification
						</div>
						<div class="alert alert-warning" role="alert" id="missingName" style="display: none;">
						  	Please enter Notification Title and Notification Message.
						</div>
	    			<button class="btn btn-success btn-block" onclick="sendNotification()">Send Notification Now</button>
	    		</div>
	    	</div>
		</div>
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

</style>
<script type="text/javascript">

	function _(el) {
		return document.getElementById(el);
	}

	function sendNotification() {

		var title = _("titleno").value;
		var message = _("mess").value;

		_("danger").style.display = "none";
		_("success").style.display = "none";
		_("missingName").style.display = "none";
		_("warning").style.display = "none";

		if (title == "" || message == "") {
			_("missingName").style.display = "block";
		} else {
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/home/notification",
				method:"POST",
				data:{title:title,message:message},
				success:function(data) {
					if (data == "fail") {
						_("danger").style.display = "block";
					} else {
						var response = JSON.parse(data);
						var success = response.success;
						var failure = response.failure;
						var registeredUser = success + failure;

						if (success > 0) {
							_("success").style.display = "block";
						} else {
							_("danger").style.display = "block";
						}
						notificationLog(title,message,success,failure);
						_("title").innerHTML = title;
						_("message").innerHTML = message;
						_("users").innerHTML = "<b>Registered Users No : </b>" + registeredUser;
						_("successfull").innerHTML = "<b>Successfull : </b>" + success;
						_("failure").innerHTML = "<b>Failed : </b>" + failure;
					}
				},
				error:function() {
					_("warning").style.display = "block";
				}
			})
		}
	}
</script>
</html>