<?php include($_SERVER['DOCUMENT_ROOT'] . "/gjgxh/manage/verifyLogin.php"); ?>
<?php
if(!session_id())session_start();
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>山东省钢结构行业协会</title>

    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
<div class="page-wrapper flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <form id ="loginForm" action="passwordEdit_Controller.php?flag=passwordEdit" method="post"> 
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        修改密码
                    </div>

                    <div class="card-body py-5">
                        <div class="form-group">
                            <label class="form-control-label">原密码</label>
                           <input type="password" class="form-control" name="Password" id="Password"/>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">新密码</label>
                            <input type="password" class="form-control" name="NewPassword" id="NewPassword"/>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">确认密码</label>
                            <input type="password" class="form-control" name="RePassword" id="RePassword"/>
                        </div>
                        <?php
                        echo $username;
                        if(!empty($_GET['errno'])){     
                        $errno = $_GET['errno'];     
                            if($errno == 1)         
                            echo "<div style='width:350px; color:green; margin:auto;text-align:center;'>修改成功</div>";
                        else{
                            if($errno == 2)         
                            echo "<div style='width:350px; color:red; margin:auto ;text-align:center;'>原密码输入不正确，请重新输入！</div>";
                        } 
                        }
                    ?>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-block" onClick="return check()">确定</button>

                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function check(){
        var oldpass=document.getElementById("Password").value;
        var newpass=document.getElementById("NewPassword").value;
        var confirmpass=document.getElementById("RePassword").value;
        if(oldpass==""){
            alert("请输入原密码！");
            document.getElementById("Password").focus();
            return false;
        }
        if(newpass==""){
            alert("请输入新密码！");
            document.getElementById("NewPassword").focus();
            return false;
        }
        if(confirmpass==""){
            alert("请输入确认密码！");  
            document.getElementById("RePassword").focus();
            return false;
        }
        if(newpass==confirmpass){
            return true;
        }else{
            alert("两次密码不同，请重新输入！");
            document.getElementById("NewPassword").focus();
            return false;
        }
    }
</script>
</body>
</html>
