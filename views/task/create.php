<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <div id="view">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/">Все задания</a></li>
                        <li class="active">Добавить заданиe</li>
                    </ol>
                </div>

                <h4>Добавить новое заданиe</h4>

                <br/>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="col-xs-12 col-sm-12  col-md-5 col-lg-5 ">

                    <div class="create-form">
                        <form id="form-create" method="post" enctype="multipart/form-data">

                            <p>Имя</p>
                            <input class="create-input" id="name" type="text" name="name" placeholder=""
                                   value=" <?php if (isset($_POST['preview'])) {
                                       $name = $_POST['name'];
                                       echo $name;
                                   } ?>">
                            <br/>
                            <br/>
                            <p>Email</p>
                            <input class="create-input" id="email" type="email" name="email" placeholder=""
                                   value=" <?php if (isset($_POST['preview'])) {
                                       $email = $_POST['email'];
                                       echo $email;
                                   } ?>">
                            <br/>
                            <br/>
                            <p>Изображение</p>
                            <input type="file" name="image" placeholder="" value="">
                            <br><br>
                            <p>Задание</p>
                            <textarea id="content" name="content">
                            <?php if (isset($_POST['preview'])) {
                                $content = $_POST['content'];
                                echo $content;
                            } ?>
                        </textarea>

                            <br><br>

                            <p><input name="preview" id="preview" type="submit" value='Предв.просмотр' ">
                                <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
                            </p>
                        </form>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1">

                    <?php if (isset($_POST['preview'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $content = $_POST['content'];

                    } ?>

                    <p><span><?php echo $name; ?></span></p>
                    <p><span><?php echo $email; ?></p>
                    <p><?php echo $content; ?></p>

                </div>
            </div>

        </div>

    </div>
    </div>
    </div>

</section>
<script>
    $("#preview").click(function () {
        var name = dicument.getElementById("name").value;
        var email = dicument.getElementById("email").value;
        var content = document.getElementById("content").value;

        function readImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $.ajax({
            url: '',
            type 'post',
            data: {name: name, email: email, content: content},
            success: function (data) {
                $(#view
                ).
                html(data);
            }
        });
    });
</script>
<?php include ROOT . '/views/layouts/footer.php'; ?>




