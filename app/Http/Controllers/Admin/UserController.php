<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\PayUService\Exception;
use App\Http\Controllers\Controller;
use Auth;
use \Illuminate\Support\Facades\URL;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UpdateProfileFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Http\Requests\UpdateEmailFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Plugins\Slim;
use File;
use App\User;
use App\Notifications\EmailAuth;


class UserController extends Controller
{
	public function perfil()
	{
		return view('admin.profile.alterar-perfil');
	}

	public function senha()
	{
		return view('admin.profile.alterar-senha');
	}

	public function email()
	{
		return view('admin.profile.alterar-email');
	}

	public function updateProfile(UpdateProfileFormRequest $request)
	{
		$user = Auth::user();

		try {
			$update = Auth::user()->update($request->validated());
			Toastr::success("Atualizado com sucesso.");
			return redirect()->back();
		}
		catch (\Exception $e) {
			Toastr::error("Não foi possível atualizar.");
			return redirect()->back();
		}
	}

	public function updatePassword(UpdatePasswordFormRequest $request)
	{
		$user = Auth::user();

		if(Hash::check($request->old_password, $user->password)) {           
			$request->merge(['password' => Hash::make($request->password)]);
		} else {
			Toastr::error("Senha incorreta");     
			return redirect()->back();   
		}

		try {
			$update = Auth::user()->update($request->validated());
			Toastr::success("Atualizado com sucesso.");
			return redirect()->back();
		}
		catch (\Exception $e) {
			Toastr::error("Não foi possível atualizar.");
			return redirect()->back();
		}
	}

	public function sendEmailAuth()
	{
		$user = Auth::user();
		$token_email = rand();
		$email = $user->email;

		$url = URL::temporarySignedRoute('profile.emailAuth', now()->addHour(), [
			'id' => $user->id, 
			'token_email' => $token_email, 
		]);

		$user->token_email = $token_email;
		$user->save();

		$user = new User();
		$user->email = $email;

		$user->notify(new EmailAuth($url));

		Toastr::success("Um e-mail foi enviado para <b>".$email."</b>");
		return redirect()->back();
	}

	public function emailAuth($id, $token_email)
	{
		$user = Auth::user();
		if ($user->token_email == $token_email AND $user->id == $id) {
			return view('admin.profile.autenticar-email');
		} else {
			echo "403 - Assinatura inválida";
			// carrega a página de erro.
		}
	}

	public function updateEmail(UpdateEmailFormRequest $request)
	{
		$user = Auth::user();

		try {
			$update = Auth::user()->update($request->validated());
			Toastr::success("Atualizado com sucesso.");
			return redirect()->back();
		}
		catch (\Exception $e) {
			Toastr::error("Não foi possível atualizar.");
			return redirect()->back();
		}
	}

	public function updatePhoto(Request $request)
	{
		$user = Auth::user();
		
		if ($request->image) {
			$image = head(Slim::getImages('image'));

			if ( isset($image['output']['data']) ) {
				$name = $user->id.'.png';
				$data = $image['output']['data'];
				$path = base_path() . '/public/images/users';
				$file = Slim::saveFile($data, $name, $path);
				$image = $file['name'];
				$request->merge(['image' => $image]);
				File::delete('images/users/'.$user->image);
			}

		} else {
			$request->offsetUnset('image');
		}

		try {
			$update = Auth::user()->update($request->all());
			Toastr::success("Atualizado com sucesso.");
			return redirect()->back();
		}
		catch (\Exception $e) {
			Toastr::error("Não foi possível atualizar.");
			return redirect()->back();
		}
	}

}
