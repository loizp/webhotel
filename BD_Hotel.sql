CREATE TABLE Pais (
  idPais INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(20) NULL,
  PRIMARY KEY(idPais)
);

CREATE TABLE Item_Menu (
  idItem_Menu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nom_Item VARCHAR(20) NULL,
  Direccion_Item VARCHAR(45) NULL,
  Propietario CHAR NULL,
  PRIMARY KEY(idItem_Menu)
);

CREATE TABLE Servicios (
  idServicios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Detalle_Serv VARCHAR(45) NULL,
  PRIMARY KEY(idServicios)
);

CREATE TABLE Ubicacion (
  idUbicacion INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Descripcion VARCHAR(100) NULL,
  PRIMARY KEY(idUbicacion)
);

CREATE TABLE Tipo_Habitacion (
  idTipo_Habitacion INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre_Tipo VARCHAR(100) NULL,
  Precio INTEGER UNSIGNED NULL,
  Clase CHAR NULL DEFAULT 'A',
  PRIMARY KEY(idTipo_Habitacion)
);

CREATE TABLE Empleado (
  idEmpleado INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nom_Apellido VARCHAR(100) NULL,
  Direccion VARCHAR(45) NULL,
  Telefono VARCHAR(20) NULL,
  Sexo CHAR NULL DEFAULT 'M',
  Email VARCHAR(45) NULL,
  User_DNI VARCHAR(10) NULL,
  Clave VARCHAR(10) NULL,
  Tipo_Empleado CHAR NULL,
  Estado CHAR NULL,
  PRIMARY KEY(idEmpleado)
);

CREATE TABLE Departamentos (
  idDepartamentos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre_Dpto VARCHAR(20) NULL,
  PRIMARY KEY(idDepartamentos)
);

CREATE TABLE Fotos (
  idFotos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Titulo VARCHAR(45) NULL,
  URL VARCHAR(20) NULL,
  Categoria CHAR NULL,
  PRIMARY KEY(idFotos)
);

CREATE TABLE Cliente (
  idCliente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Pais_idPais INTEGER UNSIGNED NOT NULL,
  Nom_RazonSoc VARCHAR(100) NULL,
  Apellidos VARCHAR(45) NULL,
  DNI_RUC_CE VARCHAR(20) NULL,
  Telefono VARCHAR(20) NULL,
  Movil VARCHAR(20) NULL,
  Email VARCHAR(20) NULL,
  Ciudad VARCHAR(20) NULL,
  Departamento VARCHAR(20) NULL,
  Clave VARCHAR(10) NULL,
  Tipo_Cliente VARCHAR(20) NULL,
  PRIMARY KEY(idCliente),
  INDEX Cliente_FKIndex1(Pais_idPais),
  FOREIGN KEY(Pais_idPais)
    REFERENCES Pais(idPais)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Tipo_Habitacion_has_Servicios (
  Tipo_Habitacion_idTipo_Habitacion INTEGER UNSIGNED NOT NULL,
  Servicios_idServicios INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Tipo_Habitacion_idTipo_Habitacion, Servicios_idServicios),
  INDEX Tipo_Habitacion_has_Servicios_FKIndex1(Tipo_Habitacion_idTipo_Habitacion),
  INDEX Tipo_Habitacion_has_Servicios_FKIndex2(Servicios_idServicios),
  FOREIGN KEY(Tipo_Habitacion_idTipo_Habitacion)
    REFERENCES Tipo_Habitacion(idTipo_Habitacion)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Servicios_idServicios)
    REFERENCES Servicios(idServicios)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Empleado_has_Item_Menu (
  Empleado_idEmpleado INTEGER UNSIGNED NOT NULL,
  Item_Menu_idItem_Menu INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Empleado_idEmpleado, Item_Menu_idItem_Menu),
  INDEX Empleado_has_Item_Menu_FKIndex1(Empleado_idEmpleado),
  INDEX Empleado_has_Item_Menu_FKIndex2(Item_Menu_idItem_Menu),
  FOREIGN KEY(Empleado_idEmpleado)
    REFERENCES Empleado(idEmpleado)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Item_Menu_idItem_Menu)
    REFERENCES Item_Menu(idItem_Menu)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Habitacion (
  idHabitacion INTEGER UNSIGNED NOT NULL,
  Ubicacion_idUbicacion INTEGER UNSIGNED NOT NULL,
  Tipo_Habitacion_idTipo_Habitacion INTEGER UNSIGNED NOT NULL,
  Descripcion VARCHAR(100) NULL,
  Estado CHAR NULL DEFAULT 'L',
  PRIMARY KEY(idHabitacion),
  INDEX Hobitacion_FKIndex1(Tipo_Habitacion_idTipo_Habitacion),
  INDEX Hobitacion_FKIndex2(Ubicacion_idUbicacion),
  FOREIGN KEY(Tipo_Habitacion_idTipo_Habitacion)
    REFERENCES Tipo_Habitacion(idTipo_Habitacion)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Ubicacion_idUbicacion)
    REFERENCES Ubicacion(idUbicacion)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Reservaciones (
  idReservaciones INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Empleado_idEmpleado INTEGER UNSIGNED NOT NULL,
  Cliente_idCliente INTEGER UNSIGNED NOT NULL,
  Fecha_Reserva DATE NULL,
  N_Habitaciones INTEGER UNSIGNED NULL,
  Fecha_Llegada DATE NULL,
  Fecha_Salida DATE NULL,
  Estado CHAR NULL,
  Fecha_Confir DATE NULL,
  Codigo_Autent VARCHAR(40) NULL,
  PRIMARY KEY(idReservaciones),
  INDEX Reservaciones_FKIndex1(Cliente_idCliente),
  INDEX Reservaciones_FKIndex2(Empleado_idEmpleado),
  FOREIGN KEY(Cliente_idCliente)
    REFERENCES Cliente(idCliente)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Empleado_idEmpleado)
    REFERENCES Empleado(idEmpleado)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Reservaciones_has_Habitacion (
  Reservaciones_idReservaciones INTEGER UNSIGNED NOT NULL,
  Habitacion_idHabitacion INTEGER UNSIGNED NOT NULL,
  Nom_Resp VARCHAR(100) NULL,
  Num_Adultos INTEGER UNSIGNED NULL,
  Num_Ninio INTEGER UNSIGNED NULL,
  PRIMARY KEY(Reservaciones_idReservaciones, Habitacion_idHabitacion),
  INDEX Reservaciones_has_Hobitacion_FKIndex1(Reservaciones_idReservaciones),
  INDEX Reservaciones_has_Hobitacion_FKIndex2(Habitacion_idHabitacion),
  FOREIGN KEY(Reservaciones_idReservaciones)
    REFERENCES Reservaciones(idReservaciones)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Habitacion_idHabitacion)
    REFERENCES Habitacion(idHabitacion)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


