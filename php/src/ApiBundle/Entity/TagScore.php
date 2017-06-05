<?php
namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TagScore
 * @ORM\Entity()
 *
 */
class TagScore
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var Gif
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Gif", inversedBy="tagScores")
     */
    public $gif;

    /**
     * @var Tag
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Tag")
     */
    public $tag;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    public $score;

    public function toArray(){
        $tag = $this->tag->toArray();
        $tag['score'] = $this->score;
        return $tag;
    }
}