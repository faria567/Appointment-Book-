<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $servicecategory = ServiceCategory ::get();
        return view('Servicecategory.index',compact('servicecategory'));
    }
    public function create()
    {
       
        return view('Servicecategory.create');
    }

    public function store(Request $request, Servicecategory $servicecategory)
    {
        $request->validate([
            
            'name' => 'required|string',
            'description' => 'required|string',

        ]);

        $servicecategory->name = $request->name;
        $servicecategory->description = $request->description;
        $servicecategory->save();

        return redirect()->route('servicecategory.index');
    }

    public function edit($id)
    {
        
        $servicecategory = Servicecategory::findOrFail($id);
        return view('Servicecategory.edit', compact('servicecategory'));
    }


    public function update(Request $request, $id)
    {
        $servicecategory = Servicecategory::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',

        ]);

        $servicecategory->name = $request->name;
        $servicecategory->description = $request->description;
        $servicecategory->update();

        return redirect()->route('servicecategory.index');
    }

    public function destroy($id)
    {
        $servicecategory = Servicecategory::findOrFail($id);
        $servicecategory->delete();

        return redirect()->back();        
    }
}
