-- This is a lightweight SQL schema file added for proper GitHub Linguist technology detection
CREATE TABLE sensors (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    location VARCHAR(200)
);

CREATE TABLE measurements (
    id INT PRIMARY KEY,
    sensor_id INT,
    temperature DECIMAL(5,2),
    timestamp DATETIME,
    FOREIGN KEY (sensor_id) REFERENCES sensors(id)
); 