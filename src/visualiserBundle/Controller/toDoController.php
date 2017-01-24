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
        //$toDoInstance = $this->get('visualiser.todolist');
        //dump($todoList);
        //$concreteToDo = new Model\ToDoList($this->get('finder'));
        return $this->render('visualiserBundle:Default:todo.html.twig');
    }
}
