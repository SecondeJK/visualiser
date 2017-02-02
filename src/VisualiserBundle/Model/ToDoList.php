<?php

namespace VisualiserBundle\Model;

use Symfony\Component\Config\FileLocator;

class ToDoList
{
  private $toDoListData;
  private $dataPath;

  public function __construct()
  {
    $this->dataPath = __DIR__.'/../Resources/data/todo.json';
  }

  public function loadData()
  {
	$this->toDoListData = json_decode(file_get_contents($this->dataPath));
	dump($this->toDoListData);
  }

  public function getToDoList()
  {
    if ($this->toDoListData == '') {
      return 'ERROR: No data loaded to class. Did you forget to call loadData?';
    } else {
      return $this->toDoListData;
    }
  }
}
