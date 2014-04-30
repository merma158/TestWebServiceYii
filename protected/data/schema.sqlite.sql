CREATE TABLE tbl_user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(100) NOT NULL,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    email VARCHAR(100) NOT NULL,
    phone1 VARCHAR(100),
    lang VARCHAR(30),
    country VARCHAR(2),
    city VARCHAR(120),
    address VARCHAR(255),
    institution VARCHAR(255),
    url VARCHAR(255)
);

CREATE TABLE tbl_role (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255),
    archetype VARCHAR(30)
);
/**
INSERT INTO tbl_user (username, password, email) VALUES ('test1', 'pass1', 'test1@example.com');
INSERT INTO tbl_user (username, password, email) VALUES ('test2', 'pass2', 'test2@example.com');
*/
