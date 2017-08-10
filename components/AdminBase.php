<?php

/**
 * User varification method
 */
abstract class AdminBase
{
    public static function checkAdmin()
    {
        // Check whether the user is authorized. If not, it will be redirected
        $adminId = Admin::checkLogged();

        // Get information about the current user
        $admin = Admin::getAdminById($adminId);

        // If the role of the current user is "admin", let's put it into the admin panel
        if ($admin['role'] == 'admin') {
            return true;
        }

        // Otherwise, we will finish work with the message about the closed access
        die('Access denied');
    }
}