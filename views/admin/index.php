<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админ панель</a></li>
                    <li class="pull-right"><a href="/admin/logout">
                            <i class="fa fa-sign-out"></i>Виход</a></li>
                </ol>
            </div>

            <h4>Список задач</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Статус</th>
                    <th>Email</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($task as $taskItem): ?>
                    <tr>
                        <td><?php echo $taskItem['id']; ?></td>
                        <td><?php echo $taskItem['name_item']; ?></td>
                        <td><?php echo $taskItem['name_status']; ?></td>
                        <td><?php echo $taskItem['email']; ?></td>
                        <td><a href="/admin/update/<?php echo $taskItem['id']; ?>" title="Edit"><i
                                        class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/delete/<?php echo $taskItem['id']; ?>" title="Delete"><i
                                        class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

