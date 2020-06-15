<?php include ROOT . '/views/layouts/header.php'; ?>
</style>
<main class="pb-5"> <br><br><br><br><br>
<?php if($user): ?>
<div class="container white card z-depth-3">
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

    <section class="text-center wow">
  <div class="row">
    <div class="col-md-12 mb-3 pb-2">
      <div class="card card-image overlay" style="background-image: url('/template/img/po.jpg'); background-repeat: no-repeat; background-size: cover;">
        <a href="/search"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-strong rounded waves-effect waves-light" style="height: 350px;">
          <div class="">
            <h2 class="py-3 font-weight-bold white-text">
              <strong>Поиск игры</strong>
            </h2>
          </div>
        </div></a>
      </div>
      
    </div>
  </div>
</section>
    <section class="text-center my-3 wow zoomIn">

<h2 class="h1-responsive font-weight-bold text-center my-5">Рекомендованные</h2>
<?php if ($detect->isMobile()): ?>
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height:200px;">
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="/template/img/main/witcher1.jpg" alt="slide">
        <a href="/game/9"><div class="mask"></div></a>
      </div>
      <div class="carousel-caption">
        <a href="/game/9" class="text-white"><h3 class="h3-responsive font-weight-bold">The Witcher 1</h3></a>
        <a href="/game/9" class="text-white font-weight-bold"><p>450 р.</p></a>
      </div>
    </div>
    <?php foreach ($recProducts as $recProduct): ?>
      <?php if ($recProduct['is_recommended']): ?>
    <div class="carousel-item">
      <div class="view">
        <img class="d-block w-100" src="<?php echo Product::getImageRec($recProduct['id']); ?>" alt="slide" >
        <a href="/game/<?php echo $recProduct['id'];?>"><div class="mask"></div></a>
      </div>
      <div class="carousel-caption">
        <a href="/game/<?php echo $recProduct['id'];?>" class="text-white"><h3 class="h3-responsive font-weight-bold"><?php echo $recProduct['name'];?></h3></a>
        <a href="/game/<?php echo $recProduct['id'];?>" class="text-white font-weight-bold"><p><?php echo $recProduct['price'];?> р.</p></a>
      </div>
    </div>
  <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php else: ?>
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="height:600px;">
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="/template/img/main/witcher1.jpg" alt="slide">
        <a href="/game/9"><div class="mask pattern-7"></div></a>
      </div>
      <div class="carousel-caption">
        <a href="/game/9" class="text-white"><h3 class="h3-responsive font-weight-bold">The Witcher 1</h3></a>
        <a href="/game/9" class="text-white font-weight-bold"><p>450 р.</p></a>
      </div>
    </div>
    <?php foreach ($recProducts as $recProduct): ?>
      <?php if ($recProduct['is_recommended']): ?>
    <div class="carousel-item">
      <div class="view">
        <img class="d-block w-100" src="<?php echo Product::getImageRec($recProduct['id']); ?>" alt="slide" >
        <a href="/game/<?php echo $recProduct['id'];?>"><div class="mask pattern-7"></div></a>
      </div>
      <div class="carousel-caption">
        <a href="/game/<?php echo $recProduct['id'];?>" class="text-white"><h3 class="h3-responsive font-weight-bold"><?php echo $recProduct['name'];?></h3></a>
        <a href="/game/<?php echo $recProduct['id'];?>" class="text-white font-weight-bold"><p><?php echo $recProduct['price'];?> р.</p></a>
      </div>
    </div>
  <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>
</section>
  
  <!-- <h2 class="h1-responsive font-weight-bold text-center my-5">Понравившиеся</h2>
  
<section class="text-center wow">
  <div class="row">
    <?php foreach ($likeProducts as $product): ?>
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
</section> -->

<!-- <h2 class="h1-responsive font-weight-bold text-center my-5">Наиболее просматриваемые</h2>
  
<section class="text-center wow">
  <div class="row">
    <?php foreach ($lookProducts as $product): ?>
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
</section> -->

  <h2 class="h1-responsive font-weight-bold text-center my-5">Последние игры</h2>
  
<section class="text-center wow">
  <div class="row">
    <?php foreach ($latestProducts as $product): ?>
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
</section>
<br><br>
<section class="text-center wow">
  <div class="row">
    <div class="col-md-12 mb-5 pb-2">
      <div class="card card-image overlay" style="background-image: url(/template/img/grand_theft_auto_v_gta_5_vertolet_nebo_zdaniya_108437_3840x2160.jpg); background-repeat: no-repeat; background-size: cover;">
        <a href="/preorder"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-light rounded waves-effect waves-light" style="height: 350px;">
          <div class="">
            <h2 class="py-3 font-weight-bold white-text">
              <strong>Предзаказы</strong>
            </h2>
          </div>
        </div></a>
      </div>
      
    </div>
  </div>
</section>

<section class="text-center wow">
  <div class="row">
    <div class="col-md-12 mb-5 pb-2">
      <div class="card card-image overlay" style="background-image: url(/template/img/call_of_duty_black_ops_iii_robot_113570_3840x2160.jpg); background-repeat: no-repeat; background-size: cover;">
        <a href="/sale"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-light rounded waves-effect waves-light" style="height: 350px;">
          <div class="">
            <h2 class="py-3 font-weight-bold white-text">
              <strong>Скидки</strong>
            </h2>
          </div>
        </div></a>
      </div>
      
    </div>
  </div>
</section>

<section class="text-center wow">
  <div class="row">
    <div class="col-md-12 mb-5 pb-2">
      <div class="card card-image overlay" style="background-image: url(/template/img/seri.jpg); background-repeat: no-repeat; background-size: cover;">
        <a href="/series"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-light rounded waves-effect waves-light" style="height: 350px;">
          <div class="">
            <h2 class="py-3 font-weight-bold white-text">
              <strong>Серии игр</strong>
            </h2>
          </div>
        </div></a>
      </div>
      
    </div>
  </div>
</section>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php if($user): ?>
<div class="container white card z-depth-3">
<?php else: ?>
  <div class="container white card z-depth-3">
<?php endif; ?>
<section class="text-center my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Рекомендуемые метки</h2>

  <!-- Grid row -->
  <div class="row">
<?php foreach($recs as $rec): ?>
    <!-- Grid column -->
    <div class="col-lg-6 col-md-6 mb-lg-0 mb-4 my-4">
      <!-- Collection card -->
      <div class="card collection-card z-depth-1-half">
        <!-- Card image -->
        <div class="view zoom">
          <img src="<?php echo Recomended::getImage($rec['id']); ?>" class="img-fluid"
            alt=""  style="height: 350px;">
          <div class="stripe dark">
            <a href="/recomended/<?php echo $rec['id']; ?>">
              <p><?php echo $rec['name']; ?>
              </p>
            </a>
          </div>
        </div>
        <!-- Card image -->
      </div>
      <!-- Collection card -->
    </div>
    <!-- Grid column -->
<?php endforeach; ?>



  </div>
  <!-- Grid row -->

</section>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <?php if($user): ?>
<div class="container white card z-depth-3">
<?php else: ?>
  <div class="container white card z-depth-3">
<?php endif; ?>
  <section class="text-center wow mt-5">
  <div class="row">
    <div class="col-md-12 mb-5 pb-2">
      <div class="card card-image overlay" style="background-image: url(/template/img/rand.jpg); background-repeat: no-repeat; background-size: cover;">
        <a href="/random"><div class="text-white text-center align-items-center py-5 px-4 rgba-black-light rounded waves-effect waves-light" style="height: 350px;">
          <div class="">
            <h2 class="py-3 font-weight-bold white-text">
              <strong>Не можете подобрать игру? Попробуйте удачу</strong>
            </h2>
          </div>
        </div></a>
      </div>
      
    </div>
  </div>
</section>
</div>
</main>



<?php include ROOT . '/views/layouts/footer.php'; ?>