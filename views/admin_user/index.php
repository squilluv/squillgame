<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление пользователями</li>
                </ol>
            </div>
            <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить рабочего</a>

            <br/>
            
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Никнейм</th>
                    <th>Роль</th>
                    <th></th>
                </tr>
                <?php foreach ($userList as $user): ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td><a href="/admin/user/update/<?php echo $user['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

