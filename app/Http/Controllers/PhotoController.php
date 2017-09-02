<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Photo;
use Auth;
use App\User;

class PhotoController extends Controller
{
    public function update(Request $request)
    {
//        $this->validate($request, [
//            'avatar' => 'image',
//        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250, 250)->save( public_path('/images/uploads/' . $filename ) );

            Photo::updateOrCreate(
                ['user_id' => $request->input('user_id')],
                [
                    'link' => $filename,
                ]
            );
        }
        return redirect()->route('profile', [Auth::id()]);
    }
}
