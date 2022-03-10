<?php
namespace  Controllers;

class Velo extends AbstractController
{

    protected $defaultModelName = \Models\Velo::class ;

    public function index()
    {
        return $this->render("velos/index", [
            "pageTitle" => "accueil velos",
            "velos" => $this->defaultModel->findAll()
        ]);
    }



    public function show(){

        $id=null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if(!$id){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
        ]);}

        $velo = $this->defaultModel->findById($id);
        if(!$velo){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
                                            ]);}

        return $this->render("velos/show", [
            "pageTitle"=> $velo->getModele(),
            "velo"=>$velo,
           
        ]);



    }

    public function new()
    {
        $modele = null;
        $image = null;

        if(!empty($_POST['modele'])){$modele = htmlspecialchars( $_POST['modele']);}
        if(!empty($_POST['image'])){$image = htmlspecialchars( $_POST['image']);}
        
        if($modele && $image){

                $velo = new \Models\Velo();
                
                $velo->setModele($modele);
                $velo->setImage($image);

                $this->defaultModel->save($velo);

                return $this->redirect(["type"=>"velo",
                "action"=>"index"
        ]);

        }

        return $this->render("velos/create", ["pageTitle"=> "nouveau velo"]);
    }



    public function suppr(){

        $id = null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id = $_POST['id'];}
       
        if(!$id){return $this->redirect(["type"=>"velo",
            "action"=>"index"
                ]);}

                $velo = $this->defaultModel->findById($id);
                if($velo)
                {
                    $this->defaultModel->remove($velo);
                }

                return $this->redirect(["type"=>"velo",
                                        "action"=>"index"
                                            ]);       
    }

    public function change()
    {
        $veloId = null;
        $modele = null;
        $image = null;

        if(!empty($_POST['modele'])){$name = htmlspecialchars( $_POST['name']);}
        if(!empty($_POST['image'])){$image = htmlspecialchars( $_POST['image']);}

        if($modele && $image && $veloId){

                $velo = $this->defaultModel->findById($veloId);

                if(!$velo){return $this->redirect(["type"=>"velo",
                    "action"=>"index"
                    ]);}

                $velo->setModele($name);
                $velo->setImage($image);

                $this->defaultModel->update($velo);

                return $this->redirect(["type"=>"velo",
                "action"=>"index"
        ]);

        }

        $id=null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if(!$id){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
        ]);}

        $velo = $this->defaultModel->findById($id);
        if(!$velo){return $this->redirect(["type"=>"velo",
            "action"=>"index"
            ]);}


        return $this->render("velos/update", ["pageTitle"=> "Modifier",
                                              "velo"=>$velo
        ]);

    }
}