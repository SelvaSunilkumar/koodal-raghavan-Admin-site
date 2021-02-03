<?php 

    include "dbconnector.php";

    $get_video_query = "SELECT * FROM othervideo";
    $get_video_result = mysqli_query($connection,$get_video_query);

    $get_audio_query = "SELECT * FROM otheraudio";
    $get_audio_result = mysqli_query($connection,$get_audio_query);


?>

<br>

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
            <div class="col-lg-3" style="margin-bottom: 15px;">
                data
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-sm btn-block ab" id="videobtn" onclick="video()">Video</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-sm btn-block sb" id="audiobtn" onclick="audio()">Audio</button>
                    </div>
                </div>
                <div id="video">
                    <?php
                    
                        $video_html = '';

                        while ($vide_attr = mysqli_fetch_array($get_video_result)) {
                            $filename = $vide_attr["name"];
                            $url = $vide_attr["url"];

                            $video_html .= '<tr>
                                <td scope="col">'.$filename.'</td>
                                <td scope="col" hidden>'.$url.'</td> 
                            </tr>';
                        }

                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Filename</th>
                                <th scope="col" hidden>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                echo $video_html;    

                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="audio" style="display: none;">
                    <?php 
                    
                        $audio_html = '';
                    
                        while ($audio_attr = mysqli_fetch_array($get_audio_result)) {
                            $filename = $audio_attr["name"];
                            $url = $audio_attr["url"];

                            $audio_html .= '<tr>
                                <td scope="col">'.$filename.'</td>
                                <td scope="col" hidden>'.$url.'</td> 
                            </tr>';
                        }
                    
                    ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Filename</th>
                                <th scope="col" hidden>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                echo $audio_html;    

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>

    function _(el) {
        return document.getElementById(el);
    }

    var isVideo = true;

    function video() {
        _("videobtn").style.background = "#036bfc";
        _("audiobtn").style.background = "#eef";
        _("audiobtn").style.color = "#000";
        _("videobtn").style.color = "#fff";

        _("video").style.display = "block";
        _("audio").style.display = "none";

        $("#videobtn").hover(function() {
            $(this).css("background-color","#0b68bf");
            $(this).css("color","#fff")
        }, function() {
            $(this).css("background-color","#036bfc");
            $(this).css("color","#fff")
        });

        $("#audiobtn").hover(function() {
            $(this).css("background-color","#ddd");
            $(this).css("color","#000");
        }, function() {
            $(this).css("background-color","#eef");
            $(this).css("color","#000");
        });

        isVideo = true;
    }

    function audio() {
        _("audiobtn").style.background = "#036bfc";
        _("videobtn").style.background = "#eef";
        _("audiobtn").style.color = "#fff";
        _("videobtn").style.color = "#000";

        _("video").style.display = "none";
        _("audio").style.display = "block";

        $("#audiobtn").hover(function() {
            $(this).css("background-color","#0b68bf");
            $(this).css("color","#fff")
        }, function() {
            $(this).css("background-color","#036bfc");
            $(this).css("color","#fff")
        });

        $("#videobtn").hover(function() {
            $(this).css("background-color","#ddd");
            $(this).css("color","#000");
        }, function() {
            $(this).css("background-color","#eef");
            $(this).css("color","#000");
        });

        isVideo = false;
    }

</script>
</html>