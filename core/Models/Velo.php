<?php

namespace Models;

class Velo extends AbstractModel
{

    protected string $nomDeLaTable = "velo";

    protected $id;
    protected $modele;
    protected $image;

    public function getId()
    {
        return $this->id ;
    }
    
    public function getModele()
    {
        return $this->modele ;
    }

    public function setModele($modele){
        $this->modele = $modele;
    }
  
    public function getImage()
    {
        return $this->image ;
    }

    public function setImage($image){
        $this->image = $image;
    }


    public function save(Velo $velo)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
                ( modele, image) VALUES ( :modele , :image)
        ");
        $sql->execute([
            "modele"=>$velo->modele,
            "image"=>$velo->image,
        ]);

    }

    public function update(Velo $velo){

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable}
            SET modele = :modele, image = :image 
            WHERE id = :id
        ");

        $sql->execute([
            "modele"=>$velo->modele,
            "image"=>$velo->image,
        ]);

    }

    public function getVoyage(){

        $modelVoyage = new \Models\Voyage();
        return $modelVoyage->findAllByVelo($this);
    }

}