--
-- CREACIÓN DE BASE DE DATOS
--
CREATE DATABASE IF NOT EXISTS DS CHARACTER SET UTF8 COLLATE utf8_spanish_ci;
USE DS;

----

CREATE TABLE IF NOT EXISTS Entidades (
  ID     int NOT NULL AUTO_INCREMENT, 
  titulo varchar(30) NOT NULL,
  imagen varchar(255) DEFAULT "https://cdn.vuetifyjs.com/images/cards/docks.jpg",
  PRIMARY KEY (ID)
);

----

CREATE TABLE IF NOT EXISTS Usuarios (
  nombre     varchar(30) NOT NULL, 
  correo     varchar(50) NOT NULL UNIQUE, 
  contraseña varchar(255) NOT NULL, 
  PRIMARY KEY (nombre)
);

----

CREATE TABLE IF NOT EXISTS Admins (
  entidadID    int NOT NULL, 
  usuarioID varchar(30) NOT NULL, 
  PRIMARY KEY (entidadID, usuarioID),
  FOREIGN KEY (entidadID)     REFERENCES Entidades(ID)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (usuarioID)  REFERENCES Usuarios(nombre)
    ON DELETE CASCADE ON UPDATE CASCADE
);

----

CREATE TABLE IF NOT EXISTS Superadmins (
  entidadID    int NOT NULL, 
  usuarioID varchar(30) NOT NULL UNIQUE, 
  PRIMARY KEY (entidadID),
  FOREIGN KEY (entidadID)     REFERENCES Entidades(ID)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (usuarioID)  REFERENCES Usuarios(nombre)
    ON DELETE CASCADE ON UPDATE CASCADE
);

----

CREATE TABLE IF NOT EXISTS Valorables (
  entidadID int NOT NULL, 
  ID          int NOT NULL AUTO_INCREMENT UNIQUE, 
  titulo      varchar(30) NOT NULL, 
  descripcion varchar(250), 
  imagen      varchar(255) DEFAULT "https://cdn.vuetifyjs.com/images/cards/house.jpg",
  PRIMARY KEY (entidadID, ID),
  FOREIGN KEY (entidadID) REFERENCES Entidades(ID) ON DELETE CASCADE ON UPDATE CASCADE
);

----

CREATE TABLE IF NOT EXISTS Valoraciones (
  entidadID             int NOT NULL, 
  valorableID           int NOT NULL, 
  usuarioID             varchar(30) NOT NULL, 
  puntuacion            tinyint NOT NULL, 
  comentario            varchar(255), 
  fecha                 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (entidadID, valorableID, usuarioID),
  FOREIGN KEY (entidadID, valorableID) REFERENCES Valorables(entidadID, ID)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (usuarioID) REFERENCES Usuarios(nombre)
    ON DELETE CASCADE ON UPDATE CASCADE
);