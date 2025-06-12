-- CREATE TABLE users(
--     id int auto_increment primary key,
--     name varchar(100),
--     address varchar(100),
--     phone varchar(10),
--     email varchar(100),
--     password varchar(100),
--     role tinyint
-- );

-- CREATE TABLE categories (
--     id int auto_increment primary key ,
--     name varchar(100)
-- ); 

-- CREATE TABLE brands (
--     id int auto_increment primary key,
--     name varchar(100)
-- );

CREATE TABLE products(
    id int auto_increment primary key,
    name varchar(100),
    categoryid int,
    brandid int,
    stock int,
    price int,
    image varchar(100),
    description text,
    discount_rate int,
    foreign key (categoryid) references categories(id),  
    foreign key (brandid) references brands(id)

);

CREATE TABLE orders(
    id int auto_increment primary key,
    userid int,
    total int, 
    date date,
    status enum("pending", "cancelled", "completed", "ongoing"),
    foreign key (userid) references users(id) 
);

CREATE TABLE orders_products(
    id int auto_increment primary key,
    orderid int,
    productid int,
    quantity int,
    foreign key (productid) references products(id),
    foreign key (orderid) references orders(id)
);



