<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Gif;
use ApiBundle\Entity\Tag;
use ApiBundle\Form\SelectApiType;
use ApiBundle\Validate\SelectDataApi;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function selectAllAction(Request $request){

        $repository =  $this->getDoctrine()->getManager()->getRepository('ApiBundle:Tag');
        $out = ['tags' => []];
        /** @var Tag $tag */
        foreach ($repository->findAll() as $tag){
            $out['tags'][] = $tag->toArray();
        }
        return new JsonResponse($out);
    }
}