--Creacion de la BD y activacion de su uso
create database PPSTecnico;
USE PPSTecnico;
--Creacion de tablas 
create table Formulario(
	FormularioID int not null, 
	Numero int not null,
	Fecha date not null,
	Entrega_Conforme varchar(255) not null,
	CONSTRAINT pk_Formulario PRIMARY KEY CLUSTERED (FormularioID)
);

create table Formulario_Estado(
	Formulario_EstadoID int not  null,
	Estado varchar(255) not null,
	CONSTRAINT pk_Formulario_Estado PRIMARY KEY CLUSTERED (Formulario_EstadoID),
	CONSTRAINT fk_Formulario FOREIGN KEY(Formulario_EstadoID) references Formulario(FormularioID)
);

create table Cliente (
	ClienteID int not null,
	Empresa varchar(255),
	Calle varchar(255),
	Persona_queEntrega_Equipo varchar(255) not null,
	constraint pk_Cliente primary key clustered (ClienteID),
	constraint fk_Cliente_Formulario foreign key (ClienteID) references Formulario(FormularioID)
);

create table Persona(
	PersonaID int not null,
	Nombre varchar(255) not null,
	constraint pk_Persona primary key clustered (PersonaID),
	constraint fk_Formulario_Persona foreign key (PersonaID) references Cliente(ClienteID)
);

create table Equipo(
	EquipoID int not null, 
	Nombre varchar(255) not null,
	constraint pk_Equipo primary key clustered (EquipoID),
	constraint fk_FormularioEquipo foreign key (EquipoID) references Formulario(FormularioID)
);

create table Equipo_Adiciionales(
	Equipo_AdicionalesID int not null, 
	Nombre_de_Adicionales varchar(255) not null,
	Tipo varchar(255) not null,
	Numero_de_Adicionales int, 
	constraint pk_Equipo_Adicionales primary key clustered (Equipo_AdicionalesID),
	constraint fk_Equipo_Adicionales_delEquipo foreign key (Equipo_AdicionalesID) references Equipo(EquipoID)
);

create table Equipo_Caracteristicas(
	Equipo_CaracteristicasID int not null,
	Nombre varchar(255) not null, 
	Marca varchar(255) not null,
	Modelo varchar(255) not null,
	Contaseña_Windows varchar(255) not null,
	Observaciones varchar(255),
	constraint pk_Equipo_Caracteristicas primary key clustered (Equipo_CaracteristicasID),
	constraint fk_Equipo_Caracteristicas_delEquipo foreign key (Equipo_CaracteristicasID) references Equipo(EquipoID)
);

create table Equipo_Estado(
	Equipo_EstadoID int not null,
	Obsevaciones varchar(255),
	Estado_Mantenimiento varchar(255) not null, 
	constraint pk_Equipo_Estado primary key clustered (Equipo_EstadoID),
	constraint fk_Equipo_Estado_delEquipo foreign key (Equipo_EstadoID) references Equipo(EquipoID)
);



drop table Formulario;
drop table Formulario_Estado;
drop table Cliente;
drop table Equipo;
drop table Equipo_Estado;
drop table Equipo_Adiciionales;
drop table Equipo_Caracteristicas;
drop table Persona;