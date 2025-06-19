CREATE TABLE users(
    id int auto_increment primary key,
    name varchar(100),
    address varchar(100),
    phone varchar(10),
    email varchar(100),
    password varchar(100),
    role tinyint
);

CREATE TABLE categories (
    id int auto_increment primary key ,
    name varchar(100),
    image varchar(100)
); 

CREATE TABLE brands (
    id int auto_increment primary key,
    name varchar(100)
);

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
    foreign key (brandid) references brands(id),
    is_featured tinyint
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

CREATE TABLE coupons(
    id int auto_increment primary key,
    code varchar(100),
    discount_type enum("percentage", "fixed"),
    discount_value int,
    is_active tinyint,
    max_use_per_user int,
    min_amount int
);

CREATE TABLE user_coupons(
    id int auto_increment primary key,
    userid int,
    couponid int,
    uses int 
    foreign key (userid) references users(id),
    foreign key (couponid) references coupons(id)
);

CREATE TABLE reviews(
    id int auto_increment primary key,
    productid int,
    userid int,
    description text,
    title varchar(100),
    review_date date,
    foreign key (productid) references products(id),
    foreign key (userid) references users(id)
);

CREATE TABLE banners(
    id int auto_increment primary key,
    image varchar(100),
    is_active tinyint,
    title varchar(100),
    sub_title varchar(100),
    button_text varchar(100)
);



