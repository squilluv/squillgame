<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/news">Управление news</a></li>
                    <li class="active">Создать новость</li>
                </ol>
            </div>


            <h4>Добавить новость</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        
                        <input type="text" name="title" placeholder="title" value="">
                        <p>Short</p>
                        <textarea name="shortcontent" value="<?php echo $newsItem['shortcontent']; ?>"></textarea>

                        <p>Cont</p>
                        <textarea name="content" value="<?php echo $newsItem['content']; ?>" rows="7"></textarea>

                        <input type="text" name="autorname" placeholder="name" value="">
                        <input type="date" name="data" placeholder="data" value="<?php echo $newsItem['data']; ?>">

                        <input type="file" name="image" placeholder="" value="<?php echo $newsItem['preview']; ?>">

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


