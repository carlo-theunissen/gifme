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

           $builder =  $repository->createQueryBuilder('g')
                ->join('g.tagScores', 't');

           $tags = $data->getTagsAsArray();
           for ($i =0 ; $i < count($tags); $i++){

               if($i == 0) {
                   $builder->where('t.tag = :id'.$i);
               } else {
                   $builder->orWhere('t.tag = :id'.$i);
               }

               $builder->setParameter('id'.$i, $tags[$i]);
           }

           $query = $builder->getQuery();

           return new JsonResponse($this->createJsonResponseFromGifs($query->getResult()));

        }
        return new JsonResponse();
    }

    public function getSingleGifAction($id){
        /** @var Gif[] $gif */
        $gif = $this->getDoctrine()->getManager()->getRepository('ApiBundle:Gif')->findByFileName($id);
        if($gif != null && count($gif) > 0) {

            return new JsonResponse($gif[0]->toArray());
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
