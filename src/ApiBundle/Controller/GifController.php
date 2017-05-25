<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\SelectApiType;
use ApiBundle\Validate\SelectDataApi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GifController extends Controller
{
    public function selectAction(Request $request)
    {

        $data = new SelectDataApi();
        $form = $this->createForm(SelectApiType::class , $data);
        $form->submit($request->query->all());

        if($form->isValid()){
            dump($data->getTagsAsArray());
        }
        return $this->render('ApiBundle:Default:index.html.twig');
    }
}
