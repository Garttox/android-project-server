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
    
	public function actiontour($id){
        if(!isset($id)){
            $this->sendError();
        }
        else{
            $tour=$this->tourManager->readTour($id);
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
        
    public function actionpoints($id){
        if(!isset($id)){
            $this->sendError();
        }
        else{
            $tour=$this->tourManager->readTour($id);
            $points=$this->tourManager->readAllTourPoints($id);
            if(!$points || $tour->published != "yes"){
                $this->sendError();
            }
            else{
                $a=array();
                foreach($points as $row){
                    array_push($a, array('id'=>$row->id,'order'=>$row->order,'name'=>$row->name,'latitude'=>$row->latitude,'longitude'=>$row->longitude));
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
        
    public function actionpointdetail($id){
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
        
    private function sendError(){
        $a = array( "status" => "error");
        $this->sendResponse(new JsonResponse($a));
    }
    
    private function sendJsonResponce($data){
        $this->sendResponse(new JsonResponse($data));
    }

    public function actionexist($id){
        if(!isset($id)){
            $this->sendError();
        }
        else{
            $tour=$this->tourManager->readTour($id);
            $points=$this->tourManager->readAllTourPoints($id);
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
