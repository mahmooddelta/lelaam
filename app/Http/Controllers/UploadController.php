<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\TemporaryUpload;
use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{
    public function __invoke(UploadRequest $request)
    {
        try {
            $temporaryUpload = TemporaryUpload::createForFile(
                $request->file,
                session()->getId(),
                Str::uuid(),
                $request->name ?? '',
            );
        } catch (Throwable $exception) {
            TemporaryUpload::query()
                ->where('session_id', session()->getId())
                ->get()->each->delete();

            report($exception);

            throw ValidationException::withMessages(['file' => 'Could not handle upload. Make sure you are uploading a valid file.']);
        }

        /** @var Media $media */
        $media = $temporaryUpload->getFirstMedia();

        return response()->json($this->responseFields($media, $temporaryUpload));
    }

    protected function responseFields(Media $media, TemporaryUpload $temporaryUpload): array
    {
        return [
            'uuid' => $media->uuid,
            'name' => $media->name,
            'preview_url' => config('media-library.generate_thumbnails_for_temporary_uploads')
                ? $temporaryUpload->getFirstMediaUrl('default', 'preview')
                : '',
            'size' => $media->size,
            'mime_type' => $media->mime_type,
            'extension' => $media->extension,
        ];
    }
}
