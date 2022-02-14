<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
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
                        <a href="#adventage" class="btn"><li>Главная</li></a>
                        <a href="#services" class="btn"><li>Услуги</li></a>
                        <a href="#reviews" class="btn"><li>Отзывы</li></a>
                        <a href="#checkout" class="btn"><li>Оформить заказ</li></a>
                    </ul>
                </nav>
            </section>
            <section id="main-slider">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="./images/slide1.jpg">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="./images/slide2.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/slide3.jpg">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </section>
        </div>
        <section id="adventage">
            <div class="container">
                <h1 class="darkbg">Преимущества компании</h1>
                <div class="adventage-blocks">
                    <div class="block">
                        <div class="info-block">
                            <img src="./images/adventage1.png">
                            <p>У нас работают профессионалы!</p>
                        </div>
                    </div>
                    <div class="block">
                        <div class="info-block">
                            <img src="./images/adventage2.png">
                            <p>Доступные цены!</p>
                        </div>
                    </div>
                    <div class="block">
                        <div class="info-block">
                            <img src="./images/adventage3.png">
                            <p>Мы работаем, а вы отдыхаете!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="services">
            <div class="container">
                <h1>Услуги</h1>
                <div class="services-wrapper">
                    <div class="service">
                        <h4 class="service-title">Самые зажигательные корпоративы</h4>
                        <p class="service-info">Корпоративные вечеринки на День Рождения фирмы — важнейшая часть корпоративной культуры любой организации. Общение с коллегами в неформальной обстановке улучшает атмосферу в коллективе и способствует укреплению отношений в команде.</p>
                    </div>
                    <div class="service">
                        <h4 class="service-title">Проведение юбилеев</h4>
                        <p class="service-info">Чтобы Ваш юбилей могли долго вспоминать члены семьи и друзья, закажите профессиональную фотосъемку и видеосъемку. Фотографы и операторы, с которыми у нас налажено сотрудничество, имеют опыт и все необходимое оборудование, чтобы Вы получили отличные кадры праздника.</p>
                    </div>
                    <div class="service">
                        <h4 class="service-title">Оригинальная свадьба под ключ</h4>
                        <p class="service-info">Мы предлагаем организацию и проведение свадьбы в Уфе на высоком профессиональном уровне. Воплощая любые ваши задумки, мы готовы реализовать разнообразные замыслы - от самых привычных до грандиозных и нестандартных свадеб.</p>
                    </div>
                </div>
                <a class="more-info-btn btn" href="/catalog.php">Посмотреть больше</a>
            </div>
        </section>
        <section id="reviews">
            <div class="container">
                <h1 class="darkbg">Отзывы</h1>
                <div class="reviews-wrapper">
                    <div class="review">
                        <div class="review-image review-image-1"></div>
                        <div class="review-content">
                            <div class="review-name"><h4>Кожевников Захар Батькович</h4></div>
                            <div class="review-text">Заказали корпоратив, все прошло замечательно, планируем отметить день рождение)</div>
                        </div>
                    </div>
                    <div class="review">
                        <div class="review-image review-image-2"></div>
                        <div class="review-content">
                            <div class="review-name"><h4>Джейсон Стейтем</h4></div>
                            <div class="review-text">Свадьба просто класс, кто не верит ...</div>
                        </div>
                    </div>
                    <div class="review">
                        <div class="review-image review-image-3"></div>
                        <div class="review-content">
                            <div class="review-name"><h4>Вин Дизель</h4></div>
                            <div class="review-text">Моя семья не отвернулась от вас</div>
                        </div>
                    </div>
                    <div class="review">
                        <div class="review-image review-image-4"></div>
                        <div class="review-content">
                            <div class="review-name"><h4>Мишель Родригес</h4></div>
                            <div class="review-text">Вин прав</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="checkout">
            <div class="container">
                <h1>Закажите лучший праздник в вашей жизни сейчас</h1>
                <a href="/order.php" class="btn checkout-btn">Сделать заказ</a>
            </div>
        </section>
    </main>
    <footer id="footer">
        <div class="container">
            <div class="footer-info">
                <div class="logo">
                    <a href="/"><img class="logo-img" src="./images/logo.png"/></a>
                </div>
                <div class="footer-contacts">
                    <div class="contacts-pol cont">
                        <a href=""> Политика конфиденциальности 
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