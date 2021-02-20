<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat(){

        $categories = Category::get();

        return view('admin.category.index',compact('categories'));
    }

    public function AddCat(Request $request){

         $request->validate([
            'category_name' => 'required|max:255',

        ],
             [
                 'category_name.required' => 'Please input category name',
                 'category_name.max' => 'Category less than 255chars',

             ]);

         $data= array();
         $data['category_name'] = $request->category_name;
         $data['user_id'] = Auth::user()->id;


         DB::table('categories')->insert($data);
         return Redirect()->back()->with('success','Category Inserted');


    }

    public function Edit($id){
        $categories = DB::table('categories')->where('id',$id)->first();
        //$categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    public function update(Request $request,$id){
//        $update = Category::find($id)->update([
//
//            'category_name' => $request->category_name,
//            'user_id'=> Auth::user()->id
//
//        ]);
        $data= array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;

        DB::table('categories')->where('id',$id)->update($data);

        return Redirect()->route('all.category')->with('success','Category Updated');

    }

      public function destroy($id){

        $delete=Category::where('id',$id)->delete();

        return Redirect()->back()->with('success','Category Deleted');


      }




}
