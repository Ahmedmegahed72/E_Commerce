<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.main');
    }
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.user.index');
    }
    function update($id)
    {

        $user = User::find($id);
        return view('admin.update_user', compact('user'));
    }
    public function edit($id, Request $request)
    {

        $user = User::find($id);

        // Validate the request data
        $validated = $request->validate([
            'name'=>'max:30',
            'role' => 'numeric|integer',
            'email'=>'email'
        ]);

        $user->update($validated);

        return redirect()->route('admin.user.index', $user->id);
    }
}