<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12 ">
            <div class="btn-group sort-block">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                    Сортировка <span class="caret"></span>
                </button>

                <ul class="dropdown-menu" role="menu">
                    <form method="post">
                        <li><input type="submit" name="named" value="Имя"/></li>
                        <li><input type="submit" name="mailed" value="Email"/></li>
                        <li><input type="submit" name="statused" value="Статус"/></li>
                    </form>
                </ul>
            </div>
            <a href="/task/create" class="btn btn-danger pull-right">Создать задание</a>
        </div>
    </div>

    <?php foreach ($task as $taskItem): ?>

        <div class="row task-item">

            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <img src="/upload/images/task/<?php echo $taskItem['id']; ?>.jpg">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">

                <p><span><?php echo $taskItem['name_item']; ?><span>
                        <?php if ($taskItem['id_status'] == 1): ?>
                       </span><i class="fa fa-times task-status-not" aria-hidden="true"></i></span>
                    <?php elseif ($taskItem['id_status'] == 2): ?>
                        </span><i class="fa fa-check-square-o task-status-yes" aria-hidden="true"></i></span>
                    <?php endif; ?>
                    <span class="pull-right">
                 <?php echo $taskItem['email']; ?></span></p>
                <p><?php echo $taskItem['content']; ?></p>

            </div>

        </div>
    <?php endforeach; ?>
    <?php echo $pagination->get(); ?>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>
