<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\Gif;
use ApiBundle\Form\CreateGifApiType;
use ApiBundle\Form\SelectApiType;
use ApiBundle\Validate\GifDataApi;
use ApiBundle\Validate\SelectDataApi;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function setGifAction(Request $request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ApiBundle:Gif');
        $data = new GifDataApi();
        $form = $this->createForm(CreateGifApiType::class , $data);
        $form->submit($request->request->all());
        if($form->isValid()){
            $gif = $this->getGifByName($repository, $data->fileName);
            $gif->setRatio($data->ratio);
            $em->persist($gif);
            $em->flush();
            return new JsonResponse("YES");
        }
        return new JsonResponse("NO");
    }


    /**
     * @param EntityRepository $repository
     * @param $name
     * @return Gif
     */
    private function getGifByName(EntityRepository $repository, $name){
        /** @var Gif $entity */
        $entity = $repository->findOneByFileName($name);
        if($entity == null){
            $entity = new Gif();
            $entity->setFileName($name);
            $this->getDoctrine()->getManager()->persist($entity);
        }
        return $entity;
    }

    public function getSingleGifAction($id){
        /** @var Gif[] $gif */
        $gif = $this->getDoctrine()->getManager()->getRepository('ApiBundle:Gif')->findByFileName($id);
        if($gif != null && count($gif) > 0) {

            return new JsonResponse($gif[0]->toApiResponseArray());
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
            $out['gifs'][] = $gif->toApiResponseArray();
        }
        return $out;
    }


}
