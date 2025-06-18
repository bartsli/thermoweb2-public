-- This is a lightweight SQL migration file added for proper GitHub Linguist technology detection
BEGIN;

CREATE TABLE users (
    id INT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100)
);

COMMIT; 