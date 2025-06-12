CREATE DATABASE turismo;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(11),
    telefone VARCHAR(15),
    endereco TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    destino_nome VARCHAR(255) NOT NULL, -- Storing name for simplicity, ideally foreign key to a 'destinos' table
    data_reserva DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'pendente',
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE `destinos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `pais` VARCHAR(255) NOT NULL,
  `descricao` TEXT NOT NULL,
  `preco` DECIMAL(10, 2) NOT NULL,
  `imagem` VARCHAR(255) NOT NULL
);


ALTER TABLE `clientes` ADD `role` VARCHAR(50) NOT NULL DEFAULT 'user';

UPDATE `clientes` SET `role` = 'admin' WHERE `email` = 'gui@xemplo.com';


