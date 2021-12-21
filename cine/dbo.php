<?php
include_once "author.php";
include_once "genreNew.php";
include_once "movie.php";
include_once "comment.php";


class dbo extends mysqli
{
    //protected string $hostname="sql480.main-hosting.eu";
    //protected string $username="u850300514_isanchez";
    //protected string $password="x43223947R";
    //protected string $database="u850300514_isanchez";

    protected string $hostname = "localhost";
    protected string $username = "root";
    protected string $password = "Pascal.69";
    protected string $database = "db_movies";

    //Conexion
    public function default()
    {
        $this->local();
    }

    public function local()
    {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);

        if (mysqli_connect_error()) {
            die("Error Database" . mysqli_connect_error());
        }
    }


    public function getAuthor($idAuthor)
    {
        $sql = "SELECT * FROM table_author where idAuthor=" . $idAuthor;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $objAuthor = new author($result["idAuthor"], $result["nameAuthor"]);
        return $objAuthor;

    }


    public function getGenres($idMovies)
    {
        $sql = "SELECT g.idGenre, g.nameGenre FROM table_genresnew as g INNER JOIN table_moviesxgenres as mg ON g.idGenre=mg.idGenres  where mg.idMovies=" . $idMovies;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $objGenre = array();
        while ($result = $query->fetch_assoc()) {

            $objGenre[] = new genreNew($result["idGenre"], $result["nameGenre"]);
        }
        return $objGenre;
    }

    public function getMovies()
    {
        $sql = "SELECT * FROM table_movies";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $objMovies = array();
        while ($result = $query->fetch_assoc()) {
            $objMovies[] = new movie($result["idMovies"], $result["nameMovies"], $result["yearMovies"],
                $result["durationMovies"], $this->getAuthor($result["idAuthor"]), $result["ratingMovies"], $result["descriptionMovies"],
                $this->getGenres($result["idMovies"]), $result["imgMovies"], $result["trailerMovies"]);

        }
        return $objMovies;
    }

    public function getMovie($idMovie)
    {
        $sql = "SELECT * FROM table_movies where idMovies=" . $idMovie;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();

        $objMovie = new movie($result["idMovies"], $result["nameMovies"], $result["yearMovies"],
            $result["durationMovies"], $this->getAuthor($result["idAuthor"]), $result["ratingMovies"],
            $result["descriptionMovies"], $this->getGenres($result["idMovies"]), $result["imgMovies"], $result["trailerMovies"]);

        return $objMovie;
    }


    public function filterGenres()
    {
        $sql = "SELECT nameGenre FROM table_genresnew";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $array = array();
        while ($result = $query->fetch_assoc()) {
            $array[] = $result["nameGenre"];
        }
        return $array;
    }

    //Sort by year, rating and duration
    public function sortMovies($sort)
    {
        $sql = "SELECT * FROM table_movies ORDER BY " . $sort;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $objMovies = array();
        while ($result = $query->fetch_assoc()) {
            $objMovies[] = new movie($result["idMovies"], $result["nameMovies"], $result["yearMovies"],
                $result["durationMovies"], $this->getAuthor($result["idAuthor"]), $result["ratingMovies"], $result["descriptionMovies"],
                $this->getGenres($result["idMovies"]), $result["imgMovies"], $result["trailerMovies"]);

        }
        return $objMovies;
    }

    //Register
    public function registrarUser($user, $userPass, $email)
    {
        $sql = 'SELECT * FROM table_users WHERE emailUser="' . $email . '" OR nameUser="' . $user . '"';
        $this->default();
        $query = $this->query($sql);
        if ($query->num_rows > 0) {
            while ($result = $query->fetch_assoc()) {

                if ($result["nameUser"] == $user) {
                    echo "<script>alert('Este usuario ya existe.') </script> ";
                } else {
                    echo "<script>alert('El email ya está en uso.') </script> ";
                }
            }

        } else {
            $sql = 'INSERT INTO table_users (nameUser,passUser,emailUser) 
            VALUES ("' . $this->real_escape_string($user) . '",
            "' . $this->real_escape_string($userPass) . '",
            "' . $this->real_escape_string($email) . '")';

            $query = $this->query($sql);

            if ($query === TRUE) {
                $sql = "SELECT * FROM table_users WHERE nameUser= '$user'";
                $this->default();
                $query = $this->query($sql);
                $this->close();
                $result = $query->fetch_assoc();
                $idUser = $result["idUser"];
                return $idUser;

            }

        }

    }

    //Login
    public function getUser($user, $pass)
    {
        $sql = "SELECT * FROM table_users WHERE nameUser= '$user'";
        $this->default();
        $query = $this->query($sql);

        if ($query->num_rows > 0) {

            while ($result = $query->fetch_assoc()) {

                if ($result["nameUser"] == $user && hash_equals($result["passUser"], crypt($pass, $result["passUser"]))) {
                    $idUser = $result["idUser"];
                    return $idUser;

                } else {
                    echo "<script>alert('Contraseña incorrecta.') </script> ";
                }
            }

        } else {
            echo "<script>alert('El usuario no existe.') </script> ";
        }
        $this->close();
    }

    //Comentarios
    public function insertComments($idUser, $idMovie, $comment)
    {
        $sql = "INSERT INTO table_comments (idUser,idMovie, comment) VALUES('" . $idUser . "','" . $idMovie . "','" . $comment . "')";
        $this->default();
        $this->query($sql);
        $this->close();

    }

    //Pasamos el id de la pelicula y muestra todos los comentarios con el name del usuario y ordenados de mas reciente a mas antiguo
    public function getComments($idMovie)
    {
        $sql = "SELECT c.comment, u.nameUser FROM table_comments as c INNER JOIN table_users as u ON c.idUser=u.idUser WHERE c.idMovie=" . $idMovie . " ORDER BY idComment DESC";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $objComments = array();
        while ($result = $query->fetch_assoc()) {
            $objComments[] = new comment($result["nameUser"], $result["comment"]);
        }
        return $objComments;
    }

    //comprueba que user no hay dado like
    public function validaUserId($idUser, $idMovie)
    {
        $sql = "SELECT idUser FROM table_likes WHERE idMovie='" . $idMovie . "' AND idUser='" . $idUser . "'";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Inserta Like en la db
    public function insertLike($idUser, $idMovie)
    {
        if ($this->validaUserId($idUser, $idMovie) == false) {
            $sql = "INSERT INTO table_likes (idUser, idMovie,likes) VALUES ('" . $idUser . "','" . $idMovie . "','1')";
            $this->default();
            $this->query($sql);
            $this->close();
        }
    }

    //Suma y recoge todos los likes
    public function getLikes($idMovie)
    {
        $sql = "SELECT SUM(likes) FROM table_likes WHERE idMovie=" . $idMovie;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $likes = $result["SUM(likes)"];
        if ($likes == null) {
            $likes = 0;
        }
        return $likes;
    }


}