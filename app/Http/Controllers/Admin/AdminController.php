<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use \Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.home.index');
	}
}
