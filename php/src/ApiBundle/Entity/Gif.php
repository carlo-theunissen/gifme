<?php
namespace ApiBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Gif
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $fileName;

    /**
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\TagScore", mappedBy="gifId")
     */
    private $tagScores;

    public function __construct()
    {
        $this->tagScores = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return ArrayCollection
     */
    public function getTagScores()
    {
        return $this->tagScores;
    }

    /**
     * @param mixed $tagScores
     */
    public function setTagScores($tagScores)
    {
        $this->tagScores = $tagScores;
    }

    public function toArray(){
        $tags = [];
        /** @var TagScore $item */
        foreach($this->tagScores->getValues() as $item){
            $tags[] = $item->toArray();
        }
        return [
            'fileName' => $this->fileName,
            'tags' => $tags
        ];
    }

}