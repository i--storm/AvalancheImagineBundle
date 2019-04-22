<?php
namespace Avalanche\Bundle\ImagineBundle\Imagine\Filter;

use Imagine\Filter\FilterInterface;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use Imagine\Filter\Basic\Thumbnail;
use Imagine\Image\Box;
use Imagine\Image\ManipulatorInterface;

class CanvasResizeFilter implements FilterInterface
{
    /**
     * @var \Imagine\Image\ImageInterface
     */
    protected $canvas;

    /**
     * @var string|integer
     */
    protected $x;

    /**
     * @var string|integer
     */
    protected $y;

    /**
     * @param \Imagine\Image\ImageInterface $pasteImage
     */
    public function __construct(ImageInterface $canvas)
    {
        $this->canvas = $canvas;
    }

    /**
     * {@inheritDoc}
     */
    public function apply(ImageInterface $image)
    {

        $canvas_size=$this->canvas->getSize();

        $thumb=new Thumbnail(new Box($canvas_size->width, $canvas_size->height), ManipulatorInterface::THUMBNAIL_INSET);
        $resized_image=$thumb->apply($image);


        $pasteFilter=new PasteFilter($resized_image,'center','middle');
        return $pasteFilter->apply($this->canvas);

    }


}