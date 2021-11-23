<?php
// bắt đầu session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
            <h2> Đăng ký thành viên </h2>
    </div>
    <div class="row">
                <div class="col">
                                <form action="" method="post" class="row g-3" name="formdangnhap" onsubmit="return checkform(document.formdangnhap)">

                                    <div class="mb-6">
                                    <label for="formGroupExampleInput" class="form-label">Tài khoản</label>
                                    <input type="text" class="form-control" name="TxtUserName"  >
                                        <p class="badge bg-primary text-wrap" id="PTxtUserName">
                                        </p>
                                    </div>

                                    <div class="mb-6">
                                        <label for="formGroupExampleInput2" class="form-label">Mật Khẩu</label>
                                        <input type="password" class="form-control"  name="TxtPass"  >
                                        <p class="badge bg-primary text-wrap" id="PTextPassword"></p>
                                    </div>
                                    <p class="badge bg-primary text-wrap" id="error">error </p>
                                    <div class="col-12 mb-6">
                                    <button type="submit" name="sumit"  class="btn btn-primary justify-content-center" >Đăng nhập</button>
                                    </div>
                            </form>
                </div>
    </div>
    
</div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    document.getElementById("error").innerHTML ="";
    
    function checkform(formdangnhap) {
        if(formdangnhap.TxtUserName.value !=""){
            document.getElementById("PTxtUserName").innerHTML = "";
            if(formdangnhap.TxtPass/value !=""){
                document.getElementById("PTextPassword").innerHTML = "";
                return true;
            }else{
                document.getElementById("PTextPassword").innerHTML = "Mật khẩu không được để trống";
                document.fromdangki.TxtUserName.focus();
                return false;
            }
        }else{
            document.getElementById("PTxtUserName").innerHTML = "Tài khoản không được để trống";
            document.fromdangki.TxtUserName.focus();
            return false;
        }
        
    }
</script>
</body>
</html>

<?php
    if(isset($_POST["sumit"])){
        include("connect.php");
        $TxtUserName = $_POST["TxtUserName"];
        $TxtPass = md5($_POST["TxtPass"]);
        

        $sql = "SELECT * FROM USER WHERE Username = '$TxtUserName' AND Password = '$TxtPass'";
     
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result -> fetch_assoc();
            $_SESSION["user"] = $row["Id"];
            header("Location: info.php");
        }else{
            echo('<script>document.getElementById("error").innerHTML = "Tài khoản không hợp lệ" </script>');
        }
    }
        

?>