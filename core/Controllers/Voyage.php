<?php
namespace Controllers;


class Voyage extends AbstractController
{

    protected $defaultModelName = \Models\Voyage::class ;

    public function new()
    {
        $veloId = null;
        $description = null;
        $image = null;

        if(!empty($_POST['veloId']) && ctype_digit($_POST['veloId'])){$veloId = $_POST['veloId'];}
        if(!empty($_POST['description'])){$description = htmlspecialchars($_POST['description']);}
        if(!empty($_POST['image'])){$image = htmlspecialchars($_POST['image']);}
       
        $modelVelo = new \Models\Velo();

            if($veloId && $description && $image && $modelVelo->findById($veloId))
            {
                    $nouveauVoyage = new \Models\Voyage();

                    $nouveauVoyage->setDescription($description);
                    $nouveauVoyage->setVeloId($veloId);
                    $nouveauVoyage->setImage($image);

                    $this->defaultModel->save($nouveauVoyage);

                    return $this->redirect(["type"=>"velo",
                                "action"=>"show",
                                "id"=>$veloId
                            ]);
            }

        return $this->redirect(["type"=>"velo",
                                "action"=>"index"
                            ]);

    }


    public function suppr()
    {
        $id=null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id = $_POST['id'];}

        if(!$id){ return $this->redirect(["type"=>"velo","action"=>"index"]); }

        $voyage = $this->defaultModel->findById($id);

        if(!$voyage){ return $this->redirect(["type"=>"velo","action"=>"index"]); }

        
        $this->defaultModel->remove($voyage);

        return $this->redirect(["type"=>"velo",
                                "action"=>"show",
                                "id"=>$voyage->getVeloId()        
                            ]);


    }

    public function change()
    {

        $voyageId = null;
        $description = null;
        $image = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$voyageId = $_POST['id'];}
        if(!empty($_POST['description'])){$description = htmlspecialchars($_POST['description']);}
        if(!empty($_POST['image'])){$image = htmlspecialchars($_POST['image']);}
       
              if($voyageId){ $voyage = $this->defaultModel->findById($voyageId);}
            if($voyageId && $description && $image && $voyage)
            {
                 
                    $voyage->setDescription($description);
                    $voyage->setImage($image);
                    

                    $this->defaultModel->update($voyage);

                    return $this->redirect(["type"=>"velo",
                                "action"=>"show",
                                "id"=>$voyage->getVeloId()
                            ]);
            }

        $id=null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if(!$id){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
        ]);}

        $voyage = $this->defaultModel->findById($id);
        if(!$voyage){return $this->redirect(["type"=>"velo",
            "action"=>"index"
            ]);}


        return $this->render("voyage/update", ["pageTitle"=> "Modifier",
                                              "voyage"=>$voyage
        ]);

    }

}