<?php

namespace App\Traits;

trait ImageGetter
{
    /**
     * @return string|null
     */
    public function getMainImageAttribute(): ?string
    {
        $src = optional($this->images()->first())->src;
        return $src ? config('app.url') . $src : null;
    }

    /** images to array
     * @return array
     */
    public function imagesToArray(): array
    {
        return $this->images()
            ->pluck('src')
            ->map(function ($image) {
                return config('app.url') . $image;;
            })
            ->toArray();
    }
}
