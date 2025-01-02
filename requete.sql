CREATE TABLE user ( id INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(50),
email VARCHAR(255), 
password VARCHAR(255),
tel VARCHAR(50), 
type ENUM('client', 'admin') );

CREATE TABLE commande(
id INT PRIMARY KEY NOT NULL,
total INT ,
date DATE,
client_id INT ,
FOREIGN KEY (client_id) REFERENCES user(id)
)

ALTER TABLE user
ADD COLUMN created_at timestamp;

ALTER TABLE user
ADD COLUMN deleted_at timestamp;

ALTER TABLE commande 
ADD COLUMN deleted_at timestamp;

ALTER TABLE commande 
ADD COLUMN created_at timestamp;


CREATE TABLE product(
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(155),
prix DECIMAL(10,2),
image VARCHAR(255),
quantity INT 
)

CREATE TABLE commandePr(
id INT PRIMARY KEY AUTO_INCREMENT,
quantity INT ,
product_id INT,
commande_id INT 
)
ALTER TABLE commandepr
ADD CONSTRAINT pkcp FOREIGN KEY (commande_id) REFERENCES commande (id);

ALTER TABLE commandepr
ADD CONSTRAINT pkcp2 FOREIGN KEY (product_id) REFERENCES product (id);



