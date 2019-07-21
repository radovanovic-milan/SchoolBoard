CREATE DATABASE qtest;

CREATE TABLE `qtest`.`students` ( `id` INT NOT NULL AUTO_INCREMENT ,`school` VARCHAR(50) NOT NULL, `name` VARCHAR(50) NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `qtest`.`grades` ( `id` INT NOT NULL AUTO_INCREMENT , `student_id` INT NOT NULL , `grade` INT NOT NULL , `created_at` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `grades` ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `students` (`id`, `school`, `name`, `created_at`) VALUES (NULL, 'CSM', 'First Student', '2019-07-21 12:00:00'), (NULL, 'CSMB', 'Second Student', '2019-07-21 12:00:00');

INSERT INTO `grades` (`id`, `student_id`, `grade`, `created_at`) VALUES (NULL, '1', '10', '2019-07-21 12:00:00'), (NULL, '1', '9', '2019-07-21 12:00:00'), (NULL, '1', '8', '2019-07-21 12:00:00'), (NULL, '1', '7', '2019-07-21 12:00:00'), (NULL, '2', '8', '2019-07-21 12:00:00'), (NULL, '2', '7', '2019-07-21 12:00:00'), (NULL, '2', '10', '2019-07-21 12:00:00'), (NULL, '2', '6', '2019-07-21 12:00:00');