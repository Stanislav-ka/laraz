<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use View;
use App\Http\Controllers\Auth\AuthController;

use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

class UserController extends Controller {
    private $user;
    protected $user_gestion;
    public function __construct()
    {
        $this->user =  $this->middleware('auth');
    }

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'skype' => 'max:255',
            'avatar' => 'mimes:jpeg'
        ]);
    }

    public function showProfile($id)
    {
        return View::make('user.profile', array('user' => User::findOrFail($id)));
    }

    public function showEditProfile($id){
        return View::make('user.profileEdit', array('user' => User::findOrFail($id)));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'skype' => 'max:255',
            'avatar' => 'mimes:jpeg'
        ]);

        if ($validator->fails()) {
            return redirect('/user/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $user =  User::findOrFail($id);
        $user->fill(Input::all());
        $user->save();

        return redirect('/user/' . $id);
    }

}