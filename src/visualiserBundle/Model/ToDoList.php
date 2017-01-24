<?php

namespace visualiserBundle\Model;

class ToDoList
{
  private $toDoListData;
  private $fileLocator;
  private $dataPath;

  public function __construct($fileLocator)
  {
    $this->fileLocator = $fileLocator;
  }

  public function loadToDoListData()
  {
    $this->dataPath = $fileLocator->locate('@visualiserBundle/Resources/data/todo.json');
    $this->toDoListData = json_decode(file_get_contents($path));
  }
  
}
