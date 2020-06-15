<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/teg">Управление teg</a></li>
                    <li class="active">Редактировать teg</li>
                </ol>
            </div>


            <h4>Редактировать teg "<?php echo $teg['name']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $teg['name']; ?>">

                        <p>Порядковый номер</p>
                        <input type="text" name="soft_order" placeholder="" value="<?php echo $teg['soft_order']; ?>">
                        
                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($teg['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($teg['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
                        </select>

                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
