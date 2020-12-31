<?php

namespace App\Traits;

use Image;

trait SetProfilePicture {

	public function uploadProfilePicture($profile_picture, $user) {

		$filename = time() . '.' . $profile_picture->getClientOriginalExtension();

		$path = public_path('uploads/profile_pictures/') . "/" . $filename;
		Image::make($profile_picture)->resize(300, 300)->save($path);

		$user->profile_picture = $filename;
		$user->save();
	}
}