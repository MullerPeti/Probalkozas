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

drop table cars;
create table if not exists Cars(ID int primary key auto_increment, PeopleID int, tipus nvarchar(50),foreign key(PeopleID) references adatbazis(id));

select * from adatbazis;
insert into Cars(PeopleID,tipus) values(1, "Mercedes W124");

SELECT adatbazis.Nev, cars.Tipus 
FROM adatbazis
INNER JOIN cars ON adatbazis.ID = cars.PeopleID;

