-- ============================================================
-- Sistema Honda - Schema do Banco de Dados
-- Barbearia Honda
-- ============================================================

CREATE DATABASE IF NOT EXISTS honda_dealership
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE honda_dealership;

-- ============================================================
-- 1. Tabela de Usuários (usuarios)
-- Armazena os usuários que se cadastram no sistema
-- ============================================================
CREATE TABLE IF NOT EXISTS usuarios (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(100) NOT NULL,
    email         VARCHAR(150) NOT NULL UNIQUE,
    senha         VARCHAR(255) NOT NULL,
    nivel_acesso  ENUM('admin', 'funcionario') NOT NULL DEFAULT 'funcionario',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 2. Tabela de Carros (carros)
-- Armazena: Valor, Marca, Quilometragem, Cor
-- ============================================================
CREATE TABLE IF NOT EXISTS carros (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    marca         VARCHAR(80)     NOT NULL,
    quilometragem INT             NOT NULL DEFAULT 0,
    valor         DECIMAL(12, 2)  NOT NULL,
    cor           VARCHAR(50)     NOT NULL,
    data_cadastro TIMESTAMP       DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 3. Tabela de Motos (motos)
-- Armazena: Valor, Marca, Quilometragem, Cor
-- ============================================================
CREATE TABLE IF NOT EXISTS motos (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    marca         VARCHAR(80)     NOT NULL,
    quilometragem INT             NOT NULL DEFAULT 0,
    valor         DECIMAL(12, 2)  NOT NULL,
    cor           VARCHAR(50)     NOT NULL,
    data_cadastro TIMESTAMP       DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- 4. Tabela de Funcionários (funcionarios)
-- Armazena: Função, Data de Admissão, Data de Nascimento, Salário
-- ============================================================
CREATE TABLE IF NOT EXISTS funcionarios (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    nome            VARCHAR(100)   NOT NULL,
    funcao          VARCHAR(100)   NOT NULL,
    data_admissao   DATE           NOT NULL,
    data_nascimento DATE           NOT NULL,
    salario         DECIMAL(10, 2) NOT NULL,
    data_cadastro   TIMESTAMP      DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;