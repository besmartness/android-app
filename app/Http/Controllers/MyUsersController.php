<?php

namespace App\Http\Controllers;

use App\MyUsers;
use Illuminate\Http\Request;

class MyUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myusers_list()
    {
        $user = MyUsers::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();
        return view("myusers-list", ["list" => $user]);
    }



    public function myGasStation_list()
    {
        $gasstation = MyGasstation::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();
        return view("myGasStation_list", ["list" => $gasstation]);
    }

    public function myVulcanization_list()
    {
        $vulcanization = MyVulcanization::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();
        return view("myVulcanization_list", ["list" => $vulcanization]);
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $myuser = MyUsers::find($id);
            $myuser->is_deleted = 1;
            $myuser->save();
        }
        return redirect()->action('MyUsersController@myusers_list');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $myuser = MyUsers::find($id);
            return view('edit-myusers', ['item' => $myuser]);
        }
        return redirect()->action('MyUsersController@myusers_list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $myusers = MyUsers::find($request['id']);
        if ($myusers == null) {
            $myusers = new MyUsers();
        }
        $myusers->name = $request['name'];
        $myusers->email = $request['email'];

        $myusers->save();

        return redirect()->action('MyUsersController@myusers_list');
    }

}
