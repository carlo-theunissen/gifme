<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Gif;
use ApiBundle\Form\SelectApiType;
use ApiBundle\Validate\SelectDataApi;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GifController extends Controller
{
    public function selectAction(Request $request)
    {

        $data = new SelectDataApi();
        $form = $this->createForm(SelectApiType::class , $data);
        $form->submit($request->query->all());

        if($form->isValid()){
            /** @var EntityRepository $repository */
           $repository =  $this->getDoctrine()->getManager()->getRepository('ApiBundle:Gif');

           $query = $repository->createQueryBuilder('g')
               ->where(':tag_ids MEMBER OF g.tags')
               ->setParameter('tag_ids', $data->getTagsAsArray())
               ->getQuery();

           return new JsonResponse($this->createJsonResponseFromGifs($query->getResult()));

        }
        return new JsonResponse();
    }

    /**
     * @param array $gifEntity
     * @return array
     */
    private function createJsonResponseFromGifs(array $gifEntity){
        $out = ["gifs" => []];
        /** @var Gif $gif */
        foreach ($gifEntity as $gif){
            $out['gifs'][] = $gif->toArray();
        }
        return $out;
    }


}
