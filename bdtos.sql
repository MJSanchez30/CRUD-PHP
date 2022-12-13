Create database 

Create table Usuario
(
    id int not null,
    Nombre_usuario varchar (50) not null,
    Nombre_completo varchar (50) not null,
    pass varchar (50) not null,
    primary key(idUsuario)
);

Create table Producto
(
    idProducto
    Nombre varchar (50) not null,
    descripcion varchar (50) not null,
    precio numeric (10,2) not null,
    categoria varchar (50) not null,
    estatus bit default 1,
    primary key (idProducto)
);