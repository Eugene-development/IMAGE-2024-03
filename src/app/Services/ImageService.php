<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Contracts\ImageServiceInterface;

class ImageService implements ImageServiceInterface
{
    public function store($request)
    {
        // dd($request->hasFile('image'));
        // Проверка наличия файла 'image' и заголовка 'Project'
        if (!$request->hasFile('image') || !$request->header('Project')) {
            // Возвращаем ошибку, если что-то отсутствует
            return response()->json(['error' => 'Необходим файл и заголовок Project'], 400);
        }

        try {
            // Определение проекта из заголовка
            $projectHeaderValue = $request->header('Project');

            // Назначение пути до целевой папки в бакете $projectHeaderValue
            $path = $request->file('image')->store($projectHeaderValue, config('filesystems.default'));

            // Запись в бакет с публичными правами
            Storage::disk(config('filesystems.default'))->setVisibility($path, 'public');

            // Возврат хэша файла для записи в БД
            return basename($path);
        } catch (\Exception $e) {
            Log::error('Ошибка при сохранении файла: ' . $e->getMessage());
            return response()->json(['error' => 'Ошибка при сохранении файла'], 500);
        }
    }
}
