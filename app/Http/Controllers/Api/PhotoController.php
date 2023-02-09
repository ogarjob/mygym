<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
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

        return Response::api('Photo has been removed');
    }
}
