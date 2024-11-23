drop schema if exists TesztSchema;
create schema TesztSchema default character set utf8 collate utf8_unicode_ci;
use TesztSchema;

drop table if exists adatbazis;

create table if not exists AdatBazis(ID int primary key auto_increment,Nev nvarchar(50), Eredmeny int);
---/*elect * from AdatBazis;*/
insert into AdatBazis(nev,eredmeny) values("Peti",5);
insert into AdatBazis(nev,eredmeny) values("Zalan", 5);
insert into AdatBazis(nev,eredmeny) values("Tomi", 3);
insert into AdatBazis(nev,eredmeny) values ("Lajos", 2);
insert into AdatBazis(nev,eredmeny) values ("Macska",0);

select * from adatbazis;

