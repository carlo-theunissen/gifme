<?php
/**
 * Created by PhpStorm.
 * User: CARLO
 * Date: 7-4-2017
 * Time: 10:36
 */

namespace Tests\VideoUploadBundle\Validators;
use Oneup\UploaderBundle\Uploader\File\FileInterface;
use Symfony\Component\Finder\SplFileInfo;

class FakeFile implements FileInterface
{
    private $size;
    private $pathname;
    private $path;
    private $mimeType;
    private $basename;
    private $extension;
    public function __construct(SplFileInfo $finderFile = null)
    {
        if($finderFile !== null) {
            $this->size = $finderFile->getSize();
            $this->pathname = $finderFile->getPathname();
            $this->path = $finderFile->getPath();
            $this->basename = $finderFile->getBasename();
            $this->extension = $finderFile->getExtension();
        }
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
         return $this->size;
    }

    /**
     * @return mixed
     */
    public function getPathname()
    {
        return $this->pathname;
    }

    /**
     * @param mixed $pathname
     */
    public function setPathname($pathname)
    {
        $this->pathname = $pathname;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param mixed $mineType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    /**
     * @return mixed
     */
    public function getBasename()
    {
        return $this->basename;
    }

    /**
     * @param mixed $basename
     */
    public function setBasename($basename)
    {
        $this->basename = $basename;
    }

    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

}