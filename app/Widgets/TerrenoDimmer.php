<?php

namespace App\Widgets;

use App\Propiedad;
use App\Terreno;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class TerrenoDimmer extends BaseDimmer
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
        $count = Terreno::disponibles()->count();

        $string = trans_choice('voyager.dimmer.terreno', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-milestone',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.terreno_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.terreno_link_text'),
                'link' => route('voyager.propiedades.index'),
            ],
            'image' => asset('images/widget-backgrounds/06.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Propiedad::class));
    }
}
