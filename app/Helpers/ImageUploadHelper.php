<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

if (! function_exists('handleImageUpload')) {
    /**
     * Function handle Image Upload
     *
     * @param  Illuminate\Http\UploadedFile  $file
     * @param  string|null  $oldFile
     * @param  string  $path
     * @return string
     *
     * @author Thanh Phong <n_thanhphong@thk-hd.vn>
     */
    function handleImageUpload(UploadedFile $file, $oldFile = null, string $path = ''): ?string
    {
        try {
            if ($oldFile) {
                Storage::disk('public')->delete($oldFile);
            }

            $fileName = time().'_'.$file->getClientOriginalName();
            $path     = $file->storeAs($path, $fileName, 'public');

            return $path;
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return null;
        }
    }
}
