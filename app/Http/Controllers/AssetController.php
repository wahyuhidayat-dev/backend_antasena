<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Http\Requests\AssetRequest;
use App\Models\User;
use Yajra\DataTables\DataTables;

class AssetController extends Controller
{
    public function index()
    {
        // $asset = Asset::paginate(10);
        

        // return view('asset.index', [
        //     'asset' => $asset
            
        // ]);
        if(request()->ajax()){
            
            $query = Asset::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="' . route('asset.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('asset.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                // ->editColumn('price', function ($item) {
                //     return number_format($item->price);
                // })
                ->rawColumns(['action'])
                ->make();
        }

        return view('asset.index');
        
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('asset.create',[
            'user' => $user
        ]);
    }

   
    public function store(AssetRequest $request)
    {
        $data = $request->all();

       // $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');

        Asset::create($data);

        return redirect()->route('asset.index');
    }

   
    public function show(Asset $asset)
    {
        //
    }

    public function edit(Asset $asset)
    {
        return view('asset.edit',[
            'item' => $asset
        ]);
    }

  
   
    public function update(AssetRequest $request, Asset $asset)
    {
        $data = $request->all();

        // if($request->file('picturePath'))
        // {
        //     $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');
        // }

        $asset->update($data);

        return redirect()->route('asset.index');
    }

   
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('asset.index');
    }
}
