<?php

namespace App\Presenters;
use App\Model\TourManager;
use Nette\Application\UI\Form;

class ListPresenter extends BasePresenter
{
    
        private $tourManager;
        private $userManager;



        public function __construct(TourManager $tourManager, UserManager $userManager){
            $this->tourManager = $tourManager;
            $this->userManager = $userManager;
	    }
    
	public function renderDefault(){
            if (!$this->getUser()->isAllowed('List', 'default')) {
                $this->redirect('Homepage:');
            }
            $value=array();
            $data = $this->tourManager->readAllTours();
            foreach($data as $tour){
                $author =$this->tourManager->readTourAuthor($tour->id);
                $x =array('id'=>$tour->id, 'title'=>$tour->title,'published' =>$tour->published, 'author'=> $author);
                array_push($value,$x);
            }
            $this->template->data = $value;
        }
        
        public function renderAddTour(){
            if (!$this->getUser()->isAllowed('List', 'addTour')) {
                $this->redirect('Homepage:');
            }
        }
        
        public function renderAddPoints($id){
            if (!$this->getUser()->isAllowed('List', 'addPoints')) {
                $this->redirect('Homepage:');
            }
        }
        
        protected function createComponentTourForm(){
            $form = new Form;
            $form->addText("title","Název:");
            $form->addSubmit('submit', 'Vytvořit');
            $form->onSuccess[] = array($this, 'tourFormSucceeded');
            return $form;
        }
        
        public function tourFormSucceeded(Form $form, $values){
            $this->tourManager->insertTour($values['title'],$this->getUser()->getId());
            $this->redirect('List:');
        }

        public function generateQRcodeURL($tour_id){
            return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=OpavaTour|".$tour_id."&choe=UTF-8";
        }
        
}

//            $this->template->test = $this->tourManager->getToursByAuthor($this->userManager->getId("Garttox")); může být více výsledků
//            $this->template->test = $this->tourManager->getTourByName("test1"); vždy jeden vásledek

