<?php

namespace App\Presenters;
use App\Model\TourManager;
use Nette\Application\Responses\JsonResponse;

class ApiPresenter extends BasePresenter
{
    private $tourManager;


	public function __construct(TourManager $tourManager){
            $this->tourManager = $tourManager;
	}
    
    /* Přečte název a autora stezky se zadaným id $id a po ověření vypíše */
	public function actiontour($id){
        /* kontrola, zda byl parametr zadán */
        if(!isset($id)){
            $this->sendError();
        }
        else{
            $tour=$this->tourManager->readTour($id);
            /* kontouje zda stezka s id $id existuje a jestli je published */
            if($tour == null ||$tour->published != "yes"){
                $this->sendError();
            }
            else{
                $author =$this->tourManager->readTourAuthor($tour->users_id);
                $a = array("tour" => $tour->title, "author" => $author);
                $this->sendJsonResponce($a);
            }
        }
	}
    
    /* Přečte pole bodů stezky se zadaným id $id a po ověření vypíše */
    public function actionpoints($id){
        /* kontrola, zda byl parametr zadán */
        if(!isset($id)){
            $this->sendError();
        }
        else{
            $tour=$this->tourManager->readTour($id);
            $points=$this->tourManager->readAllTourPoints($id);
            /* kontouje zda stezka s id $id existuje a jestli je published */
            if(!$points || $tour->published != "yes"){
                $this->sendError();
            }
            else{
                $a=array();
                foreach($points as $row){
                    array_push($a, array('id'=>$row['id'],'order'=>$row['order'],'name'=>$row['name'],'latitude'=>$row['latitude'],'longitude'=>$row['longitude']));
                }
                for($i=0;$i<count($a);$i++){
                    if($i>=1){
                        $result[$i+1]=$a[$i];
                    }
                    else{
                        $result[$i]=$a[$i];
                    }
                    
                }
                $result[1]=end($a);
                unset($result[count($result)-1]);
                $this->sendJsonResponce($result);
            }
        }
	}
    
    /* Přečte detaily bodu s id $id a po ověření vypíše */
    public function actionpointdetail($id){
        /* kontrola, zda byl parametr zadán */
        if(!isset($id)){
            $this->sendError();
        }
        else{
            $point=$this->tourManager->readPoint($id);
            if($point == null){
                $this->sendError();
            }
            else{
                $a = array("foto" => $point->fotoURL, "text" => $point->text);
                $this->sendJsonResponce($a);
            }
        }
	}
    
    /* Výpis error JSON */
    private function sendError(){
        $a = array( "status" => "error");
        $this->sendResponse(new JsonResponse($a));
    }
    
    /* Výpis JSON souboru z asociativního pole $data */
    private function sendJsonResponce($data){
        $this->sendResponse(new JsonResponse($data));
    }

    /* Vypíše zda stezka existuje a je published */
    public function actionexist($id){
        /* kontrola, zda byl parametr zadán */
        if(!isset($id)){
            $this->sendError();
        }
        else{
            $tour=$this->tourManager->readTour($id);
            $points=$this->tourManager->readAllTourPoints($id);
            /* kontroluje zda stezka s id $id existuje, jestli je stezka published a jestli má nějaké existující body */
            if($tour == null || !$points || $tour->published != "yes"){
                $a = array("status" => "not_avaible");
            }
            else{
                $a = array("status" => "avaible", "tour" => $tour->title);
            }
            $this->sendJsonResponce($a);
        }
	}

}
