<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->_view = 'pages.web.';
    }
}
