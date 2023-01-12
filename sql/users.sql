CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'customer',
  `address` text DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

-- name = admin;
-- email = admin@email.com;
-- passwrod = admin;

INSERT INTO users 
  (name, email, password, role) 
VALUES 
  ("admin", "admin@email.com", "$2y$10$JxGp8B6tiySa8VmdYIOB8OyGqwFlLrCcIgbtGawNj0UM9dDZb2hoi", "admin");