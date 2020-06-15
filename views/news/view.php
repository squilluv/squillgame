<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $newsItem['title']; ?></title>
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


<div class="bg" style="background-image: url(<?php echo News::getImage($newsItem['id']); ?>); background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover">



<main class="pb-5"><br><br><br><br><br>
  <div class="container white card z-depth-3">
    <section class="my-3">
      <hr class="mb-3 mt-2">

  <div class="row">

    <div class="col-md-12">
<p class="mt-2"><a class="black-text" href="/">Главная страница</a> / <a class="black-text" href="/news">Новости</a> / <?php echo $newsItem['title'];?></p>
      <div class="card card-cascade wider reverse">
      
        <div class="view view-cascade overlay">
          <img class="card-img-top" src="<?php echo News::getImage($newsItem['id']); ?>" alt="Sample image">
            <div class="mask rgba-white-slight"></div>
        </div>

        <div class="card-body card-body-cascade text-center">

          <h2 class="font-weight-bold"><a><?php echo $newsItem['title']; ?></a></h2>
          <p>by <a><strong><?php echo $newsItem['autorname']; ?></strong></a>, <?php echo $newsItem['data']; ?></p>

        </div>

      </div>
      
      <div class="mt-5">

        <p><?php echo nl2br($newsItem['content']); ?></p>

      </div>
      <div  class="text-right">
<p><h5><strong><a href="/news/" class="black-text">Обратно к новостям</strong></a><h5></p>
</div>
<div class="col-sm-12">
            <center><h4><b>Комментарии</b></h4></center>
          </div>
           <div class="card-body">
            <a class="dark-grey-text"><strong>Написать отзыв</strong></a>
            <?php if ($result): ?>
              <p>Комментарий успешно отправлен.</p>
              <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
          <ul>
            <?php foreach ($errors as $error): ?>
              <li> - <?php echo $error; ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <?php if (User::isGuest()): ?>
          <?php else: ?>
            <div class="card  col-sm-6">
        <div class="card-body">
        <div class="signup-form">
            <form action="" method="post">
              <input type="hidden" name="name" placeholder="Имя" value="<?php echo $name; ?>">
              <textarea rows="3" type="commentt" name="commentt" placeholder="Комментарий" value="<?php echo $commentt; ?>" class="white"></textarea>
              <input type="hidden" name="data" placeholder="Дата" value="<?php echo $data; ?>">
              <input type="hidden" name="news_id" placeholder="news_id" value="<?php echo $news_id; ?>">
              <input class="btn btn-black btn-block" type="submit" name="submit" placeholder="Отправить" value="Отправить">
            </form>
          </div>
        </div>
      </div>
        <?php endif; ?>
            <?php endif; ?>
            <?php foreach ($LatestComments as $comment): ?>
            <hr>
            
            <a>
              <h5 class="card-title"><?php echo $comment['name'];?></h5>
            </a>
            <p class="card-text"><?php echo $comment['comment'];?></p>
            <p class="card-meta"><?php echo $comment['data'];?></p>
            <?php endforeach; ?>
          </div>
    </div>


  </div>

  <hr class="mb-3 mt-4">

</section>
  </div>
</main>


<?php include ROOT . '/views/layouts/footer.php'; ?>