
CREATE DATABASE IF NOT EXISTS videoclub
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE videoclub;

DROP TABLE IF EXISTS peliculas;

CREATE TABLE peliculas (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    titulo    VARCHAR(150) NOT NULL,
    director  VARCHAR(100) NOT NULL,
    anio      YEAR         NOT NULL,
    genero    VARCHAR(50)  NOT NULL,
    duracion  INT          NOT NULL  -- minutos
);

INSERT INTO peliculas (titulo, director, anio, genero, duracion) VALUES
('El padrino',              'Francis Ford Coppola', 1972, 'Drama',       175),
('Pulp Fiction',             'Quentin Tarantino',    1994, 'Crimen',      154),
('El viaje de Chihiro',      'Hayao Miyazaki',       2001, 'Animacion',   125),
('Origen',                   'Christopher Nolan',    2010, 'Ciencia ficcion', 148),
('Parasitos',                'Bong Joon-ho',         2019, 'Thriller',    132),
('Coco',                     'Lee Unkrich',          2017, 'Animacion',   105),
('El resplandor',            'Stanley Kubrick',      1980, 'Terror',      146),
('La La Land',               'Damien Chazelle',      2016, 'Musical',     128);
