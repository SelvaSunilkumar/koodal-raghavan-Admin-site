<?php 
    include 'dbconnector.php';
?>

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
                <div class="card mycar" style="width: 100%; display: none;" id="details">
		    		<div class="card-body bo">
		    			<h4 class="card-title" id="name">Name</h4>
		    			<p class="card-text" id="purpose">Purpose</p>
		    			<p class="card-text" id="Amount">Amount</p>
		    			<p class="card-text" id="refno">Reference number</p>
		    			<p class="card-text"><b>Date of Transaction</b></p>
		    			<input type="date" id="date" class="form-control" readonly>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="col-8">
            <?php 
                if (!$connection) {
                    ?> 
                    <div id="invalid" class="alert alert-danger" role="alert" style="text-align: center;">
                        Request for connection with database failed to be established
                    </div>
                    <?php
                }
            ?>
			<table class="table table-hover shadow">
				<thead>
					<tr>
						<th scope="col" style="width: 20%;">Name</th>
						<th scope="col" style="width: 20%;">Ref No</th>
						<th scope="col" style="width: 10%;">Date</th>
						<th scope="col" style="width: 5%;">Amount</th>
						<th scope="col" style="width: 45%;">Purpose</th>
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
                        $select_sambavanai_query = "SELECT * FROM sambavanai";
                        $select_sambavanai_result = mysqli_query($connection,$select_sambavanai_query);
                        
                        while ($select_sambavanai_row = mysqli_fetch_array($select_sambavanai_result)) {
                            $name = $select_sambavanai_row["name"];
                            $date = $select_sambavanai_row["date"];
                            $amount = $select_sambavanai_row["amount"];
                            $purpose = $select_sambavanai_row["note"];
                            $refno = $select_sambavanai_row["referalno"];

                            $data .= '<tr>
                            <th scope="row">'.$name.'</th>
                            <td>'.$refno.'</td>
                            <td>'.$date.'</td>
                            <td>'.$amount.'</td>
                            <td>'.$purpose.'</td>
                        </tr>';
                        }
                        echo $data;
                    }
                    ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<style type="text/css">

	.container {
		padding-top: 15px;
	}

	.mycard, .mycar {
		margin-left: 10px;
        padding: 10px;
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
			var tableDat = $(this).children("th").map(function() {
				return $(this).text();
			}).get();
			var tableData = $(this).children("td").map(function() {
				return $(this).text();
			}).get();

			var name = tableDat[0];
			var refno = tableData[0];
			var date = tableData[1];
			var amount = tableData[2];
			var purpose = tableData[3];

			var day = date.split("-");

			var date = day[0];
			if (date < 10) {
				date = '0' + date;
			}
			var month = day[1];
			if (month < 10) {
				month = '0' + month;
			}
			var year = day[2];
			var date = year + '-' + month + '-' + date;
			console.log(date);

			_("name").innerHTML = name;
			_("refno").innerHTML = "<b>Reference No :  </b>" + refno;
			_("date").value = date;
			_("purpose").innerHTML = "<b>Purpose :  </b>" + purpose;
			_("Amount").innerHTML = "<b>Amount :  </b>" + amount;

			_("details").style.display = 'block';
		});
	})

</script>
</html>