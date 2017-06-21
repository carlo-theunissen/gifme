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
    private $id;

    /**
     * @var Gif
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Gif", inversedBy="tagScores")
     */
    private $gif;

    /**
     * @var Tag
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Tag")
     */
    private $tag;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $score;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Gif
     */
    public function getGif()
    {
        return $this->gif;
    }

    /**
     * @param Gif $gif
     */
    public function setGif($gif)
    {
        $this->gif = $gif;
    }

    /**
     * @return Tag
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param Tag $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }





    public function toArray(){
        $tag = $this->tag->toApiResponseArray();
        $tag['score'] = $this->score;
        return $tag;
    }
}