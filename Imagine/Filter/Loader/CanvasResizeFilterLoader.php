<?php
namespace Avalanche\Bundle\ImagineBundle\Imagine\Filter\Loader;

use Avalanche\Bundle\ImagineBundle\Imagine\Filter\FilterManager;
use Avalanche\Bundle\ImagineBundle\Imagine\Filter\ChainFilter;

class CanvasResizeFilterLoader implements LoaderInterface
{
    /**
     * @var \Imagine\Image\ImagineInterface
     */
    protected $imagine;

    /**
     * @param \Avalanche\Bundle\ImagineBundle\Imagine\Filter\FilterManager $filterManager
     */
    public function __construct(FilterManager $filterManager)
    {
        $this->filterManager = $filterManager;
    }

    /**
     * {@inheritDoc}
     */
    function load(array $options = array())
    {
        if (false == isset($options['size']) || false == is_array($options['size'])) {
            throw new \InvalidArgumentException('Expected size key and type of array');
        }

        $width = isset($options['size']) ? $options['size'][0] : 0;
        $height = isset($options['size']) ? $options['size'][1] : 0;

        $size  = new \Imagine\Image\Box(400, 300);
        $canvas = $this->imagine->create($size);

        return new CanvasResizeFilter($canvas, $width, $height);
    }
}