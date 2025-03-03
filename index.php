<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Библиотека Барабанщика</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        header, footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            background-color: #444;
            color: #fff;
            padding: 0.5em 0;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0.5em 1em;
            display: inline-block;
        }

        nav a:hover {
            background-color: #555;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            overflow: hidden;
        }

        .section {
            padding: 20px;
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .section.active {
            display: block;
        }

        .book {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .book img {
            max-width: 100px;
            height: auto;
            float: left;
            margin-right: 10px;
        }

        #searchForm {
            margin-bottom: 20px;
        }

        #searchForm input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 70%;
        }

        #searchForm button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .book-month {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 8px;
        }

        .book-month img {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .catalog-grid {
            display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .catalog-grid .book {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .catalog-grid .book img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Библиотека Барабанщика</h1>
    </header>

    <nav>
        <a href="#home" onclick="showSection('home')">Главная</a>
        <a href="#catalog" onclick="showSection('catalog')">Каталог</a>
        <a href="#add_books" onclick="showSection('add_books')">Добавить книги</a>
        <a href="#search" onclick="showSection('search')">Поиск</a>
    </nav>

    <div class="container">

        <section id="home" class="section active">
            <h2>Добро пожаловать в Библиотеку Барабанщика!</h2>
            <p>Здесь вы найдете множество ресурсов для развития своих навыков игры на барабанах.</p>
            <img src="foro/drum-set.jpg" alt="Drum Set" style="max-width: 50%; height: auto;">
        </section>

       <section id="catalog" class="section">
    <h2>Каталог Книг</h2>
    <div class="catalog-grid">
        <?php
        // 1. Подключение к базе данных
        include 'db_config.php'; // Подключаем файл с настройками БД

        // Создаем соединение
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Проверяем соединение
        if ($conn->connect_error) {
            die("Ошибка подключения к базе данных: " . $conn->connect_error);
        }

        // 2. Выполнение SQL-запроса
        $sql = "SELECT id, title, author, image, pdf FROM books";
        $result = $conn->query($sql);

        // 3. Обработка результатов запроса
        if ($result->num_rows > 0) {
            // Выводим данные о книгах
            while ($row = $result->fetch_assoc()) {
                $image_path = htmlspecialchars($row["image"]); // Больше никаких foro/
                $pdf_path = htmlspecialchars($row["pdf"]);   // Больше никаких books/
                echo "<div class='book'>";
                echo "<img src='" . $image_path . "' alt='" . htmlspecialchars($row["title"]) . "'>";
                echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
                echo "<p>Автор: " . htmlspecialchars($row["author"]) . "</p>";
                echo "<a href='" . $pdf_path . "' target='_blank'>Читать</a>";
                echo "</div>";
            }

        } else {
            echo "<p>В каталоге пока нет книг.</p>";
        }

        // 4. Закрытие соединения с базой данных
        $conn->close();
        ?>
    </div>
</section>

<section id="book_month" class="section">
    <h2>Книга Месяца</h2>
    <?php
    $bookOfMonth = [
        "title" => "Mastering the Art of Drumming",
        "author" => "John Riley",
        "image" => "book_month.jpg",
        "pdf" => "book_month.pdf",
        "excerpt" => "A comprehensive guide to jazz drumming techniques, covering everything from basic timekeeping to advanced soloing concepts."
    ];
    $bookOfMonth['image'] = "foro/" . $bookOfMonth['image'];
    $bookOfMonth['pdf'] = "books/" . $bookOfMonth['pdf'];
    ?>
    <div class="book-month">
        <img src="<?php echo htmlspecialchars("foro/" . $bookOfMonth['image']); ?>" alt="<?php echo htmlspecialchars($bookOfMonth['title']); ?>">
        <h3><?php echo htmlspecialchars($bookOfMonth['title']); ?></h3>
        <p>Автор: <?php echo htmlspecialchars($bookOfMonth['author']); ?></p>
        <p>Выжимка: <?php echo htmlspecialchars($bookOfMonth['excerpt']); ?></p>
        <a href="<?php echo htmlspecialchars("books/" . $bookOfMonth['pdf']); ?>">Читать</a>
    </div>
</section>


        <section id="book_month" class="section">
            <h2>Книга Месяца</h2>
            <?php
            $bookOfMonth = [
                "title" => "Mastering the Art of Drumming",
                "author" => "John Riley",
                "image" => "book_month.jpg",
                "pdf" => "book_month.pdf",
                "excerpt" => "A comprehensive guide to jazz drumming techniques, covering everything from basic timekeeping to advanced soloing concepts."
            ];
            $bookOfMonth['image'] = "foro/" . $bookOfMonth['image'];
            $bookOfMonth['pdf'] = "books/" . $bookOfMonth['pdf'];
            ?>
            <div class="book-month">
                <img src="<?php echo $bookOfMonth['image']; ?>" alt="<?php echo $bookOfMonth['title']; ?>">
                <h3><?php echo $bookOfMonth['title']; ?></h3>
                <p>Автор: <?php echo $bookOfMonth['author']; ?></p>
                <p>Выжимка: <?php echo $bookOfMonth['excerpt']; ?></p>
                <a href="<?php echo $bookOfMonth['pdf']; ?>">Читать</a>
            </div>
        </section>

        <section id="add_books" class="section">
    <h2>Добавить книги</h2>
    <form id="addBookForm" action="#add_books" method="POST" enctype="multipart/form-data">
        <label for="title">Название:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Автор:</label>
        <input type="text" id="author" name="author" required><br><br>

        <label for="image">Изображение:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <label for="pdf">PDF:</label>
        <input type="file" id="pdf" name="pdf" accept=".pdf" required><br><br>

        <button type="submit">Добавить книгу</button>
    </form>

    <?php
    include 'db_config.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Обработка загрузки файлов
        $target_dir_images = "foro/"; // Каталог для изображений
        $target_dir_pdfs = "books/";   // Каталог для PDF

        $image = basename($_FILES["image"]["name"]);
        $pdf = basename($_FILES["pdf"]["name"]);

        $target_file_image = $target_dir_images . $image;
        $target_file_pdf = $target_dir_pdfs . $pdf;

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file_image, PATHINFO_EXTENSION));
        $pdfFileType = strtolower(pathinfo($target_file_pdf, PATHINFO_EXTENSION));

        // Проверка типов файлов (изображения и PDF) (пример - добавить больше проверок)
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Извините, только JPG, JPEG, PNG и GIF файлы разрешены для изображений.<br>";
            $uploadOk = 0;
        }
        if($pdfFileType != "pdf") {
            echo "Извините, только PDF файлы разрешены.<br>";
            $uploadOk = 0;
        }
        // Другие проверки (размер файла, существование и т.д.) - ОБЯЗАТЕЛЬНО добавить

        if ($uploadOk == 0) {
            echo "Извините, ваши файлы не были загружены.";
        } else {
            // Попытка загрузить файлы
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_image) && move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file_pdf)) {
                // Получение данных из формы
                $title = $conn->real_escape_string($_POST["title"]);
                $author = $conn->real_escape_string($_POST["author"]);

                // SQL запрос для добавления книги
                $sql = "INSERT INTO books (title, author, image, pdf) VALUES ('$title', '$author', '$image', '$pdf')";

                if ($conn->query($sql) === TRUE) {
                    echo "Книга успешно добавлена!";
                } else {
                    echo "Ошибка: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Извините, произошла ошибка при загрузке ваших файлов.";
            }
        }
    }
    $conn->close();
    ?>
</section>

<section id="search" class="section">
    <h2>Поиск</h2>
    <form id="searchForm" action="#search" method="GET">
        <input type="text" name="search" placeholder="Введите название книги или автора">
        <button type="submit">Найти</button>
    </form>
    <?php
    include 'db_config.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : ''; // Экранирование!
    $results = [];

    if (!empty($search)) {
        $sql = "SELECT id, title, author, image, pdf FROM books WHERE title LIKE '%" . $search . "%' OR author LIKE '%" . $search . "%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Результаты поиска:</h3>";
            while ($row = $result->fetch_assoc()) {
                $image_path = "foro/" . htmlspecialchars($row["image"]); // Экранирование!
                $pdf_path = "books/" . htmlspecialchars($row["pdf"]);   // Экранирование!

                echo "<div class='book'>";
                echo "<img src='" . $image_path . "' alt='" . htmlspecialchars($row["title"]) . "'>"; // Экранирование!
                echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>"; // Экранирование!
                echo "<p>Автор: " . htmlspecialchars($row["author"]) . "</p>"; // Экранирование!
                echo "<a href='" . $pdf_path . "' target='_blank'>Читать</a>"; // Экранирование!
                echo "</div>";
            }
        } else {
            echo "<p>Ничего не найдено по вашему запросу.</p>";
        }
    }
    $conn->close();
    ?>
</section>

<section id="contact" class="section">
    <h2>Контакты</h2>
    <p>Свяжитесь с нами по email: info@drumlibrary.com</p>
    <p>Или посетите наш офис по адресу: ул. Барабанная, д. 1</p>
</section>
    </div>

    <footer>
        <p>&copy; 2025 Библиотека Барабанщика</p>
    </footer>

    <script>
        function showSection(sectionId) {
            let sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.remove('active'));

            let section = document.getElementById(sectionId);
            se
ction.classList.add('active');
        }

        showSection('home');
    </script>

</body>
</html>
