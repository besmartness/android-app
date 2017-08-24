<?php

namespace App\Http\Controllers;

use App\Camera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CameraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $todos = Camera::where('user_id', '=', Auth::user()->id)->get();
        return $todos;
    }

    public function camera_list()
    {

        $cameras = Camera::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();
        return view("camera-list", ["list" => $cameras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'longitude' => 'required',
            'lattitude' => 'required',
        ]);
        $camera = Camera::find($request['id']);
        if ($camera == null) {
            $camera = new Camera();
        }
        $camera->number = $request['number'];
        $camera->name = $request['name'];
        $camera->longitude = $request['longitude'];
        $camera->lattitude = $request['lattitude'];

        $camera->save();

        return redirect()->action('CameraController@camera_list');;
    }

    public function add_view()
    {
        return view("add-camera");
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $camera = Camera::find($id);
            $camera->is_deleted = 1;
            $camera->save();
        }
        return redirect()->action('CameraController@camera_list');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $camera = Camera::find($id);
            return view('edit-camera', ['item' => $camera]);
        }
        return redirect()->action('CameraController@camera_list');
    }
}
