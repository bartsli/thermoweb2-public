-- Example SQL file for GitHub Linguist detection
SELECT 'Hello from SQL!';

-- Add more lines to increase file size for Linguist
CREATE TABLE example_table (
    id INT PRIMARY KEY,
    name VARCHAR(100),
    value INT
);

INSERT INTO example_table (id, name, value) VALUES
(1, 'Alice', 42),
(2, 'Bob', 84),
(3, 'Charlie', 126);

SELECT * FROM example_table; 