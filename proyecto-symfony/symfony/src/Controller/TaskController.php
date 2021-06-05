<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use DateTime;


class TaskController extends AbstractController
{

    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $taskRepository = $entityManager->getRepository(Task::class);
        $tasks = $taskRepository->findBy(array(),array('id' => 'DESC'));
        return $this->render('task/index.html.twig', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @param Task $task
     * @return Response
     * @Route("/task/{id}",name="task_detail")
     */
    public function detail(Task $task): Response
    {
        if(!$task)
        {
            return $this->redirectToRoute('index');
        }
        return $this->render('task/detail.html.twig', array(
            'task' => $task
        ));
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/create-task",name="task_creation")
     */
    public function create(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskForm::class, $task);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() && $this->getUser() != null)
        {
            $task->setCreatedAt(new DateTime());
            $task->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirect(
                $this->generateUrl('task_detail',array('id' => $task->getId()))
            );
        }
        return $this->render('task/creation.html.twig',array(
            'form' => $form->createView(),
            'edit' => false,
        ));
    }

    /**
     * @Route("/my-tasks",name="my_tasks")
     */
    public function myTasks()
    {
        if($this->getUser() != null)
        {
            $tasks = $this->getUser()->getTasks();
            return $this->render('task/my-tasks.html.twig', array(
                'tasks' => $tasks,
            ));
        }
        else
        {
            return $this->redirectToRoute('index');
        }

    }

    /**
     * @param Request $request
     * @param Task $task
     * @Route("/edit-task/{id}",name="task_edit")
     */
    public function edit(Request $request, Task $task)
    {
        if($this->getUser()->getId() == $task->getUser()->getId())
        {
            $form = $this->createForm(TaskForm::class, $task);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid() && $this->getUser() != null)
            {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($task);
                $entityManager->flush();
                return $this->redirect(
                    $this->generateUrl('task_detail',array('id' => $task->getId()))
                );
            }
            return $this->render('task/creation.html.twig', array(
                'form' => $form->createView(),
                'edit' => true,
            ));


        }
        return $this->redirect('index');

    }

    /**
     * @param Task $task
     * @Route("/task-delete/{id}",name="task_delete")
     */
    public function delete(Task $task)
    {
        if($task && $this->getUser()->getId() == $task->getUser()->getId())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($task);
            $entityManager->flush();
            return $this->redirect('index');

        }
        return $this->redirect('index');
    }
}
