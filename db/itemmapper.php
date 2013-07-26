<?php
namespace \OCA\Hubly\Db;

use \OCA\AppFramework\Db\Mapper;


class ItemMapper extends Mapper {


    public function __construct(API $api) {
      parent::__construct($api, 'news_feeds'); // tablename is news_feeds
    }


    public function find($id, $userId){
      $sql = 'SELECT * FROM `' . $this->getTableName() . '` ' .
        'WHERE `id` = ? ' .
        'AND `user_id` = ?';

      // use findOneQuery to throw exceptions when no entry or more than one
      // entries were found
      $row = $this->findOneQuery($sql, array($id, $userId));
      $feed = new Item();
      $feed->fromRow($row);

      return $feed;
    }


    public function findByName($name){
      $sql = 'SELECT * FROM `' . $this->getTableName() . '` ' .
      'WHERE `name` = ? ';

      $row = $this->execute($sql, array($name));
      $feed = new Item();
      $feed->fromRow($row);

      return $feed;
    }

}