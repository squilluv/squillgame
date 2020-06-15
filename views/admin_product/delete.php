<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление играми</a></li>
                    <li class="active">Удалить игру</li>
                </ol>
            </div>


            <h4>Удалить игру #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить эту игру?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

