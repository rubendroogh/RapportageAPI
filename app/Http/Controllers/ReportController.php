<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        return response()->json(
            Report::with('user')->get()
        );
    }

    public function read($id)
    {
        return response()->json(
            Report::with('user')->find($id)
        );
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'template_id' => 'required',
            'data' => 'required'
        ]);

        $report = Report::create($request->all());

        return response()->json($report, 201);
    }

    public function update($id, Request $request)
    {
        $report = Report::findOrFail($id);
        $report->update($request->all());

        return response()->json($report, 200);
    }

    public function delete($id)
    {
        Report::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}