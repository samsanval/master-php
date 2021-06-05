<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use DateTime;

use App\Entity\User;
use App\Form\RegisterForm;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/register",name="register")
     */
    public function register(Request $request, UserPasswordHasherInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterForm::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $user->setRole('ROLE_USER');
            $hashed = $encoder->hashPassword($user,$user->getPassword());
            $user->setPassword($hashed);
            $user->setCreatedAt(new DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('index');
        }
        return $this->render('user/register.html.twig',
            array('form' => $form->createView()));
    }

    /**
     * @param AuthenticationUtils $utils
     * @Route("/login",name="login")
     */
    public function login(AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        $lastUserName = $utils->getLastUsername();
        return $this->render('user/login.html.twig', array(
           'error' => $error,
           'lastUserName' => $lastUserName,
        ));
    }
}
