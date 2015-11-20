<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use Validator;
use Auth;
use Response;
use Hash;
use Image;
use DB;
use Socialite;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'facebook' => $data['facebook'],
            'tel' => $data['tel'],
            'address' => $data['address'],
            'birthday' => $data['birthday'],
            'card_id' => $data['card_id'],
            'email' => $data['email'],
            'active' => '1',
            'user_type_id' => '1',
            'password' => bcrypt($data['password']),
        ]);
    }
    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);
        //dd($authUser);
        Auth::login($authUser, true);

        return Redirect::to('/home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        if ($authUser = User::where('member_id', $facebookUser->id)->first()) {
            return $authUser;
        }
        $password = Hash::make($facebookUser->id);
        return User::create([
            'member_id' => $facebookUser->id,
            'password' => $password,
            'typemember_id' => '2',
            'typeuser_id' => '1',
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'picture' => $facebookUser->avatar
        ]);
    }
    /**
     * Register To Chowkaset
     *
     * @param $request form 
     * @return User
     */
    public function postRegister(Request $request){
        try {
            if ($request->hasFile('Picture')) {
                $file = $request->file('Picture');
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $path = public_path('assets/img/profileImage/' . $fileName);
                Image::make($file->getRealPath())->resize(200, 200)->save($path);
                $password = Hash::make($request->input('pass_confirmation'));
                $RegisterData = User::create([
                    'member_id' => $request->input('username'),
                    'password' => $password,
                    'typemember_id' => '1',
                    'typeuser_id' => $request->input('typeuser_id'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'picture' => public_path('assets/img/profileImage/').$fileName
                ]);
            }else{
                $password = Hash::make($request->input('pass_confirmation'));
                $RegisterData = User::create([
                    'member_id' => $request->input('username'),
                    'password' => $password,
                    'typemember_id' => '1',
                    'typeuser_id' => $request->input('typeuser_id'),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'picture' => public_path('assets/img/user.jpg'),
                ]);
            }
            //return dd($request->file('Picture'));
            Auth::login($RegisterData, true);
        } catch (Exception $e) {
        }
        return Redirect::to('/home');
    }
    public function postLogin(Request $request){
        try {
            $statusCode = 200;
            $password = $request->input('password');
            $login_pass = DB::table('users')->where('member_id', '=', $request->input('username'))->select('id','password','member_id')->get();
            if($login_pass){
                if(Hash::check($password, $login_pass[0]->password)){
                    $this->postLoginCallback($login_pass[0]->id);
                    $response = [
                      'status'  => '1',
                      'data' => $login_pass[0]->id
                    ];
                }else{
                    $response = [
                      'status'  => '0',
                      'message' => 'Login Fail!'
                    ];
                }
            }else{
                $response = [
                      'status'  => '0',
                      'message' => 'Login Fail!'
                    ];
            }
            return Response::json($response, $statusCode);
        } catch (Exception $e) {
            return 'fail';
        }
    }
    /**
     * LoginCallback Security to Chowkaset By ChowkasetLogin
     *
     * @param $requst form 
     * @return User
     */
    private function postLoginCallback($UserId){
        $UserDataLogin = User::find($UserId);
        Auth::login($UserDataLogin, true);
    }


}
