<?php

namespace App\Widgets;

use App\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;

class PropietarioDimmer extends BaseDimmer
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
        $count = Cliente::where('tipo', 'propietario')->count();

        $string = trans_choice('voyager.dimmer.propietario', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-certificate',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.propietario_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.propietario_link_text'),
                'link' => route('voyager.clientes.index'),
            ],
            'image' => asset('images/widget-backgrounds/14.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Cliente::class));
    }
}
