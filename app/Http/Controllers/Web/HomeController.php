<?php

namespace App\Http\Controllers\Web;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $events = Event::limit(5)->get();
        return $this->renderView($this->getView('home.index'), compact('events'), 'SwiftEvent home');
    }
}
