use projeto;

create or replace table cliente(
	cod_cliente number(4) auto_increment not null,
    nome_cliente varchar(100) not null,
    cpf varchar(11) unique,
    data_nasc date not null,
    email varchar(100),
    PRIMARY KEY (cod_cliente));
	
create table produto(
	cod_produto number(4) auto_increment not null,
    nome_produto varchar(100) not null,
	cod_barra varchar(20) not null,
	preco number(6,2)
    descricao varchar(1000),
    PRIMARY KEY (cod_produto));
	
create table pedido(
	cod_pedido int(4) auto_increment not null,
	cod_produto int(4) not null,
	cod_cliente int(4) not null,
	data_padido date not null,
	qntd int(4),
	situacao varchar(10),
    PRIMARY KEY (cod_pedido),
    FOREIGN KEY (cod_produto) REFERENCES produto(cod_produto),
    FOREIGN KEY (cod_cliente) REFERENCES cliente(cod_cliente));
	
	
insert into cliente(nome_cliente, cpf, data_nasc, email) values ('João', '12345678', '2008-11-11', 'juaopaulo@gmail.com');
insert into cliente(nome_cliente, cpf, data_nasc, email) values ('Paulo', '87654321', '1999-02-05', 'paulhldutra@gmail.com'),
('Matheus', '44444444', '2001-1-13', 'juaopaulo@terra.com.br'), ('José', '55555555', '1997-3-11', null),
('Maria', '12312312', '2002-5-20', null);

insert into Produto(nome_produto, cod_barra, preco, descricao) values ('Cadeira', '70589A', 57, 'Cadeira de madeira'),
('Amofada', '40028A', 42.5, 'Amofada de algodão'), ('Caneca', '70598a', 13.75, null),
('Lapis', '45B389', 1.99, 'Lapis grafiti 1.5mm'), ('Mesa de rascunho', '7798FC', 300, null);

insert into pedido(cod_produto, cod_cliente, data_padido, qntd, situacao) values
	(1, 1, '2019-05-23', 2, 'Em Aberto'),
	(2, 1, '2019-05-23', 1, 'Em Aberto'),
	(3, 3, '2019-05-23', 5, 'Pago'),
	(3, 3, '2019-05-23', 2, 'Cancelado'),
	(1, 1, '2019-05-23', 3, 'Cancelado'),
	(1, 5, '2019-05-23', 1, 'Em Aberto'),
	(4, 1, '2019-05-23', 6, 'Pago'),
	(1, 4, '2019-05-23', 2, 'Em Aberto'),
	(2, 5, '2019-05-23', 3, 'Cancelado'),
	(5, 1, '2019-05-23', 1, 'Em Aberto'),
	(1, 1, '2019-05-23', 2, 'Pago'),
	(1, 1, '2019-05-23', 2, 'Cancelado');