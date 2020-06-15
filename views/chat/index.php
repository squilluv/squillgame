<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Общий чат</title>
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


<div class="bg" style="background-image: url(/template/img/chatindex.jpg); background-repeat: repeat-y, repeat-y; background-position: left, right; background-attachment: fixed, fixed; background-size: cover;">



        <main class="pb-5"><br><br><br><br><br>
  <div class="container white card z-depth-3">
  <!-- Section: Social newsfeed v.2 -->
<section class="my-5">

<!-- Grid row -->
<div class="row">
  <!-- Grid column -->
  <div class="col-sm-12">

    <!-- Newsfeed -->
    <div class="mdb-feed">
    <div class="card col-sm-9 mb-5">
    <div class="card-body col-sm-12">
          <div class="signup-form">
            <div class="md-form">
            <form action="" method="post">
              <input type="hidden" name="user_id" placeholder="Имя" value="<?php echo $user['id'];?>" class="user_id">
              
              <textarea rows="3" type="text" name="text" placeholder="Написать"  id="defaultLoginFormPassword" class="form-control mt-1 textAjax"  ></textarea>
              </div>
              <a href="#" class="btn btn-black btn-block submit" data-id="<?php echo $user['id']; ?>">Написать</a>
            </form>

          </div>
        </div>
        </div>
      <hr class="mb-3"><br>
      <?php foreach($chatLines as $line): ?>
      <div class="news">

        <!-- Label -->
        <div class="label">
          <img src="<?php echo User::getImage($line['user_id']); ?>" class="rounded-circle z-depth-1-half">
        </div>

        <!-- Excerpt -->
        <div class="excerpt">
          <!-- Brief -->
          <div class="brief">
            <a class="name" href="/user/<?php echo $line['user_id']; ?>"><?php echo $line['name']; ?></a>
            <div class="date"><?php echo $line['date']; ?></div>
          </div>
          <!-- Added text -->
          <div class="added-text"><?php echo $line['text']; ?></div>
        </div>

      </div>
      <?php endforeach; ?>
      <!-- Fifth news -->
      <script>
        $(document).ready(function(){
          $(".submit").click(function () {
              var id = $(this).attr("data-id");
              var text = $('textarea.textAjax');
              $.post("/chatr/createchatline", {user_id: id, text: text}, function () {
                  console.log("df");
              });
              return false;
          });
        });
      </script>
    </div>
    <!-- Newsfeed -->

  </div>
  <!-- Grid column -->

</div>
<!-- Grid row -->

</section>
<!-- Section: Social newsfeed v.2 -->

  </div>
</main>

<?php include ROOT . '/views/layouts/footer.php'; ?>