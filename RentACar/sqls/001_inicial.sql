
CREATE DATABASE rentacar COLLATE 'utf8_unicode_ci';

CREATE TABLE usuarios(
	id INT NOT NULL AUTO_INCREMENT,
    primeiro_nome VARCHAR(25) NOT NULL,
    sobrenome VARCHAR(60) NOT NULL,
    cpf CHAR(11) NOT NULL,
    email VARCHAR(60) DEFAULT NULL,
    celular VARCHAR(20) NOT NULL,
    cep CHAR(8) NOT NULL,
    numero CHAR(5) NOT NULL,
    senha CHAR(60) NOT NULL, 

    PRIMARY KEY(id)

);

CREATE TABLE clientes(
	id INT NOT NULL AUTO_INCREMENT,
    primeiro_nome VARCHAR(25) NOT NULL,
    sobrenome VARCHAR(60) NOT NULL,
    cpf CHAR(11) NOT NULL,
    celular VARCHAR(20) NOT NULL,
    email VARCHAR(60) DEFAULT NULL,
    cep CHAR(8) NOT NULL,
    numero CHAR(5) NOT NULL,
    PRIMARY KEY(id)

);

CREATE TABLE categorias (
	id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,

    PRIMARY KEY(id)
);

CREATE TABLE veiculos(
	id INT NOT NULL AUTO_INCREMENT,
    chassi VARCHAR(17) NOT NULL,
    montadora VARCHAR(60) NOT NULL,
    modelo VARCHAR(30) NOT NULL,
    id_categoria INT NOT NULL,
    preco_diaria DOUBLE NOT NULL,
    status_oficina  TINYINT NOT NULL DEFAULT 0,
    status_locacao  TINYINT NOT NULL DEFAULT 0,

    PRIMARY KEY(id),
    FOREIGN KEY(id_categoria) REFERENCES categorias (id)

);

CREATE TABLE locacoes(
	id INT NOT NULL AUTO_INCREMENT,
   	data_locacao DATE NOT NULL,
    data_prevista_entrega DATE NOT NULL,
    data_devolucao DATE DEFAULT NULL,
    multa_atraso DOUBLE DEFAULT NULL,
    total DOUBLE NOT NULL,
    status_locacao TINYINT NOT NULL DEFAULT 0,
    id_veiculo INT NOT NULL,
    id_cliente INT NOT NULL,

    PRIMARY KEY(id),
    FOREIGN KEY(id_veiculo) REFERENCES veiculos (id),
    FOREIGN KEY(id_cliente) REFERENCES clientes (id)

);

CREATE TABLE reparos(
	id INT NOT NULL AUTO_INCREMENT,
    id_veiculo INT NOT NULL,
    data_entrada DATE NOT NULL,
    data_saida DATE DEFAULT NULL,
    total FLOAT DEFAULT NULL,
    status_reparo TINYINT NOT NULL DEFAULT 0,
    
    PRIMARY KEY(id),
    FOREIGN KEY(id_veiculo) REFERENCES veiculos (id)
);


INSERT INTO usuarios (primeiro_nome, cpf, senha) 
VALUES ('admin', '00000000000', '$2y$10$roNGa2IJ2vGE2b9ibOOpbOX0y/xwHHA./QKf.Sp7JOJ6f.zXpiN4O');

INSERT INTO categorias (nome) VALUES ('Hatch');
INSERT INTO categorias (nome) VALUES ('Sedan');
INSERT INTO categorias (nome) VALUES ('SUV');
INSERT INTO categorias (nome) VALUES ('Pick-Ups');

