-- This is a comprehensive SQL schema file added for proper GitHub Linguist technology detection
-- Main tables structure

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sensors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(200),
    is_public BOOLEAN DEFAULT false,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE measurements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sensor_id INT NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2),
    measured_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sensor_id) REFERENCES sensors(id)
);

CREATE TABLE sensor_alerts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    sensor_id INT NOT NULL,
    min_temp DECIMAL(5,2),
    max_temp DECIMAL(5,2),
    email_notification BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sensor_id) REFERENCES sensors(id)
);

-- Indexes for better performance
CREATE INDEX idx_measurements_sensor_id ON measurements(sensor_id);
CREATE INDEX idx_measurements_measured_at ON measurements(measured_at);
CREATE INDEX idx_sensors_user_id ON sensors(user_id);
CREATE INDEX idx_sensors_is_public ON sensors(is_public);

-- Example data
INSERT INTO users (username, email, password_hash) VALUES
('admin', 'admin@thermoweb.wtx.pl', 'hashed_password_here'),
('demo', 'demo@thermoweb.wtx.pl', 'hashed_password_here');

INSERT INTO sensors (user_id, name, location, is_public) VALUES
(1, 'Living Room', 'Main Building', true),
(1, 'Garden', 'Outside', true),
(2, 'Office', 'Second Floor', false); 