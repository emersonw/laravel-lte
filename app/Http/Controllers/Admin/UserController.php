<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Plugins\Slim;
use File;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
	public function index()
	{

		return view('admin.profile.index');
	}

	public function updateProfile(UpdateProfileFormRequest $request)
	{
		$user = Auth::user();
		$request->offsetUnset('password');
		
		if ($request->image) {
			$image = head(Slim::getImages('image'));

			if ( isset($image['output']['data']) ) {
				$name = $user->id.'.png';
            // Base64 of the image
				$data = $image['output']['data'];
            // Server path
				$path = base_path() . '/public/images/users';
            // Save the file to the server
				$file = Slim::saveFile($data, $name, $path);
            // Get the absolute web path to the image
				$image = $file['name'];
				$request->merge(['image' => $image]);
			}

		} else {
			$request->offsetUnset('image');
		}

		$update = Auth::user()->update($request->all());

		if ($update) {
			return redirect()->route('profile')->with('success', 'Atualizado com sucesso.');
		} else {
			return redirect()->back()->with('error', 'Erro ao atualizar.');
		}
	}

	public function updatePassword(UpdatePasswordFormRequest $request)
	{
		$user = Auth::user();

		if(Hash::check($request->password, $user->password)) {           
			$request->merge(['password' => Hash::make($request->new_password)]);
		} else {           
			return redirect()->back()->with('error', 'Senha incorreta.');   
		}

		$update = Auth::user()->update($request->all());

		if ($update) {
			return redirect()->route('profile')->with('success', 'Atualizado com sucesso.');
		} else {
			return redirect()->back()->with('error', 'Erro ao atualizar.');
		}
	}
}
