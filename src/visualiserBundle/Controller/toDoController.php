<?php

namespace visualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use visualiserBundle\Model;

class ToDoController extends Controller
{
    /**
     * @Route("/todo")
     */
    public function indexAction()
    {
        $toDoListService = $this->get('visualiser.todolist');
        $toDoListRender = $toDoListService->getToDoList();

        return $this->render(
          'visualiserBundle:Default:todo.html.twig',
          array('toDoList' => $toDoListRender)
        );
    }
}
