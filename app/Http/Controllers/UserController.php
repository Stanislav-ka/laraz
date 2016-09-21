<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\AuthController;
use Intervention\Image\Facades\Image;
use App\User;
use View;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

class UserController extends Controller {
    private $user;
    protected $user_gestion;
    protected static $rules =  [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email,{id}',
        'skype' => 'max:255',
        'avatar' => 'mimes:jpeg'
    ];
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
        $rules = self::$rules;
        $rules['email'] = str_replace('{id}', $id, $rules['email']);
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/user/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else{
            $file = Input::file('avatar');
            if($file)
                Image::make($file->getRealPath())->resize('200','200')->save($file->getClientOriginalName());

            $user =  User::findOrFail($id);
            $user->fill(Input::all());
            if($file)
                $user->fill(array('avatar' => $file->getClientOriginalName()));
            $user->save();
        }

        return redirect('/user/' . $id);
    }

    public function ListUsers(){
        return View::make('user.users', array('users' => User::all()));
    }

}