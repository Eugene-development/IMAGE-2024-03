<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ImageServiceInterface;

class ImageController extends Controller
{
    protected $imageService;

    // Инъекция через конструктор
    public function __construct(ImageServiceInterface $imageService)
    {
        $this->imageService = $imageService;
    }

    public function imageStore(Request $request)
    {
        return $this->imageService->store($request);
    }
}
