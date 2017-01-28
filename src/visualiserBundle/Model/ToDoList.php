<?php

namespace VisualiserBundle\Model;

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

  public function loadData()
  {
  $this->dataPath = $this->fileLocator->locate('@VisualiserBundle/Resources/views/base.html.twig');
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
}
