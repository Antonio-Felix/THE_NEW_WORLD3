create schema newworld; 
use newworld;

create table situacao(
	codsitua int primary key not null,
    nome varchar(50) not null
);

insert into situacao values(1, "Disponível");
insert into situacao values(2, "Indisponível");
# insert into situacao values(3, "reservado");

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
 insert into livro values(3, "emma", 2, "romance", "Jane Austen");


create table funcionario(
	cpffun int(11) primary key not null, 
    nome varchar(50) not null,
    email varchar(50) not null, 
    fone int(11) not null,
	senha varchar(8) not null
);

insert into funcionario values(123, 'barbara', 'barbara@gmail.com', 123, 123); 
insert into funcionario values (1, "1", "1@gmail.com", 1, 1);

create table leitor(
	cpfleitor int(11) primary key not null, 
    nome varchar(50) not null, 
    email varchar(50) not null, 
    fone varchar(50) not null,
    senha varchar(8) not null
);

insert into leitor values(129914934, "barbara cabral", "barbaraaraujo@gmail.com", 99615165, 12345678);
insert into leitor values (2, "2", "2@gmail.com", 2, 2);

# onde ação representa o que está fazendo: renovando, reservando, emprestando ou devolvendo

create table acao(
	codacao int primary key not null,
    nome varchar(50) not null
);

# inserts fixos das ações 
insert into acao values(1, "Emprestado");
insert into acao values(2, "Devolvido");
# insert into acao values(3, "Renovado");


# referente a tabela de emprestimos 

create table emprestimo(
    codlivro int not null, 
    codsitua int not null,
    cpfleitor int not null,
	cpffun int not null, 
	data_e date not null, 
    data_r date not null, 
    renova int, 
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
    codsitua int not null, 
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
        renova int not null,
		foreign key (renova) references emprestimo(renova),
		foreign key (cpfleitor) references leitor(cpfleitor),
		foreign key (codlivro) references livro(codlivro),
		foreign key (cpffun) references funcionario(cpffun),
        foreign key (codsitua) references situacao(codsitua), 
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


# Procedimento para adicionar a tabela relatorio 

DELIMITER | 

create procedure add_relatorio (acao int(1), codlivro int, codsitua int, cpfleitor int, cpffun int, data_e date, data_d date)
begin 
	INSERT INTO relatorio (acao, codlivro, codsitua, cpfleitor, cpffun, data_e, data_d) 
    values (acao, codlivro, codsitua, cpfleitor, cpffun, data_e, data_d);
end;
|

# Procedimento para adicionar nova devolucao 
	
DELIMITER |

create procedure devolucao(codlivro int, codsitua int(1), cpfleitor int,  cpffun int, data_e date, data_r date, data_d date)
begin 
		INSERT into devolvido(codlivro, codsitua, cpfleitor,  cpffun, data_e, data_r, data_d) 
        values(codlivro, codsitua, cpfleitor,  cpffun, data_e, data_r, data_d); 
end; 
|

#PROCEDIMENTO PARA DELETAR DA TABELA EMPRESTIMO 

DELIMITER |
create procedure del_emp(codlivro int, cpfleitor int)
begin 
		delete from emprestimo where codlivro = codlivro and cpfleitor = cpfleitor; 
end; 

|

# PROCEDIMENTO PARA RENOVAR A DATA DE ENTREGA DOS LIVROS 

DELIMITER | 
create procedure renova(cpfleitor int, codlivro int, datanova date , codsitua int, renova int)
begin 
		update emprestimo e
        set e.data_r = datanova, e.renova = renova 
        where e.codlivro = codlivro 
        and e.cpfleitor = cpfleitor
        and e.codsitua = codsitua;
        
        update relatorio r 
        set r.data_d = datanova 
        where r.codlivro = codlivro 
        and r.cpfleitor = cpfleitor 
        and r.codsitua = codsitua;
end; 
| 

# PROCEDIMENTO PARA LISTAGEM DOS EMPRÉSTIMOS DO LEITOR

DELIMITER |
create procedure lista_emp_leitor(cpfleitor int)

begin
SELECT l.title, l.codlivro, l.autor, L.categoria, e.data_e, e.data_r, e.renova 
		from livro l, emprestimo e
		where l.codlivro = e.codlivro 
		and e.cpfleitor = cpfleitor; 

end;
|

# PROCEDIMENTO PARA MOSTRAR O HISTÓRICO DO LEITOR 

DELIMITER |
create procedure historico_leitor(cpfleitor int)

begin
SELECT l.*, r.*, e.renova, a.nome 
		from relatorio r, livro l, emprestimo e, acao a
		where r.cpfleitor = cpfleitor 
		and r.codlivro = l.codlivro
		and e.codlivro = r.codlivro
		and r.acao = a.codacao
		ORDER BY l.title ASC; 

end;
|

# PROCEDIMENTO DE LISTAGEM DO ACERTO (BIBLIOTECÁRIO) 

DELIMITER |
create procedure listar_acervo()

begin

SELECT l.*, s.nome 
	from livro l, situacao s
	where s.codsitua = l.codsitua; 

end;
|

#PROCEDIMENTO PARA LISTAR O HISTÓRICO DO LIVRO 

DELIMITER |
create procedure historico_livro(codlivro int)

begin

SELECT r.*, a.nome as nomea, e.renova, l.nome as nomelei
	from relatorio r, acao a, emprestimo e, leitor l 
	where codlivro = r.codlivro 
    and a.codacao = r.acao
    and l.cpfleitor = e.cpfleitor
    and e.codlivro = r.codlivro;

end;
|


#PROCEDIMENTO PARA LISTAR OS EMPRÉSTIMOS 
DELIMITER |
create procedure listar_emp()

begin

SELECT r.*, e.renova, l.nome as nomelei, li.*
	from relatorio r, emprestimo e, leitor l, livro li
	where e.codlivro = r.codlivro
    and l.cpfleitor = e.cpfleitor
    and e.renova = r.renova 
    and li.codlivro = r.codlivro;

end;
|

#PROCEDIMENTO PARA LISTAR AS DEVOLUÇÕES 

DELIMITER |
create procedure listar_devol()

begin

SELECT d.*, l.nome as nomelei, li.title
	from devolvido d, leitor l, livro li
	where l.cpfleitor = d.cpfleitor
    and li.codlivro = d.codlivro;

end;
|

#PROCEDIMENTO PARA VER O RELÁTORIO DE DETERMINADO DIA




# select * from emprestimo;

# select * from relatorio;

# drop schema newworld

# use newworld;

# select * from livro;

# select * from leitor; 

# select * from devolvido;

# select * from funcionario;

# select * from emprestimo; 

# select * from devolvido; 


