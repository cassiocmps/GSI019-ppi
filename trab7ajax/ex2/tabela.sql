CREATE TABLE t7ex2_enderecos
(
   id int PRIMARY KEY auto_increment,
   cep char(9),
   rua varchar(100),
   bairro varchar(50),
   cidade varchar(50)
) ENGINE=InnoDB;