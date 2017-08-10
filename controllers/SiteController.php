<?php

class SiteController
{
    public function actionIndex($page = 1)
    {
        $task = array();
        $total = Task::getCountTask();
        $pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');

        //Сортування. Записуємо тип сортування в SESSION, щоб не збивалося під час пагінації
        if (isset($_POST['named'])) {
            $_SESSION['name'] = 'named';
        } elseif (isset($_POST['mailed'])) {
            $_SESSION['name'] = 'mailed';
        } elseif (isset($_POST['statused'])) {
            $_SESSION['name'] = 'statused';
        } else {
            $task = Task::getTaskList($page);
        }
        //Виводимо записи
        if (isset($_SESSION['name'])) {
            if ($_SESSION['name'] == 'named') {
                $task = Task::getTaskSortName($page);
            } elseif ($_SESSION['name'] == 'mailed') {
                $task = Task::getTaskSortEmail($page);
            } elseif ($_SESSION['name'] == 'statused') {
                $task = Task::getTaskSortStatus($page);
            } else {
                $task = Task::getTaskList($page);
            }
        }

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

}
