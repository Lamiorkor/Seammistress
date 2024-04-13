
-- DROP DATABASE IF EXISTS Seamstress_Database;
-- CREATE DATABASE Seamstress_Database;

-- USE Seamstress_Database;

SET time_zone = "+00:00";


CREATE TABLE Profile (
    pid INT(3) PRIMARY KEY auto_increment,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(45) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    shop_name VARCHAR(50) NOT NULL,
    shop_location VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Customers (
    cid INT(3) PRIMARY KEY auto_increment,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(45) NOT NULL,
    phone_number VARCHAR(15) NOT NULL
);

CREATE TABLE Measurements (
    cid INT(3) UNIQUE NOT NULL,
    bust FLOAT NOT NULL,
    waist FLOAT NOT NULL,
    hip FLOAT NOT NULL,
    around_arm FLOAT NOT NULL,
    across_chest FLOAT NOT NULL,
    shoulder_to_shoulder FLOAT NOT NULL,
    across_back FLOAT NOT NULL,
    elbow_sleeve_length FLOAT NOT NULL,
    wrist_sleeve_length FLOAT NOT NULL,
    short_sleeve_length FLOAT NOT NULL,
    shoulder_to_waist FLOAT NOT NULL,
    blouse_length FLOAT NOT NULL,
    dress_length FLOAT NOT NULL,
    skirt_length FLOAT NOT NULL,
    slit_length FLOAT NOT NULL,
    trouser_length FLOAT NOT NULL
);

CREATE TABLE Orders (
    oid INT(4) PRIMARY KEY auto_increment,
    outfit_type ENUM('Dress', 'Skirt', 'Trousers',
                    'Kaba and Slit', 'Blouse', 'Shirt'),
    customer_id INT(3) NOT NULL,
    order_date DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
    due_date DATE NOT NULL,
    order_status ENUM('not started', 'in progress', 'completed') 
                NOT NULL DEFAULT 'not started',
    FOREIGN KEY (customer_id) REFERENCES Customers(cid) ON DELETE CASCADE ON UPDATE NO ACTION
);

CREATE TABLE Materials (
    mid INT(3) PRIMARY KEY auto_increment,
    name VARCHAR(40) NOT NULL,
    price FLOAT NOT NULL,
    amount_in_stock INT
);

CREATE TABLE Portfolio (
    portfolio_id INT(4) PRIMARY KEY auto_increment,
    pid INT(3) NOT NULL,
    oid INT(4) NOT NULL,
    FOREIGN KEY (pid) REFERENCES Profile(pid),
    FOREIGN KEY (oid) REFERENCES Orders(oid)
) 