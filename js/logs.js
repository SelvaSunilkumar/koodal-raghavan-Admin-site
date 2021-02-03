var serverUrl = "http://localhost/koodal/index.php/home/";
let apiKey = '00a50e9c676797793fbc5a67aab7907b7821a67a4310f508b9377129';

function json(url) {
    return fetch(url).then(res => res.json());
}

async function getip() {
    json(`https://api.ipdata.co?api-key=${apiKey}`).then(data => {
        console.log(data.ip);
        return data.ip;
    });
}

function loginLog(auth,status) {
    $.ajax({
        url:serverUrl + "loginLog",
        method:"POST",
        data:{auth:auth,status:status},
        success:function(data) {
            console.log(data);
        }
    });
}

function notificationLog(title,message,success,failed) {
    $.ajax({
        url:serverUrl + "notificationLog",
        method:"POST",
        data:{title:title,message:message,success:success,failed:failed},
        success:function(data) {

        }
    });
}

function nalvarthaiLog(folder,filename,type,status,mode) {
    $.ajax({
        url:serverUrl + "nalvarthaiLog",
        method:"POST",
        data:{folder:folder,filename:filename,type:type,status:status,mode:mode},
        success:function(data) {

        }
    });
}

function jodhidamLog(filename,status,mode) {
    $.ajax({
        url:serverUrl + "jodhidamLog",
        method:"POST",
        data:{filename:filename,status:status,mode:mode},
        success:function(data) {

        }
    });
}

function dhinachariyaiLog(date,status,mode) {
    $.ajax({
        url:serverUrl + "dhinachariyaiLog",
        method:"POST",
        data:{date:date,status:status,mode:mode},
        success:function(data) {
            
        }
    });
}

function storyLog(filename,status) {
    $.ajax({
        url:serverUrl + "storyLog",
        method:"POST",
        data:{filename:filename,status:status},
        success:function(data) {

        }
    });
}

function babyname(name,gender,type,status) {
    $.ajax({
        url:serverUrl + "/babyLog",
        method:"POST",
        data:{name:name,gender:gender,type:type,status:status},
        success:function(data) {

        } 
    });
}