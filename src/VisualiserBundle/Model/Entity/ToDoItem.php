<?php

namespace VisualiserBundle\Entity;

class ToDoItem
{
  //Individual items. I'm not using a repository for this, it's too much
  // @todo remove comments
  private $itemKey;
  private $itemDate;
  private $itemTitle;
  private $itemCompleted;
  
  public __construct()
  {
	  echo 'YOU MADE AN ITEM';
  }
  
  public function getItemKey()
  {
	  return $this->itemKey;
  }
  
  public function setItemKey($newKey)
  {
	  $this->itemKey = $newKey;
	  
	  return $this;
  }
  
  public function getItemDate()
  {
	  return $this->itemDate;
  }
  
  public function setItemDate(\DateTime $newDate)
  {
	  $this->itemDate = $newDate;
	  
	  return $this;
  }
  
  public function getItemTitle()
  {
	  return $this->itemTitle;
  }
  
  public function setItemTitle($newTitle)
  {
	  $this->itemTitle = $newTitle;
	  
	  return $this;
  }
  
  public function getItemCompleted()
  {
	  return $this->itemCompleted;
  }
  
  public function setItemCompleted($newFlag)
  {
	  $this->itemCompleted = $newFlag;
	  
	  return $this;
  }
  
}
