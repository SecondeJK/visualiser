<?php

namespace VisualiserBundle\Entity;

class ToDoItem
{
	//Individual items. I'm not using a repository for this, it's too much
	// @todo remove comments
	
	protected $itemKey;
	protected $itemDate;
	protected $itemTitle;
	protected $itemCompleted;
  
	public function getKey()
	{
		return $this->itemKey;
	}
	
	private function setKey($key)
	{
		$this->itemKey = $key;
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
