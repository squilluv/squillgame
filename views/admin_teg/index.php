<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление тегами</li>
                </ol>
            </div>
<div class="col-sm-8"></div>
            <a href="/admin/teg/create" class="btn btn-black"><i class="fa fa-plus"></i> Добавить teg</a>
            
            <h4>Список tegs</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($tegsList as $teg): ?>
                    <tr>
                        <td><?php echo $teg['id']; ?></td>
                        <td><?php echo $teg['name']; ?></td>
                        <td><?php echo Teg::getStatusText($teg['status']); ?></td>  
                        <td><a href="/admin/teg/update/<?php echo $teg['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/teg/delete/<?php echo $teg['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

