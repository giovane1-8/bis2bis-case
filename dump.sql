SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `tb_post`;
CREATE TABLE `tb_post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `nm_titulo` varchar(100) NOT NULL,
  `nm_corpo` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_post` date NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_tb_post_tb_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_tb_post_tb_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(45) NOT NULL,
  `nm_email` varchar(100) NOT NULL,
  `nm_senha` varchar(100) NOT NULL,
  `nm_privilegio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


