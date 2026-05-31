-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS honda_dealership CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE honda_dealership;
-- 1. Table for Users (usuarios)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nivel_acesso ENUM('admin', 'funcionario') DEFAULT 'funcionario',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;



-- 2. Table for Cars (carros)
CREATE TABLE IF NOT EXISTS carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL, -- e.g., Honda, Fiat, Volkswagen, Mercedes
    modelo VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    quilometragem INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    cor VARCHAR(30) NOT NULL,
    imagem_url VARCHAR(255) DEFAULT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;



-- 3. Table for Motorcycles (motos)
CREATE TABLE IF NOT EXISTS motos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL, -- e.g., Honda, Kawasaki, Suzuki, Yamaha
    modelo VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    quilometragem INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    cor VARCHAR(30) NOT NULL,
    imagem_url VARCHAR(255) DEFAULT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;



-- 4. Table for Employees (funcionarios)
CREATE TABLE IF NOT EXISTS funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    funcao VARCHAR(100) NOT NULL,
    data_admissao DATE NOT NULL,
    data_nascimento DATE NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB