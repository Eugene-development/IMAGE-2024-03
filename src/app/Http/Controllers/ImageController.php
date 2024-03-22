<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ImageServiceInterface;

class ImageController extends Controller
{
    /**
     * The image service instance.
     *
     * @var ImageServiceInterface
     */
    protected $imageService;

    /**
     * ImageController constructor.
     *
     * @param ImageServiceInterface $imageService The image service instance.
     */
    public function __construct(ImageServiceInterface $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Store the image using the image service.
     *
     * @param Request $request The request object.
     * @return mixed The result of the image storage operation.
     */
    public function __invoke(Request $request)
    {
        return $this->imageService->store($request);
    }
}
