<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($fname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - Eposta daha önce kullanılmış!";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $rol = "Üye";
                                $status = "atktiv";
                                $encrypt_pass = md5($password);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, email, password, img, status, rol)
                                VALUES ({$ran_id}, '{$fname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}', '{$rol}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "başarılı";
                                        header("Locate: users.php");
                                    }else{
                                        echo "Bu eposta adresi mevcut değil!";
                                    }
                                }else{
                                    echo "Bir şeyler yanlış gitti. Lütfen tekrar deneyin!";
                                }
                            }
                        }else{
                            echo "Lütfen bir resim dosyası yükleyin - jpeg, png, jpg";
                        }
                    }else{
                     $ran_id = rand(time(), 100000000);
                                $rol = "Üye";
                                $status = "atktiv";
                                $default_img = "avatar.png";
                                $encrypt_pass = md5($password);
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, email, password, img, status, rol)
                                VALUES ({$ran_id}, '{$fname}', '{$email}', '{$encrypt_pass}', '{$default_img}', '{$status}', '{$rol}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        echo "başarılı";
                                    }
                                }
                    }
                }
            }
        }else{
            echo "$email - geçerli bir e-posta değil!";
        }
    }else{
        echo "Tüm giriş alanları zorunludur!";
    }
?>