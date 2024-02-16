<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $_view = 'pages.';

    public function __construct(Request $request)
    {

    }

    protected function getView($path)
    {
        return ('' != $path)? $this->_view . '.' . $path : $this->_view ;
    }

    protected function renderView($view, $data, $title)
    {
        $data['title'] = $title;
        return view($view, $data);
    }
}
