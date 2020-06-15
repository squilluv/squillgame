<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление играми</li>
                </ol>
            </div>
            <div class="col-sm-8"></div>
            <a href="/admin/product/create" class="btn btn-black"><i class="fa fa-plus"></i> Добавить игру</a>
<div class="col-sm-5"></div>
            <form method="post" action="/admin/product/export">
                <input type="submit" name="export" class="btn btn-success" value="Экспорт в Excel" />
            </form><br>
            <form method="post" action="/admin/product/exportdoc">
                <input type="submit" name="exportdoc" class="btn btn-success" value="Экспорт в doc" />
            </form>
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Название товара</th>
                    <th>Цена</th>
                    <th>Скидка</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($productsList as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>  
                        <td><?php echo $product['is_sale']; ?></td>  
                        <td><a href="/admin/product/update/<?php echo $product['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            

        </div>
    </div>
</section>

