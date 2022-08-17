<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Http\Resources\ReportResource;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ReportJson;
use App\Models\Asset;
use App\Http\Resources\SummaryJson;
use App\Http\Resources\ChartJson;

class ReportAPIController extends Controller
{
    //
    public function index()
    {
        
        $data = Report::latest()->get();
        return response()->json(ReportResource::collection($data));
    }

   
    public function get_report(Request $request){

        $user_id = $request->input('user_id');

        $data = DB::table('assets')
        ->join('reports', 'assets.id', '=', 'reports.asset_id')
        ->select('assets.url_video','assets.channel_name', 'reports.share')
        ->where('assets.user_id' , $user_id)
        ->get();

       // var_dump($data);

        return response()->json(ReportJson::collection($data));
    }

    public function summary(Request $request){

        $user_id = $request->input('user_id');

        $data = DB::table('reports')
        ->join('assets', 'reports.asset_id', '=', 'assets.id')
        ->select(DB::raw('SUM(share) as sum'), DB::raw('COUNT(url_video) as asset'))
        ->where('assets.user_id' , $user_id)
        ->get();

       // var_dump($data);
       

        return response()->json(SummaryJson::collection($data));
    }


    public function to_chart(Request $request){

        $user_id = $request->input('user_id');

        $data = DB::table('reports')
        ->join('assets', 'reports.asset_id', '=', 'assets.id')
        ->select('reports.periode', DB::raw('SUM(reports.share) as share'))
        ->where('assets.user_id' , $user_id)
        ->groupBy('reports.periode')
        ->orderBy(DB::raw("FIELD(periode, 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL','MAY', 'JUNI',
        'JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER')"))
        ->get();

       //var_dump($data);
       

        return response()->json(ChartJson::collection($data));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            
            'asset_id' => 'required|integer',
            'periode' => 'required',
            'revenue_usd' => 'required|integer',
            'rate_idr' => 'required|integer',
            'revenue_idr' => 'required|integer',
            'label_revenue' => 'required|integer',
            'get_ugc' => 'required|integer',
            'marketing' =>'required|integer',
            'share_revenue' => 'required|integer',
            'tax' => 'required|integer',
            'final_revenue' =>'required|integer',
            'share' =>'required|integer',
            'ads' =>'required|integer'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $report = Report::create([
            'asset_id' => $request->asset_id,
            'periode' => $request->periode,
            'revenue_usd' => $request->revenue_usd,
            'rate_idr' => $request->rate_idr,
            'revenue_idr' => $request->revenue_idr,
            'label_revenue' => $request->label_revenue,
            'get_ugc' => $request->get_ugc,
            'marketing' => $request->marketing,
            'share_revenue' => $request->share_revenue,
            'tax' => $request->tax,
            'final_revenue' => $request->final_revenue,
            'share' => $request->share,
            'ads' => $request->ads
         ]);
        
        return response()->json(['Asset created successfully.', new ReportResource($report)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        if (is_null($report)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json([new ReportResource($report)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
   {
        $validator = Validator::make($request->all(),[
            'asset_id' => 'required|integer',
            'periode' => 'required',
            'revenue_usd' => 'required|integer',
            'rate_idr' => 'required|integer',
            'revenue_idr' => 'required|integer',
            'label_revenue' => 'required|integer',
            'get_ugc' => 'required|integer',
            'marketing' =>'required|integer',
            'share_revenue' => 'required|integer',
            'tax' => 'required|integer',
            'final_revenue' =>'required|integer',
            'share' =>'required|integer',
            'ads' =>'required|integer'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $report->asset_id = $request->asset_id;
        $report->periode = $request->periode;
        $report->revenue_usd = $request->revenue_usd;
        $report->rate_idr = $request->rate_idr;
        $report->revenue_idr = $request->revenue_idr;
        $report->label_revenue = $request->label_revenue;
        $report->get_ugc = $request->get_ugc;
        $report->marketing = $request->marketing;
        $report->tax = $request->tax;
        $report->final_revenue = $request->final_revenue;
        $report->share = $request->share;
        $report->ads = $request->ads;
        $report->save();
        
        return response()->json(['Report updated successfully.', new ReportResource($report)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return response()->json('Report deleted successfully');
    }
}
