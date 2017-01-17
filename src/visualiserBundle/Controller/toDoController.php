<?php

namespace visualiserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ToDoController extends Controller
{
    /**
     * @Route("/todo")
     */
    public function indexAction()
    {
        // Here is where we bring in entities for this and unleash the power.
        return $this->render('visualiserBundle:Default:todo.html.twig');
    }
}
