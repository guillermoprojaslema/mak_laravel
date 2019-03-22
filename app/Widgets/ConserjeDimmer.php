<?php

namespace App\Widgets;

use App\Conserje;
use App\Pagina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class ConserjeDimmer extends BaseDimmer
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
        $count = Conserje::count();
        $string = trans_choice('voyager.dimmer.conserje', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-pirate',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.conserje_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.conserje_link_text'),
                'link' => route('voyager.conserjes.index'),
            ],
            'image' => asset('images/widget-backgrounds/11.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {

        return Auth::user()->can('browse', app(Conserje::class));
    }
}
