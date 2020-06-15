


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Формирование заказа</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/template/css/bootstrap.min.css" rel="stylesheet">
  <link href="/template/css/mdb.min.css" rel="stylesheet">
  <link href="/template/css/style.css" rel="stylesheet">
  <link href="/template/css/font-awesome.min.css" rel="stylesheet">
  <link href="/template/css/prettyPhoto.css" rel="stylesheet">
  <link href="/template/css/price-range.css" rel="stylesheet">
  <link href="/template/css/animate.css" rel="stylesheet">
  <link href="/template/css/main.css" rel="stylesheet">
  <link href="/template/css/responsive.css" rel="stylesheet">     
  <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="/template/images/ico/favicon.ico">
  <style>
    /* Required for full background image */

html,
body,
header,
.view {
height: 100%;
}

@media (max-width: 740px) {
html,
body,
header,
.view {
height: 1000px;
}
}
@media (min-width: 800px) and (max-width: 850px) {
html,
body,
header,
.view {
height: 650px;
}
}

.top-nav-collapse {
background-color: #000 !important;
}

.navbar:not(.top-nav-collapse) {
background: transparent !important;
}

@media (max-width: 991px) {
.navbar:not(.top-nav-collapse) {
background: #000 !important;
}
}

.rgba-gradient {
background: -webkit-linear-gradient(45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
background: -webkit-gradient(linear, 45deg, from(rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%)));
background: linear-gradient(to 45deg, rgba(0, 0, 0, 0.7), rgba(72, 15, 144, 0.4) 100%);
}



.md-form label {
color: #ffffff;
}

h6 {
line-height: 1.7;
}
  </style>
</head>

<body>




<header>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark black scrolling-navbar">
  <a class="navbar-brand" href="/">SquillGame</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/catalog">Каталог игр</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contacts">Контакты</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/news">Новости</a>
      </li>
    </ul>
    <ol class="breadcrumb lighten-2 ">
      <?php if (User::isGuest()): ?>
      <li><a href="/user/login" class="white-text mx-2"><i class="fa fa-lock"></i> Вход</a></li>
      <?php else: ?>
        <li><a href="/cart" class="white-text mx-2"><i class="fa fa-shopping-cart"></i> Корзина</a><span class="white-text pr-3" id="cart-count"><?php echo Cart::countItems(); ?></span></li>
        <li><a href="/wishlist" class="white-text mx-2"><i class="fa fa-heart"></i> Понравившиеся</a></li>
      <li><a href="/cabinet" class="white-text mx-2"><i class="fa fa-user"></i> Аккаунт</a></li>
      <li><a href="/user/logout" class="white-text mx-2"><i class="fa fa-unlock"></i> Выход</a></li>
      <?php endif; ?>
    </ol>
  </div>
</nav>

  <!-- Navbar -->
  <!-- Full Page Intro -->
  <div class="view" style="background-image: url('/template/img/cart.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row my-3">
      <div class="col-sm-3"></div>
      <div class="col col-sm-6 padding-right ml-5">
        <h1 class="title text-center mt-4 white-text">Корзина</h1>


                    <?php if ($result): ?>
                        <h3 class="white-text"><p>Заказ оформлен. Мы Вам перезвоним.</p></h3>
                    <?php else: ?>

                        <h3 class="white-text"><p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, р.</p></h3><br/>

                        <?php if (!$result): ?>                        

                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="card">
                <div class="card-body">
                <div class="signup-form">
                    <h2>Для оформления заказа заполните форму. Наш администратор свяжется с Вами.</h2>
                                    <form action="#" method="post">
                                        <input type="hidden" name="userName" placeholder="" value="<?php echo $userName; ?>">
                                        <input type="text" name="userPhone"  class="mask-phone" placeholder="Телефон" value="<?php echo $userPhone; ?>">
                                        <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>">
                                        <input type="submit" name="submit" class="btn btn-black" value="Оформить">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                                </div>

                        <?php endif; ?>

                    <?php endif; ?>

      </div>
      <div class="col-sm-3"></div>
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->
</header>


<?php include_once ROOT . '/views/layouts/footer.php'; ?>