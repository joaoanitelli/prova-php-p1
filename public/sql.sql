CREATE SCHEMA provaphp;

Use provaphp;

CREATE TABLE carro (
  id INT NOT NULL AUTO_INCREMENT,
  modelo VARCHAR(255) NOT NULL,
  ano int NOT NULL,
  cor VARCHAR(255) NOT NULL,
  valor float NOT NULL,
  PRIMARY KEY (`id`));
  
CREATE TABLE cliente (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  cpf int NOT NULL,
  cidade VARCHAR(255) NOT NULL,
  estado VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));
    
CREATE TABLE filial (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  tel int NOT NULL,
  cidade VARCHAR(255) NOT NULL,
  estado VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));
      
CREATE TABLE fornecedor (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  tel int NOT NULL,
  cidade VARCHAR(255) NOT NULL,
  estado VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));
  
  