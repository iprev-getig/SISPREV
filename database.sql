create database sisprev;

create table sistema (
		id serial primary key,
		sigla varchar(10),
		nome varchar(100),
		descricao varchar(200),
		icone varchar(30),
		created timestamp,
		modified timestamp
	);

insert into sistemas (nome, descricao, sigla, icone) 
values ('Sistema de Atendimento nas Agências', '', 'SAGEN', 'fas fa-building');

insert into sistemas (nome, descricao, sigla, icone) 
values ('Sistema de Cobrança previdenciária', '', 'SICOP', 'fas fa-calculator');

insert into sistemas (nome, descricao, sigla, icone) 
values ('Sistema de Ordem de Serviço', '', 'SOS', 'fas fa-headset');

insert into sistemas (nome, descricao, sigla, icone) 
values ('Sistema de Autorização de Pagamento', '', 'SAP', 'fas fa-money-check-alt');

create table tipos_acessos (
		id serial primary key,
		descricao varchar(200),
		created timestamp,
		modified timestamp
	);

create table usuarios (
		id serial primary key,
		nome varchar(250),
		senha varchar(250),
		bloqueado boolean,
		ult_acesso timestamp,
		setor_id int,
		created timestamp,
		modified timestamp,
	CONSTRAINT usuario_setor_id
		FOREIGN KEY (setor_id) REFERENCES setores (id)
);

create table acessos (
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
		modified timestamp,
		CONSTRAINT acesso_tipo_acesso_id
			FOREIGN KEY (tipo_acesso_id) REFERENCES tipos_acessos (id),
		CONSTRAINT acesso_usuario_id
			FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
		CONSTRAINT acesso_sistema_id
			FOREIGN KEY (sistema_id) REFERENCES sistemas (id)
	);

create table coordenadorias (
		id serial primary key,
		nome varchar(150),
		usuario_id int,
		cidade_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT coordenadoria_usuarios_id
			FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
		CONSTRAINT coordenadoria_cidade_id
			FOREIGN KEY (cidade_id) REFERENCES cidades (id)
	);

create table estados (
		id serial primary key,
		nome varchar (250),
		uf varchar(3),
		created timestamp,
		modified timestamp
	);

create table cidades (
		id serial primary key,
		nome varchar(150),
		estado_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT cidade_estado_id
			FOREIGN KEY (estado_id) REFERENCES estados (id)	
	);

create table operadores (
		id serial primary key,
		bloqueado boolean,
		ult_acesso timestamp,
		usuario_id int,
		cidade_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT operador_usuario_id
			FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
		CONSTRAINT operador_cidade_id
			FOREIGN KEY (cidade_id) REFERENCES cidades (id)	
);

create table setores (
		id serial primary key,
		nome varchar(250),
		sigla varchar(20),
		cidade_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT setor_cidade_id
			FOREIGN KEY (cidade_id) REFERENCES cidades (id)
	);

create table orgaos (
		id serial primary key,
		nome varchar(250),
		sigla varchar(20),
		codigo int,
		cidade_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT orgao_cidade_id
			FOREIGN KEY (cidade_id) REFERENCES cidades (id)
	);

create table tipos_atendimentos (
		id serial primary key,
		descricao varchar(250),
		created timestamp,
		modified timestamp
	);

create table pessoas (
		id serial primary key,
		nome varchar(250),
		cpf varchar(20),
		matricula varchar(20),
		nascimento date,
		created timestamp,
		modified timestamp
);

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
​	 FOREIGN KEY (cidade_id) REFERENCES public.cidades (id),
	FOREIGN KEY (tipo_atendimento_id) REFERENCES public.tipo_atendimentos (id),
	FOREIGN KEY (usuario_id) REFERENCES public.usuarios (id),
	FOREIGN KEY (orgao_id) REFERENCES public.orgaos (id),
	FOREIGN KEY (pessoa_id) REFERENCES public.pessoas (id)
);
