<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Обратная свзяь</title>
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
    html,
    body,
    header,
    .carousel{
      height: 60vh;
    }
    @media(max-width: 740px){
    html,
    body,
    header,
    .carousel{
      height: 100vh;
    }
    @media (min-width: 800px) and (max-width: 850px){
    html,
    body,
    header,
    .carousel{
      height: 100vh;
    }
    }
  }
  </style>
</head>

<body>
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
    <ol class="breadcrumb black lighten-2 ">
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


<div class="bg" style="background-image: url(/template/img/contact.jpg); background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover;">



        <main class="pb-5"><br><br><br><br><br>
  <div class="container">
        <!--Grid row-->
        <div class="row mt-5">
          <!--Grid column-->
          <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
           <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31554.37770896725!2d-166.3070266306487!3d60.376704951538514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5717f12507403345%3A0xc50646347e79cfa!2z0JzQtdC60L7RgNGM0Y7Quiwg0JDQu9GP0YHQutCwLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1545234882574" width="640" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <a class="btn-floating accent-1">
            <i class="fa fa-map-marker"></i>
          </a>
          <p>Mekoryuk, 99630</p>
          <p class="mb-md-0">United States</p>
        </div>
        <div class="col-md-4">
          <a class="btn-floating accent-1">
            <i class="fa fa-phone"></i>
          </a>
          <p>+ 01 456 567 87</p>
          <p class="mb-md-0">Mon - Fri, 8:00-22:00</p>
        </div>
        <div class="col-md-4">
          <a class="btn-floating accent-1">
            <i class="fa fa-envelope"></i>
          </a>
          <p>squilluv@gmail.com</p>
          <p class="mb-0">squill@gmail.com</p>
        </div>
      </div>
          </div>
          <!--Grid column-->
          <!--Grid column-->
          <div class="col-md-6 col-xl-5 mb-4">
            <!--Form-->
            <div class="card wow fadeInRight" data-wow-delay="0.3s">
              <div class="card-body">
                <!--Header-->
                <?php if ($result): ?>
    <p>Сообщение отправлено! Ждите письма на указанный e-mail.</p>
  <?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li> - <?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
      <div class="card col-lg-12">
        <div class="login-form">
          <div class="form-header accent-1 mt-3">
            <h3 class="mt-2 black-text"> <i class="fa fa-envelope"></i> Связаться с нами</h3>
          </div>
          <p class="dark-grey-text"> После отправки сообщения мы ответим вам в пределах 20 минут.</p>
          <form action="#" method="post">
            <div class="md-form">
            <input class="form-control" type="hidden" name="userName" placeholder="" value="<?php echo $userName; ?>">
            <input class="form-control" type="text" name="userRealName" placeholder="Ваше настоящее имя" value="<?php echo $userRealName; ?>">
            <input class="form-control" type="text" name="userEmail" placeholder="E-mal" value="<?php echo $userEmail; ?>">
            </div>
            <textarea class="form-control" name="userComment" value="<?php echo $description; ?>" placeholder="Сообщение"></textarea><br>
            <input type="submit" name="submit" class="btn-black" value="Отправить">

          </form>
        </div>
      </div>
    <?php endif; ?>
              </div>
            </div>
            <!--/.Form-->
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Content -->
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->
</header>
<!-- Main navigation -->
<!--Main Layout-->
