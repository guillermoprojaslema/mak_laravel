<?php

namespace App\Widgets;

use App\Apartamento;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class ApartamentoDimmer extends BaseDimmer
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
        $count = Apartamento::disponibles()->count();
        $string = trans_choice('voyager.dimmer.apartamento', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-params',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.apartamento_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.apartamento_link_text'),
                'link' => route('voyager.apartamentos.index'),
            ],
            'image' => asset('images/widget-backgrounds/05.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Apartamento::class));

    }
}
