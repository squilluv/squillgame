<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SquillGame</title>
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
<nav class="navbar fixed-top navbar-expand-lg navbar-dark black scrolling-navbar wow fadeIn">
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


<div class="bg" style="background-image: url(/template/img/look.jpg); background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover;
 ">

<?php //background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover; ?>


</style>
<main class="pb-5"> <br><br><br><br><br>
  <div class="container white card z-depth-3">
    <nav class="mb-5 navbar navbar-expand-lg navbar-dark black center mt-3">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse center" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Категории
        </a>
        <div class="dropdown-menu dropdown-white black" aria-labelledby="navbarDropdownMenuLink-333">
          <?php foreach ($categories as $categoryItem): ?>
          <a class="dropdown-item white-text" href="/category/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name'];?></a>
        <?php endforeach; ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Метки
        </a>
        <div class="dropdown-menu dropdown-white black" aria-labelledby="navbarDropdownMenuLink-333">
          <?php foreach ($tegs as $teg): ?>
          <a class="dropdown-item white-text" href="/teg/<?php echo $teg['id']; ?>"><?php echo $teg['name'];?></a>
        <?php endforeach; ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/preorder">Предзаказы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sale">Скидки</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/recomended">Рекомендации</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/series">Серии игр</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/frequented">Часто посещаемые</a>
      </li>
    </ul>
    <form class="form-inline my-1" action="/search/result" method="post">
    <div class="md-form form-sm my-0">
      <input class="form-control form-control-sm mr-sm-2 mb-0" type="text" name="name" placeholder="Введите название">
    </div>
    <input class="btn btn-outline-white btn-sm my-0" type="submit" name="submit" value="Найти">
  </form>
  </div>
</nav>
<section>
          <div class="row">
            <div class="col-12">
              <ul class="nav md-tabs nav-justified white lighten-3 mx-0" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active  font-weight-bold black-text" data-toggle="tab" href="#panel5"
                    role="tab">Часто посещаемые за всё время</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  font-weight-bold black-text" data-toggle="tab" href="#panel6" role="tab">Часто посещаемые за сегодня</a>
                </li>
              </ul>
                <div class="tab-content px-0">
                <div class="tab-pane fade in show active " id="panel5" role="tabpanel">
                  <div class="row">
                  <?php foreach ($lookAllProducts as $product): ?>
                  <div class="col-md-3 mb-3 pb-4">
                  <div class="card card-image overlay" style="background-image: url(<?php echo Product::getImage($product['id']); ?>); background-repeat: no-repeat; background-size: cover;">
                  <a href="/game/<?php echo $product['id'];?>"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-strong rounded waves-effect waves-light mask" style="height: 350px;">
                  <div class="">
                  <h5 class="py-3 font-weight-bold white-text">
                  <strong><?php echo $product['name'];?></strong>
                  <?php if ($product['is_new']): ?>
                  <span class="badge badge-pill danger-color">NEW</span>
                  <?php endif; ?>
                  </h5>
                  <p class="pb-3 text-center"><h2 class="white-text"><strong><?php if ($product['is_sale']): ?><?php endif; ?><?php if ($product['price']): ?><?php echo $product['price'];?> p.<?php else: ?>Бесплатно<?php endif; ?></strong></h2></p>
                  <?php if ($product['is_sale']): ?><h3 class="white-text font-weight-bold"><strong><del><?php echo $product['price_sale'];?> p.</del></strong></h3><?php endif; ?>
                  <?php if (User::isGuest()): ?>
                  <?php else: ?>
                  <?php if($product['is_pre'] == 0): ?>
                  <a href="#" data-id="<?php echo $product['id']; ?>" class="btn btn-black add-to-cart" ><i class="fa fa-shopping-cart"></i></a>
                  <?php else: ?>
                  <h3><strong>СКОРО</strong></h3>
                  <?php endif; ?>
                  <?php endif; ?>
                  </div>
                  </div></a>
                  </div>

                  </div>
                  <?php endforeach; ?>
                  </div>
              </div>
              <div class="tab-pane fade" id="panel6" role="tabpanel">
                  <div class="row">
                  <?php foreach ($lookTodayProducts as $product): ?>
                  <div class="col-md-3 mb-3 pb-4">
                  <div class="card card-image overlay" style="background-image: url(<?php echo Product::getImage($product['id']); ?>); background-repeat: no-repeat; background-size: cover;">
                  <a href="/game/<?php echo $product['id'];?>"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-strong rounded waves-effect waves-light mask" style="height: 350px;">
                  <div class="">
                  <h5 class="py-3 font-weight-bold white-text">
                  <strong><?php echo $product['name'];?></strong>
                  <?php if ($product['is_new']): ?>
                  <span class="badge badge-pill danger-color">NEW</span>
                  <?php endif; ?>
                  </h5>
                  <p class="pb-3 text-center"><h2 class="white-text"><strong><?php if ($product['is_sale']): ?><?php endif; ?><?php if ($product['price']): ?><?php echo $product['price'];?> p.<?php else: ?>Бесплатно<?php endif; ?></strong></h2></p>
                  <?php if ($product['is_sale']): ?><h3 class="white-text font-weight-bold"><strong><del><?php echo $product['price_sale'];?> p.</del></strong></h3><?php endif; ?>
                  <?php if (User::isGuest()): ?>
                  <?php else: ?>
                  <?php if($product['is_pre'] == 0): ?>
                  <a href="#" data-id="<?php echo $product['id']; ?>" class="btn btn-black add-to-cart" ><i class="fa fa-shopping-cart"></i></a>
                  <?php else: ?>
                  <h3><strong>СКОРО</strong></h3>
                  <?php endif; ?>
                  <?php endif; ?>
                  </div>
                  </div></a>
                  </div>

                  </div>
                  <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




<?php include ROOT . '/views/layouts/footer.php'; ?>