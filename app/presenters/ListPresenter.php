<?php

namespace App\Presenters;
use App\Model\TourManager;
use Nette\Application\UI\Form;

class ListPresenter extends BasePresenter
{
    
        private $tourManager;


	public function __construct(TourManager $tourManager){
            $this->tourManager = $tourManager;
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
        
        public function renderAdd(){
            if (!$this->getUser()->isAllowed('List', 'add')) {
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
            $this->tourManager->insertTour($this->getUser()->getId(), $values['title']);
            $this->redirect('List:');
    }
        
}
