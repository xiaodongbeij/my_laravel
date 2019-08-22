<?php

namespace App\Http\Controllers;

use App\Models\Statuse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $content = $this->validate($request, [
            'content' => 'required|max:140',
        ]);
        Auth::user()->statuses()->create($content);
        session()->flash('success', '发布成功！');
        return redirect()->back();
    }

    public function destroy(Statuse $statuses)
    {
        $this->authorize('destroy', $statuses);
        $statuses->delete();
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }
}
