<?php

namespace App\Http\Controllers;

use App\Azs;
use App\Camera;
use App\MyUsers;
use App\User;
use App\Vulc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_template');
    }

    protected function createForApi(Request $request)
    {
        $data = $request->json()->all();
        $email = $data['email'];
        $user = DB::table('users')->where('email', $email)->first();

        if ($user == null) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            return Response::json(array(
                'error' => false,
                'data' => $user,
                'code' => 200,
                'message' => "User successful created"
            ));
        } else {
            return Response::json(array(
                'error' => true,
                'code' => 500,
                'message' => $email . " User Exist"
            ));
        }
    }

    protected function login(Request $request)
    {
        $data = $request->json()->all();
        if (array_key_exists("token_id", $data)) {
            $tokenId = $data['token_id'];

            $user = DB::table('my_users')->where('token_id', $tokenId)->first();
            if ($user != null) {
                return Response::json(array(
                    'error' => false,
                    'data' => $user,
                    'code' => 200
                ));
            } else {
                $email = "";
                $name = "";
                $picture_url = "";
                if (array_key_exists("email", $data)) {
                    $email = $data['email'];
                }
                if (array_key_exists("name", $data)) {
                    $name = $data['name'];
                }
                if (array_key_exists("picture_url", $data)) {
                    $picture_url = $data['picture_url'];
                }

                $user = MyUsers::create([
                    'name' => $name,
                    'email' => $email,
                    'token_id' => $tokenId,
                    'picture_url' => $picture_url,
                ]);

                return Response::json(array(
                    'error' => false,
                    'code' => 200,
                    'data' => $user,
                    'message' => "New created"
                ));
            }
        } else {
            return Response::json(array(
                'error' => true,
                'code' => 500,
                'message' => "Token_Id does not exist"
            ));
        }
    }

    protected function cameraList($token_id = null)
    {
        if ($token_id != null) {
            $user = DB::table('my_users')->where('token_id', $token_id)->first();
            if ($user != null) {
                $cameras = Camera::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();

                return Response::json(array(
                    'error' => false,
                    'data' => $cameras,
                    'code' => 200
                ));
            } else {
                return Response::json(array(
                    'error' => true,
                    'code' => 500,
                    'message' => "Token_Id does not exist"
                ));
            }
        } else {
            return Response::json(array(
                'error' => true,
                'code' => 500,
                'message' => "Token_Id does not exist"
            ));
        }

    }

    protected function azsList($token_id = null)
    {
        if ($token_id != null) {
            $user = DB::table('my_users')->where('token_id', $token_id)->first();
            if ($user != null) {
                $cameras = Azs::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();

                return Response::json(array(
                    'error' => false,
                    'data' => $cameras,
                    'code' => 200
                ));
            } else {
                return Response::json(array(
                    'error' => true,
                    'code' => 500,
                    'message' => "Token_Id does not exist"
                ));
            }
        } else {
            return Response::json(array(
                'error' => true,
                'code' => 500,
                'message' => "Token_Id does not exist"
            ));
        }

    }

    protected function vulList($token_id = null)
    {
        if ($token_id != null) {
            $user = DB::table('my_users')->where('token_id', $token_id)->first();
            if ($user != null) {
                $cameras = Vulc::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();

                return Response::json(array(
                    'error' => false,
                    'data' => $cameras,
                    'code' => 200
                ));
            } else {
                return Response::json(array(
                    'error' => true,
                    'code' => 500,
                    'message' => "Token_Id does not exist"
                ));
            }
        } else {
            return Response::json(array(
                'error' => true,
                'code' => 500,
                'message' => "Token_Id does not exist"
            ));
        }

    }
}
