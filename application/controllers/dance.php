<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dance extends CI_Controller {

    public function uploadDanceDatabase($ok=0,$filename="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include "dbconn.php";

            $url = "https://tpvs.tce.edu/unrestricted/dance/$filename.mp4";
            $insert_query = "INSERT INTO `dance`(`name`, `url`) VALUES ('$filename','$url')";
            $insert_result = mysqli_query($connection,$insert_query);
            if ($insert_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function newDanceUpload() {

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadDanceDatabase(0,"");
        }

        $folderPath = "../unrestricted/dance/";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadDanceDatabase(0,"");
            }
        }

        $fileName = $_POST["filename"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp4";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadDanceDatabase(0,"");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadDanceDatabase(0,"");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadDanceDatabase(1,$fileName);

    }

}