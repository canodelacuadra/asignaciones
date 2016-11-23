<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this -> getDoctrine() -> getManager();
        $users = $em -> getRepository('UserBundle:User')->findAll();
        $res = '<h1>Lista de usuarios</h1>';
        $res .= '<ul>';
        foreach($users as $user)
        {
           $res .= '<li>'.$user -> getUsername().' email:  '.$user->getEmail().'</li>';
        }
        $res .= '</ul>';
        return new Response($res);
    }
    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('UserBundle:User') ;
        $user = $repository->find($id);
        return new Response('El usuario'.$user -> getUsername().' tiene un  email: '.$user->getEmail());
        
    }
    

}
    
