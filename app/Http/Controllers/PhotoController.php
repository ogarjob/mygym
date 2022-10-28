<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function update(User $user)
    {
        $this->authorize('update', $user);
        if ($user->photo) {
            Storage::delete($user->photo);
        }
        $path = Storage::putFile('uploads', request()->file('photo'));

        $user->update(['photo' => $path]);
        
        return back()->with('message', 'Update was successful');
    }

    
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->update(['photo' => NULL]);

        return back()->with('message', 'Photo has been removed');
    }
}
