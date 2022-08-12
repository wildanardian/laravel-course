<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        dd('users index method on controller');
    }

    public function login_form()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        // $hased_password = Hash::check()
        $users = Users::where('username', $request->username)->first();
        if ($users == null) {
            return redirect()->back();
        }
        $db_password = $users->password;
        $hased_password = Hash::check($request->password, $db_password);

        if ($hased_password) {
            //token sudah masuk ke db
            $users->token = Str::random(20);
            $users->save();
            //mengisi token berdasarkan token yang ada di db
            $request->session()->put('token', $users->token);
            return to_route('dashboard_index');
        } else {
            return redirect()->back()->with('error', 'maaf data anda tidak sesuai');
        }
    }

    public function register_form()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'token' => ['nullable'],
        ]);

        $created = Users::create([
            "username" => $request->username,
            "password" => bcrypt($request->password),
            "token" => NULL,            
        ]);
        if ($created) {
            return to_route('login_form')->with('success', 'Berhasil Daftar');
        } else {
            return redirect()->back()->with('failed', 'Gagal Daftar');
        }
    }

    public function dashboard_index()
    {
        if (Session::has('token')) {
            $users = Users::where('token', Session::get('token'))->first();
            $articles = Articles::get();
            return view('Dashboard/index', [
                'title' => "Dashboard Admin",
                'token' => $users->token,
                'articles' => $articles
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function dashboard_logout(Request $request)
    {
        Users::where('token', $request->token)->update([
            'token' => NULL
        ]);
        Session::pull('token');
        return to_route('login_form');
    }

    public function article_delete_action(Request $request)
    {
        Articles::find($request->id)->delete();
        return redirect()->back()->with('success', 'artikel berhasil dihapus');
    }

    public function article_create_page()
    {
        $users = Users::where('token', Session::get('token'))->first();
        return view('Dashboard/add', [
            'token' => $users->token
        ]);
    }

    public function article_add_action(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255', 'min:10'],
            'description' => ['required'],
            'tag' => ['nullable'],
        ]);

        $created = Articles::create([
            "title" => $request->title,
            "description" => $request->description,
            "tag" => $request->tag
        ]);
        if ($created) {
            return to_route('dashboard_index')->with('success', 'Artikel Berhasil Dibuat');
        } else {
            return redirect()->back()->with('failed', 'artikel gagal dibuat');
        }
    }

    public function article_edit_view(Request $request)
    {
        $users = Users::where('token', Session::get('token'))->first();
        $article = Articles::where('id', $request->id)->first();
        return view('Dashboard/edit', [
            'article' => $article,
            'token' => $users->token
        ]);
    }

    public function article_edit_action(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255', 'min:10'],
            'description' => ['required'],
            'tag' => ['nullable'],
        ]);

        Articles::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag
        ]);
        return to_route('dashboard_index')->with('success', 'Data Berhasil Diubah');
    }
}
