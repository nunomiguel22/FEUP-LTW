PRAGMA foreign_keys = ON;
.mode columns
.headers on
.nullvalue NULL


DROP TABLE IF EXISTS User;

CREATE TABLE User (
id INTEGER PRIMARY KEY AUTOINCREMENT,
username VARCHAR(256) UNIQUE NOT NULL,
password VARCHAR(256) NOT NULL,
name VARCHAR(256)
);
