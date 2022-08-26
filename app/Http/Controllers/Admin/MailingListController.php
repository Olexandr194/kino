<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MailingList\MailingListRequest;
use App\Http\Requests\Admin\MailingList\UsersListRequest;
use App\Models\MailingList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailingListController extends Controller
{

    public function index()
    {
        $all_lists = MailingList::orderBy('created_at', 'DESC')->get()->take(5);
        $queue = DB::table('jobs')->get();
        $count = !empty($queue) ? count($queue) : null;

        return view('admin.mailing_list.index', compact('all_lists', 'count'));
    }

    public function save_html(Request $request)
    {

        $html_file = Storage::disk('public')->put('/html', $request->file);
        $mailing_list = new MailingList();
        $mailing_list->title = $request->title;
        $mailing_list->path = $html_file;
        $mailing_list->save();

        $all_lists = MailingList::all()->take(5);

        return view('admin.mailing_list.ajax.del_html', compact('mailing_list', 'all_lists'));
    }

    public function reload()
    {
        $all_lists = MailingList::orderBy('created_at', 'DESC')->get()->take(5);
        return view('admin.mailing_list.ajax.del_html', compact('all_lists'))->render();
    }

    public function delete_html(Request $request)
    {
        $id = $request->input('id');

        if (MailingList::where('id', $id)->exists()) {
            $list = MailingList::where('id', $id)->first();
            $list->delete();
        }
        $all_lists = MailingList::orderBy('created_at', 'DESC')->get()->take(5);

        if ($request->ajax()) {
            return view('admin.mailing_list.ajax.del_html', compact('all_lists'))->render();
        }
        return view('admin.mailing_list.index', compact('all_lists'));
    }

    public function select_users()
    {
        $users = User::all();

        return view('admin.mailing_list.select_users', compact('users'));
    }

    public function checked_users(UsersListRequest $request)
    {
        $all_lists = MailingList::orderBy('created_at', 'DESC')->get()->take(5);
        if (isset($request['user_id'])){
            $selected_users = $request['user_id'];
            unset($request['user_id']);
        }

        return view('admin.mailing_list.index', compact('all_lists', 'selected_users'));
    }

    public function search_users(Request $request)
    {
        $users = User::where('name', 'Like', '%'.$request->search.'%')
            ->orWhere('email', 'Like', '%'.$request->search.'%')
            ->orWhere('nickname', 'Like', '%'.$request->search.'%')
            ->get();

        if ($request->ajax()) {
            return view('admin.mailing_list.ajax.search_users', compact('users'))->render();
        }

        return view('admin.mailing_list.select_users', compact('users'));
    }

    public function send(Request $request)
    {
        if ($request->radio === 'all') {
            $users = User::all();
        } else {
            $users = User::whereIn('id', $request->users)->get();
        }
        $html_title = MailingList::where('id', $request->html)->first();
        $html = Storage::disk('public')->get($html_title->path);

        foreach ($users as $user) {
            $email = $user->email;
            dispatch(new \App\Jobs\MailingList($email, $html));
        }

        $queue = DB::table('jobs')->get();
        $count = !empty($queue) ? count($queue) : null;
        return $count;

    }


    public function sending(){
        $queue = DB::table('jobs')->get();
        $count = isset($queue) ? count($queue) : 0;
        return $count;
    }




}
