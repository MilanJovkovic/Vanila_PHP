<?php
namespace Models;

use \Models\Database;

class Item
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  /**
   * CREATE
   * @return boolean
   */
  public function createItem($listId, $itemName) : bool
  {
    $this->db->query("INSERT INTO item (`listId`,`title`) VALUES (:listId, :itemName)");
    $this->db->bind(':listId', $listId);
    $this->db->bind(':itemName', $itemName);
    if ($this->db->execute())
      return true;
    return false;
  }

  /**
   * READ
   * @return array
   */
  public function selectAll($param) : array
  {
    $this->db->query("SELECT * FROM ( SELECT * FROM item WHERE listId = :id ORDER BY id DESC LIMIT 10) sub ORDER BY id ASC");
    $this->db->bind(":id", $param['id']);
    if ($this->db->execute())
      return $this->db->resultSet();
  }

}
