<?php
namespace ApiBundle\Validate;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Created by PhpStorm.
 * User: carlotheunissen
 * Date: 24/05/2017
 * Time: 23:16
 */
class GifDataApi
{
    /**
     * @var integer
     *
     * @Assert\NotBlank(message = "empty")
     * @Assert\Type(
     *     type="integer",
     *     message="no_integer"
     * )
     */
    public $fileName;

    /**
     * koe=90,test=10
     *
     * @Assert\NotBlank(message = "empty")
     * @Assert\Type("float", message="no_float")
     */
    public $ratio;

}