<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;
use Auth;

class UserController extends Controller
{
	public function index()
	{
		return view('admin.profile.index');
	}

	public function update(UpdateProfileFormRequest $request)
	{

		$user = Auth::user();
		$data = $request->all();

		if($data['password'] != null) {
			$data['password'] = bcrypt($data['password']);
		} else {
			unset($data['password']);
		}

		$data['image'] = $user->image;

		if($request->hasFile('image') && $request->file('image')->isValid()) {
			if ($user->image) {
				$name = pathinfo($user->image)['filename'];
			} else {
				$name = md5($user->id);
			}

			$extension = $request->image->extension();
			$name_file = "{$name}.{$extension}";

			$data['image'] = $name_file;

			$upload = $request->image->storeAs('users', $name_file);

			if (!$upload) {
				return redirect()->back()->with('error', 'Erro ao fazer o upload.');
			}

		}

		$update = Auth::user()->update($data);

		if ($update) {
			return redirect()->route('profile')->with('success', 'Atualizado com sucesso.');
		} else {
			return redirect()->back()->with('error', 'Erro ao atualizar.');
		}
	}
}
