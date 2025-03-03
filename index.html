<!DOCTYPE html>
<html lang="ru">
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
    <script>
        function showSection(sectionId) {
            // Hide all sections
            var sections = document.querySelectorAll('.section');
            sections.forEach(function(section) {
                section.classList.remove('active');
            });

            // Show the selected section
            var selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.classList.add('active');
            }
        }
    </script>
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
            <img src="foro/drum-set.jpg" alt="Ударная установка" style="max-width: 50%; height: auto;">
        </section>

        <section id="catalog" class="section">
            <h2>Каталог Книг</h2>
            <div class="catalog-grid">
                <?php
                // Функция для чтения файлов из директории
                function getFilesFromDir($dir, $extension)
                {
                    $files = [];
                    if (is_dir($dir) && is_readable($dir)) {
                        $scan = scandir($dir);
                        foreach ($scan as $file) {
                            if (!is_dir($dir . '/' . $file) && pathinfo($file, PATHINFO_EXTENSION) == $extension) {
                                                                $files[] = $file;
                            }
                        }
                    } else {
                        error_log("Директория '$dir' не найдена или недоступна для чтения.");
                        echo "<p>Ошибка: Не удалось получить доступ к директории с книгами.</p>"; // Сообщение пользователю
                        return []; // Возвращаем пустой массив, чтобы избежать дальнейших ошибок
                    }
                    return $files;
                }

                // Определяем пути к директориям
                $books_dir = __DIR__ . "/books"; // Используем __DIR__ для переносимости
                $foro_dir = __DIR__ . "/foro";   // Используем __DIR__ для переносимости


                // Получаем PDF файлы из директории с книгами
                $pdfFiles = getFilesFromDir($books_dir, "pdf");

                // Получаем JPG файлы из директории с изображениями
                $jpgFiles = getFilesFromDir($foro_dir, "jpg");


                // Пример данных о книгах (можно расширить - идеально из БД или файла данных)
                $books = [
                    ["title" => "Advanced Techniques for the Modern Drummer", "author" => "Jim Chapin", "image" => "book1.jpg", "pdf" => "book1.pdf"],
                    ["title" => "Stick Control: For the Snare Drummer", "author" => "George L. Stone", "image" => "book2.jpg", "pdf" => "book2.pdf"],
                    ["title" => "The New Breed", "author" => "Gary Chester","image" => "book3.jpg", "pdf" => "book3.pdf"],
                    ["title" => "Modern Drummer", "author" => "MD Staff", "image" => "book4.jpg", "pdf" => "book4.pdf"],
                    ["title" => "Progressive Steps to Syncopation For The Modern Drummer", "author" => "Ted Reed", "image" => "book5.jpg", "pdf" => "book5.pdf"],
                    ["title" => "Alfred's Drum Method, Bk 1", "author" => "Sandy Feldstein and Dave Black", "image" => "book6.jpg", "pdf" => "book6.pdf"],
                    ["title" => "Realistic Rock Drum Method", "author" => "Carmine Appice", "image" => "book7.jpg", "pdf" => "book7.pdf"],
                    ["title" => "Drumset 101", "author" => "Dan Britt", "image" => "book8.jpg", "pdf" => "book8.pdf"]
                ];

                foreach ($books as $book) :
                    $image_path = "foro/" . $book['image'];
                    $pdf_path = "books/" . $book['pdf'];

                    //Проверяем существование файлов для большей надежности:
                    if (!file_exists($image_path) || !file_exists($pdf_path)) {
                        echo "<p>Ошибка: Отсутствуют файлы для книги {$book['title']}</p>";
                        continue; // Пропускаем к следующей книге
                    }

                    ?>
                    <div class="book">
                        <img src="<?php echo $image_path; ?>" alt="Обложка книги: <?php echo htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        <h3><?php echo htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p>Автор: <?php echo htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <a href="<?php echo htmlspecialchars($pdf_path, ENT_QUOTES, 'UTF-8'); ?>" target="_blank">Читать</a>
                    </div>
                <?php
                endforeach;
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
                <img src="<?php echo htmlspecialchars($bookOfMonth['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($bookOfMonth['title'], ENT_QUOTES, 'UTF-8'); ?>">
                <h3><?php echo htmlspecialchars($bookOfMonth['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p>Автор: <?php echo htmlspecialchars($bookOfMonth['author'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Выжимка: <?php echo htmlspecialchars($bookOfMonth['excerpt'], ENT_QUOTES, 'UTF-8'); ?></p>
                <a href="<?php echo htmlspecialchars($bookOfMonth['pdf'], ENT_QUOTES, 'UTF-8'); ?>">Читать</a>
            </div>
        </section>

        <section id="add_books" class="section">
            <h2>Добавить книги</h2>
            <p>Извините, эта функция еще не реализована.</p>
        </section>

        <section id="search" class="section">
            <h2>Поиск</h2>
            <form id="searchForm">
                <input type="text" placeholder="Введите название книги или автора...">
                <button type="submit">Поиск</button>
            </form>
            <div id="searchResults"><!-- Search results will be displayed here -->
            </div>
        </section>

    </div>

    <footer>
        &copy; 2024 Библиотека Барабанщика
    </footer>

</body>
</html>
                


