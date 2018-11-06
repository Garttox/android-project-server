<?php

namespace App\Presenters;
use App\Model\TourManager;

class ListPresenter extends BasePresenter
{
    
        private $tourManager;


	public function __construct(TourManager $tourManager){
            $this->tourManager = $tourManager;
	}
    
	public function renderDefault(){
            $value=array();
            $data = $this->tourManager->readAllTours();
            foreach($data as $tour){
                $author =$this->tourManager->readTourAuthor($tour->users_id);
                $x =array('title'=>$tour->title,'published' =>$tour->published, 'author'=> $author);
                array_push($value,$x);
            }
            $this->template->data = $value;
        }
        
        protected function createComponentTourForm(){
            
        }
}
