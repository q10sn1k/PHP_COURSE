CREATE DATABASE IF NOT EXISTS test;
USE test;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- INSERT INTO users (name, email) VALUES
--     ('Sergey', 'sergey@example.com'),
--     ('Andrew', 'andrew@example.com');