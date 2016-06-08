/** CRIAÇÃO DA TABELA ROLES */
CREATE TABLE public.roles
(
  id_roles integer NOT NULL DEFAULT nextval('roles_id_roles_seq'::regclass),
  descricao character varying NOT NULL,
  CONSTRAINT roles_pkey PRIMARY KEY (id_roles)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.roles
  OWNER TO leonardbank;

/** CRIAÇÃO DA TABELA USUARIO */
CREATE TABLE public.usuario
(
  id_usuario integer NOT NULL DEFAULT nextval('usuario_id_usuario_seq'::regclass),
  usuario character varying NOT NULL,
  senha character varying NOT NULL,
  salt character varying NOT NULL,
  criado_em timestamp without time zone NOT NULL DEFAULT now(),
  id_roles integer NOT NULL,
  email character varying NOT NULL,
  CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario),
  CONSTRAINT fk_roles FOREIGN KEY (id_roles)
      REFERENCES public.roles (id_roles) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.usuario
  OWNER TO leonardbank;

-- Index: public.fki_roles

-- DROP INDEX public.fki_roles;

CREATE INDEX fki_roles
  ON public.usuario
  USING btree
  (id_roles);

/** CRIAÇÃO DA TABELA PESSOA */
CREATE TABLE public.pessoa
(
  id_pessoa integer NOT NULL DEFAULT nextval('pessoa_id_pessoa_seq'::regclass),
  nome character varying NOT NULL,
  cpf character varying,
  telefone character varying,
  endereco_completo character varying,
  id_usuario integer,
  CONSTRAINT pessoa_pkey PRIMARY KEY (id_pessoa),
  CONSTRAINT pessoa_id_usuario_fkey FOREIGN KEY (id_usuario)
      REFERENCES public.usuario (id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pessoa
  OWNER TO leonardbank;
  
/** CRIAÇÃO DA TABELA PEDIDO DE INVESTIMENTO */
CREATE TABLE public.pedido_investimento
(
  id_pedido_investimento integer NOT NULL DEFAULT nextval('pedido_investimento_id_pedido_investimento_seq'::regclass),
  criado_em timestamp without time zone NOT NULL DEFAULT now(),
  prazo date NOT NULL,
  objetivo integer,
  descricao text,
  nome character varying NOT NULL,
  id_criador integer,
  CONSTRAINT pedido_investimento_pkey PRIMARY KEY (id_pedido_investimento),
  CONSTRAINT pedido_investimento_id_criador_fkey FOREIGN KEY (id_criador)
      REFERENCES public.usuario (id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.pedido_investimento
  OWNER TO leonardbank;
  
/** CRIAÇÂO DA TABELA IMAGEM */
CREATE TABLE public.imagem
(
  id_imagem integer NOT NULL DEFAULT nextval('imagem_id_imagem_seq'::regclass),
  conteudo bytea,
  descricao character varying,
  CONSTRAINT imagem_pkey PRIMARY KEY (id_imagem)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.imagem
  OWNER TO leonardbank;
  
/**CRIAÇÃO DA TABELA IMAGEM PEDIDO */
CREATE TABLE public.imagem_pedido
(
  id_imagem integer NOT NULL,
  id_pedido integer NOT NULL,
  CONSTRAINT imagem_pedido_pkey PRIMARY KEY (id_imagem, id_pedido),
  CONSTRAINT imagem_pedido_id_imagem_fkey FOREIGN KEY (id_imagem)
      REFERENCES public.imagem (id_imagem) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT imagem_pedido_id_pedido_fkey FOREIGN KEY (id_pedido)
      REFERENCES public.pedido_investimento (id_pedido_investimento) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.imagem_pedido
  OWNER TO leonardbank;
  
/**CRIAÇÃO DA TABELA INVESTIMENTO */
CREATE TABLE public.investimento
(
  id_investimento integer NOT NULL DEFAULT nextval('investimento_id_investimento_seq'::regclass),
  id_investidor integer NOT NULL,
  id_investido_em integer,
  criado_em timestamp without time zone NOT NULL DEFAULT now(),
  valor real NOT NULL,
  CONSTRAINT investimento_pkey PRIMARY KEY (id_investimento),
  CONSTRAINT investimento_id_investido_em_fkey FOREIGN KEY (id_investido_em)
      REFERENCES public.pedido_investimento (id_pedido_investimento) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT investimento_id_investidor_fkey FOREIGN KEY (id_investidor)
      REFERENCES public.usuario (id_usuario) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.investimento
  OWNER TO leonardbank;