<?php

class Prijava{
    public $id;
    public $predmet;
    public $katedra;
    public $sala;
    public $datum;

    public function __construct($id=null,$predmet=null,$katedra=null,$sala=null,$datum=null)
    {
        $this->id=$id;
        $this->predmet=$predmet;
        $this->katedra=$katedra;
        $this->sala=$sala;
        $this->datum=$datum;
    }

    public static function getAll(mysqli $conn){
        $query="SELECT * FROM prijave";
        return $conn->query($query);
    }
    public static function deleteById($id,mysqli $conn){
        $query="DELETE FROM prijave WHERE id=$id";
        return $conn->query($query);
    }
    public static function add(Prijava $prijava,mysqli $conn){
        $query="INSERT INTO prijave(predmet,katedra,sala,datum) VALUES ('$prijava->predmet','$prijava->katedra','$prijava->sala', '$prijava->datum')";
        return $conn->query($query);
    }
    public static function getLastId(mysqli $conn)
    {
        $query_str = "SELECT * FROM prijave ORDER BY id DESC LIMIT 1";
        $result = $conn->query($query_str);
        return $result->fetch_object()->id;
    }

    public static function update(Prijava $prijava, mysqli $conn)
    {
        $query_str = "UPDATE prijave SET predmet='$prijava->predmet', katedra='$prijava->katedra', sala='$prijava->sala', datum='$prijava->datum' WHERE id=$prijava->id";
        return $conn->query($query_str);
    }
}

?>