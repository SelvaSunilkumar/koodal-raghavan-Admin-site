<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Others extends CI_Controller {

    public function uploadNewDatabase($ok=0,$type="",$filename="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include "dbconn.php";
            $url;
            if ($type == "mp3") {
                $url = "https://tpvs.tce.edu/unrestricted/others/audio/$filename.mp3";
                $insert_query = "INSERT INTO `otheraudio`(`name`, `url`) VALUES ('$filename','$url')";
                $insert_result = mysqli_query($connection,$insert_query);
                if ($insert_result) {
                    echo "ok";
                } else {
                    echo "fail";
                }
            } else {
                $url = "https://tpvs.tce.edu/unrestricted/others/video/$filename.mp4";
                $insert_query = "INSERT INTO `othervideo`(`name`, `url`) VALUES ('$filename','$url')";
                $insert_result = mysqli_query($connection,$insert_query);
                if ($insert_result) {
                    echo "ok";
                } else {
                    echo "fail";
                }
            }
        }
    }

    public function newotherupload() {

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadNewDatabase(0,"","");
        }

        $type = $this->input->post("type");

        $folderPath = "../unrestricted/others/";
        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadNewDatabase(0,"","");
            }
        }

        if ($type == "mp3") {
            $folderPath .= "audio/";
        } else {
            $folderPath .= "video/";
        }

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadNewDatabase(0,"","");
            }
        }

        $filename = $_POST["filename"];
        
        $filePath;

        if ($type == "mp3") {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$filename.".mp3";
        } else {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$filename.".mp4";
        }

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadNewDatabase(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadNewDatabase(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadNewDatabase(1,$type,$filename);

    }

}