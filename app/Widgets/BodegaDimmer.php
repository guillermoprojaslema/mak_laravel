<?php

namespace App\Widgets;

use App\Bodega;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class BodegaDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Bodega::disponibles()->count();
        $string = trans_choice('voyager.dimmer.bodega', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'fas fa-warehouse',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.bodega_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.bodega_link_text'),
                'link' => route('voyager.bodegas.index'),
            ],
            'image' => asset('images/widget-backgrounds/09.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Bodega::class));
    }
}
