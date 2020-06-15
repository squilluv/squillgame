<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Сообщение</li>
                </ol>
            </div>


            <h4>Сообщение пользователю</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Пользователи</p>
                        <select name="userEmail">
                            <?php if (is_array($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?php echo $user['email']; ?>">
                                        <?php echo $user['email']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <p>Сообщение</p>
                        <input type="text" name="message">

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                        <?php
                        if (isset($_POST['submit'])){
                        
  $to = "miasse@yandex.ru";
  $subject = "Robot - Робот";
  $message = "Hello World!<br /><i>Это письмо отправлено <b>роботом</b> 
  и отвечать на него не нужно!</i>";
  $headers = "From: MyRusakov.ru ";
  mail ($to, $subject, $message, $headers);

                        }?>
                </div>
            </div>

        </div>
    </div>
</section>

