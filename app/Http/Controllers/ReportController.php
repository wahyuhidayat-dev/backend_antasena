<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Models\Asset;

class ReportController extends Controller
{
    
    public function index()
    {
        $report = Report::paginate(10);

        return view('report.index', [
            'report' => $report
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset = Asset::all();
        return view('report.create',[
            'asset' => $asset
        ]);
    }

   
    public function store(ReportRequest $request)
    {
        $data = $request->all();

       // $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');

        Report::create($data);

        return redirect()->route('report.index');
    }

   
    public function show(Report $report)
    {
        //
    }

    public function edit(Report $report)
    {
        return view('report.edit',[
            'item' => $report
        ]);
    }

  
   
    public function update(ReportRequest $request, Report $report)
    {
        $data = $request->all();

        // if($request->file('picturePath'))
        // {
        //     $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');
        // }

        $report->update($data);

        return redirect()->route('report.index');
    }

   
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('report.index');
    }
}
