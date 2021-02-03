<?php 

    include "dbconnector.php";

?>
<style>

    .ab {
        background-color: #036bfc;
        color: #fff;
    }

    .ab:hover {
        background-color: #0b68bf;
        color: #fff;
    }

    .sb {
        background-color: #eef;
        color: #000;
    }

    .sb:hover {
        background: #ddd;
    }

    tbody {
        cursor: pointer;
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

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-4">
            <br>
            <div class="card shadow">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" id="search" class="form-control form-control-sm" placeholder="Search by File Name" aria-label="Recipient's username" aria-describedby="basic-addon2" onkeyup="searchFunction()">
                        <div class="input-group-append">
                            <button class="btn btn-light btn-outline-secondary btn-sm" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit and Delete here</h4>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control form-control-sm" id="url">
                        <input type="text" class="form-control form-control-sm" id="filename" placeholder="File Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-light btn-outline-secondary btn-sm" type="button" onclick="redirectTo()"><i class="fa fa-external-link" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-sm" placeholder = "Price" id="price">
                    </div>
                    <div class="form-group">
                        <input type="file" id="file" class="form-control form-control-sm">
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-block btn-sm btn-success" onclick="editBook()">Edit Book</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-block btn-sm btn-danger" onclick="deleteBook()">Delete Book</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="progress">
                        <div class="progress-bar" id="progress" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">None Selected</div>
                    </div>
                    <br>
                    <div class="alert alert-danger" style="text-align: center; display: none;" id="missing">
                        Please Select a File from the List to Edit and Delete
                    </div>
                    <div class="alert alert-warning" style="text-align: center; display: none;" id="warning">
                        Error occured on Editing
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-sm btn-block ab" id="actualbtn" onclick="actualBook()">Actual Books</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-sm btn-block sb" id="samplebtn" onclick="sampleBook()">Sample Books</button>
                    </div>
                </div>
                <br>
                <div id="actualTable">
                    <table class="table table-hover" id="actual">
                        <thead>
                            <tr>
                                <th scope="col">File Name</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                                $actualbook_query = "SELECT * FROM ebooks";
                                $actualbook_result = mysqli_query($connection,$actualbook_query);
                                
                                $actualtable = '';
                                if ($actualbook_result) {
                                    while ($actualbook_attr = mysqli_fetch_array($actualbook_result)) {
                                        $filename = $actualbook_attr["name"];
                                        $url = $actualbook_attr["url"];
                                        $price = $actualbook_attr["price"];

                                        $actualtable .= '<tr>
                                            <td scope="col">'.$filename.'</td>
                                            <td scope="col">'.$price.'</td>
                                            <td scope="col" style="display: none">'.$url.'</td>
                                        </tr>';
                                    }
                                    echo $actualtable;
                                }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="sampleTable" style="display: none;">
                    <table class="table table-hover" id="sample">
                        <thead>
                            <th scope="col">File Name</th>
                        </thead>
                        <tbody>
                            <?php 
                            
                                $samplebook_query = "SELECT * FROM ebooks_sample";
                                $samplebook_result = mysqli_query($connection,$samplebook_query);

                                $sampletable = '';
                                if ($samplebook_result) {
                                    while ($samplebook_attr = mysqli_fetch_array($samplebook_result)) {
                                        $filename = $samplebook_attr["name"];
                                        $url = $samplebook_attr["url"];

                                        $sampletable .= '<tr>
                                            <td scope="col">'.$filename.'</td>
                                            <td scope="col" style="display: none">'.$url.'</td?
                                        </tr>';
                                    }
                                    echo $sampletable;
                                }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary float text-center shadow" onclick="refresh()">
    <i class="fa fa-refresh"></i>
</button>
<script>

    var isActualBook = true;

    function _(el) {
        return document.getElementById(el);
    }

    function actualBook() {

        _("filename").value = "";
        _("price").value = "";
        _("url").value = "";
        _("file").value = "";

        _("missing").style.display = "none";
        _("warning").style.display = "none";

        _("price").style.display = "block";

        _("search").value = "";

        _("actualTable").style.display = 'block';
        _("sampleTable").style.display = "none";

        _("actualbtn").style.background = "#036bfc";
        _("samplebtn").style.background = "#eef";
        _("samplebtn").style.color = "#000";
        _("actualbtn").style.color = "#fff";

        $("#actualbtn").hover(function() {
            $(this).css("background-color","#0b68bf");
            $(this).css("color","#fff")
        }, function() {
            $(this).css("background-color","#036bfc");
            $(this).css("color","#fff")
        });

        $("#samplebtn").hover(function() {
            $(this).css("background-color","#ddd");
            $(this).css("color","#000");
        }, function() {
            $(this).css("background-color","#eef");
            $(this).css("color","#000");
        });
        isActualBook = true;
    }

    function sampleBook() {

        _("filename").value = "";
        _("price").value = "";
        _("url").value = "";
        _("file").value = "";

        _("missing").style.display = "none";
        _("warning").style.display = "none";

        _("price").style.display = "none";

        _("search").value = "";

        _("actualTable").style.display = 'none';
        _("sampleTable").style.display = "block";

        _("samplebtn").style.background = "#036bfc";
        _("actualbtn").style.background = "#eef";
        _("samplebtn").style.color = "#fff";
        _("actualbtn").style.color = "#000";
        
        $("#samplebtn").hover(function() {
            $(this).css("background-color","#0b68bf");
            $(this).css("color","#fff")
        }, function() {
            $(this).css("background-color","#036bfc");
            $(this).css("color","#fff")
        });

        $("#actualbtn").hover(function() {
            $(this).css("background-color","#ddd");
            $(this).css("color","#000");
        }, function() {
            $(this).css("background-color","#eef");
            $(this).css("color","#000");
        });
        isActualBook = false;
    }

    function searchFunction() {

        if (isActualBook) {
            var input,filter,table,tr,td,i,txtvalue;

            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("actual");
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
        } else {
            var input,filter,table,tr,td,i,txtvalue;

            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("sample");
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
    }

    $(document).ready(function() {
        $('#actual tr').click(function() {
            var tableData = $(this).children("td").map(function() {
                return $(this).text();
            }).get();

            var fileName = tableData[0];
            var price = tableData[1];
            var url = tableData[2];

            _("filename").value = fileName;
            _("price").value = price;
            _("url").value = url;

        });
    });

    $(document).ready(function() {
        $('#sample tr').click(function() {
            var tableData = $(this).children("td").map(function() {
                return $(this).text();
            }).get();

            var fileName = tableData[0];
            var url = tableData[1];

            _("filename").value = fileName;
            _("url").value = url;

        });
    });

    function redirectTo() {

        _("missing").style.display = "none";
        _("warning").style.display = "none";

        var url = _("url").value;

        if (url == "") {
            _("missing").style.display = "block";
        } else {
            window.open(url,"_blank");
        }
    }

    function deleteBook() {

        _("missing").style.display = "none";
        _("warning").style.display = "none";

        var url = _("url").value;

        if (isActualBook) {
            if (url == "") {
                _("missing").style.display = "block";
            } else {
                
                $.ajax({
                    xhr:function() {
						var xhr = new window.XMLHttpRequest();
						xhr.upload.addEventListener("progre",function(event) {
							var percentComplete = ((event.loaded / event.total) * 100);
							_("progress").style.width = percentComplete + "%";
                            _("progress").innerHTML = Math.round(percentComplete) + "% Uploaded";
						},false);
						return xhr;
					},
                    url:"<?php echo base_url(); ?>index.php/home/deleteActualBook",
                    method:"POST",
                    data:{url:url},
                    beforeSend:function() {
                        _("progress").style.width = "0%";
                    },
                    success:function(data) {
                        if (data == "ok") {
                            _("progress").style.width = "100%";
                            _("progress").style.background = "#50ba59";
                            _("progress").innerHTML = "Deleted Successfully";
                        } else {
                            _("progress").style.width = "100%";
                            _("progress").style.background = "#b52f22";
                            _("progress").innerHTML = "Failed to Delete";
                        }
                    },
                    error:function() {
                        _("progress").style.background = "#ebbf21";
                        _("progress").innerHTML = "Error Occured";
                    }
                });

            }
        } else {
            if (url == "") {
                _("missing").style.display = "block";
            } else {
                var url = _("url").value;
                
                $.ajax({
                    xhr:function() {
						var xhr = new window.XMLHttpRequest();
						xhr.upload.addEventListener("progre",function(event) {
							var percentComplete = ((event.loaded / event.total) * 100);
							_("progress").style.width = percentComplete + "%";
                            _("progress").innerHTML = Math.round(percentComplete) + "% Uploaded";
						},false);
						return xhr;
					},
                    url:"<?php echo base_url(); ?>index.php/home/deleteSampleBook",
                    method:"POST",
                    data:{url:url},
                    beforeSend:function() {
                        _("progress").style.width = "0%";
                    },
                    success:function(data) {
                        if (data == "ok") {
                            _("progress").style.width = "100%";
                            _("progress").style.background = "#50ba59";
                            _("progress").innerHTML = "Deleted Successfully";
                        } else {
                            _("progress").style.width = "100%";
                            _("progress").style.background = "#b52f22";
                            _("progress").innerHTML = "Failed to Delete";
                        }
                    },
                    error:function() {
                        _("progress").style.background = "#ebbf21";
                        _("progress").innerHTML = "Error Occured";
                    }
                });

            }
        }
    }

    function isFileAttached() {
        if (_("file").value == "") {
            return false;
        } else {
            return true;
        }
    }

    function editBook() {

        _("missing").style.display = "none";
        _("warning").style.display = "none";
        
        if (isActualBook) {
            
            var filename = _("filename").value;
            var price = _("price").value;
            var url = _("url").value;

            if (filename == "" || price == "" || url == "") {
                _("missing").style.display = "block";
            } else {
                if (!isFileAttached()) {

                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/home/modifyActualBookDataWithoutFile",
                        method:"POST",
                        data:{filename:filename,price:price,url:url},
                        success:function(data) {
                            _("progress").style.width = "100%";
                            if (data == "ok") {
                                _("progress").innerHTML = "Edited Successfully";
                                _("progress").style.background = "#50ba59";
                            } else {
                                _("progress").style.background = "#b52f22";
                                _("progress").innerHTML = "Failed to Edit";
                            }
                        }, error:function() {
                            _("progress").style.width = "100%";
                            _("progress").innerHTML = "Error Occured";
                            _("progress").style.background = "#ebbf21";
                        }
                    });

                } else {

                    var file = _("file").files[0];

                    var formdata = new FormData();
                    formdata.append("filename",filename);
                    formdata.append("price",price);
                    formdata.append("url",url);
                    formdata.append("file",file);

                    $.ajax({
                        xhr:function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress",function(event) {
                                var percentComplete = ((event.loaded / event.total) * 100);
                                _("progress").style.width = percentComplete + "%";
                                _("progress").innerHTML = percentComplete + "%";
                            },false);
                            return xhr;
                        },
                        url:"<?php echo base_url(); ?>index.php/home/editActualBook",
                        method:"POST",
                        data:formdata,
                        contentType:false,
                        cache:false,
                        processData:false,
                        beforeSend:function() {
                            _("progress").style.width = "0%";
                        }, success:function(data) {
                            _("progress").style.width = "100%";
                            if (data == "ok") {
                                _("progress").style.background = "#50ba59";
                                _("progress").innerHTML = "Upload and Editing Completed";
                            } else {
                                _("progress").style.background = "#b52f22";
                                _("progress").innerHTML = "Upload Failed";
                            }
                        }, error:function() {
                            _("progress").style.width = "100%";
                            _("progress").innerHTML = "Upload and Edit Error";
                            _("progress").style.background = "#ebbf21";
                        }
                    });

                }
            }

        } else {
            var filename = _("filename").value;
            var url = _("url").value;

            if (filename == "" || price == "" || url == "") {
                _("missing").style.display = "block";
            } else {
                if (!isFileAttached()) {

                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/home/modifySampleBookDataWithoutFile",
                        method:"POST",
                        data:{filename:filename,url:url},
                        success:function(data) {
                            _("progress").style.width = "100%";
                            if (data == "ok") {
                                _("progress").innerHTML = "Edited Successfully";
                                _("progress").style.background = "#50ba59";
                            } else {
                                _("progress").style.background = "#b52f22";
                                _("progress").innerHTML = "Failed to Edit";
                            }
                        }, error:function() {
                            _("progress").style.width = "100%";
                            _("progress").innerHTML = "Error Occured";
                            _("progress").style.background = "#ebbf21";
                        }
                    });

                } else {

                    var file = _("file").files[0];

                    var formdata = new FormData();
                    formdata.append("filename",filename);
                    formdata.append("url",url);
                    formdata.append("file",file);

                    $.ajax({
                        xhr:function() {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress",function(event) {
                                var percentComplete = ((event.loaded / event.total) * 100);
                                _("progress").style.width = percentComplete + "%";
                                _("progress").innerHTML = percentComplete + "%";
                            },false);
                            return xhr;
                        },
                        url:"<?php echo base_url(); ?>index.php/home/editSampleBook",
                        method:"POST",
                        data:formdata,
                        contentType:false,
                        cache:false,
                        processData:false,
                        beforeSend:function() {
                            _("progress").style.width = "0%";
                        }, success:function(data) {
                            _("progress").style.width = "100%";
                            if (data == "ok") {
                                _("progress").style.background = "#50ba59";
                                _("progress").innerHTML = "Upload and Editing Completed";
                            } else {
                                _("progress").style.background = "#b52f22";
                                _("progress").innerHTML = "Upload Failed";
                            }
                        }, error:function() {
                            _("progress").style.width = "100%";
                            _("progress").innerHTML = "Upload and Edit Error";
                            _("progress").style.background = "#ebbf21";
                        }
                    });

                }
            }
        }

    }

    function refresh() {
		location.reload();
	}

</script>