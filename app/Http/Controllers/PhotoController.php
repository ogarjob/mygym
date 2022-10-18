<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function update(User $user)
    {
        // dd(Storage::file($user->photo));
        if ($user->photo) {
            Storage::delete($user->photo);
        }
        $path = Storage::putFile('uploads', request()->file('photo'));

        $user->update(['photo' => $path]);
        // $affected = \DB::table('users')->where('id', $user->id)->update(['photo' => $path]);
        
        return back()->with('message', 'Update was successful');
    }

}
