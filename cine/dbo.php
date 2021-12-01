<?php
include_once "author.php";
include_once "genre.php";
include_once "source.php";
include_once "movie.php";


class dbo extends mysqli
{
    protected string $hostname="localhost";
    protected string $username="root";
    protected string $password="Pascal.69";
    protected string $database="db_movies";

    public function default(){
        $this->local();
    }

    public function local()
    {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);

        if(mysqli_connect()){
            die("Error Database". mysqli_connect_error());
        }
    }

    public function getAuthor($idAuthor){
        $sql="SELECT * FROM table_author where idAuthor=". $idAuthor;
        $this->default();
        $query=$this->query($sql);
        $this->close();
        $result=$query->fetch_assoc();
        $objAuthor=new author($result["idAuthor"],$result["nameAuthor"]);
        return $objAuthor;

    }

    public function getGenre($idMovie){
        $sql="SELECT * FROM table_genres where idMovies=".$idMovie;
        $this->$this->default();
        $query=$this->query($sql);
        $this->close();
        $result=$query->fetch_assoc();
        //duda con idMovie $this->getMovie($result["idMovie"])
        $objGenre=new genre($result["idGenres"],$result["idMovies"],$result["nameGenres"]);
        return $objGenre;
    }

    public function getSource($idMovie){
        $sql="SELECT * FROM table_sources where idMovies=".$idMovie;
        $this->$this->default();
        $query=$this->query($sql);
        $this->close();
        $result=$query->fetch_assoc();
        //duda con idMovie $this->getMovie($result["idMovie"])
        $objSource=new source($result["idSources"],$result["idMovies"],$result["imgSources"],$result["trailerSources"]);
        return $objSource;
    }

    public function getMovies(){
        $sql="SELECT * FROM table_movies";
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();
        $objMovies=array();
        while ($result=$query->fetch_assoc()){
            $objMovies[]=new movie($result["idMovies"],$result["nameMovies"],$result["yearMovies"],
                $result["durationMovies"],$this->getAuthor($result["idAuthor"]),$result["ratingMovies"],$result["descriptionMovies"],
                $this->getGenre($result["idGenres"]),);
            //duda un array para soruces o 2 arrays?

        }
        return $objMovies;
    }

    public function  getMovie($idMovie)
    {
        $sql = "SELECT * FROM table_movies where idMovies=".$idMovie;
        $this->default();
        $query = $this->query($sql);
        $this->close();
        $result = $query->fetch_assoc();

        $objMovie = new movie($result["idMovies"], $result["nameMovies"], $result["yearMovies"],
            $result["durationMovies"], $this->getAuthor($result["idAuthor"]), $result["ratingMovies"],
            $result["descriptionMovies"], $this->getGenre($result["idGenres"]),);
        //duda un array para soruces o 2 arrays?


    }
}