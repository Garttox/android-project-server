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
            if($data[$id]["published"] == "yes"){
                $this->tourManager->setTourNotPublished($data[$id]["id"]);
            }
            else{
                $this->tourManager->setTourPublished($data[$id]["id"]);
            }
            $this->template->data[$id] = $this->getListData($data[$id]["id"]);
            $this->redrawControl('toursListContainer');
        }

        public function handleRole($id){
            $users = $this->getUserData();
            $this->template->data = $this->isAjax()
            ? []
            : $users;
            if($this->getUser()->getIdentity()->getRoles() == "admin"){
                if($data[$id]["role"] == "admin"){
                    $this->userManager->setUserEditor($users[$id]["id"]);
                }
                else{
                    $this->userManager->setUserAdmin($users[$id]["id"]);
                }
                $this->template->data[$id] = $this->getUserData($users[$id]["id"]);
            }
            $this->redrawControl('usersListContainer');
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
        
        public function renderDetail($id){
            $author_id=$this->tourManager->readTour($id)->users_id;
            if($this->getUser()->getIdentity()->getId() != $author_id){
                $this->error('Nemáte oprávění editovat tuto stezku');
            }else{
                if(!isset($this->template->points)) {
                    $this->template->points=$this->tourManager->readAllTourPoints($id);
                }
                $this->template->tour=$this->getListData($id);
                $this->template->last=$this->tourManager->pointsCount($id);
            }

        }

        public function handleSwap($id_first, $id_second, $id){
            $points = $this->tourManager->readAllTourPoints($id);
            $this->template->points = $this->isAjax()
            ? []
            : $points;
            $this->tourManager->swapPointOrder($points[$id_first]['id'], $points[$id_second]['id']);
            $this->template->points[$id_second]=$this->tourManager->readPoint($points[$id_first]['id']);
            $this->template->points[$id_first]=$this->tourManager->readPoint($points[$id_second]['id']);
            $this->redrawControl('pointsListContainer');
        }

        public function renderAddPoint($tour){
            if (!$this->getUser()->isAllowed('List', 'addPoint')) {
                $this->redirect('Homepage:');
            }
            $tourFetch=$this->tourManager->readTour($tour);
            if($this->getUser()->getIdentity()->getId() != $tourFetch->users_id){
                $this->error('Nemáte oprávění editovat tuto stezku');
            }
        }
        
        public function renderEditPoint($id){
            if (!$this->getUser()->isAllowed('List', 'editPoint')) {
                $this->redirect('Homepage:');
            }
            $point = $this->tourManager->readPoint($id);
            $tour=$this->tourManager->readTour($point->tour_id);
            if(!$tour) {
                $this->error('Bod nebyl nalezen');
            }
            else if($this->getUser()->getIdentity()->getId() != $tour->users_id){
                $this->error('Nemáte oprávění editovat tuto stezku');
            }
            else{
                $this['pointForm']->setDefaults($point->toArray());
            }
        }

        public function renderEditTour($id){
            $tour = $this->tourManager->readTour($id);
            if(!$tour) {
                $this->error('Stezka nebyla nalezena');
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
            $form->addSubmit('submit', 'OK');
            $form->onSuccess[] = array($this, 'tourFormSucceeded');
            return $form;
        }
        
        public function tourFormSucceeded(Form $form, $values){
            $tour_id = $this->getParameter('id');

            if($tour_id){
                $tour = $this->tourManager->readTour($tour_id);
                $tour->update($values);
                $this->redirect('List:detail',$tour_id);
            }
            else{
                $this->tourManager->insertTour($values['title'],$this->getUser()->getId());
                $this->redirect('List:');
            }
            
        }

        protected function createComponentPointForm(){
            $form = new Form;
            $form->addText("name","Název bodu:");
            $form->addtext("longitude","Longitude:");
            $form->addtext("latitude","Latitude:");
            $form->addTextArea('text', 'Popis:');
            $form->addSubmit('submit', 'OK');
            $form->onSuccess[] = array($this, 'pointFormSucceeded');
            return $form;
        }

        public function pointFormSucceeded(Form $form, $values){
            $point_id = $this->getParameter('id');

            if($point_id){
                $point = $this->tourManager->readPoint($point_id);
                $point->update($values);
                $this->redirect('List:detail',$point->tour_id);
            }
            else{
                $this->tourManager->insertPoint($values["name"],$values["longitude"],$values["latitude"],$this->getParameter('tour'));
                $this->redirect('List:detail',$this->getParameter('tour'));
            }
            
        }

        public function generateQRcodeURL($tour_id){
            return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=OpavaTour|".$tour_id."&choe=UTF-8";
        }
        
}

//            $this->template->test = $this->tourManager->getToursByAuthor($this->userManager->getId("Garttox")); může být více výsledků
//            $this->template->test = $this->tourManager->getTourByName("test1"); vždy jeden vásledek

