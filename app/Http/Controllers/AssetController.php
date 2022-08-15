<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Http\Requests\AssetRequest;
use App\Models\User;

class AssetController extends Controller
{
    public function index()
    {
        $asset = Asset::paginate(10);
        

        return view('asset.index', [
            'asset' => $asset
            
        ]);
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
