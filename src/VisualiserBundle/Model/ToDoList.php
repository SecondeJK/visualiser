<?php

namespace VisualiserBundle\Model;
namespace VisualiserBundle\Entity;

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
  }

  public function getToDoList()
  {
    if ($this->toDoListData == '') {
      return 'ERROR: No data loaded to class. Did you forget to call loadData?';
    } else {
      return $this->toDoListData;
    }
  }
  
  public function addItem(Entity\ToDoItem $toDoItem)
  {
	  $this->toDoListData[] = $toDoItem;
  }
  
  /*
   * @todo This funtion should be private. Change in when done testing
   */
  private function reindexList()
  {
	  $this->toDoListData = array_values($this->toDoListData);
  }
  
  private function writeList()
  {
	  file_put_contents($this->dataPath, json_encode($this->toDoListData));
  }
  
  
}
