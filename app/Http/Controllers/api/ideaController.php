<?php
namespace App\Http\Controllers\API;
    
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\idea as ideaResource;
use App\Models\idea;
use Validator;
 
class ideaController extends BaseController
{
 
    public function index()
    {
        $ideas = idea::all();
        return $this->handleResponse(ideaResource::collection($ideas), 'ideas have been retrieved!');
    }
     
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            
            'nom' => 'required',
        'img1' => 'required',
        'img2' => 'required',
        'lien_fichier' => 'required',
        'description' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $idea = idea::create($input);
        return $this->handleResponse(new ideaResource($idea), 'idea created!');
    }
 
    
    public function show($id)
    {
        $idea = idea::find($id);
        if (is_null($idea)) {
            return $this->handleError('idea not found!');
        }
        return $this->handleResponse(new ideaResource($idea), 'idea retrieved.');
    }
     
 
    public function update(Request $request, idea $idea)
    {
        $input = $request->all();
 
        $validator = Validator::make($input, [
            'nom' => 'required',
            'img1' => 'required',
            'img2' => 'required',
            'lien_fichier' => 'required',
            'description' => 'required',
        ]);
 
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
 
        $idea->nom = $input['nom'];
        $idea->img1 = $input['img1'];
        $idea->img2 = $input['img2'];
        $idea->lien_fichier = $input['lien_fichier'];
        $idea->description = $input['description'];
        $idea->save();
        
        return $this->handleResponse(new ideaResource($idea), 'idea successfully updated!');
    }
    
    public function destroy(idea $idea)
    {
        $idea->delete();
        return $this->handleResponse([], 'idea deleted!');
    }
}