<?php

namespace App\Widgets;

use App\LocalComercial;
use App\Pagina;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class LocalComercialDimmer extends BaseDimmer
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
        $count = LocalComercial::mostrar()->count();
        $string = trans_choice('voyager.dimmer.local_comercial', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-shop',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.local_comercial_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.local_comercial_link_text'),
                'link' => route('voyager.locales-comerciales.index'),
            ],
            'image' => asset('images/widget-backgrounds/07.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(LocalComercial::class));
    }
}
