<?php
namespace Avalanche\Bundle\ImagineBundle\Imagine\Filter;

use Imagine\Filter\FilterInterface;
use Imagine\Image\ImageInterface;
use Imagine\Image\Point;
use Avalanche\Bundle\ImagineBundle\Imagine\Filter\PasteFilter;

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

        $pasteFilter=new PasteFilter($image,'center','middle');
        return $pasteFilter->apply($this->canvas);

    }


}