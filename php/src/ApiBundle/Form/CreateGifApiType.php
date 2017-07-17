<?php

namespace ApiBundle\Form;
use ApiBundle\Entity\Gif;
use ApiBundle\Validate\GifDataApi;
use ApiBundle\Validate\SelectDataApi;
use ApiBundle\Validate\TagDataApi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\DataTransformerInterface;
/**
 * Created by PhpStorm.
 * User: carlotheunissen
 * Date: 24/05/2017
 * Time: 23:22
 */
class CreateGifApiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ratio')
            ->add('fileName')
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => GifDataApi::class,
            'csrf_protection' => false,
            'method' => 'POST',
        ));
    }

    public function getName()
    {
        return '';
    }
}