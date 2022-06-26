CREATE DATABASE projetoFinal;
CREATE TABLE usuario (
  usuario_id INTEGER AUTO_INCREMENT PRIMARY KEY,
  usuario_tipo INTEGER,
  usuario_nome VARCHAR(255),
  usuario_email VARCHAR(255),
  usuario_senha VARCHAR(35),
  usuario_telefone VARCHAR(20),
  usuario_data_nascimento DATE,
  usuario_endereco VARCHAR(255),
  usuario_cpf VARCHAR(20),
  usuario_foto VARCHAR(255)
);

CREATE TABLE servicos (
  servico_id INTEGER AUTO_INCREMENT PRIMARY KEY,
  servico_nome VARCHAR(255),
  servico_aprovacao INTEGER DEFAULT 0
);

CREATE TABLE usuario_servico (
  usuario_id INTEGER,
  servico_id INTEGER,
  servico_preco VARCHAR(25)
);

CREATE TABLE avaliacao (
  avaliacao_id INTEGER AUTO_INCREMENT PRIMARY KEY,
  usuario_contratado_id INTEGER,
  usuario_solicitante_id INTEGER,
  avaliacao_nota INTEGER,
  avaliacao_mensagem TEXT
);

CREATE TABLE agenda (
  agenda_id INTEGER AUTO_INCREMENT PRIMARY KEY,
  usuario_contratado_id INTEGER,
  usuario_solicitante_id INTEGER,
  agenda_aprovacao BOOLEAN,
  agenda_mensagem VARCHAR(255),
  agenda_data DATE
);

INSERT INTO servicos (servico_nome, servico_aprovacao)
VALUES 
('Eletricista' , 1),
('Padeiro'     , 1),
('Detetive'    , 1),
('Músico'      , 1),
('Cozinheiro'  , 1),
('Faxineiro'   , 1);