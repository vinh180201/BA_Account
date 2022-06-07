CREATE SCHEMA `mvc` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE `mvc`.`account` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `password` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `mvc`.`user_profile` (`id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(100) NOT NULL , `hoten` VARCHAR(100) NOT NULL , `ngaysinh` DATE NOT NULL , `email` VARCHAR(100) NOT NULL , `sdt` VARCHAR(20) NOT NULL , `about_me` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `account` (`id`, `username`, `password`) VALUES (NULL, 'admin', '1'), (NULL, 'vinh@gmail.com', '1');

INSERT INTO `user_profile` (`id`, `username`, `hoten`, `ngaysinh`, `email`, `sdt`, `about_me`) VALUES (NULL, 'admin', 'admin', '2000-01-01', 'admin@gmail.com', '0912334678', 'Admin of this site'), (NULL, 'vinh@gmail.com', 'Nguyễn Đức Vinh', '2001/02/18', 'vinh@gmail.com', '0375021812', 'nothing')
