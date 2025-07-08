-- Create the users table
CREATE TABLE IF NOT EXISTS users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	email VARCHAR(100),
	registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO users (name, email) VALUES 
('Alice Wonderland', 'alice@example.com'),
('Bob The Builder', 'bob@example.com'),
('Charlie Chaplin', 'charlie@example.com');

