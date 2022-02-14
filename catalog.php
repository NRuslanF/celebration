<? 
    $conn = mysqli_connect("localhost","root","root","celebration");
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
            <section id="nav-section">
                <nav class="navigation">
                    <ul>
                        <a href="/" class="btn"><li>На главную</li></a>
                        <a href="#services" class="btn"><li>Услуги</li></a>
                        <a href="/order.php" class="btn"><li>Оформить заказ</li></a>
                    </ul>
                </nav>
            </section>
            <section id="information-block"> 
                <h1>Исполните мечты ребенка - подарите ему сказку</h1>
                <h3>Организуем детский праздник всего от 3000 руб</h3>
                <a href="/order.php" class="buy greenBtn btn">Заказать</a>
            </section>
            <section id="services">
                <div class="container">
                    <div class="services-title">
                        <h1>Услуги</h1>
                    </div>
                    <div class="services-wrapper">
                        <?
                            $page = empty($_GET["page"])?1:$_GET["page"];

                            $start_post=$page*2-2;
                            $posts_list = mysqli_query($conn, "SELECT * FROM services LIMIT $start_post,3");
                            $posts_count = mysqli_fetch_array(mysqli_query($conn, "SELECT count(*) FROM services"));
                            if (!$posts_list) {
                                echo "Error";
                            }
                            else {
                                while($service = mysqli_fetch_array($posts_list)) {
                                    if (!empty($service['image'])) {
                                        $image = $service['image'];
                                    }
                                    else {
                                        $image = 'images/NoCamera.png';
                                    }
                                    echo '
                                    <div class="service">
                                        <img src="'.$image.'" alt="">
                                        <h4 class="service-title">'.$service['title'].'</h4>
                                        <p class="service-info">'.$service['cost'].' руб.</p>
                                        <a class="more-info-btn btn" href="/order.php">Заказать</a>
                                    </div>
                                    ';
                                }
                            }
				        ?>
                    </div>			
                    <div class="pag">
                        <div class="pagination">
                            <?php
                                $page = empty($_GET["page"])?1:$_GET["page"];
                                for($i=0;$i<ceil($posts_count[0]/2);$i++){
                                    $page_num = $i+1;
                                    if ($page == $page_num) {
                                        echo "<li><a class='pagin activePage' href='?page=$page_num#services'>$page_num</a></li>";
                                    }
                                    else {
                                        echo "<li><a class='pagin' href='?page=$page_num#services'>$page_num</a></li>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
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
</body>
</html>