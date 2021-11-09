CREATE TABLE `test`.`news` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(200) NOT NULL , 
    `image` VARCHAR(100) NULL , 
    `text` VARCHAR(300) NOT NULL , 
    `link` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;