create schema newworld;
use newworld;

create table tipo(
	codtipo int primary key not null, 
    tipo varchar(20) not null
);

insert into tipo values(1, 'Leitor');
insert into tipo values(2, 'Bibliotecario');

create table pessoa(
	cpfpessoa varchar(14) primary key not null,
	codtipo int not null,
	senha varchar(20) not null,
    foreign key (codtipo) references tipo(codtipo)
);


create table leitor(
	cpfleitor varchar(14) primary key not null,
	nome varchar(100) not null,
    email varchar(100),  
	foreign key (cpfleitor) references pessoa(cpfpessoa)
);

create table bibliotecario(
	cpfbiblio varchar(14) primary key not null,
	nome varchar(100) not null,
    id bigint unique not null,
	foreign key (cpfbiblio) references pessoa(cpfpessoa)
);

create table categoria(
	codcategoria int primary key, 
	nome varchar(100)
);

insert into categoria values(1, "Literatura de ficção");
insert into categoria values(2, "Autoajuda");
insert into categoria values(3, "Quadrinhos");
insert into categoria values(4, "Livros científicos");
insert into categoria values(5, "Não-ficção");
insert into categoria values(6, "Religião");
insert into categoria values(7, "Literatura erótica");

create table livro(
	codlivro int primary key not null,
	nome varchar(100) not null,
	descricao varchar(100) not null,
	autor varchar(100) not null, 
	categoria int, 
	foreign key (categoria) references categoria(codcategoria)
);

create table emprestimo(
	dataegresso date not null, 
	datadevolucao date not null,
	codlivro int not null,
	cpfleitor varchar(14) not null,
    primary key(codlivro, cpfleitor),
	foreign key (cpfleitor) references pessoa(cpfpessoa),
	foreign key (codlivro) references livro(codlivro)
);


DELIMITER |
create procedure autenticar(cpf varchar(14), senha1 varchar(20), tipo int)
begin
select * 
from pessoa p 
where cpf = p.cpfpessoa and 
senha1 = p.senha and
tipo = p.codtipo;
end; |



create view mostra_tipo as 
select * from tipo;
select * from mostra_tipo; 

