create table feedback(
    id INTEGER PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(100) not null,
    email VARCHAR(100) not null ,
    body text default '',
    date DATETIME
);
insert into feedback(name, email,body,date)values
('Phong','phong@gmail.com','i dont like it',current_timestamp()),
('Phuong','phuong@gmail.com','i hate it',current_timestamp()),
('Pho','pho@gmail.com','i like it',current_timestamp());