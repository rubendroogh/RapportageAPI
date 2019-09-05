<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{

    public function index()
    {
        return response()->json(Template::all());
    }

    public function read($id)
    {
        return response()->json(Template::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required',
            'form' => 'required'
        ]);

        $template = Template::create($request->all());

        return response()->json($template, 201);
    }

    public function update($id, Request $request)
    {
        $template = Template::findOrFail($id);
        $template->update($request->all());

        return response()->json($template, 200);
    }

    public function delete($id)
    {
        Template::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}