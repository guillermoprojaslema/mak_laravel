<?php

namespace App\Widgets;

use App\Oficina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class OficinaDimmer extends BaseDimmer
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
        $count = Oficina::mostrar()->count();
        $string = trans_choice('voyager.dimmer.oficina', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-laptop',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.oficina_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.oficina_link_text'),
                'link' => route('voyager.oficinas.index'),
            ],
            'image' => asset('images/widget-backgrounds/15.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Oficina::class));
    }
}
