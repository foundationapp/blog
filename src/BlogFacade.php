<?php

namespace Foundationapp\Blog;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Foundationapp\Blog\Skeleton\SkeletonClass
 */
class BlogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'blog';
    }
}
