<?php
namespace ApiBundle\Validate;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Created by PhpStorm.
 * User: carlotheunissen
 * Date: 24/05/2017
 * Time: 23:16
 */
class TagDataApi
{
    /**
     * @var integer
     *
     * @Assert\Type(
     *     type="integer",
     *     message="no_integer"
     * )
     */
    public $gifId;

    /**
     * koe=90,test=10
     *
     * @Assert\NotBlank(message = "empty")
     * @Assert\Regex(
     *     pattern = "/(?:([a-z]+)=([0-9]+))/",
     *     message = "invalid_format"
     * )
     */
    public $tags;

    /**
     * @return array
     */
    public function getTagsAsArray(){
        $re = '/(?:([a-z]+)=([0-9]+))/';

        preg_match_all($re, $this->tags, $matches, PREG_SET_ORDER, 0);

        $out = [];

        for($i = 0; $i < count($matches); $i++){
            $out[$matches[$i][1]] = $matches[$i][2];

        }
        return $out;
    }

}