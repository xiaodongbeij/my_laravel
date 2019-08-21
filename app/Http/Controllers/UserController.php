<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['create', 'store']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->Validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:user|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $user = User::create($user);
        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('user.show', [$user]);
    }

    protected function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('user.show', $user);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户');
        return back();
    }

}
