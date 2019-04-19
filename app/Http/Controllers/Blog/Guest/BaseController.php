<?php

namespace App\Http\Controllers\Blog\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Controllers\Blog\BaseController as GuestController;

abstract class BaseController extends GuestController
{
    //
    /**
     * BaseController constructor.
     */
    public function __construct()
    {

    }
}
