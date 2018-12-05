<?php

namespace App\Presenters;
use App\Model\TourManager;
use App\Model\UserManager;
use Nette\Application\UI\Form;

class ListPresenter extends BasePresenter
{
    
    private $tourManager;
    private $userManager;

    public function __construct(TourManager $tourManager, UserManager $userManager){
        $this->tourManager = $tourManager;
        $this->userManager = $userManager;
	}
    
    public function getListData($id = -1){
        $value=array();
        if($id <0){
            $data = $this->tourManager->readAllTours();
            foreach($data as $tour){
                $author =$this->tourManager->readTourAuthor($tour->id);
                $x =array('id'=>$tour->id, 'title'=>$tour->title,'published' =>$tour->published, 'author'=> $author, 'qr' => $this->generateQRcodeURL($tour->id));
                array_push($value,$x);
            }
        }
        else{
            $tour = $this->tourManager->readTour($id);
            $author =$this->tourManager->readTourAuthor($tour->id);
            $value=array('id'=>$tour->id, 'title'=>$tour->title,'published' =>$tour->published, 'author'=> $author, 'qr' => $this->generateQRcodeURL($tour->id));
        }
        return $value;
    }

    public function getUserData($id = -1){
        $value=array();
        if($id <0){
            $data = $this->userManager->readAllUsers();
            foreach($data as $user){
                $x = array('id'=>$user->id, 'username'=>$user->username,'email' =>$user->email, 'role'=> $user->role);
                array_push($value,$x);
            }
        }
        else{
            $user = $this->userManager->readUser($id);
            $value = array('id'=>$user->id, 'username'=>$user->username,'email' =>$user->email, 'role'=> $user->role);
        }
        return $value;
    }

	public function renderDefault(){
            if (!$this->getUser()->isAllowed('List', 'default')) {
                $this->redirect('Homepage:');
            }
            if(!isset($this->template->data)) {
                $this->template->data = $this->getListData();
            }
        }

        public function handlePublish($id){
            $data = $this->getListData();
            $this->template->data = $this->isAjax()
            ? []
            : $data;
            $this->tourManager->setTourPublished($data[$id]["id"]);
            $this->template->data[$id] = $this->getListData($data[$id]["id"]);
            $this->redrawControl('listContainer');
        }

        public function handleUnpublish($id){
            $data = $this->getListData();
            $this->template->data = $this->isAjax()
            ? []
            : $data;
            $this->tourManager->setTourNotPublished($data[$id]["id"]);
            $this->template->data[$id] = $this->getListData($data[$id]["id"]);
            $this->redrawControl('listContainer');
        }


        public function renderAddTour(){
            if (!$this->getUser()->isAllowed('List', 'addTour')) {
                $this->redirect('Homepage:');
            }
        }

        public function renderUsers(){
            if (!$this->getUser()->isAllowed('List', 'users')) {
                $this->redirect('Homepage:');
            }
            if(!isset($this->template->data)) {
                $this->template->data = $this->getUserData();
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

