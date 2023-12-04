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
 insert into livro values(1, "biblia", 1, "amor", "Deus");
 insert into livro values(2, "harry potter",2 , "fantasia", "jk. holling");
 insert into livro values(3, "emma", 3, "romance", "Jane Austen");


create table funcionario(
	cpffun int(11) primary key not null, 
    nome varchar(50) not null,
    email varchar(50) not null, 
    fone int(11) not null,
	senha int(8) not null
);

insert into funcionario values(123, 'barbara', 'barbara@gmail.com', 123, 123); 
insert into funcionario values (1, "1", "1@gmail.com", 1, 1);

create table leitor(
	cpfleitor int(11) primary key not null, 
    nome varchar(50) not null, 
    email varchar(50) not null, 
    fone varchar(50) not null,
    senha int(8) not null
);

insert into leitor values(129914934, "barbara cabral", "barbaraaraujo@gmail.com", "99615165", 12345678);
insert into leitor values (2, "2", "2@gmail.com", 2, 2);

# onde ação representa o que está fazendo: renovando, reservando, emprestando ou devolvendo

create table emprestimo(
    codlivro int not null, 
    codsitua int not null,
    cpfleitor int not null,
	cpffun int not null, 
	data_e date not null, 
    data_r date not null, 
    primary key(cpfleitor, codlivro, cpffun), 
    foreign key (cpfleitor) references leitor(cpfleitor),
	foreign key (codlivro) references livro(codlivro),
    foreign key (cpffun) references funcionario(cpffun),
    foreign key (codsitua) references situacao(codsitua)
);


DELIMITER | 
create procedure set_emprestar(cod int(1), codlivro int)
begin 
		update livro l set l.codsitua = cod where l.codlivro = codlivro; 
end; 
| 

DELIMITER |
create procedure autenticar(cpf varchar(11), senha int(8), tipo int)
begin
select * 
from pessoa p 
where cpf = p.cpfpessoa and 
senha = p.senha and
tipo = p.coduser;
end; |
