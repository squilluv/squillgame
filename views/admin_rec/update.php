<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/rec">Управление рекомендациями</a></li>
                    <li class="active">Редактировать рекомендацию</li>
                </ol>
            </div>


            <h4>Редактировать рекомендацию #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $rec['name']; ?>">

                        <p>Место</p>
                        <input type="text" name="soft_order" placeholder="" value="<?php echo $rec['soft_order']; ?>">


                        <p>Изображение товара</p>
                        <img src="<?php echo Recomended::getImage($rec['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $rec['image']; ?>">


                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($rec['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($rec['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                        </select>
                        
                        <br/><br/>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
