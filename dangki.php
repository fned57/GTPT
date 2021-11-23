<?php
    $error = " ";
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
                                <form action="" method="post" class="row g-3" name="fromdangki" onsubmit="return checkform(document.fromdangki)">

                                    <div class="mb-6">
                                    <label for="formGroupExampleInput" class="form-label">Tài khoản</label>
                                    <input type="text" class="form-control" name="TxtUserName"  >
                                        <p class="badge bg-primary text-wrap" id="PTxtUserName">
                                        </p>
                                    </div>

                                    <div class="mb-6">
                                    <label for="formGroupExampleInput2" class="form-label">Mật Khẩu</label>
                                    <input type="password" class="form-control"  name="TxtPass"  >
                                    <p class="badge bg-primary text-wrap"  id="PTextPassword"></p>
                                    </div>

                                    <div class="mb-6">
                                    <label for="formGroupExampleInput" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" name = "TextRePassword" >
                                    <p class="badge bg-primary text-wrap" id="PTextRePassword"> </p>
                                    </div>

                                    <div class="mb-6">
                                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="TxtEmail" >
                                    <p class="badge bg-primary text-wrap" id="PTextEmail" > </p>
                                    </div>

                                    <div class="mb-6">
                                    <label for="formGroupExampleInput" class="form-label">Tên hiện thị</label>
                                    <input type="text" class="form-control" name="TxtName">
                                    <p class="badge bg-primary text-wrap" id="PTxtName">
                                        </p>
                                    </div>
                                    
                                    <div class="col-12 mb-6">
                                    <button type="submit" name="sumit"  class="btn btn-primary justify-content-center" >Đăng ký</button>
                                    </div>
                            </form>
                </div>
    </div>
    
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

    
    function checkform(fromdangki) {
        if(fromdangki.TxtUserName.value !=""){

            fromdangki.TxtUserName.value.trim();
            var Email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(fromdangki.TxtEmail.value.match(Email))
            {   
                fromdangki.TxtEmail.value.trim()
                document.getElementById("PTextEmail").innerHTML = "";
                var Password = /^[A-Za-z0-9]\w{8,}$/;

                if(fromdangki.TxtPass.value.match(Password)){

                    fromdangki.TxtPass.value.trim();
                    document.getElementById("PTextPassword").innerHTML = "";

                    if(fromdangki.TxtPass.value == fromdangki.TextRePassword.value){
                        document.getElementById("PTextRePassword").innerHTML = "";

                        if(fromdangki.TxtName.value !=""){
                            fromdangki.TxtName.value.trim();
                            document.getElementById("PTxtName").innerHTML = "";

                            return true;
                        }else{
                            document.getElementById("PTxtName").innerHTML = "Tên không được để trống";
                            document.fromdangki.TxtName.focus();
                            return false; 
                        }
                    }else{
                        document.getElementById("PTextRePassword").innerHTML = "Mật khẩu không trùng nhau";
                        document.fromdangki.TextRePassword.focus();
                        return false;
                    }
                }else{
                    document.getElementById("PTextPassword").innerHTML = "Mật khẩu ít nhất 8 kí tự";
                    document.fromdangki.TxtPass.focus();
                    return false;
                }
                
            }else{
                document.getElementById("PTextEmail").innerHTML = "Email không hợp lệ";
                document.fromdangki.TxtEmail.focus();
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
        $TxtEmail = $_POST["TxtEmail"];
        $TxtName = $_POST["TxtName"];


        $sql = "SELECT * FROM USER WHERE Username = '$TxtUserName'";
     
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo('<script>document.getElementById("PTxtUserName").innerHTML = "Tài khoản đã tồn tại" </script>');
        }else{
            $sql = "insert into user(Username,Password,Email,Name) values ('$TxtUserName','$TxtPass','$TxtEmail','$TxtName')";

            if ($conn->query($sql) === TRUE) {
                echo("<script>alert('Dang ki thanh cong!!') </script>");
              } else {
                echo("<script>alert('Dang ki khong thanh cong!!') </script>");
              }
    
    
        }
    }
        

?>