CREATE TABLE t6ex2_cad_enderecos
(
   id int PRIMARY KEY auto_increment,
   cep char(10),
   logradouro varchar(100),
   bairro varchar(50),
   cidade varchar(50),
   estado varchar(2)
) ENGINE=InnoDB;