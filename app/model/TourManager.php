<?php

namespace App\Model;

use Nette;


/**
 * Tours management.
 */
class TourManager
{
	use Nette\SmartObject;

	const
		TOUR_TABLE_NAME = 'tour',
		TOUR_ID = 'id',
		TOUR_TITLE = 'title',
		TOUR_PUBLISHED = 'published',
        TOUR_USERS_ID = 'users_id';

        const
		POINT_TABLE_NAME = 'point',
		POINT_ID = 'id',
        POINT_ORDER = 'order',
		POINT_COORDINATE_E = 'longitude',
		POINT_COORDINATE_N = 'latitude',
        POINT_TEXT = 'text',
        POINT_FOTO = 'fotoURL',
        POINT_NAME = 'name',
        POINT_TOUR_ID = 'tour_id';

	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
        
        public function readAllTours(){
            return $this->database->table(self::TOUR_TABLE_NAME)->fetchAll();
        }
        
        public function readTour($id){
            return $this->database->table(self::TOUR_TABLE_NAME)->get($id);
        }
        
        public function readTourAuthor($id){
            $author = $this->database->table(self::TOUR_TABLE_NAME)->get($id);
            return $author->ref('users',self::TOUR_USERS_ID)->username;
        }
        
        public function readAllTourPoints($id){
            $points= $this->database->table(self::TOUR_TABLE_NAME)->get($id);
            if($points==null){
                return false;
            }
            else{
                return $points->related(self::POINT_TABLE_NAME, self::POINT_TOUR_ID)->order(self::POINT_ORDER)->fetchAssoc('order=');
            }
        }
        
        public function swapPointOrder($id_first,$id_second){
            if($this->database->table(self::POINT_TABLE_NAME)->get($id_first)->tour_id == $this->database->table(self::POINT_TABLE_NAME)->get($id_second)->tour_id){
                $first_point_order=$this->database->table(self::POINT_TABLE_NAME)->get($id_first)->order;
                $this->database->table(self::POINT_TABLE_NAME)->where('id',$id_first)->update(['order'=>$this->database->table(self::POINT_TABLE_NAME)->get($id_second)->order]);
                $this->database->table(self::POINT_TABLE_NAME)->where('id',$id_second)->update(['order'=>$first_point_order]);
            }
        }

        public function readPoint($id){
            return $this->database->table(self::POINT_TABLE_NAME)->get($id);
        }
        
        public function insertTour($title,$author_id){
            $this->database->table(self::TOUR_TABLE_NAME)->insert(array(
                'title'=>$title,
                'published'=>'wip',
                'users_id'=>$author_id
            ));
        }
        
        public function renameTour($id, $title){
            $this->database->table(self::TOUR_TABLE_NAME)->where('id',$id)->update(['title'=>$title]);
        }

        public function updatePoint($id,$name,$long,$lat){
            $this->database->table(self::POINT_TABLE_NAME)->where('id',$id)->update(['name'=>$name,
            'latitude'=>$lat,
            'longitude'=>$long
            ]);
        }

        public function insertPoint($name,$long,$lat,$tour_id){
            $order=count($this->database->table(self::POINT_TABLE_NAME)->where('tour_id',$tour_id))+1;
            $this->database->table(self::POINT_TABLE_NAME)->insert(array(
                'name'=>$name,
                'latitude'=>$lat,
                'longitude'=>$long,
                'order'=>$order,
                'tour_id'=>$tour_id
            ));
        }
        
        public function setTourPublished($id){
            $this->database->table(self::TOUR_TABLE_NAME)->where('id',$id)->update(['published'=>'yes']);
        }

        public function setTourNotPublished($id){
            $this->database->table(self::TOUR_TABLE_NAME)->where('id',$id)->update(['published'=>'no']);
        }

        public function getTourByName($tour_name){
            return $this->database->table(self::TOUR_TABLE_NAME)->where('title',$tour_name)->fetch();
        }

        public function getToursByAuthor($author_id){
            return $this->database->table(self::TOUR_TABLE_NAME)->where('users_id',$author_id)->fetchAll();
        }

        public function pointsCount($id){
            return $this->database->table(self::POINT_TABLE_NAME)->where('tour_id',$id)->count();
        }
}
