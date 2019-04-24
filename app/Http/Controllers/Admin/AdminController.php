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

	public function teste()
	{
		$user = Auth::user();
		$rand =  rand();
		$url = Url::temporarySignedRoute('teste1', now()->addHours(2), ['id' => $user->id, 'token' => $rand]);
		echo "Clique no link enviado no seu email";
		echo "<br>";
		echo $url;
		//Salva no banco o token no banco
	}

	public function teste1($id)
	{
		$user = Auth::user();
		if ($user->id == $id) {
			echo "Insira o novo e-mail";
		} else {
			echo "403 - Assinatura inválida";
		}
		
	}
}
