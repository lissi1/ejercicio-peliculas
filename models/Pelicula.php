<?php

class Pelicula {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function todos(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM peliculas ORDER BY titulo ASC');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function porId(int $id): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM peliculas WHERE id = ?');
        $stmt->execute([$id]);
        $pelicula = $stmt->fetch();

        return $pelicula ?: null;
    }

    public function crear(string $titulo, string $director, int $anio, string $genero, int $duracion): int {
        $stmt = $this->pdo->prepare(
            'INSERT INTO peliculas (titulo, director, anio, genero, duracion)
             VALUES (:titulo, :director, :anio, :genero, :duracion)'
        );
        $stmt->execute([
            ':titulo'   => $titulo,
            ':director' => $director,
            ':anio'     => $anio,
            ':genero'   => $genero,
            ':duracion' => $duracion,
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function actualizar(int $id, string $titulo, string $director, int $anio, string $genero, int $duracion): bool {
        $stmt = $this->pdo->prepare(
            'UPDATE peliculas
                SET titulo = :titulo, director = :director, anio = :anio,
                    genero = :genero, duracion = :duracion
              WHERE id = :id'
        );
        $stmt->execute([
            ':titulo'   => $titulo,
            ':director' => $director,
            ':anio'     => $anio,
            ':genero'   => $genero,
            ':duracion' => $duracion,
            ':id'       => $id,
        ]);

        return $stmt->rowCount() > 0;
    }

    public function eliminar(int $id): bool {
        $stmt = $this->pdo->prepare('DELETE FROM peliculas WHERE id = ?');
        $stmt->execute([$id]);

        return $stmt->rowCount() > 0;
    }
}
