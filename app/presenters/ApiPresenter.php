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
                if($tour==null){
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
                $points=$this->tourManager->readAllTourPoints($id);
                if($points==null){
                    $this->sendError();
                }
                else{
                    $a=array();
                    foreach($points as $row){
                        array_push($a, array('id'=>$row->id,'order'=>$row->order,'name'=>$row->name,'latitude'=>$row->latitude,'longitude'=>$row->longitude));
                    }
                    $this->sendJsonResponce($a);
                }
            }
	}
        
        public function actionpointdetail($id){
            if(!isset($id)){
                $this->sendError();
            }
            else{
                $point=$this->tourManager->readPoint($id);
                if($point==null){
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
}
