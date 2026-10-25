<?php
namespace App\Smart\Services\Image;

use Intervention\Image\Image;
use Intervention\Image\ImageManager;

/**
 * Class ImageMaker
 * @package App\Smart\Services\Image
 */
class ImageMaker
{
    /**
     * @var ImageManager|Image
     */
    protected $image;

    /**
     * Image format
     *
     * @var string
     */
    protected $format = ImageFormat::Jpg;

    /**
     * Quality of the image
     *
     * @var int
     */
    protected $quality = 90;

    /**
     * ImageMaker constructor.
     *
     * @param ImageManager $image
     */
    public function __construct(ImageManager $image)
    {
        $this->image = $image;
    }

    /**
     * Load the provided image
     *
     * @param string $image
     *
     * @return $this
     */
    public function load($image)
    {
        $this->image = $this->image->make($image);

        return $this;
    }

    /**
     * Make thumbnail.
     *
     * To create the thumbnail, the image will be cropped and then resize.
     *
     * @param int $width
     * @param int $height
     *
     * @return $this
     */
    public function thumbnail($width, $height)
    {
        if ($width >= $height) {
            $this->image = $this->image->fit($width, $height);
        } else {
            $this->image = $this->image->fit($width, $height, null, 'top');
        }

        return $this;
    }

    /**
     * Save the image to destination folder
     *
     * @param string      $destinationFolder
     * @param string      $filename
     * @param null|string $quality
     *
     * @return $this
     */
    public function save($destinationFolder, $filename, $quality = null)
    {
        $quality = $quality ?: $this->quality;

        if (!is_dir($destinationFolder)) {
            mkdir($destinationFolder, 0777, true);
        }

        $this->image->save(sprintf('%s/%s', $destinationFolder, $filename), $quality);

        return $this;
    }

    /**
     * Return the image as response in given format.
     * If format is not given, use the default format
     *
     * @param null|string $format
     *
     * @return mixed
     */
    public function give($format = null)
    {
        $format = $format ?: $this->format;

        return $this->image->response($format);
    }
}
