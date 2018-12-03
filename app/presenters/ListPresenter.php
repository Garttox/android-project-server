<?php

namespace App\Presenters;
use App\Model\TourManager;
use App\Model\UserManager;
use Nette\Application\UI\Form;

class ListPresenter extends BasePresenter
{
    
    private $tourManager;
    private $userManager;
    private $data;

    public function __construct(TourManager $tourManager, UserManager $userManager){
        $this->tourManager = $tourManager;
        $this->userManager = $userManager;
	}
    
    public function getListData(){
        $value=array();
        $data = $this->tourManager->readAllTours();
        foreach($data as $tour){
            $author =$this->tourManager->readTourAuthor($tour->id);
            $x =array('id'=>$tour->id, 'title'=>$tour->title,'published' =>$tour->published, 'author'=> $author);
            array_push($value,$x);
        }
        return $value;
    }

	public function renderDefault(){
            if (!$this->getUser()->isAllowed('List', 'default')) {
                $this->redirect('Homepage:');
            }
            if(!isset($this->template->data)) {
                $this->data=$this->getListData();
                $this->template->data = $this->data;
            }
        }

        public function handleUpdate($id){
            $this->template->data = $this->isAjax()
            ? []
            : $this->data;
            //$this->template->data[$id]=$this->tourManager->readTour($this->data[$id]["id"]);
            //$this->tourManager->renameTour($this->template->data[$id]["id"],"AJAX");
            //$this->template->data[$id] = $this->tourManager->readTour($this->template->data[$id]["id"]);
            
            
            
            $this->redrawControl('listContainer');
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
        
        public function renderEditTour(){

        }

        public function actionEditTour($id){
            $tour = $this->tourManager->readTour($id);
            if(!$tour) {
                $this->error('Příspěvek nebyl nalezen');
            }
            else if($this->getUser()->getIdentity()->getId() != $tour->users_id){
                $this->error('Nemáte oprávění editovat tuto stezku');
            }
            else{
                $this['tourForm']->setDefaults($tour->toArray());
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
            $tour_id = $this->getParameter('id');

            if($tour_id){
                $tour = $this->tourManager->readTour($tour_id);
                $tour->update($values);
            }
            else{
                $this->tourManager->insertTour($values['title'],$this->getUser()->getId());
            }
            $this->redirect('List:');
        }

        public function generateQRcodeURL($tour_id){
            return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=OpavaTour|".$tour_id."&choe=UTF-8";
        }
        
}

//            $this->template->test = $this->tourManager->getToursByAuthor($this->userManager->getId("Garttox")); může být více výsledků
//            $this->template->test = $this->tourManager->getTourByName("test1"); vždy jeden vásledek

