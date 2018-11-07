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
		POINT_COORDINATE_E = 'coordinateE',
		POINT_COORDINATE_N = 'coordinateN',
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
            return $points->related(self::POINT_TABLE_NAME, self::POINT_TOUR_ID);
        }
        
        public function insertTour($id,$title){
            $this->database->table(self::TOUR_TABLE_NAME)->insert(array(
                'users_id'=>$id,
                'title'=>$title,
                'published'=>'wip'
            ));
        }
        
}
