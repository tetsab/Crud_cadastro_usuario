CREATE DATABASE crud;
CREATE TABLE `registrations` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(30) NOT NULL,
  `lastname` VARCHAR(30) NOT NULL,
  `address` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `notes` VARCHAR(50),
  `optional` VARCHAR(150),
PRIMARY KEY(`userid`)
);


INSERT INTO `registrations` (`userid`, `firstname`, `lastname`, `address`, `email`, `optional` )
VALUES (1, 'Sammy', 'Martins', 'Rua das Acasseas', 'samm22@gmail.com', 'Não tenho mensagem para escrever');
       
INSERT INTO `registrations` (`userid`, `firstname`, `lastname`, `address`, `email`)
VALUES (2, 'Matt', 'Diath', 'Rua Pereira Dias', 'matt@gmail.com');