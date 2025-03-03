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
            <p>Извините, эта функция еще не реализована.</p>
        </section>

        <section id="search" class="section">
            <h2>Поиск</h2>
            <form id="searchForm" action="#search" method="GET">
                <input type="text" name="search" placeholder="Введите название книги или автора">
                <button type="submit">Найти</button>
            </form>
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $results = [];
            if (!empty($search)) {
                foreach ($books as $book) {
                    if (stripos($book['title'], $search) !== false || stripos($book['author'], $search) !== false) {
                        $results[] = $book;
                    }
                }

                if (!empty($results)) {
                    echo "<h3>Результаты поиска:</h3>";
                    foreach ($results as $book) {
                        echo "<div class='book'>";
                        echo "<img src='" . $book['image'] . "' alt='" . $book['title'] . "'>";
                        echo "<h3>" . $book['title'] . "</h3>";
                        echo "<p>Автор: " . $book['author'] . "</p>";
                        echo "<a href='" . $book['pdf'] . "'>Читать</a>"; // Link to PDF
                        echo "</div>";
                    }
                } else {
                    echo "<p>Ничего не найдено по вашему запросу.</p>";
                }
            }
            ?>
        </section>

        <section id="contact" class="section">
            <h2>Контакты</h2>
            <p>Свяжитесь с нами по email: info@drumlibrary.com</p>
            <p>Или посетите наш офис по адресу: ул. Барабанная, д. 1</p>
        </section>

    </div>

    <footer>
        <p>&copy; 2024 Библиотека Барабанщика</p>
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
