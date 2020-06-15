<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/news">Управление news</a></li>
                    <li class="active">Редактировать</li>
                </ol>
            </div>


            <h4>Редактировать news #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-12">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <input type="text" name="title" placeholder="title" value="<?php echo $newsItem['title']; ?>">

                        <p>ShortCont</p>
                        <textarea name="shortcontent"><?php echo $newsItem['shortcontent']; ?></textarea>

                        <input type="text" name="autorname" placeholder="name" value="<?php echo $newsItem['autorname']; ?>">
                        
                        <br/><br/>

                        <input type="date" name="data" placeholder="date" value="<?php echo $newsItem['data']; ?>">

                    

                        <p>Изображение товара</p>
                        <img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $newsItem['image']; ?>">

                        <p>Cont</p>
                        <textarea name="content" id="exampleFormControlTextarea3" rows="7"><?php echo $newsItem['content']; ?></textarea>
                        
                        <br/><br/>
                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
