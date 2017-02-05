<?php

namespace VisualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use VisualiserBundle\Model;
use VisualiserBundle\Entity;

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
        
		// create a task and give it some dummy data for this example
        $dummyExample = new Entity\ToDoItem();
        //echo $dummyExample->getItemCompleted();
        $dummyExample->setItemTitle('Write a new item');
        dump($dummyExample);
        //$dummyExample->setItemDate(new \DateTime('tomorrow'));

        return $this->render('VisualiserBundle:Default:todo.html.twig', array('toDoList' => $toDoListRender));
    }
}
