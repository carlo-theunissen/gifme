<?php

namespace ApiBundle\Controller;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Util\Debug;
use ApiBundle\Entity\Gif;
use ApiBundle\Entity\Tag;
use ApiBundle\Entity\TagScore;
use ApiBundle\Form\CreateTagsApiType;
use ApiBundle\Form\SelectApiType;
use ApiBundle\Validate\SelectDataApi;
use ApiBundle\Validate\TagDataApi;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{

    public function getPopularTagsAction(Request $request){
        /** @var EntityRepository $repository */
        $repository = $this->getDoctrine()->getManager()->getRepository('ApiBundle:Tag');

        $query  = $repository
            ->createQueryBuilder('t')
            ->select('t')
            ->setMaxResults(4)
            ->getQuery();
        $out = ['tags' => []];
        /** @var Tag $tag */
        foreach ($query->getResult() as $tag){
            $out['tags'][] = $tag->toApiResponseArray();
        }
        return new JsonResponse($out);
    }

    public function selectAllAction(Request $request){


        $repository = $this->getDoctrine()->getManager()->getRepository('ApiBundle:Gif');
        $out = ['tags' => []];
        /** @var Tag $tag */
        foreach ($repository->findAll() as $tag){
            $out['tags'][] = $tag->toApiResponseArray();
        }
        return new JsonResponse($out);
    }

    public function setTagsAction(Request $request){
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ApiBundle:Tag');
        $data = new TagDataApi();
        $form = $this->createForm(CreateTagsApiType::class , $data);
        $form->submit($request->request->all());


        if($form->isValid()){
            $gif = $this->getGifByName($em->getRepository('ApiBundle:Gif'), $data->gifId);
            if($gif != null) {
                foreach ($gif->getTagScores() as $oldEntity) {
                    $em->remove($oldEntity);
                }

                $gif->setTagScores(new ArrayCollection());
                foreach ($data->getTagsAsArray() as $name => $value) {
                    $coll = new TagScore();
                    $coll->setGif($gif);
                    $coll->setScore($value);
                    $coll->setTag($this->getTagByName($repository, $name));
                    $em->persist($coll);
                }
                $em->flush();
                return new JsonResponse(true);
            }
        }
        return new JsonResponse(false);
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

    private function getTagByName( EntityRepository $repository, $name){
        $em = $this->getDoctrine()->getManager();
        /** @var Tag $entity */
        $entity = $repository->findOneByName($name);
        if($entity == null){
            $entity = new Tag();
            $entity->setName($name);
            $em->persist($entity);
            $em->flush();
        }
        return $entity;
    }
}