<?php

namespace App\Widgets;

use App\Pagina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;
use TCG\Voyager\Facades\Voyager;

class PaginaDimmer extends BaseDimmer
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
        $count = Pagina::count();
        $string = trans_choice('voyager.dimmer.pagina', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-documentation',
            'title' => "{$count} {$string}",
            'text' => __('voyager.dimmer.pagina_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager.dimmer.pagina_link_text'),
                'link' => route('voyager.paginas.index'),
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

        return Auth::user()->can('browse', app(Pagina::class));
    }
}
