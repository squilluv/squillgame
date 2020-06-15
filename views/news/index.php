<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Новости</title>
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


<div class="bg" style="background-image: url(/template/img/news.jpg); background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover">



<main class="pb-5"><br><br><br><br><br>
  <div class="container white card z-depth-3">
    <section class="my-3">
  <h2 class="h1-responsive font-weight-bold text-center my-3">Новости игровой индустрии</h2><br>
  <?php foreach ($newsList as $newsItem): ?>
  <div class="row">
    <div class="col-lg-5 col-xl-4">
      <div class="overlay rounded z-depth-1-half mb-lg-0 mb-4">
        <a href="/news/<?php echo $newsItem['id'] ;?>"><img class="img-fluid" src="<?php echo News::getImage($newsItem['id']); ?>" alt="Sample image"></a>
        <a href="/news/<?php echo $newsItem['id'] ;?>">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
    </div>
    <div class="col-lg-7 col-xl-8">
      <a href="/news/<?php echo $newsItem['id'] ;?>" class="black-text"><h3 class="font-weight-bold mb-3"><strong><?php echo $newsItem['title']; ?></strong></h3></a>
      <p class="dark-grey-text"><?php echo $newsItem['shortcontent']; ?></p>
      <p>by <a class="font-weight-bold"><?php echo $newsItem['autorname']; ?></a>, <?php echo $newsItem['data']; ?></p>
      <a href="/news/<?php echo $newsItem['id'] ;?>" class="btn btn-black btn-md">Подробнее</a>
    </div>
  </div>

  <hr class="my-3">
<?php endforeach ?>
</section>
  </div>
</main>


<?php include ROOT . '/views/layouts/footer.php'; ?>