create database project ;
create table users(
    id int primary key auto_increment,
    name varchar(30) not null,
    email varchar(50) not null, unique,
    phone varchar(10)
);
insert into 'users' values(null, 'ali mohamed', 'ali.mohamed@gmail.com', '0618298547'),
                          (null, 'said hassani', 'said-hassani@gmail.com', '0719206378'),
                          (null, 'salma benani', 'salmabenani1@gmail.com', '0719369536'),
                          (null, 'sara rahmouni', 'rahmouni_sara@gmail.com', '0671920356');
