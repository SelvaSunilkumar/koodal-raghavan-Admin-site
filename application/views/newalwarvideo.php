<?php 

    include "dbconnector.php";

?>

<div class="container">
    <div class="modal fade" id="errorpop">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    <h4>Missing Folder Name</h4><i class="fa fa-warning fa-2x"></i>
                </div>
                <div class="modal-body text-center">
                    Please fill the Folder name field to enable the <b>Submit Button </b> and also to enter the <b>price of the album</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="alert alert-danger shadow" style="text-align: center;">
        <div class="row">
            <div class="col-sm-2">
                <i class="fa fa-warning fa-3x"></i>
            </div>
            <div class="col-lg-8">
                Please upload <b>.mp3</b> files. If any other sort of file is uploaded, then the particular file may affect the <b>Working of Android Application</b>.
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header shadow">
            <h4>New 108'il Alwargalin Manam Video</h4>
        </div>
        <div class="card-body text-center">
            <br>
            <div class="form-group">
                <input type="text" class="form-control" id="folder" placeholder="Folder Name" required="required" onchange="loader()">
                <div class="list-group text-left" id="show-list">
                </div>
            </div>
            <div class="form-group text-right text-danger">
                <input type="checkbox" onchange="loader()" id="loader"> Enable this to Load Price, Upload Button
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="filename" placeholder="File Name">
            </div>
            <div class="form-group">
                <input type="file" id="file" accept=".mp4,.pdf" class="form-control">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Price of album" id="price" disabled>
                    </div>
                    <div class="col">
                        <select class="form-control" disabled id="type">
                            <option value="" selected disabled><b>-- SELECT FILE TYPE --</b></option>
                            <option value="video">Video - .mp4</option>
                            <!--<option value="pdf">PDF   - .pdf</option>-->
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <button class="btn btn-primary" id="submit" onclick="upload()" disabled>&emsp;&emsp; Upload File and Data &emsp;&emsp;</button>
        </div>
        <div class="card-footer text-center">
            <br>
            <div class="progress">
                <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">No Upload</div>
            </div>
            <br>
            <div class="alert alert-danger border-danger" style="display: none;" id="missing">
                Missing credentials. Please fill all the Credentials
            </div>
            <div class="alert alert-warning border-warning" style="display: none;" id="error">
                Error Occured while Uploading Audio and Data
            </div>
            <div class="alert alert-success border-success" style="display: none;" id="success">
                Audio and Data Upload - <b>Successfully</b>
            </div> 
            <div class="alert alert-danger border-danger" style="display: none;" id="fail">
                Audio and Data Upload - <b>Failed</b>
            </div>
        </div>
    </div>
</div>
<br><br>
<script>

    var folderNumber;

    function _(el) {
        return document.getElementById(el);
    }

    $(document).ready(function() {
        $("#folder").keyup(function() {
            var searchText = $(this).val();
            if (searchText != '') {
                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/home/searchAlwarVideo",
                    method:"POST",
                    data:{query:searchText},
                    success:function(data) {
                        $("#show-list").html(data);
                    }
                });
            } else {
                $("#show-list").html('');
            }
        });
        $(document).on('click','a',function() {
            $("#folder").val($(this).text());
            $("#show-list").html('');
        });
    });

    function upload() {
        _("missing").style.display = "none";
        _("error").style.display = "none";
        _("success").style.display = "none";
        _("fail").style.display = "none";

        var foldername = _("folder").value;
        var filename = _("filename").value;
        var file = _("file").value;
        var price = _("price").value;
        var type = _("type").value;

        if (foldername == "" || filename == "" || file == "" || price == "" || type == "") {
            _("missing").style.display = "block";
        } else {

            //handle folder number, price

            file = _("file").files[0];

            var formdata = new FormData();
            
            formdata.append("filename",filename);
            formdata.append("folder",foldername);
            formdata.append("file",file);
            formdata.append("price",price);
            formdata.append("type",type);
            formdata.append("folderno",folderNumber);

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
                url:"<?php echo base_url(); ?>index.php/home/uploadnewalwarvideofile",
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
                        _("fail").style.display = "block";
                        _("progress").innerHTML = "File Upload Failed";
                    }
                }, error:function() {
                    _("error").style.display = "block";
                    _("progress").innerHTML = "Error Occured on uploading";
                }
            });

        }

    }

    function loader() {
        var checked = _("loader").checked;
        
        if (checked) {
            if (_("folder").value == "") {
                _("loader").checked = 0;
                //alert("Please select or Enter the folder name");
                $('#errorpop').modal('toggle');
            } else {
                _("type").disabled = false;
                _("submit").disabled = false;

                var foldername = _("folder").value;

                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/home/getAlwarVideoDetails",
                    method:"POST",
                    data:{foldername:foldername},
                    success:function(data) {
                        console.log(foldername);
                        console.log(data);
                        var details = JSON.parse(data);
                        var status = details.status;
                        if (status == "true") {
                            _("price").value = details.price;
                            folderNumber = details.folderno;
                            console.log(folderNumber);
                        } else {
                            _("price").disabled = false;
                            folderNumber = details.folderno + 1;
                            console.log(folderNumber);
                        }
                    }, error:function() {
                        _("error").style.display = "block";
                    }
                });
            }
        } else {
            _("price").disabled = true;
            _("type").disabled = true;
            _("submit").disabled = true;
        }
    }

</script>