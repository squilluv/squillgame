<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление рекомендациями</li>
                </ol>
            </div><div class="col-sm-8"></div>
            <a href="/admin/rec/create" class="btn btn-black"><i class="fa fa-plus"></i> Добавить рекомендацию</a>

            <br/>
            
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID товара</th>
                    <th>Название товара</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($recs as $rec): ?>
                    <tr>
                        <td><?php echo $rec['id']; ?></td>
                        <td><?php echo $rec['name']; ?></td>
                        <td><a href="/admin/rec/update/<?php echo $rec['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/rec/delete/<?php echo $rec['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

