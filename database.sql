
CREATE DATABASE IF NOT EXISTS lgu_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE lgu_app;

CREATE TABLE IF NOT EXISTS departments (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS roles (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64) NOT NULL UNIQUE,
  full_name VARCHAR(120) NOT NULL,
  department_id INT UNSIGNED NOT NULL,
  role_id INT UNSIGNED NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  failed_attempts INT NOT NULL DEFAULT 0,
  locked_until DATETIME NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (department_id) REFERENCES departments(id),
  FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO departments(name) VALUES ('Mayor\'s Office'), ('IT/MIS'), ('Budget'), ('Accounting');
INSERT IGNORE INTO roles(name) VALUES ('admin'), ('staff');

-- Seed admin. Replace HASH via PHP tool below if you want.
INSERT INTO users(username, full_name, department_id, role_id, password_hash)
VALUES ('admin','System Administrator', 2, 1, '$2y$10$.cX9k3o5hC3wJ7VhTz1h6u7e9oWg9sE0b0m0g0r0t0s0f0n0q0r0a'); -- placeholder, will update below
