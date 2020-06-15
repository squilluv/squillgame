<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Кабинет, <?php echo $user['name']; ?></title>
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
  <div class="view" style="background-image: url('<?php echo User::getImageRec($user['id']); ?>'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <!-- Mask & flexbox options-->
    <div class="mask d-flex justify-content-center align-items-center">
  <div class="container">
<section>
	<div class="container mt-5 my-3">

		<div class="row">
			
			<div class="col-lg-12"><br><br><br><br><br><br><br><br>
			<h1 class="white-text"><strong>Личный кабинет пользователя: <?php echo $user['name']; ?></strong></h1><br><br><br><br><br><br>
			</div>
      
			<div class="col-lg-12">
        <h3 class="white-text pb-5">Не можете выбрать игру? Попробуйте <a href="/random">удачу</a></h3>
      <div class="col-lg-6 text-center">
      <div class="card mt-3 my-3 pt-3">
        <div class="avatar mx-auto">
      <img src="<?php echo User::getImage($user['id']); ?>" class="rounded-circle z-depth-1"
        alt="Sample avatar" style="width: 200px;">
    </div>
      
      <ul>
        <li><h4><b><a href="/cabinet/edit" class="black-text">Редактировать данные</a></b></h4></li>
      
      
      </ul>
      

      </div>
       <div class="card z-depth-3 white pr-4 pl-4">
<h3><strong>Купленные игры</strong></h3>
      <?php foreach($products as $p): ?>
          <a href="/history/<?php echo $p['id'] ?>" class="black-text blue my-2"><?php echo $p['date']; ?> --- <?php  echo Order::getStatusTextForUser($p['status']); ?>
          </a><br>
        <?php endforeach; ?>
                                </div> 
    </div>
			<?php if(self::checkAdmin()){echo "<a href='/admin' class='nav-link white-text'>Зайти в панель администрации</a>";} else {echo "";} ?>
			</div>

		
	</div>
</div><br><br><br><br><br><br><br><br><br>
</section>
    </div>
    <!-- Mask & flexbox options-->
  </div>
  <!-- Full Page Intro -->
</header>