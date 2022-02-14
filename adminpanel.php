<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","root","celebration"); 
    function login($login, $pass) {
        if ($login == "admin" && $pass == "admin") {
            return true;
        }
    }

    function newData($connect, $addTitle) {
        $services_list = mysqli_query($connect,"SELECT * FROM services");
        $orig = false;
        if($services_list){
            while($service = mysqli_fetch_array($services_list)){
                if($addTitle == $service["title"]){
                    return false;
                    $orig = false;
                }
                else {
                    $orig = true;
                }
            }
            if ($orig = true) {
                return true;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Админка</title>
	<link rel="stylesheet" href="./css/catalog.css">
	<link rel="stylesheet" href="./css/adminpanel.css">
	<style type="text/css">
		.service {
            width: 750px;
			margin: 10px auto;
		}

        td {
            width: 200px
        }

        #editData {
            width: 750px;
			margin: 10px auto;
        }

        .editForm>form>input {
            margin-top: 10px;
        }

        .admin_leave {
            margin-right: 20px;
        }
	</style>
</head>
<body>
	<header id="header">
        <div class="container">
            <div class="header-info">
                <div class="logo">
                    <a href="/"><img class="logo-img" src="./images/logo.png"/></a>
                </div>
                <div class="admin">
                    <?
                        if ($_SESSION["admin_auth"]) {
                            echo '<form method="POST">
                                <input name="exitAcc" type="submit" value="Выйти" /> 
                                </form>';
                        }
                    ?>
                    <a class="admin-exit" href="/index.php">На главную</a>
                </div>
            </div>
        </div>
    </header>
    <main id="main">
        <section>
            <div class="services_table">
		        <div class="content">
			        <div class="services">
				        <?php
                            if ($_SESSION["admin_auth"]) {
                                $services_list = mysqli_query($conn,"SELECT * FROM services");
                                if (!$services_list) {
                                    echo "Error";
                                }
                                else {
                                    while($service = mysqli_fetch_array($services_list)) {
                                        $n = $service["idServices"];
                                        echo '<table class="service">
                                        <tr>
                                            <td>'.$service["title"].'</td>
                                            <td>Цена '.$service["cost"].'</td>
                                            <td>
                                                <form method="POST">
                                                    <input name="delBtn_'.$n.'" type="submit" value="Удалить" /> 
                                                </form>
                                            </td>
                                        </tr>
                                        </table>';
                                    }
                                }
                            }
				        ?>				
			        </div>
		        </div>
	        </div>
        </section>
        <?php 
            if ($_SESSION["admin_auth"]) {
                echo '<section id="editData">
                <div class="editForm">
                    <h1>Добавление услуг</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="text" name="addTitle" placeholder="Название">
                        <input type="text" name="addCost" placeholder="Цена">
                        <input type="file" name="addImg" id="addImg">
                        <input type="submit" name="addBD" value="Добавить">
                    </form>
                </div>
            </section>';
            }
        ?>
        <?php
            if (!$_SESSION["admin_auth"]) {
                echo 
                '<section id="auth">
                    <form class="form-auth" method="POST">
                        <input class="inputs" type="text" placeholder="Логин" name="login">
                        <input class="inputs" type="password" placeholder="Пароль" name="password">
                        <button class="inputs input-btn">Войти</button>
                    </form>
                </section>';
            }
        ?>
    </main>
    <?php
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if (login($_POST['login'], $_POST['password'])) {
                $_SESSION["admin_auth"] = true;
                echo "<script>document.location.replace('adminpanel.php');</script>";
            }
        }

        if (isset($_POST['exitAcc'])) {
            $_SESSION["admin_auth"] = false;
            echo "<script>document.location.replace('adminpanel.php');</script>";
        }

        for ($i = 1; $i <= $n; $i++) {
            if (isset($_POST['delBtn_'.$i])) {
                $query_Del = "DELETE FROM `services` WHERE `services`.`idServices` = '".$i."'";
                $result_Del = mysqli_query($conn, $query_Del);
                echo "<script>document.location.replace('adminpanel.php');</script>";
            }
        }

        if (isset($_POST['addTitle']) && isset($_POST['addCost']) && $_FILES['addImg']) {
            $image=$_FILES['addImg']['name'];
            $image=str_replace(' ','|',$image);
            $image="images/".$image;
            if (newData($conn,$_POST['addTitle'])) {
                $query_Add = "INSERT INTO `services` (`idServices`, `title`, `cost`, `image`) VALUES (NULL, '".$_POST['addTitle']."', '".$_POST['addCost']."', '".$image."');";
                $result_Add = mysqli_query($conn, $query_Add);
                if ($result_Add) {
                    move_uploaded_file($_FILES['addImg']['tmp_name'],$image);
                    echo 'Услуга добавлена';
                    echo "<script>document.location.replace('adminpanel.php');</script>";
                }
            }
            else {
                echo 'Поменяйте название';
            }
        }
    ?>
</body>
</html>