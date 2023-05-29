use inmobiliaria;

create table propietario(
	propietario int AUTO_INCREMENT,
    nombre varchar(255),
    telefono varchar(255),
    email varchar(255),
    primary key(propietario)
);

create table categoria(
	categoria int AUTO_INCREMENT,
    nombre varchar(255),
    primary key(categoria)
);

create table tipo(
	tipo int AUTO_INCREMENT,
    nombre varchar(255),
    primary key(tipo)
);

create table estado(
	estado int AUTO_INCREMENT,
    nombre varchar(255),
    primary key(estado)
);

create table cliente(
	cliente int AUTO_INCREMENT,
    nombre varchar(255),
    telefono varchar(255),
    primary key(cliente)
);

create table departamento(
	departamento int AUTO_INCREMENT,
    nombre varchar(255),
    primary key(departamento)
);

create table ciudad(
	ciudad int AUTO_INCREMENT,
    departamento int not null,
    nombre varchar(255),
    primary key(ciudad),
    foreign key (departamento) references departamento(departamento)
);

drop table ciudad;
drop table zona;
drop table inmueble;
drop table inmueble_tipo;
drop table inmueble_estado;
drop table inmueble_cliente;
create table zona(
	zona int AUTO_INCREMENT,
    ciudad int not null,
    nombre varchar(255),
    primary key(zona),
    foreign key (ciudad) references ciudad(ciudad)
);

create table inmueble(
	inmueble int AUTO_INCREMENT,
    propietario int not null,
    categoria int not null,
    zona int not null,
    nombre varchar(255),
    dimension varchar(255),
    habitaciones int,
    descripcion text,
    primary key(inmueble),
    foreign key (propietario) references propietario(propietario),
    foreign key (categoria) references categoria(categoria),
    foreign key (zona) references zona(zona)
);

create table imagen(
	imagen int AUTO_INCREMENT,
    inmueble int not null,
    primary key(imagen, inmueble),
    foreign key (inmueble) references inmueble(inmueble)
);

create table inmueble_tipo(
	inmueble int not null,
    tipo int not null,
    precio varchar(255),
    primary key(inmueble, tipo),
    foreign key(inmueble) references inmueble(inmueble),
    foreign key(tipo) references tipo(tipo)    
);

create table inmueble_estado(
	inmueble int not null,
    estado int not null,
    fecha_modificacion datetime,
    primary key(inmueble, estado),
    foreign key(inmueble) references inmueble(inmueble),
    foreign key(estado) references estado(estado)    
);

create table inmueble_cliente(
	inmueble int not null,
    cliente int not null,
    primary key(inmueble, cliente),
    foreign key(inmueble) references inmueble(inmueble),
    foreign key(cliente) references cliente(cliente)    
);

create table usuarios(
	usuario int AUTO_INCREMENT,
    tipo int,
    username varchar(255),
    email varchar(255),
    password varchar(255),
    primary key(usuario),
    unique(email)
);


insert into usuarios (tipo, username, email, password) values(1, 'admin', 'admin@inmo.com', md5('abcd'));

select * from categoria;
select count(*) as contador from usuarios where email = 'admin@inmo.com' and password = md5('abcd');
-- Insert datos
insert into propietario(nombre, telefono, email) values ('Hugo Torres', '12345678', 'hugo@inmo.com');
insert into categoria(nombre) values ('Apartamento');
insert into categoria(nombre) values ('Casa');
insert into categoria(nombre) values ('Habitación');
insert into categoria(nombre) values ('Oficina');
insert into categoria(nombre) values ('Local');
insert into categoria(nombre) values ('Terreno');

insert into tipo(nombre) values ('Venta');
insert into tipo(nombre) values ('Alquiler');

insert into estado(nombre) values ('Disponible');
insert into estado(nombre) values ('Vendido');

insert into departamento(nombre) values('Guatemala'); 
insert into departamento(nombre) values('Escuintla'); 
insert into departamento(nombre) values('Izabal'); 
insert into departamento(nombre) values('Quetzaltenango');
insert into departamento(nombre) values('Sacatepéquez'); 
insert into departamento(nombre) values('Santa Rosa'); 
insert into departamento(nombre) values('Suchitepequez');  

insert into ciudad(departamento, nombre) values (1, 'Amatitán');
insert into ciudad(departamento, nombre) values (1, 'Ciudad de Guatemala');
insert into ciudad(departamento, nombre) values (1, 'Fraijanes');
insert into ciudad(departamento, nombre) values (1, 'Mixco');
insert into ciudad(departamento, nombre) values (1, 'Santa Catarina Pinula');
insert into ciudad(departamento, nombre) values (2, 'Escuintla');
insert into ciudad(departamento, nombre) values (2, 'Iztapa');
insert into ciudad(departamento, nombre) values (2, 'Palín');
insert into ciudad(departamento, nombre) values (2, 'Sipacate');
insert into ciudad(departamento, nombre) values (3, 'Morales');
insert into ciudad(departamento, nombre) values (4, 'Quetzaltenango');
insert into ciudad(departamento, nombre) values (5, 'Antigua Guatemala');
insert into ciudad(departamento, nombre) values (5, 'San Lucas');
insert into ciudad(departamento, nombre) values (5, 'Santiago');
insert into ciudad(departamento, nombre) values (6, 'Barberena');
insert into ciudad(departamento, nombre) values (7, 'Mazatenango');
-- Una zona por lo menos a cada ciudad
insert into zona(ciudad, nombre) values (1, '1');
insert into zona(ciudad, nombre) values (2, '1');
insert into zona(ciudad, nombre) values (3, '1');
insert into zona(ciudad, nombre) values (4, '1');
insert into zona(ciudad, nombre) values (5, '1');
insert into zona(ciudad, nombre) values (6, '1');
insert into zona(ciudad, nombre) values (7, '1');
insert into zona(ciudad, nombre) values (8, '1');
insert into zona(ciudad, nombre) values (9, '1');
insert into zona(ciudad, nombre) values (10, '1');
insert into zona(ciudad, nombre) values (11, '1');
insert into zona(ciudad, nombre) values (12, '1');
insert into zona(ciudad, nombre) values (13, '1');
insert into zona(ciudad, nombre) values (14, '1');
insert into zona(ciudad, nombre) values (15, '1');
insert into zona(ciudad, nombre) values (16, '1');

-- Inmuebles
insert into inmueble(propietario, categoria, zona, nombre, dimension, habitaciones, descripcion) 
values (1, 1, 1, 'Casa en Residencial los Apóstoles', '420mts cuadrados', 6, 'Amenidades: Casa Club con piscina,
Primer nivel: Lounge, fitness center, salones Sociales, piscina, cancha polideportiva, parque
Segundo nivel: Área de estar exterior y área de coworking' );

insert into inmueble(propietario, categoria, zona, nombre, dimension, habitaciones, descripcion) 
values (1, 6, 1, 'Oficina en Sector La Esperanza', '80mts cuadrados', 3, 'Requisitos: Contrato de un año, cartas laborales' );


insert into inmueble(propietario, categoria, zona, nombre, dimension, habitaciones, descripcion) 
values (1, 6, 15, 'Apartamento en Residenciales Benito', '94mts cuadrados', 5, 'Requisitos: Contrato de un año, cartas laborales. Reservela desde ya!' );

select * from categoria;

-- Queries de Inmueble Mostrar solo categoria, zona, nombre, direccion
select p.nombre as Propietario, i.nombre as Inmueble, c.nombre as Categoria, z.nombre as Zona, i.descripcion as Descripcion from inmueble i
inner join propietario p on i.propietario = p.propietario
inner join categoria c on i.categoria = c.categoria
inner join zona z on i.zona = z.zona;


select i.nombre as inmueble_nombre, i.habitaciones as habitaciones, cat.nombre as categoria, z.nombre as zona, i.descripcion, d.nombre as departamento, c.nombre as ciudad ,i.descripcion as Descripcion from inmueble i
inner join propietario p on i.propietario = p.propietario
inner join categoria cat on i.categoria = cat.categoria
inner join zona z on i.zona = z.zona
inner join ciudad c on z.ciudad = c.ciudad
inner join departamento d on c.departamento = d.departamento;

select * from zona;

use inmobiliaria;
drop table usuario;

select i.nombre as inmueble_nombre, i.habitaciones as habitaciones, cat.nombre as categoria, z.nombre as zona, i.descripcion, d.nombre as departamento, c.nombre as ciudad ,i.descripcion as descripcion from inmueble i
            inner join propietario p on i.propietario = p.propietario
            inner join categoria cat on i.categoria = cat.categoria
            inner join zona z on i.zona = z.zona
            inner join ciudad c on z.ciudad = c.ciudad
            inner join departamento d on c.departamento = d.departamento where i.inmueble = '1';

select * from propietario;