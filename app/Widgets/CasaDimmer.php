<?php

namespace App\Widgets;

use App\Casa;
use App\Pagina;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class CasaDimmer extends BaseDimmer
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
        $count = Casa::disponibles()->count();

        $string = trans_choice('voyager.dimmer.casa', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-home',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.casa_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.casa_link_text'),
                'link' => route('voyager.casas.index'),
            ],
            'image' => asset('images/widget-backgrounds/04.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Casa::class));
    }
}
