<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(){
        return view('recipes.index', [
            'recipes' => Recipe::latest()->filter([request('difficulty'), request('tag'), request('search')])->paginate(6)
        ]);
    }

    public function show($id){
        return view('recipes.show', [
            'recipe' => Recipe::find($id)
        ]);
    }

    public function create(){
        return view('recipes.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'cook' => 'required',
            'title' => 'required',
            'email' => ['required', 'email'],
            'location' => 'required',
            'difficulty' => ['required', 'numeric', 'digits:1'],
            'tags' => 'required',
            'ingredients' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Recipe::insert($formFields);

        return redirect('/')->with('message', 'Recipe created successfully!');
    }

    public function edit($id){
    
        
        $recipe = Recipe::find($id);

        if($recipe->user_id != auth()->id() && auth()->user()->isUser()){
            abort(403, 'Unauthorized Action.');
        }

        return view('recipes.edit',[
            'recipe' => $recipe
        ]);
    }

    public function update($id, Request $request){
        $recipe = Recipe::find($id);
        
        $formFields = $request->validate([
            'cook' => 'required',
            'title' => 'required',
            'email' => ['required', 'email'],
            'location' => 'required',
            'difficulty' => ['required', 'numeric', 'digits:1'],
            'tags' => 'required',
            'ingredients' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $recipe->update($formFields);

        return redirect('/')->with('message', 'Recipe successfully edited!'); 
    }

    public function destroy($id){
        $recipe = Recipe::find($id);

        if($recipe->user_id != auth()->id() && auth()->user()->isUser()){
            abort(403, 'Unauthorized Action.');
        }

        $recipe->delete();

        return redirect('/')->with('message', 'Recipe deleted successfully!');
    }

    public function manage(){
        if(auth()->user()->isUser()){
            return view('recipes.manage', [
                'recipes' => auth()->user()->recipes
            ]);
        }else{
            return view('recipes.manage', [
                'recipes' => Recipe::all()
            ]);
        }
       
    }

}
