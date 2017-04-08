<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PhotosController extends Controller
{
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::delete(storage_path('app/public'). $photo->threezerozero);
        Storage::delete(storage_path('app/public'). $photo->fivefivezero);
        Storage::delete(storage_path('app/public'). $photo->thumbnail);

        $photo->delete();
        return back();
    }
}
