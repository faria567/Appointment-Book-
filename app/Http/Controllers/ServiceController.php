<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        


        $service = Service::get();
        return view('Service.index',compact('service'));
       

    }
   
   
    
    public function create()
    {
        return view('Service.create');
    }

    public function store(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'description' =>  'required|string',
        ]);


        if ($request->hasFile('image') && $request->image != null) {
            $ext = $request->file('image')->extension();
            $final_name = time().'-'.uniqid().'-'.'service'.'.'.$ext;

            $request->file('image')->move(public_path('uploads/'), $final_name);

            $service->image = $final_name;
        }


        $service->name = $request->name;
        $service->amount = $request->amount;
        $service->description = $request->description;
       
        

        $service->save();
       
       
        return redirect()->route('service.index');
    }

    

    
    public function edit($id)
    {
        
        $service = Service::findOrFail($id);
        return view('Service.edit', compact('service'));
    }

   


    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|string',
            'image' => 'image|mimes:jpeg,gif,png,jpg',
            'description' =>  'required|string',

        ]);

        if ($request->hasFile('image') && $request->image != null) {
                    if ($service->image != null) {
                    unlink(public_path('uploads/'.$service->image));
                   }
                    $ext = $request->file('image')->extension();
                    $final_name = time().'-'.uniqid().'-'.'service'.'.'.$ext;
        
                 $request->file('image')->move(public_path('uploads/'), $final_name);
        
                     $service->image = $final_name;
                 }

        $service->name = $request->name;
        $service->amount = $request->amount;
        $service->description = $request->description;
        $service->update();
        return redirect()->route('service.index');
    }




    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        if ($service->image != null) {
            unlink(public_path('uploads/'.$service->image));
        }

        $service->delete();

        return redirect()->back()->with('delete','service has been Deleted successfully');
    }
}
