<?php
// ... (Код для загрузки файла, как описано ранее) ...

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Файл ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " был успешно загружен.";

    // Подключение к базе данных
    require_once 'db_config.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    // Получаем ID книги (предполагается, что он передается из формы)
    $book_id = $_POST['book_id']; // Получаем book_id из POST запроса

    //Определяем тип загружаемого файла и обновляем соответствующее поле
    $updateField = "";
    if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png" || $imageFileType == "gif") {
        $updateField = "image = '" . basename($target_file) . "'";
    } else if ($imageFileType == "pdf") {
        $updateField = "pdf = '" . basename($target_file) . "'";
    }

    // Подготовка и выполнение запроса для обновления таблицы books
    $sql = "UPDATE books SET $updateField WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $book_id); // "i" - integer

    if ($stmt->execute()) {
        echo " Информация о файле успешно обновлена в базе данных.";
    } else {
        echo " Ошибка обновления информации о файле в базе данных: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Извините, произошла ошибка при загрузке файла.";
}
?>
