<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.staf.index', [
            "title" => "Admin",
            "staf" => User::latest()->where('is_admin', 0)->filter()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staf.create', [
            "title" => "Admin",

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ]);

        User::create($validatedData);

        return redirect('/admin/staf')->with('success', 'Staf berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.staf.update', [
            "title" => "Admin",
            "staf" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'password' => 'required|min:5'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        } elseif ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($request->password);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/admin/staf')->with('success', 'Staf berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $ids = $request->input('ids');
        User::whereIn('id', $ids)->delete();
        return response()->json(['success' => true, 'message' => 'Staf berhasil dihapus!']);
    }
}
