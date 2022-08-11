<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UsersUpdateRequest;
use App\Models\BottomBanner;
use App\Models\MainBanner;
use App\Models\Movie;
use App\Models\TopBanner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $user = User::where('id', Auth::id())->first();
        } else {
            return response()->json(['status' => "Авторизуйтеся щоб продовжити."]);
        }

        return view('personal.index', compact('user'));
    }

    public function update(UsersUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::where('id', $id)->first();
        $user->update($data);

        return redirect()->route('personal.index');
    }





}
