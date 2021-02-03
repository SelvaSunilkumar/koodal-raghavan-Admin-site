<?php include 'dbconnector.php'; ?>

    <br>
	<div class="row">
		<div class="col-4">
			<div class="container">
		    	<div class="card mycard" style="width: 100%;">
		    		<div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search by Name" id="search" aria-label="Recipient's username" aria-describedby="basic-addon2" onkeyup="searchFunction()">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
					</div>
		    	</div>
                <div class="card mycar" style="width: 100%; display: block;" id="details">
                	<div class="card-header">
                		<h5>Edit Name here</h5>
                	</div>
		    		<div class="card-body bo">
		    			<input type="text" id="existname" class="form-control" placeholder="Select a Name" readonly>
		    			<br>
		    			<input type="text" id="newname" class="form-control" placeholder="Enter the new Name">
		    			<br>
		    			<button type="button" class="btn btn-success btn-block" onclick="editName()">Edit Now</button>
		    		</div>
		    		<div class="card-footer text-center" style="display: none;" id="editStatus">
		    			<div class="alert alert-success" role="alert" id="success" style="display: none;">
							Name edited Successfully
						</div>
						<div class="alert alert-danger" role="alert" id="danger" style="display: none;">
						  	Name couldn't be Edited
						</div>
						<div class="alert alert-warning" role="alert" id="warning" style="display: none;">
						 	Error occured on Editing Name. Name not Edited
						</div>
						<div class="alert alert-warning" role="alert" id="missingName" style="display: none;">
						  	Please enter a name to edit the Existing Name or Select a name
						</div>
		    		</div>
		    	</div>
		    	<div class="card mycar" style="width: 100%; display: block;" id="details">
                	<div class="card-header">
                		<h5>Delete Name here</h5>
                	</div>
		    		<div class="card-body bo">
		    			<input type="text" id="deletename" class="form-control" placeholder="Select a Name" readonly>
		    			<br>
		    			<button type="button" class="btn btn-danger btn-block" onclick="deleteName()">Delete Now</button>
		    		</div>
		    		<div class="card-footer text-center" style="display: none;" id="deleteStatus">
		    			<div class="alert alert-success" role="alert" id="dsuccess" style="display: none;">
							Name edited Successfully
						</div>
						<div class="alert alert-danger" role="alert" id="ddanger" style="display: none;">
						  	Name couldn't be Deleted
						</div>
						<div class="alert alert-warning" role="alert" id="dwarning" style="display: none;">
						 	Error occured on Deleting Name. Name not Deleted
						</div>
						<div class="alert alert-warning" role="alert" id="dmissingName" style="display: none;">
						  	Please enter a name to delete the Existing Name
						</div>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="col-8">
			<div class="alert alert-info text-center" role="alert" id="info">
				Please select a Name from the table to Edit or Delete Names.
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
						<th scope="col">Name</th>
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
                        $select_sambavanai_query = "SELECT * FROM girlname";
                        $select_sambavanai_result = mysqli_query($connection,$select_sambavanai_query);
                        
                        while ($select_sambavanai_row = mysqli_fetch_array($select_sambavanai_result)) {
                            $name = $select_sambavanai_row["name"];
                            

                            $data .= '<tr>
                            <th scope="row">'.$name.'</th>
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
				tname = tr[i].getElementsByTagName("th")[0];
				tref = tr[i].getElementsByTagName("td")[1];
				tdate = tr[i].getElementsByTagName("td")[2];

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

				var name = tableData[0];
				_("info").style.display = "none";

				_("existname").value = name;
				_("deletename").value = name;
			})
		});

		function editName() {
			var newName = _("newname").value;
			var existName = _("existname").value;

			_("missingName").style.display = 'none';
			_("success").style.display = "none";
			_("danger").style.display = "none";
			_("warning").style.display = "none";
			_("editStatus").style.display = 'none';

			if (newName == "" || existName == "") {
				_("missingName").style.display = 'block';
			} else {
				$.ajax({
					url:"<?php echo base_url(); ?>index.php/home/editGirlName",
					method:"POST",
					data:{existName:existName,newName:newName},
					success:function(data) {
						if (data == "ok") {
							_("success").style.display = "block";
						} else if (data == "fail") {
							_("danger").style.display = "block";
						}
						babyname(existName + " : " + newName,"girl","edit",data);
					},
					error:function() {
						_("warning").style.display = "block";
						babyname(existName + " : " + newName,"girl","edit","Error");
					}
				});
			}
			_("editStatus").style.display = 'block';
		}

		function deleteName() {
			var name = _("deletename").value;

			_("deleteStatus").style.display = 'none';
			_("dwarning").style.display = "none";
			_("ddanger").style.display = 'none';
			_("dsuccess").style.display = 'none';

			if (name == "") {
				_("dmissingName").style.display = "block";
			} else {
				$.ajax({
					url:"<?php echo base_url(); ?>index.php/home/deleteGirlName",
					method:"POST",
					data:{name:name},
					success:function(data) {
						if (data == "ok") {
							_("dsuccess").style.display = 'block';
						} else if (data == "fail") {
							_("ddanger").style.display = 'block';
						}
						babyname(name,"girl","delete",data);
					},
					error:function() {
						alert(response);
						_("dwarning").style.display = "block";
						babyname(name,"girl","delete","Error");
					}
				});
			}
			_("deleteStatus").style.display = 'block';
		}

		function refresh() {
			location.reload();
		}

	</script>
</html>