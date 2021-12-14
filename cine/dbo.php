<?php
include_once "author.php";
include_once "genreNew.php";
include_once "movie.php";


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
            //duda con idMovie $this->getMovie($result["idMovies"])
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

    //order by rating year
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

    //Registro
    public function registrarUser($email, $user, $userPass)
    {
        $sql = "SELECT * FROM table_users WHERE nameUser=" . $user . ",passUser=" . $userPass . ",emailUser=" . $email;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        if (mysqli_num_rows($result) > 0) {
            echo "Error el usuario ya existe";
        } else {
            $sql = 'INSERT INTO table_users (nameUSer,passUser,emailUser) 
VALUES ("' . $this->real_escape_string($user) . '",
"' . $this->real_escape_string($userPass) . '",
"' . $this->real_escape_string($email) . '")';
            if ($this->query($sql) === TRUE) {
                echo "New record created successfully <br>";
            } else {
                echo "Error: " . $sql . "<br>" . $this->error;
            }
        }
    }
}