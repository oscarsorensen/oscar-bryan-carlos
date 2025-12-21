Chamitos Movie Club
Español

Chamitos Movie Club es un proyecto web para gestionar y seguir películas, desarrollado como trabajo en grupo.
El objetivo principal es aplicar los conceptos vistos en clase relacionados con bases de datos, PHP y CRUD, separando claramente backend y frontend.

El proyecto cuenta con un panel de administración donde se pueden:

Crear películas

Ver el listado de películas

Editar películas existentes

Eliminar películas

Toda la lógica del backend sigue un CRUD clásico en PHP, basado en los ejemplos y estructura trabajados en clase.

La base de datos está correctamente normalizada y utiliza relaciones con claves foráneas.
Se ha implementado ON DELETE CASCADE, lo que permite eliminar una película y que automáticamente se borren sus:

puntuaciones

reseñas

relaciones con watchlists

Actualmente, la lógica, la base de datos y el backend funcionan correctamente.

Estructura del proyecto

back/ → Backend y panel de administración (PHP)

front/ → Frontend público (HTML/CSS + PHP para lectura)

back/inc/ → CRUD (create, read, update, delete)

back/inc/db.php → Conexión centralizada a la base de datos

sql/ → Script de creación de la base de datos

⚠️ Importante: para que el proyecto funcione correctamente, es necesario ejecutar todo el archivo SQL, especialmente las sentencias del final donde se definen las claves foráneas con ON DELETE CASCADE.

Pendiente

Estilos (HTML / CSS)

Funcionalidades de frontend (perfil de usuario, watchlist, visualización de ratings)

Chamitos Movie Club
English

Chamitos Movie Club is a web project designed to manage and track movies, developed as a group assignment.
The main goal is to apply classroom concepts related to databases, PHP, and CRUD operations, with a clear separation between backend and frontend.

The project includes an admin panel where it is possible to:

Create movies

View the movie list

Edit existing movies

Delete movies

All backend logic follows a classic PHP CRUD approach, based directly on the structure and examples used in class.

The database is properly normalized and uses foreign key relationships.
ON DELETE CASCADE has been implemented, allowing a movie to be deleted together with its:

ratings

reviews

watchlist relationships

At this stage, the database, backend logic, and core functionality are fully working.

Project structure

back/ → Backend and admin panel (PHP)

front/ → Public frontend (HTML/CSS + PHP for data display)

back/inc/ → CRUD logic (create, read, update, delete)

back/inc/db.php → Centralized database connection

sql/ → Database creation script

⚠️ Important: to run the project correctly, make sure to execute the full SQL file, especially the final part where foreign keys with ON DELETE CASCADE are defined.

To do

Styling (HTML / CSS)

Frontend features (user profile, watchlist, rating display)
