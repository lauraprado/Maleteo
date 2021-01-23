<?php

namespace App\Controller;

use App\Entity\OpinionMaleteo;
use App\Entity\User;
use App\Entity\UserMaleteo;
use App\Form\DemoForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class MainController extends AbstractController{

    /**
     * @Route("/maleteo", name="homepage")
     */
    public function index(Request $request, EntityManagerInterface $em) {
        $random = $em->getRepository(OpinionMaleteo::class)->findAll();
        shuffle($random);
        
        
        // return $this->render("opiniones_maleteo.html.twig", ['opiniones'=>$random]);

        if ($request->getMethod() === 'POST') {

            //dd($request);

            $user = new UserMaleteo();

            $user -> setName($request->request->get('name'));
            
            $user -> setEmail($request->request->get('email'));
            $user->setCity($request->request->get('city'));
            
            $em->persist($user);

            $em->flush();

            

            //return new Response("Usuario registrado");
            return $this->render('newUser.html.twig', ['user'=>$user]);
        }

        
        return $this->render('index.html.twig',  ['opiniones'=>$random]);
    }

    /**
     * @Route("/user", name="user")
     * @@IsGranted("ROLE_ADMIN")
     */
    public function users(EntityManagerInterface $em) {
        $repositorio = $em->getRepository(UserMaleteo::class);
        $users = $repositorio->findAll();

        return $this->render("user_maleteo.html.twig", ['users' => $users]);
    }

    /**
     * @Route("/random", name="opiniones")
     */
    public function random (EntityManagerInterface $em) {
        $random = $em->getRepository(OpinionMaleteo::class)->findAll();
        shuffle($random);
        
        
        return $this->render("opiniones_maleteo.html.twig", ['opiniones'=>$random]);
    }

    /**
    * @Route("/new-opinion", name="opinionform")
    */
    public function opinionForm(Request $request, EntityManagerInterface $em) {

        $form = $this->createForm(DemoForm::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

             $newOpinion = $form->getData();

             $em->persist($newOpinion);
             $em->flush();

             return $this->redirectToRoute("homepage");
        }

        return $this->render('demoform.html.twig',['formulario'=> $form->createView()]);
    }

    /**
    * @Route("/adios", name="logout")
    */
    public function logout() {
        return $this->render('logout.html.twig');
    }

    /**
    * @Route("/delete/{name}", name="delete_user")
    // * @ParamConverter("UserMaleteo", class="UserMaleteo:Post", options={"id":"name"})
    */
    public function deleteUser(UserMaleteo $user, EntityManagerInterface $em)
    {

        $em->remove($user);
        $em->flush();

        return new Response('Usuario eliminado');
    }

    

}

