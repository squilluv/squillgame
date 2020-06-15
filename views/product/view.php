<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $product['name'] ?></title>
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
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
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

  .container-bg {
    background: xxx;
}

/*.container{background: inherit !important;}*/

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


<div class="bg" style="background-image: url(<?php echo Product::getImageRec($product['id']); ?>); background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover;">



      <main class="pb-5"><br><br><br><br><br>
        <div class="container-bg">
  <div class="container white card z-depth-3">
  <nav class="mb-4 navbar navbar-expand-lg navbar-dark black center mt-3">
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
    <?php if (User::isGuest()): ?>
      <div class="col-md-12">
    <div class="black-text card z-depth-2 text-center red-border pt-3">
      <p>Хотите преобрести эту игру?
      <a href="/user/login"><button class="btn btn-white">Войдите</button></a> ИЛИ 
      <a href="/user/register"><button class="btn btn-white">зарегестрируйтесь</button></a></p>
    </div>
  </div>
      <?php else: ?>
<?php endif; ?>
  <div class="container dark-grey-text mt-4 my-2">
    <section class="">
        <div class="row">
          <div class="col-md-6 mb-2">
            <img src="<?php echo Product::getImage($product['id']); ?>" class="img-fluid z-depth-1-half w-100">
          </div>
          <h2></h2>
          <div class="col-md-6 mb-4">
            <h3 class="h3 mb-3"></h3>
             <p><h2 class="font-weight-bold"><?php echo $product['name'];?></h2></p> 
             <?php if ($product['is_new']): ?>
                <span class="badge badge-pill danger-color">NEW</span>
                <?php endif; ?>
             <span><p>
                <h1 class=""><strong><?php if ($product['is_sale']): ?><?php endif; ?><?php if ($product['price']): ?><?php echo $product['price'];?> p.<?php else: ?>Бесплатно<?php endif; ?></strong></h1>
            <?php if ($product['is_sale']): ?><h1 class=" font-weight-bold"><strong><del><?php echo $product['price_sale'];?> p.</del></strong></h1><?php endif; ?>
                <?php if (User::isGuest()): ?>
                  <?php else: ?>
                    <?php if($product['is_pre'] == 0): ?>
            <a href="#" data-id="<?php echo $product['id']; ?>" class="btn btn-black add-to-cart"><i class="fa fa-shopping-cart"></i></a>
            <?php else: ?>
              <h1><strong>СКОРО</strong></h1>
            <?php endif; ?>
              <?php endif; ?>
            </span>
            <p><b>Разработчик: </b><?php echo $product['developer'];?></p>
            <p><b>Издатель: </b><?php echo $product['publisher'];?></p>
            <p><b>Дата издания: </b><?php if ($product['is_pre'] == 1): ?>To Be Annonced<?php else: ?><?php echo $product['date'];?><?php endif; ?></p>
            <p><b>Метка: </b><?php echo Product::getInfo($product['info']); ?></p>
            <p><?php echo $product['series'];?></p>
            <h2><i class="fa fa-thumbs-up"></i><span id="count-like"><?php echo count($likes); ?></span></h2>

              
                <?php if (User::isGuest()): ?>
                <?php else: ?>
                <div class="likeman">
                <?php if($checkLike == 1): ?>
                  
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" class="userId">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" class="productId" >
                <input type="hidden" name="countlike" value="<?php echo $like['countlike']; ?>" class="countlike">
                <a href="#" class="btn btn-black btn-rounded btn-sm submitlike" data-id="<?php echo $product['id']; ?>">like</a>
                
                <?php else: ?>
                  <form action="" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <a href="#" class="btn btn-black btn-rounded btn-sm submitdel" data-id="<?php echo $product['id']; ?>">dis</a>
                </form>
                <?php endif; ?>
                </div>
              <?php endif; ?>
              <script>
                $(document).ready(function(){
                    $(".submitlike").click(function () {
                        var id = $(this).attr("data-id");
                        $.post("/game/addAjax/"+id, {}, function (data) {
                            $("#count-like").html(data);
                            $('a.submitlike').hide();
                            $('a.submitdel').show();
                            $('.likeman').load();
                        });
                        return false;
                    });
                    $(".submitdel").click(function () {
                        var id = $(this).attr("data-id");
                        $.post("/game/delAjax/"+id, {}, function (data) {
                            $("#count-like").html(data);
                            $('a.submitlike').show();
                            $('a.submitdel').hide();
                        });
                        return false;
                    });
                });
              </script>
<div class="card z-depth-3 mt-3 pt-2 pl-2 col-md-9">

                <h6><strong>Общее количество просмотров</strong>: <?=$all; ?></h6>
                <h6><strong>Просмотров за сегодня</strong>: <?=$see; ?></h6>
              </div>

          </div>
          </div>
          <div class="col-sm-12 my-2 pt-2 text-center">
            
          </div>
          <div class="col-sm-9 my-2">
            <table width="100%">
              <tr>
                <td colspan="2"><h4><b>Минимальные системные требования:</b></h4></td>
              </tr>
              <tr>
                <td ><h6><b>Операционная система:</b></td>
                <td ><h6><?php echo $product['os_min'];?></td>
              </tr>
             <tr>
                <td ><h6><b>Процессор:</b></td>
                <td ><h6><?php echo $product['cp_min'];?></td>
              </tr>
              <tr>
                <td ><h6><b>Оперативная память:</b></td>
                <td ><h6>ОЗУ <?php echo $product['op_min'];?> Гб</td>
              </tr>
              <tr>
                <td ><h6><b>Видеокарта:</b></td>
                <td ><h6><?php echo $product['vk_min'];?></td>
              </tr>
              <tr>
                <td ><h6><b>Место на диске:</b></td>
                <td ><h6><?php echo $product['pd_min'];?> Гб</td>
              </tr>
            </table>
          </div>

          <div class="col-sm-9 my-5">
            <table width="100%">
              <tr>
                <td colspan="2"><h4><b>Рекомендованные системные требования:</b></h4></td>
              </tr>
              <tr>
                <td ><h6><b>Операционная система:</b></td>
                <td ><h6><?php echo $product['os_max'];?></td>
              </tr>
             <tr>
                <td ><h6><b>Процессор:</b></td>
                <td ><h6><?php echo $product['cp_max'];?></td>
              </tr>
              <tr>
                <td ><h6><b>Оперативная память:</b></td>
                <td ><h6>ОЗУ <?php echo $product['op_max'];?> Гб</td>
              </tr>
              <tr>
                <td ><h6><b>Видеокарта:</b></td>
                <td ><h6><?php echo $product['vk_max'];?></td>
              </tr>
              <tr>
                <td ><h6><b>Место на диске:</b></td>
                <td ><h6><?php echo $product['pd_max'];?> Гб</td>
              </tr>
            </table>
          </div>

          <div class="col-sm-12 mb-5">
            <h4><b>Описание товара</b></h4>
            <p><h6><?php echo nl2br($product['description']);?></h6></p>
          </div>
          <div>
            <!-- <?php if($product['price'] == 0): ?>
              
              <?php elseif($product['price'] >= 100 and $product['price'] <= 500): ?>
                <?php foreach($productMin as $p): ?>
                <?php echo "<br>" . $p['name']; ?>
              <?php endforeach; ?>
              <?php elseif($product['price'] >= 501 and $product['price'] <= 1000): ?>
                <?php foreach($productMid as $p): ?>
                <?php echo "<br>" . $p['name']; ?>
              <?php endforeach; ?>
              <?php elseif($product['price'] >= 1001 and $product['price'] <= 3000): ?>
                <?php foreach($productMax as $p): ?>
                <?php echo "<br>" . $p['name']; ?>
              <?php endforeach; ?>
            <?php endif; ?> -->

          </div>
          <h2 class="h1-responsive font-weight-bold text-center my-5">Похожие игры</h2>
            <section class="text-center wow">
              <div class="row">
                <?php foreach($looksProductLikeLimit as $lpl): ?>
                <div class="col-md-3 mb-3">
                  <div class="card card-image overlay" style="background-image: url(<?php echo Product::getImage($lpl['id']); ?>); background-repeat: no-repeat; background-size: cover;">
                    <a href="/game/<?php echo $lpl['id'];?>"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-strong rounded waves-effect waves-light mask" style="height: 350px;">
                      <div class="">
                        <h5 class="py-3 font-weight-bold white-text">
                          <strong><?php echo $lpl['name'];?></strong>
                        </h5>
                        <p class="pb-3 text-center"><h2 class="white-text"><strong><?php if ($lpl['is_sale']): ?><?php endif; ?><?php if ($lpl['price']): ?><?php echo $lpl['price'];?> p.<?php else: ?>Бесплатно<?php endif; ?></strong></h2></p>
                        <?php if ($lpl['is_sale']): ?><h3 class="white-text font-weight-bold"><strong><del><?php echo $lpl['price_sale'];?> p.</del></strong></h3><?php endif; ?>
                        <?php if (User::isGuest()): ?>
                          <?php else: ?>
                      <?php endif; ?>
                      </div>
                    </div></a>
                  </div>
                  
                </div>
            <?php endforeach; ?>
              </div>
              <script>
                function disp(form) {
                    if (form.style.display == "none") {
                        form.style.display = "block";
                    } else {
                        form.style.display = "none";
                    }
                }
                </script>
              <section class="text-center">
                <input class="btn btn-black mb-4" type="button" onclick="disp(document.getElementById('form1dfsdfsd111'))" value="Показать больше / скрыть">
              </section>
            </section>
                  <div id="form1dfsdfsd111" style="display: none;">
                  <div class="row">
                  <?php foreach($looksProductLike as $lpl): ?>
                <div class="col-md-3 mb-3 pb-4">
                  <div class="card card-image overlay" style="background-image: url(<?php echo Product::getImage($lpl['id']); ?>); background-repeat: no-repeat; background-size: cover;">
                    <a href="/game/<?php echo $lpl['id'];?>"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-strong rounded waves-effect waves-light mask" style="height: 350px;">
                      <div class="">
                        <h5 class="py-3 font-weight-bold white-text">
                          <strong><?php echo $lpl['name'];?></strong>
                        </h5>
                        <p class="pb-3 text-center"><h2 class="white-text"><strong><?php if ($lpl['is_sale']): ?><?php endif; ?><?php if ($lpl['price']): ?><?php echo $lpl['price'];?> p.<?php else: ?>Бесплатно<?php endif; ?></strong></h2></p>
                        <?php if ($lpl['is_sale']): ?><h3 class="white-text font-weight-bold"><strong><del><?php echo $lpl['price_sale'];?> p.</del></strong></h3><?php endif; ?>
                        <?php if (User::isGuest()): ?>
                          <?php else: ?>
                      <?php endif; ?>
                      </div>
                    </div></a>
                  </div>
                  
                </div>
            <?php endforeach; ?>
                  </div>
                  </div>
            </div>
        
          <script>
            
          </script>

          <div class="col-sm-12">
            <center><h4><b>Отзывы</b></h4></center>
          </div>
           <div class="card-body">
            <a class="dark-grey-text"><strong>Написать отзыв</strong></a>
            <?php if ($result): ?>
              <p>Комментарий успешно отправлен.</p>
              <?php else: ?>
        <?php if (isset($errorsCom) && is_array($errorsCom)): ?>
          <ul>
            <?php foreach ($errorsCom as $errorCom): ?>
              <li> - <?php echo $errorCom; ?></li>
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
              <div class="md-form">
              <input type="text" name="good" id="defaultLoginFormPassword" class="form-control mt-1"  placeholder="Достоинства*" value="<?php echo $good; ?>">
              <input type="text" name="bad" placeholder="Недостатки*" value="<?php echo $bad; ?>" id="defaultLoginFormPassword" class="form-control mt-1" >
              
              <textarea rows="3" type="commentt" name="commentt" placeholder="Комментарий" value="<?php echo $commentt; ?>" id="defaultLoginFormPassword" class="form-control mt-1"  ></textarea>
              </div>
              <input type="hidden" name="data" placeholder="Дата" value="<?php echo $data; ?>">
              <input type="hidden" name="products_id" placeholder="products_id" value="<?php echo $products_id; ?>">
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
            <p class="card-text"><i class="fa fa-plus"></i> <?php echo $comment['good'];?></p>
            <p class="card-text"><i class="fa fa-minus"></i> <?php echo $comment['bad'];?></p>
            <p class="card-text"><?php echo $comment['comment'];?></p>
            <p class="card-meta"><?php echo $comment['data'];?></p>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

        
<?php include ROOT . '/views/layouts/footer.php'; ?>