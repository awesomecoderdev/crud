<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $by = ($request->has('by') && in_array($request->input('by'), ['created_at', 'id',])) ? strtolower($request->input('by')) : 'created_at';
        $sort = ($request->has('sort') && in_array($request->input('sort'), ['asc', 'desc',])) ? strtolower($request->input('sort')) : 'desc';
        $search = $request->has('search') ? $request->input('search') : false;
        $per_page = Cache::get('per_page', 50);

        $users = User::where('id', '!=', Auth::user()->id)->when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->orderBy($by, $sort)->paginate($per_page)->onEachSide(1);
        return view("users.index", compact("users", "sort"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // return $request->all();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user, true);

            $request->session()->flash('success', __('User was successful added!'));
        } catch (\Exception $e) {
            $request->session()->flash('error', __('Something went wrong! ' . $e->getMessage()));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        try {
            $user->name =  $request->name;
            $user->email =  $request->email;
            $user->save();
            $request->session()->flash('success', __('User was successful Updated!'));
        } catch (\Exception $e) {
            $request->session()->flash('error', __('Something went wrong! ' . $e->getMessage()));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {

        try {
            $user->delete();
            $request->session()->flash('success', __('User was successful Deleted!'));
        } catch (\Exception $e) {
            $request->session()->flash('error', __('Something went wrong! ' . $e->getMessage()));
        }

        return redirect()->route("users.index");
    }
}
