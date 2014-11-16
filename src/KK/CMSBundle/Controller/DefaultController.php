<?php

namespace KK\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="cms_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pages = $em->getRepository('KKCMSBundle:Page')
            ->findAll();

        return $this->render('Default/index.html.twig', array(
            'pages' => $pages,
        ));
    }

    /**
     * @Route("/display/{id}", name="cms_display")
     */
    public function displayAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $page = $em->getRepository('KKCMSBundle:Page')
            ->find($id);

        return $this->render('Default/display.html.twig', array(
            'page' => $page,
        ));
    }
}
