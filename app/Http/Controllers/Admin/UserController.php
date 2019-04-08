<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\PayUService\Exception;
use App\Http\Controllers\Controller;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UpdateProfileFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Plugins\Slim;
use File;

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
		$request->offsetUnset('image');

		try {
			$update = Auth::user()->update($request->all());
			Toastr::success("Atualizado com sucesso.");
			return redirect()->route('profile');
		}
		catch (\Exception $e) {
			return redirect()->back();
		}

	}

	public function updatePassword(UpdatePasswordFormRequest $request)
	{
		$user = Auth::user();

		if(Hash::check($request->password, $user->password)) {           
			$request->merge(['password' => Hash::make($request->new_password)]);
		} else {
			Toastr::error("Sehna incorreta");     
			return redirect()->back();   
		}

		$update = Auth::user()->update($request->all());

		try {
			$update = Auth::user()->update($request->all());
			Toastr::success("Atualizado com sucesso.");
			return redirect()->route('profile');
		}
		catch (\Exception $e) {
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
			return redirect()->route('profile');
		}
		catch (\Exception $e) {
			return redirect()->back();
		}
	}

}
