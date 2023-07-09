<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
   
    public function index()
    {
        $pets = Pet::with('user')->get();

        return $pets;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'breed' => 'required',
            'age' => 'required|integer',
            'image' => 'required',
            'color' => 'required',
            'user_id' => 'required'
            
        ]);

        $pet = new Pet;
        $pet = Pet::create($request->all());
        $pet->save();

        if ($request->expectsJson()) {
            $response = [
                'result_code' => 0,
                'message' => "Pet Created",
                'data' => $pet
            ];
        
            return response()->json($response);
        }
        
        return $pet;
        
    }

    public function show(string $id)
    {
        $pet = Pet::find($id);       

        if(!$pet)
        {
            $res=[];
            $res['result_code']=2;
            $res['message']="Pet with ID {$id} not found.";
            $res['data']=$pet;
    
            return $res;
        }

        return $pet; 
    }

    public function update(Request $request, string $id)
    {
        $pet = Pet::find($id);       
        $pet->update($request->all());
        $pet->save();

        if ($request->expectsJson()) {
            $response = [
                'result_code' => 0,
                'message' => "Pet Updated",
                'data' => $pet,
            ];
        
            return response()->json($response);
        }
        
       
            return $pet;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::find($id);              
        if(!$pet)
        {
            $res=[];
            $res['result_code']=2;
            $res['message']="Pet with ID {$id} not found.";
            $res['data']=$pet;
    
            return $res;
        }
        $pet->delete();

        return response()->json([
            'result_code' => 0,
            'message' => 'Pet deleted',
            'data' => null
        ]);
    }
}
