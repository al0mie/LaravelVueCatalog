<?php

namespace App\Services;

class ProductService
{
    /**
     * @param $request
     * @param $product
     */
    public function uploadAvatar($request, $product)
    {
        $fileName = str_random(30);
        $extension = $request->avatar->extension();
        $fullFileName = "{$fileName}.{$extension}";

        if ($request->avatar->storeAs('public/avatars', $fullFileName)) {
            $product->avatar = $fullFileName;
        }
    }

    /**
     * @param $student
     */
    public function deleteCurrentAvatar($student)
    {
        $currentAvatar = $student->avatar;

        if($currentAvatar) {
            $file = "public/avatars/{$currentAvatar}";

            if(Storage::exists($file)) {
                Storage::delete($file);
            }
        }
    }

    /**
     * @param $request
     * @param $product
     */
    public function saveProduct($request, $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();
    }
}