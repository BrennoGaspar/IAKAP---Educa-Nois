DROP DATABASE IF EXISTS EducaNois;

CREATE DATABASE IF NOT EXISTS EducaNois;
USE EducaNois;

CREATE TABLE IF NOT EXISTS alunos(
    ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nome VARCHAR(100)  NOT NULL,
    Sobrenome VARCHAR(100)  NOT NULL,
    Email VARCHAR(100)  NOT NULL UNIQUE,
    Celular VARCHAR(100)  NOT NULL,
    Senha VARCHAR(100)  NOT NULL
);

CREATE TABLE IF NOT EXISTS professores(
    ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nome VARCHAR(100)  NOT NULL,
    Sobrenome VARCHAR(100)  NOT NULL,
    Email VARCHAR(100)  NOT NULL UNIQUE,
    Celular VARCHAR(100)  NOT NULL,
    Senha VARCHAR(100)  NOT NULL,
    RG VARCHAR(100)  NOT NULL UNIQUE,
    CPF VARCHAR(100)  NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS cursos(
    codigo INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(200) NOT NULL,
    descricao varchar(300) NOT NULL,
    nome_video varchar(1000) NOT NULL,
    file_size BIGINT NOT NULL,
    file_type VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)


INSERT INTO cursos (nome, descricao, nome_video, file_size, file_type) VALUES ('nome teste', 'descricao teste', 'v12044gd0000co7mq5fog65m77lv7pm0.mp4', '8118188' ,'video/mp4')