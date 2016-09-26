<?php

namespace Dieup\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Serializer
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Dieup\UsersBundle\Entity\Group;

use Symfony\Component\HttpFoundation\Response;

class GroupsController extends Controller
{
    public function indexAction()
    {
    	$request = $this->getRequest();
    	if($request->isMethod('post')) {
    		$group = new Group();
    		$group->setName($request->request->get('name'));
    		
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($group);
    		$em->flush();

    		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	    	$response = $serializer->serialize($group, 'json');

	    	return new Response($response);
    	}

    	$groups = $this->getDoctrine()->getManager()->getRepository('DieupUsersBundle:Group')->findAll();

    	$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
    	$response = $serializer->serialize($groups, 'json');

    	return new Response($response);
    }

    public function viewAction($id)
    {
    	$group = $this->getDoctrine()->getManager()->getRepository('DieupUsersBundle:Group')->findOneById($id);

    	$request = $this->getRequest();
    	if($request->isMethod('post')) {
    		$group->setName($request->request->get('name'));
    		
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($group);
    		$em->flush();

    		$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
	    	$response = $serializer->serialize($group, 'json');

	    	return new Response($group);
    	}

    	$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
    	$response = $serializer->serialize($group, 'json');

    	return new Response($response);
    }
}
