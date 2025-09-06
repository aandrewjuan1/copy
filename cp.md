CREATE TABLE school_publication_users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE articles (
    article_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_id INT NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES school_publication_users(user_id) ON DELETE CASCADE
);



-- Insert sample users
INSERT INTO school_publication_users (username, email, password, is_admin)
VALUES
('admin_john', 'admin.john@example.com', 'hashedpassword123', 1),
('writer_anna', 'anna.writer@example.com', 'hashedpassword456', 0),
('writer_mike', 'mike.writer@example.com', 'hashedpassword789', 0),
('admin_sarah', 'sarah.admin@example.com', 'hashedpassword321', 1);

-- Insert sample articles
INSERT INTO articles (title, content, author_id, is_active)
VALUES
('Welcome Message from Admin', 'We are excited to welcome everyone to our School Publication! Stay tuned for updates and stories.', 1, 1),
('The Importance of Writing', 'Writing is a powerful tool for communication, creativity, and self-expression.', 2, 1),
('Campus News Update', 'The school has recently launched a new program to support student creativity and innovation.', 3, 1),
('Editorial Vision', 'Our publication aims to highlight student voices and foster a sense of community.', 4, 1),
('Draft Article - Not Yet Published', 'This is a draft article that should remain inactive.', 2, 0);


-- Clear old users
DELETE FROM school_publication_users;

-- Insert sample users with hashed passwords
INSERT INTO school_publication_users (username, email, password, is_admin)
VALUES
('admin_john', 'admin.john@example.com', '$2y$10$TKh8H1X/NayI9DqF4lF6EehKX0lF0aP8G7X8JytQ9QhU2Gf9H4R3G', 1), -- password: admin123
('writer_anna', 'anna.writer@example.com', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFQ.TDtZZYy5zr8uZ3q0e2dEOz6hL0i.', 0), -- password: writer123
('writer_mike', 'mike.writer@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0), -- password: password
('admin_sarah', 'sarah.admin@example.com', '$2y$10$N9qo8uLOickgx2ZMRZo5i.eRZCtjwJ5p8DqOQ5FfS8WwJu1.5D4aK', 1); -- password: secret123

