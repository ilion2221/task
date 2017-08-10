<?php

/**
 * Created by PhpStorm.
 * User: ILION
 * Date: 05.08.2017
 * Time: 3:50
 */
class AdminTaskController extends AdminBase
{

    public function actionDelete($id)
    {
        // Verify access
        self::checkAdmin();

        // Form processing
        if (isset($_POST['submit'])) {
            // If the form is sent
            // Delete the item
            unlink($_SERVER['DOCUMENT_ROOT'] . "/upload/images/task/{$id}.jpg");
            Task::deleteTaskById($id);

            // We redirect the user to the management page
            header("Location: /admin");
        }

        // Connect the view
        require_once(ROOT . '/views/admin/delete.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $statusList = Task::getStatusListAdmin();

        // Получаем данные о конкретном заказе
        $task = Task::getTaskById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $id = $_POST['id'];
            $options['name_item'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['id_status'] = $_POST['id_status'];
            $options['content'] = $_POST['content'];
            // Сохраняем изменения
            if (Task::updateTaskById($id, $options)) {

                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . "/upload/images/task/{$id}.jpg");
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/task/{$id}.jpg");
                }
            }

        }

        // Подключаем вид
        require_once(ROOT . '/views/admin/update.php');
        return true;
    }
}