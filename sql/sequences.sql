CREATE SEQUENCE public.imagem_id_imagem_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.imagem_id_imagem_seq
  OWNER TO leonardbank;

CREATE SEQUENCE public.investimento_id_investimento_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.investimento_id_investimento_seq
  OWNER TO leonardbank;

 CREATE SEQUENCE public.pedido_investimento_id_pedido_investimento_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.pedido_investimento_id_pedido_investimento_seq
  OWNER TO leonardbank;

 CREATE SEQUENCE public.pessoa_id_pessoa_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.pessoa_id_pessoa_seq
  OWNER TO leonardbank;

CREATE SEQUENCE public.roles_id_roles_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 3
  CACHE 1;
ALTER TABLE public.roles_id_roles_seq
  OWNER TO leonardbank;

CREATE SEQUENCE public.usuario_id_usuario_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE public.usuario_id_usuario_seq
  OWNER TO leonardbank;
