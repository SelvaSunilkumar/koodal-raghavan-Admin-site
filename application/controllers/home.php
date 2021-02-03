<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
        if ($this->session->userdata('id') != '') {
            $this->dashboard();
        } else {
            $this->load->view('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata('id');

        if ($this->session->userdata('id') != '') {
            $this->logout();
        } else {
            $this->index();
        }
    }

    public function isUser() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        if ($username == "koodaladmin" && $password == "admin@koodal120") {
            $session_data = array('id'=>"user");
            $this->session->set_userdata($session_data);
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function dashboard() {
        $header_data = array("title" => "Home");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('home');
            $this->load->view("footer");    
        } else {
            $this->load->view('auth');
        }
    }

    public function sambavanai() {
        $header_data = array("title" => "Sambavanai");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('sambavanai');
        } else {
            $this->load->view('auth');
        }
    }

    public function sendNotification() {
        $header_data = array("title" => "Notification");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('notification');
        } else {
            $this->load->view('auth');
        }
    }

    public function newNalvarthaiAudio() {
        $header_data = array("title" => "New Nalvarthai Audio");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newnalvarthaiaudio');
        } else {
            $this->load->view('auth');
        }
    }

    public function editAndDeleteNalvarthaiAudio() {
        $header_data = array("title" => "Nalvarthai Audio - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editdeletenalvarthaiaudio');
        } else {
            $this->load->view('auth');
        }
    }

    public function newNalvarthaiVideo() {
        $header_data = array("title" => "New Nalvarthai Video");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newnalvarthaivideo');
        } else {
            $this->load->view('auth');
        }
    }

    public function editAndDeleteNalvarthaiVideo() {
        $header_data = array("title" => "Nalvarthai Video - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editdeletenalvarthaivideo');
        } else {
            $this->load->view('auth');
        }
    }
    
    public function newThirumalaiVideo() {
        $header_data = array("title" => "Thirumlai View -New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newthirumalaivideo');
        } else {
            $this->load->view('auth');
        }
    }

    public function editAndDeleteThirumalaiVideo() {
        $header_data = array("title" => "Thirumalai Video - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeletethirumalaivideo');
        } else {
            $this->load->view('auth');
        }
    }

    public function newJodhidam() {
        $header_data = array("title" => "Jodhidam -New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newjodhidamvideo');
        } else {
            $this->load->view('auth');
        }
    }

    public function editAndDeleteJodhidam() {
        $header_data = array("title" => "Jodhidam - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeletejodhidamvideo');
        } else {
            $this->load->view('auth');
        }
    }

    public function newalwaraudio() {
        $header_data = array("title" => "108'il Alwargalin Manam -New Audio");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newalwaraudio');
        } else {
            $this->load->view('auth');
        }
    }

    public function newalwarvideo() {
        $header_data = array("title" => "108'il Alwargalin Manam -New Video");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newalwarvideo');
        } else {
            $this->load->view('auth');
        }
    }

    public function editanddeleteAlwarAudio() {
        $header_data = array("title" => "108'il Alwargalin Manam Audio - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeletealwaraudio');
        } else {
            $this->load->view('auth');
        }
    }

    public function EditandDeleteAlwarVideo() {
        $header_data = array("title" => "108'il Alwargalin Manam Video - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeletealwarvideo');
        } else {
            $this->load->view('auth');
        }
    }

    public function neweBook() {
        $header_data = array("title" => "eBooks -New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newebooks');
        } else {
            $this->load->view('auth');
        }
    }

    public function editanddeletebook() {
        $header_data = array("title" => "eBooks -Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeleteebooks');
        } else {
            $this->load->view('auth');
        }
    }

    public function newKadhaiKetkumNeram() {
        $header_data = array("title" => "Kadhai Ketkum Neram -New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newstory');
        } else {
            $this->load->view('auth');
        }
    }

    public function editAndDeleteKadhaiKetkumNeram() {
        $header_data = array("title" => "Kadhai Ketkum Neram - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editStory');
        } else {
            $this->load->view('auth');
        }
    }

    public function newDhinachariyai() {
        $header_data = array("title" => "Dhinachariyai -New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newdhinachariyai');
        } else {
            $this->load->view('auth');
        }
    }

    public function editAndDeleteDhinachariyai() {
        $header_data = array("title" => "Dhinachariyai - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeletedhinachariyai');
        } else {
            $this->load->view('auth');
        }
    }

    public function newBoyBaby() {
        $header_data = array("title" => "Boy Baby Name -New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newboybaby');
        } else {
            $this->load->view('auth');
        }
    }

    public function newGirlBaby() {
        $header_data = array("title" => "Girl Baby Name -New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newgirlbaby');
        } else {
            $this->load->view('auth');
        }
    }

    public function editdeleteBoyBaby() {
        $header_data = array("title" => "Boy Baby Name - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editdeleteboyname');
        } else {
            $this->load->view('auth');
        }
    }

    public function editdeleteGirlBaby() {
        $header_data = array("title" => "Girl Baby Name - Edit & Delete");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editdeletegirlname');
        } else {
            $this->load->view('auth');
        }
    }

    public function newdance() {
        $header_data = array("title" => "Dance, Music, Drama - New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newdance');
        } else {
            $this->load->view('auth');
        }
    }

    public function EditandDeleteDance() {
        $header_data = array("title" => "Dance, Music, Drama - New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeletedance');
        } else {
            $this->load->view('auth');
        }
    }

    public function newUpanyasamAndOthers() {
        $header_data = array("title" => "Dance, Music, Drama - New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newothers');
        } else {
            $this->load->view('auth');
        }
    }

    public function EditandDeleteOthers() {
        $header_data = array("title" => "Dance, Music, Drama - New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('editanddeleteothers');
        } else {
            $this->load->view('auth');
        }
    }

    public function NewPrasadham() {
        $header_data = array("title" => "Dance, Music, Drama - New");
        if ($this->session->userdata('id') != '') {
            $this->load->view('head',$header_data);
            $this->load->view('newprasadham');
        } else {
            $this->load->view('auth');
        }
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Logs
    public function loginLog() {
        $auth = $this->input->post("auth");
        $status = $this->input->post("status");

        $logPath = "./application/logs";
        if (!is_dir($logPath)) {
            mkdir($logPath,0755,true);
        }

        if (!file_exists($logPath."/loginLog.txt")) {
            $contents = "IP Addr \t\t Time (d/m/y H:iA) \t\t Auth \t\t Status\r--------------------------------------------------------------------------------------------------------------------------------------------------------------------\r";
            file_put_contents($logPath."/loginLog.txt",$contents);
        }

        $time = date('d/m/y H:iA',time());
        $ip = getenv("REMOTE_ADDR");

        $contents = file_get_contents($logPath."/loginLog.txt");
        $contents .= "$ip \t\t $time \t\t $auth \t\t $status \r";

        file_put_contents($logPath."/loginLog.txt",$contents);
    }

    public function notificationLog() {
        $title = $this->input->post("title");
        $message = $this->input->post("message");
        $success = $this->input->post("success");
        $failed = $this->input->post("failed");

        $logPath = "./application/logs/notificationLog.txt";

        if (!file_exists($logPath)) {
            $contents = "Time(d/m/y H:iA) \t\t Title \t\t Message \t\t Success \t Failed \r--------------------------------------------------------------------------------------------------\r";
            file_put_contents($logPath,$contents);
        }

        $time = date('d/m/y H:iA',time());

        $contents = file_get_contents($logPath);
        $contents .= "$time \t\t $title \t\t $message \t\t $success \t\t $failed \r";

        file_put_contents($logPath,$contents);

    }

    public function nalvarthaiLog() {
        $folder = $this->input->post("folder");
        $filename = $this->input->post("filename");
        $type = $this->input->post("type");
        $status = $this->input->post("status");
        $mode = $this->input->post("mode");

        $logPath = "./application/logs/nalvarthaiLog.txt";

        if (!file_exists($logPath)) {
            $contents = "Time(d/m/y H:iA) \t\t Folder \t\t Type \t\t Status \t\t Content \t\t FileName with Path \r--------------------------------------------------------------------------------------------------\r";
            file_put_contents($logPath,$contents);
        }

        $time = date('d/m/y H:iA',time());

        $contents = file_get_contents($logPath);
        $contents .= "$time \t\t $folder \t\t $type \t\t $status \t\t $mode \t\t $filename\r";

        file_put_contents($logPath,$contents);
    }

    public function storyLog() {
        $filename = $this->input->post("filename");
        $status = $this->input->post("status");

        $logPath = "./application/logs/kadhaikekumNeram.txt";

        if (!file_exists($logPath)) {
            $contents = "Time(d/m/y H:iA) \t\t Status \t\t FileName \r--------------------------------------------------------------------------------------------------\r";
            file_put_contents($logPath,$contents);
        }

        $time = date('d/m/y H:iA',time());

        $contents = file_get_contents($logPath);
        $contents .= "$time \t\t $status \t\t $filename\r";

        file_put_contents($logPath,$contents);
    }

    public function babyLog() {
        $name = $this->input->post("name");
        $gender = $this->input->post("gender");
        $type = $this->input->post("type");
        $status = $this->input->post("status");

        $logPath = "./application/logs/babynames.txt";

        if (!file_exists($logPath)) {
            $contents = "Time(d/m/y H:iA) \t\t Status \t\t Name \t\t Type \t\t Gender \r--------------------------------------------------------------------------------------------------\r";
            file_put_contents($logPath,$contents);
        }

        $time = date('d/m/y H:iA',time());

        $contents = file_get_contents($logPath);
        $contents .= "$time \t\t $status \t\t $name \t\t $type \t\t $gender\r";

        file_put_contents($logPath,$contents);
    }

    public function jodhidamLog() {
        $filename = $this->input->post("filename");
        $status = $this->input->post("status");
        $mode = $this->input->post("mode");

        $logPath = "./application/logs/jodhidam.txt";

        if (!file_exists($logPath)) {
            $contents = "Time(d/m/y H:iA) \t\t Status \t\t Mode \t\t FileName \r--------------------------------------------------------------------------------------------------\r";
            file_put_contents($logPath,$contents);
        }

        $time = date('d/m/y H:iA',time());

        $contents = file_get_contents($logPath);
        $contents .= "$time \t\t $status \t\t\t $mode \t\t $filename\r";

        file_put_contents($logPath,$contents);
    }

    public function dhinachariyaiLog() {
        $date = $this->input->post("date");
        $status = $this->input->post("status");
        $mode = $this->input->post("mode");

        $logPath = "./application/logs/dhinachariyai.txt";

        if (!file_exists($logPath)) {
            $contents = "Time(d/m/y H:iA) \t\t Status \t\t Mode \t\t Date \r--------------------------------------------------------------------------------------------------\r";
            file_put_contents($logPath,$contents);
        }

        $time = date('d/m/y H:iA',time());

        $contents = file_get_contents($logPath);
        $contents .= "$time \t\t $status \t\t\t $mode \t\t $date\r";

        file_put_contents($logPath,$contents);
    }

    //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function notification() {
        include 'dbconn.php';

        $title = $this->input->post("title");
        $message = $this->input->post("message");
        $tokens = array();

        $user_query = "SELECT * FROM usertokens";
        $user_result = mysqli_query($connection,$user_query);

        if ($user_result) {
            while($user_row = mysqli_fetch_assoc($user_result)) {
                $tokens[] = $user_row["token"];
            }

            //notification Code
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                'registration_ids' => $tokens,
                'notification' => array('title' => "$title",'body' => $message)
                );

            $headers = array(
                'Authorization:key = AAAAFc-2wQA:APA91bFqYgv324vmJ5tRtpP6yyie0BHDhW-D1oGanrHuBOpgkLLdgBBoUMLx3aL_9H0zTeiNh9_WbiFk7RDwBs1bHfbKvlwqLwPkXRVtTCfOnJKJnyLkfxQn7ml1x2ScHVKcVr5tr5Jy',
                'Content-Type: application/json'
                );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);           
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }
            curl_close($ch);
            echo $result;

        } else {
            echo "fail";
        }
    }

    public function deleteNalvarthaiAudio() {
        include 'dbconn.php';

        if ($connection) {
            $url = $this->input->post("url");

            $delete_query = "DELETE FROM `dailyaudio` WHERE url='$url'";
            $delete_result = mysqli_query($connection,$delete_query);

            if ($delete_result) {
                echo "ok";
            } else {
                echo "fail";
            }

        } else {
            echo "fail";
        }
    }

    public function deleteNalvarthaiVideo() {
        include 'dbconn.php';

        if ($connection) {
            $url = $this->input->post("url");

            $delete_query = "DELETE FROM `dailyvideo` WHERE url='$url'";
            $delete_result = mysqli_query($connection,$delete_query);

            if ($delete_result) {
                echo "ok";
            } else {
                echo "fail";
            }

        } else {
            echo "fail";
        }
    }

    public function deleteThirumalaiVideo() {
        include 'dbconn.php';

        if ($connection) {
            $url = $this->input->post("url");

            $delete_query = "DELETE FROM `dailyvideothirmalai` WHERE url='$url'";
            $delete_result = mysqli_query($connection,$delete_query);

            if ($delete_result) {
                echo "ok";
            } else {
                echo "fail";
            }

        } else {
            echo "fail";
        }
    }

    public function insertNewNameBoy() {
        include 'dbconn.php';

        if ($connection) {
            $name = $this->input->post("name");

            $check_name_query = "SELECT * FROM boyname WHERE name='$name'";
            $check_name_result = mysqli_query($connection,$check_name_query);

            $check_name_attr = mysqli_num_rows($check_name_result);

            if ($check_name_attr == 0) {
                $insert_name_query = "INSERT INTO `boyname`(`name`) VALUES ('$name')";
                $insert_name_result = mysqli_query($connection,$insert_name_query);

                if ($insert_name_result) {
                    echo "ok";
                } else {
                    echo "fail";
                }
            } else {
                echo "exist";
            }

        } else {
            echo "nocon";
        }
    }

    public function editBoyName() {

        include 'dbconn.php';

        $newName = $this->input->post("newName");
        $existName = $this->input->post("existName");

        $edit_name_query = "UPDATE `boyname` SET `name`='$newName' WHERE name='$existName'";
        $edit_name_result = mysqli_query($connection,$edit_name_query);

        if ($edit_name_query) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function deleteBoyName() {
        include 'dbconn.php';

        $name = $this->input->post("name");

        $delete_query = "DELETE FROM `boyname` WHERE name='$name'";
        $delete_result = mysqli_query($connection,$delete_query);

        if ($delete_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function insertNewNameGirl() {
        include 'dbconn.php';

        if ($connection) {
            $name = $this->input->post("name");

            $check_name_query = "SELECT * FROM girlname WHERE name='$name'";
            $check_name_result = mysqli_query($connection,$check_name_query);

            $check_name_attr = mysqli_num_rows($check_name_result);

            if ($check_name_attr == 0) {
                $insert_name_query = "INSERT INTO `girlname`(`name`) VALUES ('$name')";
                $insert_name_result = mysqli_query($connection,$insert_name_query);

                if ($insert_name_result) {
                    echo "ok";
                } else {
                    echo "fail";
                }
            } else {
                echo "exist";
            }

        } else {
            echo "nocon";
        }
    }

    public function editGirlName() {

        include 'dbconn.php';

        $newName = $this->input->post("newName");
        $existName = $this->input->post("existName");

        $edit_name_query = "UPDATE `girlname` SET `name`='$newName' WHERE name='$existName'";
        $edit_name_result = mysqli_query($connection,$edit_name_query);

        if ($edit_name_query) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function deleteGirlName() {
        include 'dbconn.php';

        $name = $this->input->post("name");

        $delete_query = "DELETE FROM `girlname` WHERE name='$name'";
        $delete_result = mysqli_query($connection,$delete_query);

        if ($delete_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function editNalvarthaiAudioWithoutFile() {
        include 'dbconn.php';

        $folder = $this->input->post("folderName");
        $filename = $this->input->post("fileName");
        $url = $this->input->post("url");

        $update_query = "UPDATE `dailyaudio` SET `folder`='$folder',`name`='$filename',`url`='$url' WHERE url='$url'";
        $update_result = mysqli_query($connection,$update_query);
        
        if ($update_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function editNalvarthaiVideoWithoutFile() {
        include 'dbconn.php';

        $folder = $this->input->post("folderName");
        $filename = $this->input->post("fileName");
        $url = $this->input->post("url");

        $update_query = "UPDATE `dailyvideo` SET `folder`='$folder',`name`='$filename',`url`='$url' WHERE url='$url'";
        $update_result = mysqli_query($connection,$update_query);
        
        if ($update_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function editThirumalaiVideoWithoutFile() {
        include 'dbconn.php';

        $folder = $this->input->post("folderName");
        $filename = $this->input->post("fileName");
        $url = $this->input->post("url");

        $update_query = "UPDATE `dailyvideothirmalai` SET `folder`='$folder',`name`='$filename',`url`='$url' WHERE url='$url'";
        $update_result = mysqli_query($connection,$update_query);
        
        if ($update_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    // Coded for file Upload with Database Upload
    //Database Handlers
    public function uploadNalvarthaiAudioDatabase($ok=1,$filename="",$folder="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include "dbconn.php";
            $url = "https://tpvs.tce.edu/unrestricted/$folder/$filename.mp3";
            $update_query = "INSERT INTO `dailyaudio` (`folder`,`name`,`url`) VALUES ('$folder','$filename','$url')";
            $update_result = mysqli_query($connection,$update_query);

            if ($update_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function uploadNalvarthaiVideoDatabase($ok=1,$filename="",$folder="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include "dbconn.php";
            $url = "https://tpvs.tce.edu/unrestricted/Nalvarthai Video/$folder/$filename.mp4";
            $update_query = "INSERT INTO `dailyvideo` (`folder`,`name`,`url`) VALUES ('$folder','$filename','$url')";
            $update_result = mysqli_query($connection,$update_query);

            if ($update_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function editNalvarthaiAudioFile($ok=1,$filename="",$folder="",$finalUrl="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include 'dbconn.php';
            $url = "https://tpvs.tce.edu/unrestricted/$folder/$filename.mp4";
            $update_query = "UPDATE `dailyaudio` SET `folder`='$folder',`name`='$filename',`url`='$url' WHERE url='$finalUrl'";
            $update_result = mysqli_query($connection,$update_query);

            if ($update_result == "ok") {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function editNalvarthaiVideoFile($ok=1,$filename="",$folder="",$finalUrl="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include 'dbconn.php';
            $url = "https://tpvs.tce.edu/unrestricted/Nalvarthai Video/$folder/$filename.mp4";
            $update_query = "UPDATE `dailyvideo` SET `folder`='$folder',`name`='$filename',`url`='$url' WHERE url='$finalUrl'";
            $update_result = mysqli_query($connection,$update_query);
            
            if ($update_query) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function editThirumalaiVideoFile($ok=1,$filename="",$folder="",$finalUrl="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include 'dbconn.php';
            $url = "https://tpvs.tce.edu/unrestricted/Nalvarthai Video/$folder/$filename.mp4";
            $update_query = "UPDATE `dailyvideothirmalai` SET `folder`='$folder',`name`='$filename',`url`='$url' WHERE url='$finalUrl'";
            $update_result = mysqli_query($connection,$update_query);
            
            if ($update_query) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    //Upload Handlers
    public function uploadNalvarthaiAudio() {
        //$this->uploadNalvarthaiAudioDatabase(0,"done","done");

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadNalvarthaiAudioDatabase(0,"","");
        }

        $folder = $this->input->post("folder");
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadNalvarthaiAudioDatabase(0,"","");
            }
        }

        $fileName = $_POST["filename"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp3";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadNalvarthaiAudioDatabase(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadNalvarthaiAudioDatabase(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadNalvarthaiAudioDatabase(1,$fileName,$folder);
    }

    public function uploadNalvarthaiVideo() {
        //$this->uploadNalvarthaiAudioDatabase(0,"done","done");

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadNalvarthaiVideoDatabase(0,"","");
        }

        $folder = "Nalvarthai Video";
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadNalvarthaiVideoDatabase(0,"","");
            }
        }

        $folder = $this->input->post("folder");
        $folderPath = $folderPath.DIRECTORY_SEPARATOR.$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadNalvarthaiVideoDatabase(0,"","");
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
                $this->uploadNalvarthaiVideoDatabase(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadNalvarthaiVideoDatabase(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadNalvarthaiVideoDatabase(1,$fileName,$folder);
    }

    public function editNalvarthaiAudioWithFile() {

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->editNalvarthaiAudioFile(0,"","","");
        }

        $finalUrl = $this->input->post("url");

        $folder = $this->input->post("folderName");
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editNalvarthaiAudioFile(0,"","","");
            }
        }

        $fileName = $_POST["fileName"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp4";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->editNalvarthaiAudioFile(0,"","","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->editNalvarthaiAudioFile(0,"","","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->editNalvarthaiAudioFile(1,$fileName,$folder,$finalUrl);
    }

    public function editNalvarthaiVideoWithFile() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->editNalvarthaiVideoFile(0,"","","");
        }

        $folder = "Nalvarthai Video";
        $folderPath = "../unrestricted/".$folder;
        $finalUrl = $this->input->post("url");

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editNalvarthaiVideoFile(0,"","","");
            }
        }

        $folder = $this->input->post("folderName");
        $folderPath = "../unrestricted/Nalvarthai Video/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editNalvarthaiVideoFile(0,"","","");
            }
        }

        $fileName = $_POST["fileName"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp4";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->editNalvarthaiVideoFile(0,"","","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->editNalvarthaiVideoFile(0,"","","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->editNalvarthaiVideoFile(1,$fileName,$folder,$finalUrl);
    }

    public function editThirumalaiVideoWithFile() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->editThirumalaiVideoFile(0,"","","");
        }

        $folder = "Thirumalai Video";
        $folderPath = "../unrestricted/".$folder;
        $finalUrl = $this->input->post("url");

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editThirumalaiVideoFile(0,"","","");
            }
        }

        $folder = $this->input->post("folderName");
        $folderPath = "../unrestricted/Thirumalai Video/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editThirumalaiVideoFile(0,"","","");
            }
        }

        $fileName = $_POST["fileName"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp4";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->editThirumalaiVideoFile(0,"","","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->editThirumalaiVideoFile(0,"","","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->editThirumalaiVideoFile(1,$fileName,$folder,$finalUrl);
    }

    //Dhinachariyai Contents
    public function newDhinachariyaiWithoutFile() {
        include 'dbconn.php';

        $date = $this->input->post("date");
        $tml_month = $this->input->post("tml_month");
        $heading = $this->input->post("heading");
        $tml_day = $this->input->post("tml_day");
        $day = $this->input->post("day");
        $star = $this->input->post("star");
        $thidhi = $this->input->post("thidhi");
        $event = $this->input->post("event");
        $other = "null";

        $insert_dhinachariyai_query = "INSERT INTO `dhinachariyai`(`date`, `heading`, `tml_month`, `tml_day`, `day`, `thidhi`, `star`, `event`, `url`, `url1`, `url2`, `title1`, `title2`, `title3`) VALUES ('$date','$heading','$tml_month','$tml_day','$day','$thidhi','$star','$event','$other','$other','$other','$other','$other','$other')";
        $insert_dhinachariyai_result = mysqli_query($connection,$insert_dhinachariyai_query);

        if ($insert_dhinachariyai_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function newDhinachariyaiWithFile() {
        include 'dbconn.php';

        $date = $this->input->post("date");
        $tml_month = $this->input->post("tml_month");
        $heading = $this->input->post("heading");
        $tml_day = $this->input->post("tml_day");
        $day = $this->input->post("day");
        $star = $this->input->post("star");
        $thidhi = $this->input->post("thidhi");
        $event = $this->input->post("event");
        $urlOne = $this->input->post("urlOne");
        $titleOne = $this->input->post("title1");
        $urlTwo = $this->input->post("urlTwo");
        $titleTwo = $this->input->post("title2");
        $urlThree = $this->input->post("urlThree");
        $titleThree = $this->input->post("title3");

        $insert_dhinachariyai_query = "INSERT INTO `dhinachariyai`(`date`, `heading`, `tml_month`, `tml_day`, `day`, `thidhi`, `star`, `event`, `url`, `url1`, `url2`, `title1`, `title2`, `title3`) VALUES ('$date','$heading','$tml_month','$tml_day','$day','$thidhi','$star','$event','$urlOne','$urlTwo','$urlThree','$titleOne','$titleTwo','$titleThree')";
        $insert_dhinachariyai_result = mysqli_query($connection,$insert_dhinachariyai_query);

        if ($insert_dhinachariyai_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function uploadDhinachariyaiDatabase($ok=1,$folder="",$filename="") {
        $JSONOut;
        if ($ok == 0) {
            $JSONOut = array(
                "status" => "fail"
            );
        } else {
            $url = "https://tpvs.tce.edu/unrestricted/$filename/$folder.mp3";
            $JSONOut = array(
                "status" => "ok",
                "url" => $url
            );
        }
        echo json_encode($JSONOut);
    }

    public function uploadDhinachariyaiFile() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadDhinachariyaiDatabase(0,"","");
        }

        $folder = "Dhinachariyai";
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadDhinachariyaiDatabase(0,"","");
            }
        }

        $fileName = $_POST["filename"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp3";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadDhinachariyaiDatabase(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadDhinachariyaiDatabase(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadDhinachariyaiDatabase(1,$fileName,$folder);
    }

    public function deleteDhinachariyai() {
        include 'dbconn.php';

        $date = $this->input->post("date");

        $delete_query = "DELETE FROM `dhinachariyai` WHERE date='$date'";
        $delete_result = mysqli_query($connection,$delete_query);

        if ($delete_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function editDhinachariyaiWithoutFile() {
        include 'dbconn.php';

        $date = $this->input->post("date");
        $heading = $this->input->post("heading");
        $tml_month = $this->input->post("tml_month");
        $tml_day = $this->input->post("tml_day");
        $day = $this->input->post("day");
        $thidhi = $this->input->post("thidhi");
        $star = $this->input->post("star");
        $event = $this->input->post("event");
        $titleOne = $this->input->post("title1");
        $titleTwo = $this->input->post("title2");
        $titleThree = $this->input->post("title3");
        $urlOne = $this->input->post("url1");
        $urlTwo = $this->input->post("url2");
        $urlThree = $this->input->post("url3");

        $update_query = "UPDATE `dhinachariyai` SET `date`='$date',`heading`='$heading',`tml_month`='$tml_month',`tml_day`='$tml_day',`day`='$day',`thidhi`='$thidhi',`star`='$star',`event`='$event',`url`='$urlOne',`url1`='$urlTwo',`url2`='$urlThree',`title1`='$titleOne',`title2`='$titleTwo',`title3`='$titleThree' WHERE date='$date'";
        $update_result = mysqli_query($connection,$update_query);
        if ($update_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function getDhincachariyaiUrl($ok=0,$folder="",$filename="") {
        $response;
        if ($ok == 0) {
            $response = array(
                "status" => "fail"
            );
        } else {
            $url = "https://tpvs.tce.edu/unrestricted/$folder/$filename.mp3";
            $response = array(
                "status" => "ok",
                "url" => $url
            );
        }
        echo json_encode($response);
    }

    public function uploadDhinachariyaiFileEdit() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->getDhincachariyaiUrl(0,"","");
        }

        $folder = "Dhinachariyai";
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->getDhincachariyaiUrl(0,"","");
            }
        }

        $fileName = $_POST["filename"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp3";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->getDhincachariyaiUrl(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->getDhincachariyaiUrl(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->getDhincachariyaiUrl(1,$folder,$fileName);
    }

    // code for uploading, editing and Deleting audio file for Jodhidam

    public function uploadJodhidamDatabase($ok=0,$folder="",$filename="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include 'dbconn.php';

            $url = "https://tpvs.tce.edu/unrestricted/$folder/$filename.mp4";
            $insert_query = "INSERT INTO `jodhidam`(`title`, `url`) VALUES ('$filename','$url')";
            $insert_result = mysqli_query($connection,$insert_query);
            if ($insert_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function newJodhidamUpload() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadJodhidamDatabase(0,"","");
        }

        $folder = "Jodhidam Video";
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadJodhidamDatabase(0,"","");
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
                $this->uploadJodhidamDatabase(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadJodhidamDatabase(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadJodhidamDatabase(1,$folder,$fileName);
    }

    public function editJodhidamWithoutFile() {
        include 'dbconn.php';

        $filename = $this->input->post("filename");
        $url = $this->input->post("url");

        $edit_query = "UPDATE `jodhidam` SET `title`='$filename' WHERE url='$url'";
        $edit_result = mysqli_query($connection,$edit_query);
        if ($edit_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function editJodhidamDatabaseWithFile($ok=0,$filename="",$url="") {
        if ($ok == 0) {
            echo "fail";
        } else {
            include 'dbconn.php';

            $urlNew = "https://tpvs.tce.edu/unrestricted/Jodhidam Video/$filename.mp4";
            $edit_query = "UPDATE `jodhidam` SET `title`='$filename',`url`='$urlNew' WHERE url='$url'";
            $edit_result = mysqli_query($connection,$edit_query);
            if ($edit_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function editJodhidamWithFile() {
        $url = $this->input->post("url");

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->editJodhidamDatabaseWithFile(0,"","");
        }

        $folder = "Jodhidam Video";
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editJodhidamDatabaseWithFile(0,"","");
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
                $this->editJodhidamDatabaseWithFile(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->editJodhidamDatabaseWithFile(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->editJodhidamDatabaseWithFile(1,$fileName,$url);
    }

    public function deleteJodhidam() {
        include 'dbconn.php';

        $url = $this->input->post("url");

        $delete_query = "DELETE FROM `jodhidam` WHERE url='$url'";
        $delete_result = mysqli_query($connection,$delete_query);

        if ($delete_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }


    // code for New and Editing Kadhai Ketkum Neram
    
    public function newStoryUploadUrl($ok=0,$filename="",$extension="") {
        $response;
        if ($ok == 0) {
            $response = array(
                "status" => "fail"
            );
        } else {
            $url = "https://tpvs.tce.edu/unrestricted/Story Time/$filename$extension";
            $response = array(
                "status" => "ok",
                "url" => $url
            );
        }

        echo json_encode($response);
    }

    public function uploadNewStory() {

        $extension = $this->input->post("extension");

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->newStoryUploadUrl(0,"","");
        }

        $folder = "Story Time";
        $folderPath = "../unrestricted/".$folder;

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->newStoryUploadUrl(0,"","");
            }
        }

        $fileName = $_POST["filename"];
        $filePath = "";
        if ($extension == ".mp3") {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp3";
        } else {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".jpg";
        }
        

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->newStoryUploadUrl(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->newStoryUploadUrl(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->newStoryUploadUrl(1,$fileName,$extension);
    }

    public function uploadStoryDatabase() {
        include 'dbconn.php';

        $filename = $this->input->post("filename");
        $imageUrl = $this->input->post("imageUrl");
        $audioUrl = $this->input->post("audioUrl");

        $insert_query = "INSERT INTO `kadhaikekumneram`(`name`, `url`, `image`) VALUES ('$filename','$audioUrl','$imageUrl')";
        $insert_result = mysqli_query($connection,$insert_query);

        if ($insert_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function deleteStory() {
        include 'dbconn.php';

        $url = $this->input->post("url");

        $delete_query = "DELETE FROM `kadhaikekumneram` WHERE url='$url'";
        $delete_result = mysqli_query($connection,$delete_query);

        if ($delete_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function editStoryWithoutFile() {
        include 'dbconn.php';

        $filename = $this->input->post("filename");
        $url = $this->input->post("oldUrl");

        $edit_query = "UPDATE `kadhaikekumneram` SET `name`='$filename' WHERE url='$url'";
        $edit_result = mysqli_query($connection,$edit_query);

        if ($edit_query) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function editStoryWithFile() {
        include 'dbconn.php';

        $filename = $this->input->post("fileName");
        $url = $this->input->post("oldaudioUrl");
        $newaudio = $this->input->post("newaudioUrl");
        $newimage = $this->input->post("newimageUrl");

        $edit_query = "UPDATE `kadhaikekumneram` SET `name`='$filename',`url`='$newaudio',`image`='$newimage' WHERE url='$url'";
        $edit_result = mysqli_query($connection,$edit_query);

        if ($edit_query) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function  uploadSampleeBooksDatabase($ok=1,$filename="") {
        if ($ok == 0) {
            echo "fail1";
        } else {
            include "dbconn.php";
            $url = "https://tpvs.tce.edu/restricted/Sample ebooks/$filename.pdf";
            $update_query = "INSERT INTO `ebooks_sample`(`name`, `url`) VALUES ('$filename','$url')";
            $update_result = mysqli_query($connection,$update_query);
            if ($update_result) {
                echo "ok";
            } else {
                echo $update_result;
            }
        }
    }

    public function uploadSampleBookFile() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadSampleeBooksDatabase(0,"");
        }

        $folderPath = "../restricted/Sample ebooks";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadSampleeBooksDatabase(0,"");
            }
        }

        $fileName = $_POST["filename"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".pdf";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadSampleeBooksDatabase(0,"");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadSampleeBooksDatabase(0,"");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadSampleeBooksDatabase(1,$fileName);
    }
    //-------------------------- EBooks Upload ----------------------------------------

    public function uploadActualBookDatabase($ok=1,$filename,$price) {
        if ($ok == 0) {
            echo "fail";
        } else {
            include "dbconn.php";
            $url = "https://tpvs.tce.edu/restricted/e-books/$filename.pdf";
            $insert_query = "INSERT INTO `ebooks`(`name`, `url`, `price`) VALUES ('$filename','$url','$price')";
            $insert_result = mysqli_query($connection,$insert_query);
            if ($insert_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    public function uploadActualBookFile() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadActualBookDatabase(0,"","");
        }

        $folderPath = "../restricted/e-books";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadActualBookDatabase(0,"","");
            }
        }

        $fileName = $_POST["filename"];
        $price = $_POST["price"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".pdf";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadActualBookDatabase(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadActualBookDatabase(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadActualBookDatabase(1,$fileName,$price);
    }

    function deleteActualBook() {

        include 'dbconn.php';

        $url = $_POST["url"];

        $delete_query = "DELETE FROM `ebooks` WHERE url='$url'";
        $delete_result = mysqli_query($connection,$delete_query);

        if ($delete_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    function deleteSampleBook() {

        include 'dbconn.php';

        $url = $_POST["url"];

        $delete_query = "DELETE FROM `ebooks_sample` WHERE url='$url'";
        $delete_result = mysqli_query($connection,$delete_query);

        if ($delete_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    function modifyActualBookDataWithoutFile() {

        include "dbconn.php";

        $filename = $_POST["filename"];
        $price = $_POST["price"];
        $url = $_POST["url"];

        $edit_query = "UPDATE `ebooks` SET `name`='$filename',`price`='$price' WHERE url='$url'";
        $edit_result = mysqli_query($connection,$edit_query);

        if ($edit_result) {
            echo "ok";
        } else {
            echo "fail";
        }

    }

    function modifySampleBookDataWithoutFile() {

        include "dbconn.php";

        $filename = $_POST["filename"];
        $url = $_POST["url"];

        $edit_query = "UPDATE `ebooks_sample` SET `name`='$filename' WHERE url='$url'";
        $edit_result = mysqli_query($connection,$edit_query);

        if ($edit_result) {
            echo "ok";
        } else {
            echo "fail";
        }

    }

    public function editActualBookDatabase($ok=1,$filename,$price,$actualurl) {
        if ($ok == 0) {
            echo "fail";
        } else {
            include "dbconn.php";
            $url = "https://tpvs.tce.edu/restricted/e-books/$filename.pdf";
            $edit_query = "UPDATE `ebooks` SET `name`='$filename',`url`='$url',`price`='$price' WHERE url='$actualurl'";
            $edit_result = mysqli_query($connection,$edit_query);
            if ($edit_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    function editActualBook() {
        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->editActualBookDatabase(0,"","","");
        }

        $folderPath = "../restricted/e-books";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editActualBookDatabase(0,"","","");
            }
        }

        $fileName = $_POST["filename"];
        $price = $_POST["price"];
        $url = $_POST["url"];

        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".pdf";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->editActualBookDatabase(0,"","","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->editActualBookDatabase(0,"","","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->editActualBookDatabase(1,$fileName,$price,$url);
    }

    public function editSampleBookDatabase($ok=1,$filename,$actualurl) {
        if ($ok == 0) {
            echo "fail";
        } else {
            include "dbconn.php";
            $url = "https://tpvs.tce.edu/restricted/Sample ebooks/$filename.pdf";
            $edit_query = "UPDATE `ebooks_sample` SET `name`='$filename',`url`='$url' WHERE url='$actualurl'";
            $edit_result = mysqli_query($connection,$edit_query);
            if ($edit_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    function editSampleBook() {

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->editSampleBookDatabase(0,"","");
        }

        $folderPath = "../restricted/Sample ebooks";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->editSampleBookDatabase(0,"","");
            }
        }

        $fileName = $_POST["filename"];
        $url = $_POST["url"];
        $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".pdf";

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->editSampleBookDatabase(0,"","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->editSampleBookDatabase(0,"","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->editSampleBookDatabase(1,$fileName,$url);

    } 

    //----------------- Alwar audio -------------------------------------------

    function searchAlwarAudio() {

        include 'dbconn.php';

        $query = $_POST["query"];

        $search_query = "SELECT folder FROM alwaraudio WHERE folder LIKE '%$query%' GROUP BY folder";
        $search_result = mysqli_query($connection,$search_query);

        while ($search_attr = mysqli_fetch_assoc($search_result)) {
            echo '<a href="#" class="list-group-item list-group-item-action border-1">'.$search_attr["folder"].'</a>';
        }
        //echo '<a href="#" class="list-group-item list-group-item-action border-1">'.$search_attr["folder"].'</a>';
    }


    function uploadnewAlwaraudiodatabase($ok=1,$filename,$folder,$price,$folderno,$type) {

        include "dbconn.php";

        if ($ok == 0) {
            echo "fail";
        } else {
            if ($type == "mp3") {
                $url = "https://tpvs.tce.edu/restricted/alwar audio/$folder/$filename.mp3";
                $type = "audio";
            } else {
                $url = "https://tpvs.tce.edu/restricted/alwar audio/$folder/$filename.pdf";
            }
            //$url = "http://localhost/alwar audio/$folder/$filename.$type";
            $insert_query = "INSERT INTO `alwaraudio`(`folder`, `name`, `url`, `format`, `price`, `folderno`) VALUES ('$folder','$filename','$url','$type','$price','$folderno')";
            $insert_result = mysqli_query($connection,$insert_query);

            if ($insert_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    function uploadnewalwaraudiofile() {

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadnewAlwaraudiodatabase(0,"","","","","");
        }

        $folderPath = "../restricted/alwar audio";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadnewAlwaraudiodatabase(0,"","","","","");
            }
        }

        $foldername = $_POST["folder"];
        $folderPath = "../restricted/alwar audio/$foldername";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadnewAlwaraudiodatabase(0,"","","","","");
            }
        }

        $fileName = $_POST["filename"];
        $price = $_POST["price"];
        $type = $_POST["type"];
        $folderno = $_POST["folderno"];

        if ($type == "mp3") {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp3";
        } else {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".pdf";
        }

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadnewAlwaraudiodatabase(0,"","","","","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadnewAlwaraudiodatabase(0,"","","","","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadnewAlwaraudiodatabase(1,$fileName,$foldername,$price,$folderno,$type);

    }

    public function getAlwarAudioDetails() {

        include "dbconn.php";

        $foldername = $this->input->post("foldername");

        $details_query = "SELECT * FROM alwaraudio WHERE folder='$foldername'";
        $details_result = mysqli_query($connection,$details_query);

        $count = mysqli_num_rows($details_result);

        $details_json;

        if ($count > 0) {
            $details_attr = mysqli_fetch_assoc($details_result);
            $details_json = array(
                "status" => "true",
                "price" => $details_attr["price"],
                "folderno" => $details_attr["folderno"]
            );
        } else {
            $maxdetails_query = "SELECT max(folderno) as max FROM alwaraudio";
            $maxdetails_result = mysqli_query($connection,$maxdetails_query);

            $maxdetails_attr = mysqli_fetch_assoc($maxdetails_result);
            $max_value = $maxdetails_attr["max"];

            $details_json = array(
                "status" => "false",
                "folderno" => ($max_value+0)
            );
        }

        echo json_encode($details_json);

    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                            108'il Alwargalim Manam Video
    ----------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    function searchAlwarVideo() {

        include 'dbconn.php';

        $query = $_POST["query"];

        $search_query = "SELECT folder FROM alwarvideo WHERE folder LIKE '%$query%' GROUP BY folder";
        $search_result = mysqli_query($connection,$search_query);

        while ($search_attr = mysqli_fetch_assoc($search_result)) {
            echo '<a href="#" class="list-group-item list-group-item-action border-1">'.$search_attr["folder"].'</a>';
        }
        //echo '<a href="#" class="list-group-item list-group-item-action border-1">'.$search_attr["folder"].'</a>';
    }

    public function getAlwarVideoDetails() {

        include "dbconn.php";

        $foldername = $this->input->post("foldername");

        $details_query = "SELECT * FROM alwarvideo WHERE folder='$foldername'";
        $details_result = mysqli_query($connection,$details_query);

        $count = mysqli_num_rows($details_result);

        $details_json;

        if ($count > 0) {
            $details_attr = mysqli_fetch_assoc($details_result);
            $details_json = array(
                "status" => "true",
                "price" => $details_attr["price"],
                "folderno" => $details_attr["folderno"]
            );
        } else {
            $maxdetails_query = "SELECT max(folderno) as max FROM alwarvideo";
            $maxdetails_result = mysqli_query($connection,$maxdetails_query);

            $maxdetails_attr = mysqli_fetch_assoc($maxdetails_result);
            $max_value = $maxdetails_attr["max"];

            $details_json = array(
                "status" => "false",
                "folderno" => ($max_value+0)
            );
        }

        echo json_encode($details_json);

    }

    function uploadnewAlwarvideodatabase($ok=1,$filename,$folder,$price,$folderno,$type) {

        include "dbconn.php";

        if ($ok == 0) {
            echo "fail";
        } else {
            if ($type == "video") {
                $url = "https://tpvs.tce.edu/restricted/alwar video/$folder/$filename.mp4";
                $type = "audio";
            } else {
                $url = "https://tpvs.tce.edu/restricted/alwar video/$folder/$filename.pdf";
            }
            //$url = "http://localhost/alwar audio/$folder/$filename.$type";
            $insert_query = "INSERT INTO `alwarvideo`(`folder`, `name`, `url`, `format`, `price`, `folderno`) VALUES ('$folder','$filename','$url','$type','$price','$folderno')";
            $insert_result = mysqli_query($connection,$insert_query);

            if ($insert_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }
    }

    function uploadnewalwarvideofile() {

        if (empty($_FILES) || $_FILES['file']['error']) {
            $this->uploadnewAlwarvideodatabase(0,"","","","","");
        }

        $folderPath = "../restricted/alwar video";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadnewAlwarvideodatabase(0,"","","","","");
            }
        }

        $foldername = $_POST["folder"];
        $folderPath = "../restricted/alwar video/$foldername";

        if (!file_exists($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                $this->uploadnewAlwarvideodatabase(0,"","","","","");
            }
        }

        $fileName = $_POST["filename"];
        $price = $_POST["price"];
        $type = $_POST["type"];
        $folderno = $_POST["folderno"];

        if ($type == "video") {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".mp4";
        } else {
            $filePath = $folderPath.DIRECTORY_SEPARATOR.$fileName.".pdf";
        }

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['file']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                $this->uploadnewAlwarvideodatabase(0,"","","","","");
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['file']['tmp_name']);
        } else {
            $this->uploadnewAlwarvideodatabase(0,"","","","","");
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->uploadnewAlwarvideodatabase(1,$fileName,$foldername,$price,$folderno,$type);

    }

}