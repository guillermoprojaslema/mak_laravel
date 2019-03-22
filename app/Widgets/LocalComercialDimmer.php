<?php

namespace App\Widgets;

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
        $count = Propiedad::where('tipo_propiedad', 'local_comercial')->disponibles()->count();
        $string = trans_choice('voyager.dimmer.local_comercial', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-shop',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.local_comercial_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.local_comercial_link_text'),
                'link' => route('voyager.propiedades.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/07.jpg'),
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
