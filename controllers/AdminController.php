<?php

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $task = array();
        $task = Task::getTaskListAdmin();
        include_once(ROOT . '/views/admin/index.php');
        return true;
    }

    public function actionLogin()
    {
        // Variables for the form
        $login = false;
        $password = false;

        // Form processing
        if (isset($_POST['submit'])) {

            $loginl = $_POST['login'];
            $password = $_POST['password'];


            // Check if the user exists
            $adminId = Admin::checkAdminData($login, $password);

            if ($adminId == false) {
                // If the data is incorrect, show an error
                $errors[] = 'Incorrect login data';
            } else {
                // If the data is correct, remember the user (session)
                Admin::auth($adminId);

                // Redirect the user to the closed part - the cabinet
                header("Location: /admin");
            }
        }

        // Connect the view
        require_once(ROOT . '/views/admin/login.php');
        return true;
    }

    public static function actionLogout()
    {
        // Delete user information from session
        unset($_SESSION["admin"]);

        // Redirecting the user to the main page
        header("Location: /");
    }


}