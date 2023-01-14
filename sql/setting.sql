CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO setting (name, value) VALUES ("sitename", "Luliba");
INSERT INTO setting (name, value) VALUES ("description", "Luliba merupakan perusahaan E-Commerce yang menyediakan berbagai macam jenis pakaian trendi.");
INSERT INTO setting (name, value) VALUES ("currency", "Rp.");