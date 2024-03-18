<?php

namespace App\Services;

use App\Contracts\ImageServiceInterface;

class ImageService implements ImageServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store()
    {
        return "Sending greeting: xxxx";
    }
}
