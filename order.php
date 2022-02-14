<?php 
    $conn = mysqli_connect("localhost", "root", "root", "celebration", "3307");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/catalog.css">
    <title>Document</title>
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="header-info">
                <div class="logo">
                    <a href="/"><img class="logo-img" src="./images/logo.png"/></a>
                </div>
                <div class="contacts">
                    <div class="contacts-phone">
                        <a class="contact" href="tel:+79872535726">тел: +7(987)253-57-26</a>
                    </div>
                    <div class="contacts-email">
                        <a class="contact" href="mailto:nruslanf102@gmail.com">email: nruslanf102@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="main">
        <div class="container">
            <div class="form">
                <h1>Оформление заказа</h1>
                <form class="form-for-order" method="post">
                    <input class="order-fields" type="text" placeholder="Фамилия" name="surname">
                    <input class="order-fields" type="text" placeholder="Имя" name="name">
                    <input class="order-fields" type="text" placeholder="Отчество" name="patronymic">
                    <input class="order-fields" type="tel" placeholder="Номер телефона" name="phone">
                    <input class="order-fields" type="email" placeholder="Почта" name="email">
                    <?php 
                        $services_list = mysqli_query($conn, "Select * from services");
                        if (!$services_list) {
                            echo "Error";
                        }
                        else {
                            while($service = mysqli_fetch_array($services_list)) {
                                echo '
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="'.$service["idServices"].'" id="services'.$service["idServices"].'" name="services-list[]">
                                    <label class="form-check-label" for="services'.$service["idServices"].'">
                                        '.$service["title"].'
                                    </label>
                                </div>
                                ';
                            }
                        }
                    ?>
                    <input class="order-fields order-fields-btn btn" type="submit" value="Заказать">
                </form>
            </div>
        </div>
    </main>
    <footer id="footer">
        <div class="container">
            <div class="footer-info">
                <div class="logo">
                    <a href="/"><img class="logo-img" src="./images/logo.png"/></a>
                </div>
                <div class="footer-contacts">
                    <div class="contacts-pol cont">
                        <a href=""> Политика конфиденциальности </a>
                    </div>
                    <div class="contacts-instagram cont">
                        <a href=""> Мы в инсте -
                            <img src="./images/instagram.png" alt="">
                        </a>
                    </div>
                    <div class="contacts-vk cont">
                        <a href="https://vk.com/mayton_shop"> Мы в вк -
                            <img src="./images/vk.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php
    if (!empty($_POST['surname']) and !empty($_POST['name']) and !empty($_POST['patronymic']) and !empty($_POST['phone']) and !empty($_POST['email'])) {
        $query_orderInfo = "INSERT INTO `orderinfo` (`idOrder`, `surname`, `name`, `patronymic`, `phone`, `email`, `final_cost`) VALUES (NULL, '".$_POST['surname']."', '".$_POST['name']."', '".$_POST['patronymic']."', '".$_POST['phone']."', '".$_POST['email']."', '10900')";
        $result = mysqli_query($conn, $query_orderInfo);
        $orderId = mysqli_insert_id($conn);
        foreach ($_POST['services-list'] as $key => $value) {
            $query_services = "INSERT INTO `order_services` (`id`, `idOrder`, `idServices`) VALUES (NULL, '".$orderId."', '".$value."')";
            $result_services = mysqli_query($conn, $query_services);
        }
    }
?>

</body>
</html>