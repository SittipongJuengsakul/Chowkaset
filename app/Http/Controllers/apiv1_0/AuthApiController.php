<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;
use Response;
use Hash;
use DB;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        return 'This Is Auth Chowkaset API v 1.0';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            $statusCode = 200;
            //request Data From Application
            $email = $request->input('email');
            $password = $request->input('password');
            $login_pass = DB::table('users')->where('email', '=', $email)->select('password')->get();
            if(Hash::check($password, $login_pass[0]->password)){
                $login_pass = DB::table('users')->where('email', '=', $email)->get();
                $response = [
                  'status'  => '1',
                  'message' => 'Login is Success',
                  'user_data' => []
                ];
                $response['user_data'][] = [
                    'fname'  => $login_pass[0]->fname,
                    'lname' => $login_pass[0]->lname,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'Login Was rejected!!!',
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function getToken(){
        try{
            $statusCode = 200;
                $response = [
                  'token'  => csrf_token()
                ];
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
        return Response::json($response, $statusCode);
    }
}
