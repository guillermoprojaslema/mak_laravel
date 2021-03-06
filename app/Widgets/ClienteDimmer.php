<?php

namespace App\Widgets;

use App\Cliente;
use App\Pagina;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class ClienteDimmer extends BaseDimmer
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
        $count = Cliente::where('tipo', 'cliente')->count();
        $string = trans_choice('voyager.dimmer.cliente', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-key',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.cliente_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.cliente_link_text'),
                'link' => route('voyager.clientes.index'),
            ],
            'image' => asset('images/widget-backgrounds/13.jpg'),
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
