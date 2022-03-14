drop database if exists video-sharing;
create database video-sharing character set utf8 collate utf8-general-ci;
grant all on vide-sharing.* to 'admin'@'localhost' identified as 'password';
use video-sharing;

create table videos (
    id int auto_increment primary key,
    title varchar(30) not null,
    description varchar(300) not null,
    uploader varchar(50) not null,
    likes varchar(10) not null,
    uploaded-date varchar(8) not null
);

create table subscription (
    from varchar(30) not null,
    to varchar(30) not null
);

create database userdata {
    username varchar(30) not null,
    password varchar(30) not null,
    avatar varchar(30) not null
};

create database comments (
    video varchar(30) not null,
    username varchar(30) not null,
    comment varchar(200) not null
);
