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

create table acao(
	codacao int primary key not null,
    nome varchar(50) not null
);

# inserts fixos das ações 
insert into acao values(1, "emprestando");
insert into acao values(2, "devolvendo");
insert into acao values(3, "renovando");
insert into acao values(4, "reservando");

# referente a tabela de emprestimos 

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

# referente a tabela de devolvidos

create table devolvido (
	id INT AUTO_INCREMENT PRIMARY KEY,
	codlivro int not null, 
    codsitua int(1) not null, 
    cpfleitor int not null, 
    cpffun int not null, 
    data_e date not null, 
    data_r date not null, 
    data_d date not null, 
    atraso int not null, 
    foreign key (cpfleitor) references leitor(cpfleitor),
	foreign key (codlivro) references livro(codlivro),
    foreign key (cpffun) references funcionario(cpffun),
    foreign key (codsitua) references situacao(codsitua), 
	CHECK (atraso >= 0) 
    
);

# guarda as ações que foram realizadas com o objetivo de não perder o que  foi feito
# sua separacao é feita com o codigo da ação 

create table relatorio(
		id INT AUTO_INCREMENT PRIMARY KEY,
        acao int(1) not null, 
        codlivro int not null, 
		codsitua int(1) not null, 
		cpfleitor int not null, 
		cpffun int not null, 
		data_e date not null, 
		data_d date not null, 
		foreign key (cpfleitor) references leitor(cpfleitor),
		foreign key (codlivro) references livro(codlivro),
		foreign key (cpffun) references funcionario(cpffun),
        foreign key (acao) references acao(codacao)
		
);

# ============================== PROCEDIMENTOS ========================================= # 

# PROCEDIMENTO PARA MUDAR A SITUAÇAO DOS LIVROS 
DELIMITER | 
create procedure set_situa(cod int(1), codlivro int)
begin 
		update livro l set l.codsitua = cod where l.codlivro = codlivro; 
end; 
| 


# Procedimento para adicionar novo feito a tabela relatorio 

DELIMITER | 

create procedure add_relatorio (acao int(1), codlivro int, codsituacao int, cpfleitor int, cpffun int, data_e date, data_d date)
begin 
	INSERT INTO relatorio (acao, codlivro, codsitua, cpfleitor, cpffun, data_e, data_d) values (acao, codlivro, codsitua, cpfleitor, cpffun, data_e, data_d);
end;
|

# Procedimento para adicionar nova devolucao 
	
DELIMITER |

create procedure devolucao(codlivro int, codsitua int(1), cpfleitor int,  cpffun int, data_e date, data_r date, data_d date)
begin 
		INSERT into devolvido(codlivro, codsitua, cpfleitor,  cpffun, data_e, data_r, data_d) values(codlivro, codsitua, cpfleitor,  cpffun, data_e, data_r, data_d); 
end; 
|

#PROCEDIMENTO PARA DELETAR DA TABELA EMPRESTIMO 

DELIMITER |
create procedure del_emp(codlivro int, cpfleitor int)
begin 
		delete from emprestimo where codlivro = codlivro and cpfleitor = cpfleitor; 
end; 

|



# select * from emprestimo;

# select * from relatorio;

# drop schema newworld

# select * from livro;

# select * from devolvido;

