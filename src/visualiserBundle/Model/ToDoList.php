<?php

namespace visualiserBundle\Model;

use Symfony\Component\Config\FileLocator;

class ToDoList
{
  private $toDoListData;
  private $fileLocator;
  private $dataPath;

  public function __construct(FileLocator $fileLocator)
  {
    $this->fileLocator = $fileLocator;
  }

  public function loadToDoListData()
  {
    $this->dataPath = $fileLocator->locate('@visualiserBundle/Resources/data/todo.json');
    $this->toDoListData = json_decode(file_get_contents($path));
  }

  public function getToDoList()
  {
    return $this->toDoListData;
  }
}
