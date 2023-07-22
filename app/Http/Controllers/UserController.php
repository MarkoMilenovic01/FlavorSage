<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        $name = $user->name;
        Log::channel('users')->info("User " . $name . " registred.");
        
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function logout(Request $request){
        $name = auth()->user()->name;
        Log::channel('users')->info("User " . $name . " logged out!");

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

       

        return redirect('/')->with('message', 'You have been logged out!'); 
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            $name = auth()->user()->name;
            Log::channel('users')->info("User " . $name . " logged in!");


            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function dashboard(){
        if(auth()->user()->isAdmin()){
            return view('admin.dashboard', [
                'users' => User::latest()->paginate(5)
            ]);
        }else{
            abort(403,'Access unauthorized!');
        }
    }

    public function promoteDemote($id,Request $request){
        $user = User::find($id);
        $user->role = request('role');
        $user->save();
        $text = request('role') == 0 ? 'demoted' : 'promoted';
        return redirect('/admin/dashboard')->with('message', 'You have ' . $text . ' ' . $user->name);
    }


}
