create database bd_ventas ;
use bd_ventas ;

create table tb_presentacion(
    pres_id char(5) not null primary key ,
    pres_nombre varchar(30) not null
);

create table tb_producto(
    prod_id char(5) not null primary key ,
    prod_nombre varchar(50) not null ,
    prod_medida char(1) null ,
    prod_stock int ,
    prod_perecible char(1) ,
    prod_costo float ,
    prod_pres_id char(5) not null ,
    foreign key ( prod_pres_id ) references tb_presentacion( pres_id )
);

create table tb_distrito(
    cod_distrito char(5) not null primary key ,
    nom_distrito varchar(40) not null
);

create table tb_cliente(
    cod_cliente char(5) not null primary key ,
    nom_cliente varchar(40) not null ,
    ape_cliente varchar(40) not null ,
    sexo_cliente char(1) null ,
    dni_cliente char(8) null unique ,
    direccion varchar(50) ,
    telefono char(9) ,
    cod_distrito char(5) not null ,
    foreign key (cod_distrito) references tb_distrito(cod_distrito)
);

select prod_id , prod_nombre , prod_stock , prod_costo , pres_nombre , 
       case when prod_medida = 'L' then 'Litro'
            when prod_medida = 'K' then 'kilo'
            when prod_medida = 'U' then 'Unidad'
            end as 'medida',
       case when prod_perecible = 1 then 'Perecible'
            when prod_perecible = 0 then 'No perecible'
            end as 'medida'
from tb_producto tb_pd
         left join tb_presentacion tb_prs
                   on (tb_pd.prod_pres_id = tb_prs.pres_id);