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
               ->join('g.tagScores', 't')
               ->where('t.tag = :id')
               ->setParameter('id', $data->tags)
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
