<?php
include_once "author.php";
include_once "genre.php";

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


    public function getGenre($idMovie)
    {
        $sql = "SELECT * FROM table_genres where idMovies=" . $idMovie;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $objGenre = array();
        while ($result = $query->fetch_assoc()) {
            //duda con idMovie $this->getMovie($result["idMovies"])
            $objGenre[] = new genre($result["idGenres"], $result["idMovies"], $result["nameGenres"]);
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
                $this->getGenre($result["idMovies"]), $result["imgMovies"], $result["trailerMovies"]);

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
            $result["descriptionMovies"], $this->getGenre($result["idMovies"]), $result["imgMovies"], $result["trailerMovies"]);

        return $objMovie;
    }


    public function filterGenres()
    {
        $sql = "SELECT DISTINCT nameGenres FROM table_genres";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $array = array();
        while ($result = $query->fetch_assoc()) {
            $array[] = $result["nameGenres"];
        }
        return $array;
    }


}