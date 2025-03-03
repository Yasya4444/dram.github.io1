    USE drum_library;
        -- Обновить пути для изображений
        UPDATE files SET file_path = REPLACE(file_path, '/старый/путь/', 'uploads/foro/') WHERE file_type LIKE 'image%';

        -- Обновить пути для PDF-файлов
        UPDATE files SET file_path = REPLACE(file_path, '/старый/путь/', 'uploads/books/') WHERE file_type = 'application/pdf';

    INSERT INTO books (title, author, image, pdf) VALUES
    ('Advanced Techniques for the Modern Drummer', 'Jim Chapin', 'book1.jpg', 'book1.pdf');
    INSERT INTO books (title, author, image, pdf) VALUES
    ('Stick Control: For the Snare Drummer', 'George L. Stone', 'book2.jpg', 'book2.pdf');
    INSERT INTO books (title, author, image, pdf) VALUES
    ('The New Breed', 'Gary Chester', 'book3.jpg', 'book3.pdf');
    INSERT INTO books (title, author, image, pdf) VALUES
    ('Modern Drummer', 'MD Staff', 'book4.jpg', 'book4.pdf');
    INSERT INTO books (title, author, image, pdf) VALUES
    ('Progressive Steps to Syncopation For The Modern Drummer', 'Ted Reed', 'book5.jpg', 'book5.pdf');
    INSERT INTO books (title, author, image, pdf) VALUES
    ("Alfred's Drum Method, Bk 1", 'Sandy Feldstein and Dave Black', 'book6.jpg', 'book6.pdf');
    INSERT INTO books (title, author, image, pdf) VALUES
    ('Realistic Rock Drum Method', 'Carmine Appice', 'book7.jpg', 'book7.pdf');
    INSERT INTO books (title, author, image, pdf) VALUES
    ('Drumset 101', 'Dan Britt', 'book8.jpg', 'book8.pdf');

    SELECT * FROM books;
    
