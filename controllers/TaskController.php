<?php

class TaskController
{
    public function actionCreate()
    {

        // Form porcessing
        if (isset($_POST['submit'])) {

            $options['email'] = $_POST['email'];
            $options['name_item'] = $_POST['name'];
            $options['content'] = $_POST['content'];

            $errors = false;

            if (!isset($options['name_item']) || empty($options['name_item'])) {
                $errors[] = 'Fill in the fields';
            }
            if ($errors == false) {
                // If there are no errors
                // Adding a new product
                $id = Task::createTask($options);
                // If the entry is added
                if ($id) {

                    // Let's check if the image was uploaded through the form
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        $image = new SimpleImage();
                        $image->load($_FILES["image"]["tmp_name"]);
                        $image->resize(320, 240);
                        $image->save($_SERVER['DOCUMENT_ROOT'] . "/upload/images/task/{$id}.jpg");
                    }
                };


                // We redirect the user to the management page
                header("Location: /");
            }
        }

        // Connect the view
        require_once(ROOT . '/views/task/create.php');
        return true;
    }

}