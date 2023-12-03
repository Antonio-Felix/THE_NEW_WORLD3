create schema newworld; 
use newworld;


create table situacao(
	codsitua int primary key not null,
    nome varchar(50) not null
);

insert into situacao values(1, "disponivel");
insert into situacao values(2, "emprestado");
insert into situacao values(3, "reservado");

create table livro(
	codlivro int primary key not null, 
    title varchar(50),
    codsitua int not null, 
    categoria varchar(50) not null, 
    autor varchar(50) not null,
	foreign key (codsitua) references situacao(codsitua)
);

create table funcionario(
	cpffun int(11) primary key not null, 
    nome varchar(50) not null,
    email varchar(50) not null, 
    fone int(11) not null,
	senha int(8) not null

);

create table leitor(
	cpfleitor int(11) primary key not null, 
    nome varchar(50) not null, 
    email varchar(50) not null, 
    fone varchar(50) not null,
    senha int(8) not null
   
);

create table emprestimo(
	data_e date not null, 
    data_r date not null, 
    cpfleitor int not null, 
    codlivro int not null, 
    cpffun int not null, 
    codsitua int not null,
    primary key(cpfleitor, codlivro, cpffun), 
    foreign key (cpfleitor) references leitor(cpfleitor),
	foreign key (codlivro) references livro(codlivro),
    foreign key (cpffun) references funcionario(cpffun),
    foreign key (codsitua) references situacao(codsitua)
);


DELIMITER |
create procedure autenticar(cpf varchar(11), senha int(8), tipo int)
begin
select * 
from pessoa p 
where cpf = p.cpfpessoa and 
senha = p.senha and
tipo = p.coduser;
end; |
