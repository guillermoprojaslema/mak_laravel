<?php

namespace App\Widgets;

use App\Edificio;
use App\Pagina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class EdificioDimmer extends BaseDimmer
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
        $count = Edificio::count();
        $string = trans_choice('voyager.dimmer.edificio', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-company',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.edificio_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.edificio_link_text'),
                'link' => route('voyager.edificios.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/10.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Edificio::class));
    }
}
