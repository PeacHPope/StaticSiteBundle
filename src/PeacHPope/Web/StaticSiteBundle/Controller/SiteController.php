<?php

namespace PeacHPope\Web\StaticSiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * SiteController allows Marketing to create views
 * @package PeacHPope\Web\StaticSiteBundle\Controller
 * @author Micah Breedlove <druid628@gmail.com>
 */
class SiteController extends Controller
{

    /**
     * @Route("/{slug}", requirements={"slug" =".+"}, defaults={"slug" = "index"})
     * @Template()
     */
    public function indexAction($slug, Request $request)
    {

        $page = sprintf("%s:%s:%s.html.twig", $this->container->getParameter('peachpope.static_site.bundle'), $this->container->getParameter('peachpope.static_site.folder'),$this->sanitizeSlug($slug));
        if ($this->get('templating')->exists($page)) {
            $output = $this->renderView($page);
        } else {
            throw $this->createNotFoundException('[404] The page you requested is missing. Fear not, we are dispatching search party.');
        }

        return new Response($output);
    }


    protected function sanitizeSlug($slug)
    {
         if(substr($slug, strlen($slug)-1, 1) == '/') {
            $slug .= 'index';
        }

        return $slug;
    }
}