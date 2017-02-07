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
     * @Route("/todo", name="visualiser_todo_index")
     */
    public function indexAction(Request $request)
    {
        $toDoListService = $this->get('visualiser.todolist');
        $toDoListService->loadData();
        $toDoListRender = $toDoListService->getToDoList();
                
		// Create a task and give it some dummy data for this example
        $toDoActive = new Entity\ToDoItem();
        $toDoActive->setItemTitle('Write a new item');
        
        $form = $this->createFormBuilder($toDoActive)
            ->add('itemTitle', TextType::class)
            ->add('itemDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Item'))
            ->getForm();
        
        // Time to handle the form
        $form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$toDoActive = $form->getData();
			$toDoListService->addItem($toDoActive);
			
			return $this->redirectToRoute('visualiser_todo_index');
		}
            
        return $this->render('VisualiserBundle:Default:todo.html.twig', 
			array('toDoList' => $toDoListRender,
			      'form' => $form->createView()
			 )
		);
    }
    
    /**
     * @Route("todo/delete/{id}", name="visualiser_todo_delete")
     */
    public function deleteAction($id)
    {
		$toDoListService = $this->get('visualiser.todolist');
        $toDoListService->loadData();
        $toDoListService->deleteItem($id);
        
        return $this->redirectToRoute('visualiser_todo_index');
	}	
}
