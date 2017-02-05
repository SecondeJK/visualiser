<?php

namespace VisualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

        return $this->render('VisualiserBundle:Default:todo.html.twig', array('toDoList' => $toDoListRender));
    }
}
