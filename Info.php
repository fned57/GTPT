<?php
    session_start();
    include("connect.php");
    $id= $_SESSION["user"];
    $sql = "SELECT * FROM USER WHERE Id = $id";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result -> fetch_assoc();   
        }else{
            header("Location: dangnhap.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
</br class="mx-bottom-20">     
    <div class="container-xl mx-top-30">
        <div class="row">
            <div class="mx-auto text-center">
                <img src="<?php  echo($row["Avatar"]); ?>" class="rounded-circle" width="500" hight="500" alt="example placeholder avatar">
                <form action="" method="post">
                    <input type="file" name="fileupload" id="fileupload">
                    <input type="submit" value="Đăng ảnh" name="submit">
                </form>
             
            </br class="mx-top-20">
            </div>
           
                <div class="row">
                <h2 class="bg-white text-dark text-center"><?php  echo($row["Name"]); ?></h2>
                <p class="bg-white text-dark text-center"><?php  echo($row["Email"]); ?></p>
                <p class="bg-white text-dark text-center"><?php  echo($row["Phone"]); ?></p>
            </div>
        </div>
            
            
        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>


<?php
    if(isset($_POST["submit"])){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        {
            // Dữ liệu gửi lên server không bằng phương thức post
            echo "Phải Post dữ liệu";
            die;
        }
        //Kiểm tra dữ liệu trong file có tôn tại hay không
        if (!isset($_FILES["fileupload"])){
            echo "Dữ liệu không đúng cấu trúc";
            die;
        }

        $target_dir    = "uploads/";
        $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
        $allowUpload   = true;
        if ($allowUpload){
        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
            { 
                $sql = "UPDATE user SET Avatar = '$target_file' WHERE id = $id";
                echo($sql);
                if ($conn->query($sql) === TRUE) {
                    header("Location: info.php");
                } else {
                    $message = "Thêm ảnh không thành công";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
    
            }
            else
            {
                echo "<script type='text/javascript'>alert('Có lỗi xảy ra khi upload file');</script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Có lỗi xảy ra khi upload file');</script>";
        }
    
    }
?>