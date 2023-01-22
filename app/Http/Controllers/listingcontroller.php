<?php

namespace App\Http\Controllers;
use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class listingcontroller extends Controller
{
    public function index(){
        return view('listings.index',[
            'Listings'=>listing::latest()->Filter(request(['tag','search']))->paginate(8)
        ]);
    }
    public function show($id){
         return view('listings.listing',['listing'=>listing::find($id)]);
    }
    public function create(){
        return view('listings.create');
    }
    public function store(Request $request){

        $formfields = $request->validate([
            'title'=> 'required',
            'tags'=>'required',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=> 'required',
            'email'=>['required','email'],
            'website'=>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('logo')){
            $formfields['logo'] = $request->file('logo')->store('logos','public');
        };
        Listing::create($formfields);
        return redirect('/')->with('message','listing created succefully');
        }
        public function edite($id){
            $listing= Listing::find($id);
            return view('listings.edite',['listing'=>$listing]);
        }
        public function update(Request $request,  $id){
            $listing = Listing::find($id);
            $formfields = $request->validate([
                'title'=> 'required',
                'tags'=>'required',
                'company'=>'required',
                'location'=> 'required',
                'email'=>['required','email'],
                'website'=>'required',
                'description'=>'required',
            ]);
            if($request->hasFile('logo')){
                $formfields['logo'] = $request->file('logo')->store('logos','public');
            };
            $listing->update($formfields);
            return back()->with('message','you did it');

        }
         public function destroy($id)
        {
            $listing = Listing::find($id);
            $listing->delete();
            return redirect('/');
        }
}

