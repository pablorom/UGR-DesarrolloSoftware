USE DS;

INSERT IGNORE INTO Entidades (titulo) VALUES
    ('Turismo Granada'), ('Restaurante'), ('Cinéfilos')
;

INSERT IGNORE INTO Usuarios (correo, nombre, contraseña) VALUES
    ('cuenta_falsa_1@dominio.com', 'JuanCuesta'   , 'junta_urgente'          ),
    ('cuenta_falsa_2@dominio.com', 'EmilioDelgado', 'un_poquito_de_por_favor'),
    ('cuenta_falsa_3@dominio.com', 'PalomaCuesta' , 'puff'                   ),
    ('zxc@zxc.com'               , 'Superadmin'   , '123'                    ),
    ('email@dominio.com'         , 'Usuario'      , 'default'                )
;

INSERT IGNORE INTO Admins VALUES
    (1, 'JuanCuesta'),
    (2, 'EmilioDelgado'),
    (3, 'JuanCuesta'),
    (3, 'PalomaCuesta')
;

INSERT IGNORE INTO Superadmins VALUES
    (1, 'Superadmin'),
    (2, 'Superadmin'),
    (3, 'Superadmin')
;

INSERT IGNORE INTO Valorables (entidadID, titulo, descripcion) VALUES
    (1, 'Catedral de Granada', 'Situada en el corazón de la ciudad, el templo es una de las obras cumbres del Renacimiento español'),
    (1, 'Parque de las Ciencias', 'El Parque de las Ciencias de Granada es el primer museo interactivo de ciencia de Andalucía. Fue inaugurado en mayo de 1995​ ocupando en la actualidad 70 000 m². Está situado en una zona céntrica de Granada y se ha convertido en uno de los principales reclamos turísticos de la ciudad'),
    (1, 'Barrio del Albayzín', 'El barrio del Albaicín, declarado Patrimonio de la Humanidad en 1984, fue el germen de la actual ciudad de Granada y conserva aún toda la magia de su pasado árabe.'),
    (2, 'Calidad del servicio', 'Califique la calidad de nuestro servicio al cliente'),
    (3, 'Blade Runner', 'Un comercial (Edward Norton) que sufre de insomnio crónico comienza a frecuentar ambientes de grupos dedicados a la ultraviolencia en compañía de Tyler Durden (Brad Pitt), con el que crea la sociedad secreta conocida como El club de la lucha.'),
    (3, 'El Club de la lucha', 'Harrison Ford encarna a un blade runner, un cazador de replicantes, androides con apariencia humana capaces de replicar sus emociones y dotados de conciencia. Sin embargo, su último trabajo comenzará a crearle dudas existenciales y morales.'),
    (3, 'Reservoir Dogs', 'Tarantino plasmó en esta película las consecuencias de un atraco frustrado a través de un estilo narrativo sorprendente, arrebatador y nada habitual hasta entonces.')
;

INSERT IGNORE INTO Valoraciones (entidadID, valorableID, usuarioID, puntuacion, comentario) VALUES
    (3, 5, 'Usuario', 8, 'Genial película, me encanta la temáatica cyberpunk')
;
