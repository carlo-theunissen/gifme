<?php

namespace VideoUploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function uploadAction()
    {
        return $this->render('VideoUploadBundle::Dropzone.html.twig');
    }
}
