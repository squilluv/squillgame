<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>
                        
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Лист сообщений</li>
                </ol>
            </div>

            <h4>Список сообщений</h4>

            <br/>

            
            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Ник</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($contactList as $contact): ?>
                    <tr>
                        <td>
                            <a href="/admin/contact/view/<?php echo $contact['id']; ?>">
                                <?php echo $contact['id']; ?>
                            </a>
                        </td>
                        <td><?php echo $contact['user_name']; ?></td>
                        <td><?php echo $contact['user_realname']; ?></td>
                        <td><?php echo $contact['user_email']; ?></td>
                        <td><a href="/admin/contact/view/<?php echo $contact['id']; ?>" title="Смотреть"><i class="fa fa-eye"></i></a></td>
                        <td><a href="/admin/contact/delete/<?php echo $contact['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>
