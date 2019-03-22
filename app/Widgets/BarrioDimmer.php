<?php

namespace App\Widgets;

use App\Barrio;
use App\Pagina;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class BarrioDimmer extends BaseDimmer
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
        $count = Barrio::count();
        $string = trans_choice('voyager.dimmer.barrio', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-documentation',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.barrio_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.barrio_link_text'),
                'link' => route('voyager.barrios.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
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
