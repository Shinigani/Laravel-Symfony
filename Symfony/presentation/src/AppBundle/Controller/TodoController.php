<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Todo;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TodoController extends Controller
{
    /**
     * @Route("/todo", name="todo")
     */
    public function indexAction()
    {
        $todos = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findAllByUser($this->getUser());


        return $this->render('todo.html.twig',$todos);
    }

    public function newTodo()
    {
        // create a task and give it some dummy data for this example
        $todo = new Todo();
        $todo->setTask('Write a blog post');
        $todo->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($todo)
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Crée la tâche'))
            ->getForm();

        return $this->render('todo.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
