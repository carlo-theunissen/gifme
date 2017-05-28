<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Gif;
use ApiBundle\Form\SelectApiType;
use ApiBundle\Validate\SelectDataApi;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VideoController extends Controller
{
    public function selectAcceptedFormatsAction(){
        return new JsonResponse(
            [
                'formats' => $this->getParameter('video_upload.accepted_formats')
            ]
        );
    }

    public function selectMaxFileSizeAction(){
        return new JsonResponse(
            [
                'max_file_size' => $this->getParameter('video_upload.max_file_size')
            ]
        );
    }
}