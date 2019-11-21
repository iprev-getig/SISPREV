create database sisprev;

create table sistema (
		id serial primary key,
		nome varchar(100),
		descricao varchar(200),
		sigla varchar(10),
		icone varchar(30),
		created timestamp,
		modified timestamp
	);

insert into sistema (nome, descricao, sigla, icone) 
values ('Sistema de Atendimento nas Agências', '', 'SAGEN', 'fas fa-building');

insert into sistema (nome, descricao, sigla, icone) 
values ('Sistema de Cobrança previdenciária', '', 'SICOP', 'fas fa-calculator');

insert into sistema (nome, descricao, sigla, icone) 
values ('Sistema de Ordem de Serviço', '', 'SOS', 'fas fa-headset');

insert into sistema (nome, descricao, sigla, icone) 
values ('Sistema de Autorização de Pagamento', '', 'SAP', 'fas fa-money-check-alt');

create table tipo_acesso (
		id serial primary key,
		descricao varchar(200),
		created timestamp,
		modified timestamp
	);

create table usuario (
		id serial primary key,
		nome varchar(250),
		senha varchar(250),
		setor_id int,
		created timestamp,
		modified timestamp
	);

create table acesso (
		id serial primary key,
		index boolean,
		add boolean,
		edit boolean,
		del boolean,
		view boolean,
		tipo_acesso_id int,
		usuario_id int,
		sistema_id int,
		created timestamp,
		modified timestamp
	);

create table coordenadoria (
		id serial primary key,
		nome varchar(150),
		operador_id int,
		cidade_id int,
		created timestamp,
		modified timestamp
	);

create table estado (
		id serial primary key,
		nome varchar (250),
		uf varchar(3),
		created timestamp,
		modified timestamp
	);

create table cidade (
		id serial primary key,
		nome varchar(150),
		estado_id int,
		created timestamp,
		modified timestamp
	);

create table operador (
		id serial primary key,
		bloqueado boolean,
		ult_acesso timestamp,
		usuario_id int,
		cidade_id int,
		created timestamp,
		modified timestamp
	);

create table setor (
		id serial primary key,
		nome varchar(250),
		sigla varchar(20),
		cidade_id int,
		created timestamp,
		modified timestamp
	);

create table orgao (
		id serial primary key,
		nome varchar(250),
		sigla varchar(20),
		codigo int,
		created timestamp,
		modified timestamp
	);

create table tipo_atendimento (
		id serial primary key,
		descricao varchar(250),
		created timestamp,
		modified timestamp
	);

create table pessoa (
		id serial primary key,
		nome varchar(250),
		cpf varchar(20),
		matricula varchar(20),
		nascimento date,
		created timestamp,
		modified timestamp
);


ALTER TABLE usuario ADD CONSTRAINT usuario_setor_id
FOREIGN KEY (setor_id) REFERENCES setor (id);

ALTER TABLE acesso ADD CONSTRAINT acesso_tipo_acesso_id
FOREIGN KEY (tipo_acesso_id) REFERENCES tipo_acesso (id);

ALTER TABLE acesso ADD CONSTRAINT acesso_usuario_id
FOREIGN KEY (usuario_id) REFERENCES usuario (id);

ALTER TABLE acesso ADD CONSTRAINT acesso_sistema_id
FOREIGN KEY (sistema_id) REFERENCES sistema (id);

ALTER TABLE coordenadoria ADD CONSTRAINT coordenadoria_operador_id
FOREIGN KEY (operador_id) REFERENCES operador (id);

ALTER TABLE coordenadoria ADD CONSTRAINT coordenadoria_cidade_id
FOREIGN KEY (cidade_id) REFERENCES cidade (id);

ALTER TABLE cidade ADD CONSTRAINT cidade_estado_id
FOREIGN KEY (estado_id) REFERENCES estado (id);

ALTER TABLE operador ADD CONSTRAINT operador_usuario_id
FOREIGN KEY (usuario_id) REFERENCES usuario (id);

ALTER TABLE operador ADD CONSTRAINT operador_cidade_id
FOREIGN KEY (cidade_id) REFERENCES cidade (id);

ALTER TABLE setor ADD CONSTRAINT setor_cidade_id
FOREIGN KEY (cidade_id) REFERENCES cidade (id);

ALTER TABLE orgao ADD CONSTRAINT orgao_cidade_id
FOREIGN KEY (cidade_id) REFERENCES cidade (id);

CREATE SCHEMA sagen

create table sagen.ordem_atendimentos (
		id serial primary key,
		inicio timestamp
		fim timestamp
		solucao text,
		conclusao text,
		tipo_atendimento_id int,
		usuario_id int,
		localizacao_id int,
		pessoa_id int,
		created timestamp,
		modified timestamp
​	FOREIGN KEY (cidade_id) REFERENCES public.cidade (id),
	FOREIGN KEY (tipo_atendimento_id) REFERENCES public.tipo_atendimento (id),
	FOREIGN KEY (usuario_id) REFERENCES public.usuario (id),
	FOREIGN KEY (orgao_id) REFERENCES public.orgao (id),
	FOREIGN KEY (pessoa_id) REFERENCES public.pessoa (id)
);
