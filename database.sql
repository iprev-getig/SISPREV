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

insert into tipos_acessos (id, nome, controller) values (1, 'Cidades', 'cidades');
insert into tipos_acessos (id, nome, controller) values (2, 'Estados', 'estados');
insert into tipos_acessos (id, nome, controller) values (3, 'Orgaos', 'orgaos');
insert into tipos_acessos (id, nome, controller) values (4, 'Coordenadorias', 'coordenadorias');
insert into tipos_acessos (id, nome, controller) values (5, 'Setores', 'setores');
insert into tipos_acessos (id, nome, controller) values (6, 'Tipos de atendimentos', 'tipo_atendimentos');
insert into tipos_acessos (id, nome, controller) values (7, 'Tipo de acessos', 'tipos_acessos');
insert into tipos_acessos (id, nome, controller) values (8, 'Sistemas', 'sistemas');
insert into tipos_acessos (id, nome, controller) values (9, 'Acessos', 'acessos');
insert into tipos_acessos (id, nome, controller) values (10, 'Pessoas', 'pessoas');
insert into tipos_acessos (id, nome, controller) values (11, 'Usuários', 'usuarios');
insert into tipos_acessos (id, nome, controller, principal) values (12, 'Atendimentos', 'atendimentos', true);

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

insert into usuarios (id, login, email, nome, senha, bloqueado) values (1, 'admin', 'suporte.getig@iprev.sc.gov.br', 'Usuário Master', '', false);

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

insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(1, true, true, true, true, true, 1, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(2, true, true, true, true, true, 2, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(3, true, true, true, true, true, 3, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(4, true, true, true, true, true, 4, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(5, true, true, true, true, true, 5, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(6, true, true, true, true, true, 6, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(7, true, true, true, true, true, 7, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(8, true, true, true, true, true, 8, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(9, true, true, true, true, true, 9, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(10, true, true, true, true, true, 10, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(11, true, true, true, true, true, 11, 1, 1);
insert into acessos (id, index, add, edit, del, view, tipo_acesso_id, usuario_id, sistema_id) values
(12, true, true, true, true, true, 12, 1, 1);

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

insert into estados (id, nome, uf) values
(1, 'SANTA CATARINA', 'SC');
insert into estados (id, nome, uf) values
(2, 'RIO GRANDE DO SUL', 'RS');
insert into estados (id, nome, uf) values
(3, 'PARANA', 'PR');
insert into estados (id, nome, uf) values
(4, 'SAO PAULO', 'SP');	
insert into estados (id, nome, uf) values
(5, 'RIO DE JANEIRO', 'RJ');

create table cidades (
		id serial primary key,
		nome varchar(150),
		estado_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT cidade_estado_id
			FOREIGN KEY (estado_id) REFERENCES estados (id)	
	);
insert into cidades (id, nome, estado_id) values
(1, 'FLORIANOPOLIS', 1);
insert into cidades (id, nome, estado_id) values
(2, 'PORTO ALEGRE', 2);
insert into cidades (id, nome, estado_id) values
(3, 'CURITIBA', 3);
insert into cidades (id, nome, estado_id) values
(4, 'SAO PAULO', 4);	
insert into cidades (id, nome, estado_id) values
(5, 'RIO DE JANEIRO', 5);


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
insert into orgaos (id, nome, sigla, codigo, cidade_id) values
(1, 'INSTITUTO DE PREVIDENCIA DO ESTADO DE SANTA CATARINA', 'IPREV', 1111, 1);
insert into orgaos (id, nome, sigla, codigo, cidade_id) values
(2, 'INSTITUTO DE METROLOGIA DO ESTADO DE SANTA CATARINA', 'IMETRO', 2222, 1);
insert into orgaos (id, nome, sigla, codigo, cidade_id) values
(3, 'SECRETARIA DE SEGURANÇ PUBLICA', 'SSP-SC', 3333, 1);
insert into orgaos (id, nome, sigla, codigo, cidade_id) values
(4, 'SECRETARIA DE ADMINISTRAÇÃO', 'SEA', 4444, 1);	
insert into orgaos (id, nome, sigla, codigo, cidade_id) values
(5, 'ASSEMBLEI LEGISLATIVA DE SANTA CATARINA', 'ALESC', 5555, 1);


create table tipos_atendimentos (
		id serial primary key,
		nome varchar(250),
		created timestamp,
		modified timestamp
	);
insert into tipos_atendimentos (id, nome) values
(1, 'ATENDIMENTO POR TELEFONE');
insert into tipos_atendimentos (id, nome) values
(2, 'ANALISE DE PROCESSO DE APOSENTADORIA');
insert into tipos_atendimentos (id, nome) values
(3, 'ANALISE DE PROCESSO DE AVERBAÇÃO');
insert into tipos_atendimentos (id, nome) values
(4, 'ANALISE DE PROCESSO D PENSÃO');	
insert into tipos_atendimentos (id, nome) values
(5, 'VISITAS DOMICILIAR');


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
		localizacao_id int,
		pessoa_id int,
		created timestamp,
		modified timestamp,
		CONSTRAINT atendimento_tipo_id
            FOREIGN KEY (tipo_atendimento_id) REFERENCES public.tipos_atendimentos (id),
		CONSTRAINT atendimento_usuario_id
            FOREIGN KEY (usuario_id) REFERENCES public.usuarios (id),
	 	CONSTRAINT atendimento_localizacao_id
            FOREIGN KEY (localizacao_id) REFERENCES public.localizacoes (id),
		CONSTRAINT atendimento_pessoa_id
            FOREIGN KEY (pessoa_id) REFERENCES public.pessoas (id)
);

