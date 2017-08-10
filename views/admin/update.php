<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админ панель</a></li>
                    <li class="active">Изменить задание</li>
                </ol>
            </div>


            <h4>Изменить задание #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" placeholder="" value="<?php echo $id; ?>">
                        <p>Имя</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $task['name_item']; ?>">

                        <p>Email</p>
                        <input type="text" name="email" placeholder="" value="<?php echo $task['email']; ?>">

                        <p>Статус исполнения</p>
                        <select name="id_status">
                            <?php if (is_array($statusList)): ?>
                                <?php foreach ($statusList as $status): ?>
                                    <option value="<?php echo $status['status_id']; ?>"
                                        <?php if ($task['id_status'] == $status['status_id']) echo ' selected="selected"'; ?>>
                                        <?php echo $status['name_status']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </select>
                        <p>Текст задания</p>
                        <textarea rows="10" cols="45" name="content">
                            <?php echo $task['content']; ?>
                        </textarea>

                        <br/><br/>
                        <p>Изображение</p>
                        <img src="<?php echo Task::getImage($task['id']); ?>" width="200" alt=""/>
                        <input type="file" name="image" placeholder="" value="<?php echo $task['id']; ?>">

                        <br/><br/>


                        <input type="submit" name="submit" class="btn btn-danger" value="Save">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

