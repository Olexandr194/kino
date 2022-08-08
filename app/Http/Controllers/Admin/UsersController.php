<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Actions\ActionImagesStoreRequest;
use App\Http\Requests\Admin\Actions\ActionImagesUpdateRequest;
use App\Http\Requests\Admin\Actions\ActionsUpdateRequest;
use App\Http\Requests\Admin\Actions\PageImagesStoreRequest;
use App\Http\Requests\Admin\Actions\PageImagesUpdateRequest;
use App\Http\Requests\Admin\Actions\ActionsStoreRequest;
use App\Http\Requests\Admin\Actions\PagesUpdateRequest;
use App\Http\Requests\Admin\News\NewsImagesStoreRequest;
use App\Http\Requests\Admin\News\NewsImagesUpdateRequest;
use App\Http\Requests\Admin\News\NewsStoreRequest;
use App\Http\Requests\Admin\News\NewsUpdateRequest;
use App\Http\Requests\Admin\Users\UsersUpdateRequest;
use App\Models\Action;
use App\Models\ActionImages;
use App\Models\News;
use App\Models\NewsImages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $users = User::where('name', 'Like', '%'.$request->search.'%')
        ->orWhere('email', 'Like', '%'.$request->search.'%')
        ->orWhere('nickname', 'Like', '%'.$request->search.'%')
        ->get();

        if ($request->ajax()) {
            return view('admin.ajax.show_users', compact('users'))->render();
        }

        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = User::getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UsersUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $user = User::where('id', $id)->first();
        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    public function destroy_user(Request $request)
    {
        $id = $request->input('id');

        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->first();
            $user->delete();
        }
        $users = User::all();

        if ($request->ajax()) {
            return view('admin.ajax.delete_user', compact('users'))->render();
        }
        return view('admin.users.index', compact('users'));
    }


}
