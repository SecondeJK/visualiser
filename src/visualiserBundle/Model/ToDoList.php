<?php

namespace visualiserBundle\Model;

class ToDoList
{
  // This is the model for the entire list. It fetches it, exports it and does
  // other kinds of encoding and shit.
  // @todo Remove scaffolding comments

  private $toDoListData;
  private $fileLocator;
  private $dataPath;

  public function __construct($fileLocator)
  {
    $this->fileLocator = $fileLocator;
  }

  public function loadToDoData()
    $this->dataPath = $fileLocator->locate('@visualiserBundle/Resources/data/todo.json');
    $this->toDoListData = json_decode(file_get_contents($path));
}
