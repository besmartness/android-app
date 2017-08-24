<?php

namespace App\Http\Controllers;
use App\Azs;
use Illuminate\Http\Request;

class AzsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = Azs::where('user_id', '=', Auth::user()->id)->get();
        return $todos;
    }

    public function azs_list()
    {
        $cameras = Azs::where('is_deleted', 0)->orderBy('updated_at', 'asc')->get();
        return view("azs-list", ["list" => $cameras]);
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
            'gasoline_type' => 'required',
        ]);
        $camera = Azs::find($request['id']);
        if ($camera == null) {
            $camera = new Azs();
        }
        $camera->number = $request['number'];
        $camera->name = $request['name'];
        $camera->longitude = $request['longitude'];
        $camera->lattitude = $request['lattitude'];
        $camera->gasoline_type = $request['gasoline_type'];

        $camera->save();

        return redirect()->action('AzsController@azs_list');
    }

    public function add_view()
    {
        return view("add-azs");
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $camera = Azs::find($id);
            $camera->is_deleted = 1;
            $camera->save();
        }
        return redirect()->action('AzsController@azs_list');
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $camera = Azs::find($id);
            return view('edit-azs', ['item' => $camera]);
        }
        return redirect()->action('AzsController@azs_list');
    }

}
