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
                $a = array( "status" => "error");
            }
            else{
                $tour=$this->tourManager->readTour($id);
                $author =$this->tourManager->readTourAuthor($tour->users_id);
                $a = array("tour" => $tour->title, "author" => $author);
                $this->sendResponse(new JsonResponse($a));
            }
	}
        
}
