<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Admin panel</a></li>
                    <li class="active">Delete task</li>
                </ol>
            </div>


            <h4>Delete task item #<?php echo $id; ?></h4>


            <p>Are you want to delete this task?</p>

            <form method="post">
                <input type="submit" name="submit" value="Delete"/>
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

