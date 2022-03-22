drop database if exists video_sharing;
create database video_sharing character set utf8 collate utf8_general_ci;
grant all on video_sharing.* to 'admin'@'localhost' identified by 'password';
use video_sharing;

create table videos (
    id int auto_increment primary key,
    title varchar(30) not null,
    description varchar(300) not null,
    uploader varchar(50) not null,
    likes varchar(10) not null,
    uploaded_date varchar(8) not null,
    location varchar(30) not null,
    thumbnail varchar(30) not null
);

create table subscription (
    from1 varchar(30) not null,
    to1 varchar(30) not null
);

create table userdata (
    username varchar(30) not null,
    password varchar(30) not null,
    avatar varchar(30) not null
);

create table comments (
    video varchar(30) not null,
    username varchar(30) not null,
    comment varchar(200) not null
);
