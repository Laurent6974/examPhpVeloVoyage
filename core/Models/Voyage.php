<?php
namespace Models;

class Voyage extends AbstractModel
{

    protected string $nomDeLaTable = "voyage";

    private $id;
    private $description;
    private $image;
    private $velo_id;



    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description ;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image ;
    }
    
    public function getVeloId()
    {
        return $this->velo_id;
    }
    public function setVeloId($velo_id)
    {
        $this->velo_id = $velo_id ;
    }

    public function findAllByVelo(Velo $velo)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable}
            WHERE velo_id = :velo_id
        ");

        $sql->execute([
            "velo_id"=>$velo->getId()
        ]);

        $avis = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $avis;
    }

    public function save(Voyage $voyage)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
                (description, image, velo_id) VALUES (:description, :image, :velo_id)
        ");
        $sql->execute([
            "description"=>$voyage->description,
            "image"=>$voyage->image,
            "velo_id"=>$voyage->velo_id,
        ]);


    }

    public function update(Voyage $voyage){

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable}
            SET description = :description , image = :image
            WHERE id = :id
        ");

        $sql->execute([
            "description"=>$voyage->description,
            "image"=>$voyage->image,
            "id"=>$voyage->id
        ]);

    }
}