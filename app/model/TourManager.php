<?php

namespace App\Model;

use Nette;


/**
 * Users management.
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
            return $points->related(self::POINT_TABLE_NAME, self::POINT_TOUR_ID)->order(self::POINT_ORDER)->fetchAll();
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

        public function insertPoint($name,$long,$lat,$order,$tour_id){
            $this->database->table(self::POINT_TABLE_NAME)->insert(array(
                'name'=>$name,
                'latitude'=>$lat,
                'longitude'=>$long,
                'order'=>$order
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

}
