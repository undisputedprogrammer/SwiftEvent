<?php

namespace App\Http\Controllers\Web;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use Carbon\Carbon;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        $sliderEvents = Event::limit(5)->get();
        $events = Event::where('date','>=',Carbon::now())->paginate(2);

        if ($request->ajax()) {
            $view = view('pages.web.home.includes.event-list', compact('events'))->render();
            return response()->json(['view' => $view]);
        }

        return $this->renderView($this->getView('home.index'), compact('sliderEvents','events'), 'SwiftEvent home');
    }
}
