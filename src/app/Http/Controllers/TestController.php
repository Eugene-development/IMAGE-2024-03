<?php

namespace App\Http\Controllers;

use App\Contracts\ImageServiceInterface;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $imageService;

    // Инъекция через конструктор
    public function __construct(ImageServiceInterface $imageService)
    {
        $this->imageService = $imageService;
    }

    public function imageStore()

    {
        return $this->imageService->store("Hello, World!");
    }
}
