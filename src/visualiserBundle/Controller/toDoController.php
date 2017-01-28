<?php

namespace VisualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use VisualiserBundle\Model;

class ToDoController extends Controller
{
    /**
     * @Route("/todo")
     */
    public function indexAction()
    {
        $toDoListService = $this->get('visualiser.todolist');
        $toDoListService->loadData();
        $toDoListRender = $toDoListService->getToDoList();
        dump($toDoListRender);

        return $this->render(
          'VisualiserBundle:Default:todo.html.twig',
          array('toDoList' => $toDoListRender)
        );
    }
}
