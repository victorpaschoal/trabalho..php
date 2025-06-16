
CREATE DATABASE IF NOT EXISTS tarefas_db;
USE tarefas_db;

-- Tabela de usuário
CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loginn VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(500)  NOT NULL
);

-- Tabela de tarefas
CREATE TABLE IF NOT EXISTS tb_tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo TEXT NOT NULL,
    descricao TEXT NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);


INSERT INTO usuario (loginn, senha, email) VALUES
('mepassa.porfavor', 'mepassa', 'jason.mepassa@porfavor.amem');


INSERT INTO tb_tarefas (titulo, descricao, usuario_id) VALUES
('Dar nota maxima para aluno Victor Oliva', 'Ele muito esforcado, que cara legal', 1);