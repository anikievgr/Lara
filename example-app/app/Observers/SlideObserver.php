<?php

namespace App\Observers;

use App\Services\Models\Slide;
use Illuminate\Support\Facades\Storage;

class SlideObserver
{
    /**
     * Handle the Slide "created" event.
     *
     * @param  \App\Services\Models\Slide  $slide
     * @return void
     */
    public function created(Slide $slide)
    {
        //
    }

    /**
     * Handle the Slide "updated" event.
     *
     * @param  \App\Services\Models\Slide  $slide
     * @return void
     */
    public function updated(Slide $slide)
    {
        //
    }

    /**
     * Handle the Slide "deleted" event.
     *
     * @param  \App\Services\Models\Slide  $slide
     * @return void
     */
    public function deleted(Slide $slide)
    {

    }
    public function deleting(Slide $slide)
    {
        //dd($slide);
        Storage::disk('public')->delete($slide['image']);
    }

    /**
     * Handle the Slide "restored" event.
     *
     * @param  \App\Services\Models\Slide  $slide
     * @return void
     */
    public function restored(Slide $slide)
    {
        //
    }

    /**
     * Handle the Slide "force deleted" event.
     *
     * @param  \App\Services\Models\Slide  $slide
     * @return void
     */
    public function forceDeleted(Slide $slide)
    {
        //
    }
}
