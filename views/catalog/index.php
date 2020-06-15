<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Каталог</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/template/css/modules/bootstrap.min.css" rel="stylesheet">
  <link href="/template/css/modules/mdb.min.css" rel="stylesheet">
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


<div class="bg" style="background-image: url(/template/img/catal.jpg); background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover;">



        <main class="pb-5"><br><br><br><br><br>
        <?php if($user): ?>
<div class="container black card z-depth-3">
<?php else: ?>
  <div class="container white card z-depth-3">
<?php endif; ?>
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
    <section class="text-center my-3">

      <form name="form" action="" method="post" class="text-center">
        <div class="row">
    <div class="col-sm-3">
      <input type="text" name="date_start" class="form-control mb-4" placeholder="Дата издания от:">
      
      <input type="text" name="date_end" class="form-control mb-4" placeholder="Дата издания до:">
    
      </div>
      <div class="col-sm-3">
      <input  name="price_start" class="form-control mb-4" placeholder="Цена от:">
    
      <input type="text" name="price_end" class="form-control mb-4" placeholder="Цена до:">
      </div>
      <div class="col-sm-3">
        <table>
    <tr>
      <select name="order[]" required="" class="white">
        <option value="id DESC">Игры с конца</option>
        <option value="id ASC">Игры, с начала</option>
      
        
        <option value="price ASC">Цена, с дешевых</option>
      
        <option value="price DESC">Цена, с дорогих</option>
      </select>
    </tr>
  </table>

      </div>
      <table>
      <td align="right"><h6>CD PROJEKT RED</h6></td>
      <td>
        <input type="radio" name="developer[]" value="CD PROJEKT RED" />
      </td>
    </tr>
    <tr>
      <td align="right"><h6>Larian Studios  </h6></td>
      <td>
        <input type="radio" name="developer[]" value="Larian Studios" />
      </td>
    </tr>
    <tr>
      <td align="right"><h6>Rockstar North</h6></td>
      <td>
        <input type="radio" name="developer[]" value="Rockstar North" />
      </td>
    </tr>
    <tr>
      <td align="right"><h6>Deck Nine</h6></td>
      <td>
        <input type="radio" name="developer[]" value="Deck Nine" />
      </td>
    </tr>
  </table>

</div>
<div class="text-center"><input type="submit" name="filter" value="Подобрать игру" class="btn btn-black" /></div>
</form>
<h2 class="h1-responsive font-weight-bold text-center my-5">Каталог игр</h2>
<div class="row">
<?php
$db = Db::getConnection();
  function addWhere($where, $add, $and = true) {
    if ($where) {
      if ($and) $where .= " AND $add";
      else $where .= " OR $add";
    }
    else $where = $add;
    return $where;
  }

  function addOrder($order, $add, $and = true) {
    if ($order) {
    }
    else $order = $add;
    return $order;
  }
  ?>

<?php  if (!empty($_POST["filter"])): ?>

<?php    
    $where = "";
    $order = "";
    if ($_POST["date_start"]) $where = addWhere($where, "`date` >= '".htmlspecialchars($_POST["date_start"]))."'";
    if ($_POST["date_end"]) $where = addWhere($where, "`date` <= '".htmlspecialchars($_POST["date_end"]))."'";
    if ($_POST["price_start"]) $where = addWhere($where, "`price` >= '".htmlspecialchars($_POST["price_start"]))."'";
    if ($_POST["price_end"]) $where = addWhere($where, "`price` <= '".htmlspecialchars($_POST["price_end"]))."'";
    if ($_POST["developer"]) $where = addWhere($where, "`developer` LIKE '".htmlspecialchars(implode(",", $_POST["developer"]))."'");
    if ($_POST["order"]) $order = addOrder($order, "ORDER BY ".htmlspecialchars(implode($_POST["order"]))."");
    $sql = "SELECT * FROM product";
    if ($where) $sql .= " WHERE $where";
    if ($order) $sql .= " $order";
    $result = $db->prepare($sql);
        $result->execute();
        ?>

    <?php while ($row = $result->fetch()): ?>
     
      <div class="col-md-3 mb-3 pb-2">
      <div class="card card-image overlay" style="background-image: url(<?php echo Product::getImage($fp['id'] = $row['id']); ?>); background-repeat: no-repeat; background-size: cover;">
        <a href="/game/<?php echo $fp['id'] = $row['id'];?>"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-strong rounded waves-effect waves-light mask" style="height: 350px;">
          <div class="">
            <h6 class="py-3 font-weight-bold white-text">
              <strong><?php echo $fp['name'] = $row['name']; ?></strong>
              <?php if ($fp['is_new'] = $row['is_new']): ?>
                <span class="badge badge-pill danger-color">NEW</span>
                <?php endif; ?>
            </h6>
            <p class="pb-3 text-center"><h2 class="white-text"><strong><?php if ($product['is_sale']): ?><?php endif; ?><?php echo $fp['price'] = $row['price'];?> p.</strong></h2></p>
            <?php if ($fp['is_sale'] = $row['is_sale']): ?><h3 class="white-text font-weight-bold"><strong><del><?php echo $fp['price_sale'] = $row['price_sale'];?> p.</del></strong></h3><?php endif; ?>
            <?php if (User::isGuest()): ?>
              <?php else: ?>
            <?php if($row['is_pre'] == 0): ?>
            <a href="#" data-id="<?php echo $fp['id'] = $row['id']; ?>" class="btn btn-black add-to-cart" ><i class="fa fa-shopping-cart"></i></a>
            <?php else: ?>
              <h3><strong>СКОРО</strong></h3>
            <?php endif; ?>
          <?php endif; ?>
          </div>
        </div></a>
      </div>
      
    </div>
    <?php endwhile; ?>
<?php endif; ?>
</div>


  <?php  if (!empty($_POST["filter"])): ?>
    <?php die; ?>
  <?php endif; ?>
  <div class="row">
    <?php foreach ($latestProducts as $product): ?>
    <div class="col-md-3 mb-3 pb-2">
      <div class="card card-image overlay" style="background-image: url(<?php echo Product::getImage($product['id']); ?>); background-repeat: no-repeat; background-size: cover;">
        <a href="/game/<?php echo $product['id'];?>"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-strong rounded waves-effect waves-light mask" style="height: 350px;">
          <div class="">
            <h6 class="py-3 font-weight-bold white-text">
              <strong><?php echo $product['name'];?></strong>
              <?php if ($product['is_new']): ?>
                <span class="badge badge-pill danger-color">NEW</span>
                <?php endif; ?>
            </h6>
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
</section>
  </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>