<?php
namespace Controllers;

use \Models\Item;

class Items
{
  public function __construct()
  {
    $this->itemModel = new Item;
  }

  public function all($param)
  {
    echo json_encode($this->itemModel->selectAll($param));
  }

  // CREATE new task
  public function addItem()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->itemModel->createItem($_POST['listId'], $_POST['name']))
      return "success";
    else 
      return "failed";
  }

}
