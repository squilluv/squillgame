<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/contact">Лист сообщений</a></li>
                    <li class="active">Просмотр сообщения</li>
                </ol>
            </div>


            <h4>Просмотр сообщения #<?php echo $contact['id']; ?></h4>
            <br/>


            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>ID</td>
                    <td><?php echo $contact['id']; ?></td>
                </tr>
                <tr>
                    <td>Nick</td>
                    <td><?php echo $contact['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $contact['user_realname']; ?></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><?php echo $contact['user_email']; ?></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><?php echo $contact['user_comment']; ?></td>
                </tr>
                <?php if ($contact['user_id'] != 0): ?>
                    <tr>
                        <td>ID клиента</td>
                        <td><?php echo $contact['user_id']; ?></td>
                    </tr>
                <?php endif; ?>
            </table>

            <a href="/admin/contact/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>


</section>
