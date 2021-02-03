<?php 
    include "dbconnector.php";

    $connection_status;

    if ($connection) {
        $connection_status = 1;
    } else {
        $connection_status = 0;
    }
?>
    
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="float: right;">New Features (Info) & Notifications
            <span class="badge badge-light">5</span>
        </button>
        <br><br>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            
            <div class="modal-dialog modal-lg modal-dialog-centered">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Features and Notification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- -------------------------------------------------------------------------- -->
                        <div class="card text-center alert-primary shadow">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12 text-left">
                                        <h5>New Feature</h5>
                                        Available new Feature : <b>Upanyasam and Others </b>is available now
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="card-footer text-left" style="font-size: 12px;">
                                <b>Data Modified &emsp; : </b> &emsp; 28/01/2021
                            </div>
                        </div>
                        <br>

                        <!-- -------------------------------------------------------------------------- -->
                        <div class="card text-center alert-primary shadow">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12 text-left">
                                        <h5>New Feature</h5>
                                        Available new Feature : <b>Dance, Music and Drama </b>is available now
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="card-footer text-left" style="font-size: 12px;">
                                <b>Data Modified &emsp; : </b> &emsp; 29/01/2021
                            </div>
                        </div>
                        <br>

                        <!-- -------------------------------------------------------------------------- -->
                        <div class="card text-center alert-primary shadow">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12 text-left">
                                        <h5>New Feature</h5>
                                        Available new Feature : <b>108'il Alwargalin Manam -Video </b>is available now
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="card-footer text-left" style="font-size: 12px;">
                                <b>Data Modified &emsp; : </b> &emsp; 28/01/2021
                            </div>
                        </div>
                        <br>

                        <!-- -------------------------------------------------------------------------- -->
                        <div class="card text-center alert-primary shadow">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12 text-left">
                                        <h5>New Feature</h5>
                                        Available new Feature : <b>108'il Alwargalin Manam -Audio </b>is available now
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="card-footer text-left" style="font-size: 12px;">
                                <b>Data Modified &emsp; : </b> &emsp; 06/01/2021
                            </div>
                        </div>
                        <br>


                        <!-- -------------------------------------------------------------------------- -->
                        <div class="card text-center alert-primary shadow">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-lg-12 text-left">
                                        <h5>New Feature</h5>
                                        Available new Feature : <b>e-Books </b> (both New and Edit or Delete) is available now
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="card-footer text-left" style="font-size: 12px;">
                                <b>Data Modified &emsp; : </b> &emsp; 04/01/2021
                            </div>
                        </div>
                        <br>

                        <!-- -------------------------------------------------------------------------- -->
                        
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="alert alert-danger" style="text-align: center;">
            <div class="row">
                <div class="col-sm-2">
                    <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                </div>
                <div class="col-lg-8" style="font-size: 16px;">
                    <b>Warning : </b>
                    108'il Alwargalin Manam Video (Edit and Delete) <b>Not Availabe at this moment</b>, Will be available in a short time
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 text-center">
                <div class="card shadow box">
                    <img src="<?php echo base_url(); ?>icons/notification.png"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Send Notification <br> To Users</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/sendNotification"
                            class="btn btn-success btn-sm">Send Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/audional.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Dhinam Oru Nalvarthai <br> - Audio</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newNalvarthaiAudio"
                            class="btn btn-success btn-sm">New Audio</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editAndDeleteNalvarthaiAudio" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/videonall.png"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Dhinam Oru Nalvarthai <br> - Video</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newNalvarthaiVideo"
                            class="btn btn-success btn-sm">New Video</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editAndDeleteNalvarthaiVideo" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/thirumalai.png"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Nalvarthai Thirumalai Patri - Video</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newThirumalaiVideo"
                            class="btn btn-success btn-sm">New Video</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editAndDeleteThirumalaiVideo" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/jodhidam.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Jodhidam <br> Content</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newJodhidam"
                            class="btn btn-success btn-sm">New Video</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editAndDeleteJodhidam" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/alvaraudio.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Alwargalin Manam <br> -Audio</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online <label class="text-danger">- On Development</label></p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline <label class="text-danger">- On Development</label></p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newalwaraudio"
                            class="btn btn-success btn-sm">New Audio</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editanddeleteAlwarAudio" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/alwarvideo.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Alwargalin Manam <br> -Video</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online <label class="text-danger">- On Development</label></p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline <label class="text-danger">- On Development</label></p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newalwarvideo"
                            class="btn btn-success btn-sm">New Video</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/EditandDeleteAlwarVideo" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/ff.png"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">e-Books <br> Content</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/neweBook"
                            class="btn btn-success btn-sm">New Book</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editanddeletebook" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/kadhai.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Kadhai Ketkum <br>Neram</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newKadhaiKetkumNeram"
                            class="btn btn-success btn-sm">New Kadhai</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editAndDeleteKadhaiKetkumNeram" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/calender.png"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Dhinachariyai <br>Content</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newDhinachariyai"
                            class="btn btn-success btn-sm">New Date</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editAndDeleteDhinachariyai" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/babyb.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Baby Name <br> -Boy</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newBoyBaby"
                            class="btn btn-success btn-sm">New Baby Name</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editdeleteBoyBaby" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/girl.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Baby Name <br> -Girl</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online</p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline</p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newGirlBaby"
                            class="btn btn-success btn-sm">New Baby Name</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/editdeleteGirlBaby" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/dance.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Dance, Music <br> Drama</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online <label class="text-danger">- On Development</label></p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline <label class="text-danger">- On Development</label></p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newdance"
                            class="btn btn-success btn-sm">New Video</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/EditandDeleteDance" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/others.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Upanyasam and <br> Others</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online <label class="text-danger">- On Development</label></p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline <label class="text-danger">- On Development</label></p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/newUpanyasamAndOthers"
                            class="btn btn-success btn-sm">New Video</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/EditandDeleteOthers" class="btn btn-primary btn-sm">Edit and Delete</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow text-center box">
                    <img src="<?php echo base_url(); ?>icons/prasadham.jpg"
                        class="card img-top" alt="Image"
                        style="width: 100%;">
                    <div class="card-body bod">
                        <h4 class="card-title text-secondary">Upanyasam and <br> Others</h4>
                        <?php 
                            if ($connection_status == 1) {
                                echo '<p class="card-text text-success">Online <label class="text-danger">- On Development</label></p>';
                            } else {
                                echo '<p class="card-text text-danger">Offline <label class="text-danger">- On Development</label></p>';
                            }
                        ?>
                    </div>
                    <div class="card-footer" style="align-content: center;">
                        <a href="<?php echo base_url(); ?>index.php/home/NewPrasadham"
                            class="btn btn-success btn-sm" style="pointer-events: none;">New Video</a>&emsp;&emsp;
                        <a href="<?php echo base_url(); ?>index.php/home/" class="btn btn-primary btn-sm" style="pointer-events: none;">Edit and Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<style type="text/css">

	.container {
		padding-top: 15px;
	}

	.mycard {
		border-radius: 10px;
		-webkit-box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
		-moz-box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
		box-shadow: 10px 10px 44px 0px rgba(0,0,0,0.18);
	}

	.box {
        margin-bottom: 30px;
	}
</style>
</html>