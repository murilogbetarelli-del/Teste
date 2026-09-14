CREATE DATABASE ecommerce_db;
USE ecommerce_db;

-- Tabela de Usuários (para Login/Cadastro)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Tabela de Produtos (para o vendedor cadastrar itens)
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255)
);

-- Tabela de Pagamentos (onde os dados do cartão serão armazenados)
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    card_holder VARCHAR(100),
    card_number VARCHAR(20),
    expiry_date VARCHAR(5),
    cvv VARCHAR(4),
    amount DECIMAL(10, 2),
    FOREIGN KEY (user_id) REFERENCES users(id)
);