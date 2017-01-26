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
    $this->toDoListData = json_decode(file_get_contents($dataPath));
  }

  public function getToDoList()
  {
    if ($this->toDoListData == '') {
      return 'ERROR: No data loaded to class. Did you forget to call loadToDoListData?';
    } else {
      return $this->toDoListData;
    }
  }
}
