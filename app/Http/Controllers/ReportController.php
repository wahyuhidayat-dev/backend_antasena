<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Models\Asset;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    
    public function index()
    {
        // $report = Report::paginate(10);

        // return view('report.index', [
        //     'report' => $report
        // ]);
        if(request()->ajax()){
            
            $query = Report::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="' . route('report.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('report.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->editColumn('revenue_usd', function ($item) {
                    return number_format($item->revenue_usd);
                })
                ->editColumn('rate_idr', function ($item) {
                    return number_format($item->rate_idr);
                })
                ->editColumn('revenue_idr', function ($item) {
                    return number_format($item->revenue_idr);
                })
                ->editColumn('label_revenue', function ($item) {
                    return number_format($item->label_revenue);
                })
                ->editColumn('get_ugc', function ($item) {
                    return number_format($item->get_ugc);
                })
                ->editColumn('share_revenue', function ($item) {
                    return number_format($item->share_revenue);
                })
                ->editColumn('tax', function ($item) {
                    return number_format($item->tax);
                })
                ->editColumn('final_revenue', function ($item) {
                    return number_format($item->final_revenue);
                })
                ->editColumn('share', function ($item) {
                    return number_format($item->share);
                })
                ->editColumn('ads', function ($item) {
                    return number_format($item->ads);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('report.index');
        
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
