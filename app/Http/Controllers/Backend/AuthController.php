<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function adminLogin ()
    {
        return view ('auth.login');
    }

    public function adminLogout ()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function showCredentials()
    {
        $authUser = Auth::user();
        return view('backend.settings-policies.show-credentials', compact('authUser'));
    }
    public function updateCredentials(Request $request)
    {
        $authUser = Auth::user();
        $authUser->email = $request->email;
        $authUser->password = Hash::make($request->password);

        $authUser->save();

        toastr()->success('Credential Update Successfully!');
        return redirect()->back();
    }
}
