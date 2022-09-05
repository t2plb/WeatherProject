create table donnees
(
    id   int auto_increment
        primary key,
    date datetime         null,
    temp tinyint          null,
    humi tinyint unsigned null
);