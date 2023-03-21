<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller {

	public function index()
	{
		return view('profile');
	}

	public function update(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name'  => 'required',
			'email' => 'required',
		])->validate();

		$user = auth()->user();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->save();

		if ($request->password && $request->password_confirmation) {
			if ($request->password == $request->password_confirmation) {
				$user->password = Hash::make($request->password);
				$user->save();
			} else {
				Session::flash('error', "Passwords don't match");

				return back();
			}
		}

		if ($request->photo) {
			$photo_name = substr(str_shuffle(md5(time())), 0, 20) . '.jpg';

			Storage::disk('public')->putFileAs('users', $request->file('photo'), $photo_name);

			Image::make(public_path('storage/users/' . $photo_name))
				->resize(1000, 1000)
				->encode('jpg', 100)
				->save();

			$user->photo = 'users/' . $photo_name;
			$user->save();
		}

		Session::flash('success', 'Profile updated successfully');

		return back();
	}

}
