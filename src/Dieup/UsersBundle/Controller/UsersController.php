<?php

namespace Dieup\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Serializer
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Dieup\UsersBundle\Entity\User;

use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function indexAction()
    {
    	$request = $this->getRequest();
    	if($request->isMethod('post')) {
    		$user = new User();
    		$user->setFirstname($request->request->get('firstname'));
    		$user->setLastname($request->request->get('lastname'));
    		$user->setEmail($request->request->get('email'));
    		$user->setIsActive($request->request->get('is_active'));
    		$user->setCreatedAt(new \DateTime());

    		$em = $this->getDoctrine()->getManager();

    		$group = $em->getRepository()->findOneById($request->request->get('group_id'));
    		$user->setGroup($group);

    		$em->persist($user);
    		$em->flush();

    		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	    	$response = $serializer->serialize($user, 'json');
	    	return new Response($response);
    	}

    	$users = $this->getDoctrine()->getManager()->getRepository('DieupUsersBundle:User')->findAll();
    	$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
    	$response = $serializer->serialize($users, 'json');
    	return new Response($response);
    }

    public function viewAction($id)
    {
    	$user = $this->getDoctrine()->getManager()->getRepository('DieupUsersBundle:User')->findOneById($id);
    	
    	$request = $this->getRequest();
    	if($request->isMethod('post')) {
    		$group->setName($request->request->get('name'));
    		
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($group);
    		$em->flush();

    		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	    	$response = $serializer->serialize($user, 'json');
	    	return new Response($response);
    	}

    	
    	$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
    	$response = $serializer->serialize($user, 'json');
    	return new Response($response);
    }
}
