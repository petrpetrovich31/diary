<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    public function setSrcAttribute($value)
    {
        if ($value==null) {
            Storage::disk($this->uploadDisk)->delete($this->{$this->uploadAttributeName});
            $this->attributes[$this->uploadAttributeName] = null;
        }

        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            Storage::disk($this->uploadDisk)->put($this->uploadDestinationPath.'/'.$filename, $image->stream());
            Storage::disk($this->uploadDisk)->delete($this->{$this->uploadAttributeName});
            $publicDestinationPath = Str::replaceFirst('public/', '', $this->uploadDestinationPath);
            $this->attributes[$this->uploadAttributeName] = $publicDestinationPath.'/'.$filename;
        }
    }
}
