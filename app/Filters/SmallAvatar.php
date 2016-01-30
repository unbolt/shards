<?php

namespace Shards\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class SmallAvatar implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(64, 64);
    }
}
