<?php
namespace ApiBundle\Validate;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Created by PhpStorm.
 * User: carlotheunissen
 * Date: 24/05/2017
 * Time: 23:16
 */
class SelectDataApi
{
    /**
     * Only number separated by commas are allowed
     *
     * @Assert\NotBlank(message = "empty")
     * @Assert\Regex(
     *     pattern = "/^(?:[0-9]+,?)+$/",
     *     message = "invalid_format"
     * )
     */
    public $tags;

    /**
     * @return array
     */
    public function getTagsAsArray(){
        return explode(',', $this->tags);
    }

}