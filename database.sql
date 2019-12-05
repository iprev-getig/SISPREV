create database sisprev;

create table sistemas (
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
		nome varchar(200),
		controller varchar(50),
		principal boolean default false,
		created timestamp,
		modified timestamp
	);

insert into tipos_acessos (nome, controller) values ('Cidades', 'cidades');
insert into tipos_acessos (nome, controller) values ('Estados', 'estados');
insert into tipos_acessos (nome, controller) values ('Orgaos', 'orgaos');
insert into tipos_acessos (nome, controller) values ('Coordenadorias', 'coordenadorias');
insert into tipos_acessos (nome, controller) values ('Setores', 'setores');
insert into tipos_acessos (nome, controller) values ('Tipos de atendimentos', 'tipos_atendimentos');
insert into tipos_acessos (nome, controller) values ('Tipo de acessos', 'tipos_acessos');
insert into tipos_acessos (nome, controller) values ('Sistemas', 'sistemas');
insert into tipos_acessos (nome, controller) values ('Acessos', 'acessos');
insert into tipos_acessos (nome, controller) values ('Pessoas', 'pessoas');
insert into tipos_acessos (nome, controller) values ('Usuários', 'usuarios');
insert into tipos_acessos (nome, controller, principal) values ('Atendimentos', 'atendimentos', true);

create table usuarios (
		id serial primary key,
		login varchar(50),
		email varchar(100),
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

insert into usuarios (login, email, nome, senha, bloqueado) values ('admin', 'suporte.getig@iprev.sc.gov.br', 'Usuário Master', '', false);

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

insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 1, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 2, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 3, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 4, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 5, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 6, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 7, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 8, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 9, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 10, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 11, 1, 1);
insert into acessos (index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(true, true, true, true, true, 12, 1, 1);

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

insert into estados (nome, uf) values
('SANTA CATARINA', 'SC');
insert into estados (nome, uf) values
('RIO GRANDE DO SUL', 'RS');
insert into estados (nome, uf) values
('PARANA', 'PR');
insert into estados (nome, uf) values
('SAO PAULO', 'SP');	
insert into estados (nome, uf) values
('RIO DE JANEIRO', 'RJ');

create table cidades (
		id serial primary key,
		nome varchar(150),
		estado_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT cidade_estado_id
			FOREIGN KEY (estado_id) REFERENCES estados (id)	
	);
insert into cidades (nome, estado_id) values
('FLORIANOPOLIS', 1);
insert into cidades (nome, estado_id) values
('PORTO ALEGRE', 2);
insert into cidades (nome, estado_id) values
('CURITIBA', 3);
insert into cidades (nome, estado_id) values
('SAO PAULO', 4);	
insert into cidades (nome, estado_id) values
('RIO DE JANEIRO', 5);


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
insert into orgaos (nome, sigla, codigo, cidade_id) values
('INSTITUTO DE PREVIDENCIA DO ESTADO DE SANTA CATARINA', 'IPREV', 1111, 1);
insert into orgaos (nome, sigla, codigo, cidade_id) values
('INSTITUTO DE METROLOGIA DO ESTADO DE SANTA CATARINA', 'IMETRO', 2222, 1);
insert into orgaos (nome, sigla, codigo, cidade_id) values
('SECRETARIA DE SEGURANÇ PUBLICA', 'SSP-SC', 3333, 1);
insert into orgaos (nome, sigla, codigo, cidade_id) values
('SECRETARIA DE ADMINISTRAÇÃO', 'SEA', 4444, 1);	
insert into orgaos (nome, sigla, codigo, cidade_id) values
('ASSEMBLEI LEGISLATIVA DE SANTA CATARINA', 'ALESC', 5555, 1);


create table tipos_atendimentos (
		id serial primary key,
		nome varchar(250),
		created timestamp,
		modified timestamp
	);
insert into tipos_atendimentos (nome) values
('ATENDIMENTO POR TELEFONE');
insert into tipos_atendimentos (nome) values
('ANALISE DE PROCESSO DE APOSENTADORIA');
insert into tipos_atendimentos (nome) values
('ANALISE DE PROCESSO DE AVERBAÇÃO');
insert into tipos_atendimentos (nome) values
('ANALISE DE PROCESSO DE PENSÃO');	
insert into tipos_atendimentos (nome) values
('VISITAS DOMICILIAR');


create table pessoas (
		id serial primary key,
		nome varchar(250),
		cpf varchar(20),
		matricula varchar(20),
		nascimento date,
		created timestamp,
		modified timestamp
);

CREATE SCHEMA sagen;

create table sagen.atendimentos (
		id serial primary key,
		inicio timestamp,
		fim timestamp,
		solucao text,
		conclusao text,
		tipo_atendimento_id int,
		usuario_id int,
		cidades_id int,
		pessoa_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT atendimento_tipo_id
            FOREIGN KEY (tipo_atendimento_id) REFERENCES public.tipos_atendimentos (id),
		CONSTRAINT atendimento_usuario_id
            FOREIGN KEY (usuario_id) REFERENCES public.usuarios (id),
	 	CONSTRAINT atendimento_cidades_id
            FOREIGN KEY (localizacao_id) REFERENCES public.cidades (id),
		CONSTRAINT atendimento_pessoa_id
            FOREIGN KEY (pessoa_id) REFERENCES public.pessoas (id)
);

