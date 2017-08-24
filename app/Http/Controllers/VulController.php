<?php

namespace App\Http\Controllers;
use App\Vulc;
use Illuminate\Http\Request;

class VulController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = Vulc::where('user_id', '=', Auth::user()->id)->get();
        return $todos;
    }

    public function vul_list()
    {
        $cameras = Vulc::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();
        return view("vul-list", ["list" => $cameras]);
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
        $camera = Vulc::find($request['id']);
        if ($camera == null) {
            $camera = new Vulc();
        }
        $camera->number = $request['number'];
        $camera->name = $request['name'];
        $camera->longitude = $request['longitude'];
        $camera->lattitude = $request['lattitude'];

        $camera->save();

        return redirect()->action('VulController@vul_list');
    }

    public function add_view()
    {
        return view("add-vul");
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $camera = Vulc::find($id);
            $camera->is_deleted = 1;
            $camera->save();
        }
        return redirect()->action('VulController@vul_list');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $camera = Vulc::find($id);
            return view('edit-vul', ['item' => $camera]);
        }
        return redirect()->action('VulController@vul_list');
    }

}
