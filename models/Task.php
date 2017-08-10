<?php

class Task
{
    const SHOW_BY_DEFAULT = 3;

    public static function getTaskList($page = 1)
    {
        $limit = Task::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        //Connection DataBase
        $db = Db::getConnection();
        //Query to the database
        $sql = 'SELECT * FROM task '
            . 'ORDER BY id DESC LIMIT :limit OFFSET :offset ';

        //Prepared query is used
        $result = $db->prepare($sql);

        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        // Receiving and returning results
        $i = 0;
        $taskList = array();
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['id_status'] = $row['id_status'];
            $taskList[$i]['name_item'] = $row['name_item'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['content'] = $row['content'];
            $i++;
        }
        return $taskList;
    }

    public static function getTaskSortName($page = 1)
    {
        $limit = Task::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        //Connection DataBase
        $db = Db::getConnection();
        //Query to the database
        $sql = 'SELECT * FROM task, status '
            . 'WHERE status.status_id = task.id_status ORDER BY name_item LIMIT :limit OFFSET :offset ';

        //Prepared query is used
        $result = $db->prepare($sql);

        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        // Receiving and returning results
        $i = 0;
        $taskList = array();
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['id_status'] = $row['id_status'];
            $taskList[$i]['name_item'] = $row['name_item'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['content'] = $row['content'];
            $i++;
        }
        return $taskList;
    }

    public static function getTaskSortEmail($page = 1)
    {
        $limit = Task::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        //Connection DataBase
        $db = Db::getConnection();
        //Query to the database
        $sql = 'SELECT * FROM task, status '
            . 'WHERE status.status_id = task.id_status ORDER BY email LIMIT :limit OFFSET :offset ';

        //Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        // Receiving and returning results
        $i = 0;
        $taskList = array();
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['id_status'] = $row['id_status'];
            $taskList[$i]['name_item'] = $row['name_item'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['content'] = $row['content'];
            $i++;
        }
        return $taskList;
    }

    public static function getTaskSortStatus($page = 1)
    {
        $limit = Task::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        //Connection DataBase
        $db = Db::getConnection();
        //Query to the database
        $sql = 'SELECT * FROM task, status '
            . 'WHERE status.status_id = task.id_status ORDER BY status.status_id LIMIT :limit OFFSET :offset ';

        //Prepared query is used
        $result = $db->prepare($sql);

        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();

        // Receiving and returning results
        $i = 0;
        $taskList = array();
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['id_status'] = $row['id_status'];
            $taskList[$i]['name_status'] = $row['name_status'];
            $taskList[$i]['name_item'] = $row['name_item'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['content'] = $row['content'];
            $i++;
        }
        return $taskList;
    }

    public static function getTaskById($id)
    {
        //Connection DataBase
        $db = Db::getConnection();

        //Query to the database
        $sql = 'SELECT * FROM task WHERE id = :id';

        //Prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    public static function getStatusListAdmin()
    {
        // Connecting to the database
        $db = Db::getConnection();

        // Request to DB
        $result = $db->query('SELECT status_id, name_status FROM status ');

        // Receiving and returning results
        $statusList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $statusList[$i]['status_id'] = $row['status_id'];
            $statusList[$i]['name_status'] = $row['name_status'];
            $i++;
        }
        return $statusList;
    }

    public static function getTaskListAdmin()
    {

        //Connection DataBase
        $db = Db::getConnection();
        //Query to the database
        $sql = 'SELECT * FROM task, status '
            . 'WHERE task.id_status = status.status_id ORDER BY status.status_id  ';

        //Prepared query is used
        $result = $db->prepare($sql);
        $result->execute();

        // Receiving and returning results
        $i = 0;
        $taskList = array();
        while ($row = $result->fetch()) {
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['id_status'] = $row['id_status'];
            $taskList[$i]['name_status'] = $row['name_status'];
            $taskList[$i]['name_item'] = $row['name_item'];
            $taskList[$i]['email'] = $row['email'];
            $taskList[$i]['content'] = $row['content'];
            $i++;
        }
        return $taskList;
    }

    public static function getCountTask()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM task';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Выполнение коменды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    public static function createTask($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO task (id, email, name_item,  content) VALUES (:id, :email, :name_item, :content)';

        // Receiving and returning results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $options['id'], PDO::PARAM_INT);
        $result->bindParam(':email', $options['email'], PDO::PARAM_INT);
        $result->bindParam(':name_item', $options['name_item'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        if ($result->execute()) {

            return $db->lastInsertId();
        }

        return 0;
    }

    public static function deleteTaskById($id)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'DELETE FROM task WHERE id = :id';

        // Receiving and returning results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateTaskById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE task SET name_item = :name_item , email = :email, id_status = :id_status, content = :content WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name_item', $options['name_item'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':id_status', $options['id_status'], PDO::PARAM_INT);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/task/';

        // Путь к изображению товара
        $pathToProductImage = $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $path . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $path . $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}