<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;

/**
 * Only allow image uploads in the admin.
 *
 * Uploaded files are moved into public/uploads and named with their detected
 * extension, so anything else (e.g. a .php file) must never get through.
 */
class RestrictUploads
{
    protected $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    public function handle(Request $request, Closure $next)
    {
        foreach ($request->allFiles() as $field => $files) {
            foreach (is_array($files) ? $files : [$files] as $file) {
                if (!$this->isAllowed($file)) {
                    throw ValidationException::withMessages([
                        $field => 'Only image files (' . implode(', ', $this->allowed) . ') can be uploaded.',
                    ]);
                }
            }
        }

        return $next($request);
    }

    protected function isAllowed($file)
    {
        return $file instanceof UploadedFile
            && $file->isValid()
            && in_array(strtolower($file->getClientOriginalExtension()), $this->allowed)
            && in_array(strtolower((string) $file->extension()), $this->allowed)
            && @getimagesize($file->getRealPath()) !== false;
    }
}
