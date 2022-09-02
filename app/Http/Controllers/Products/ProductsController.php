<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\Media;



class ProductsController extends Controller
{
    //
    public function index()
    {
        $products=DB::table('products')->select()->get();

                   return view('products.index',compact('products'));
    }

    public function create()
    { 
        $brands=DB::table('brands')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();
        $subcatogries=DB::table('sub_catogries')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();
        
        return view('products.create',compact('brands','subcatogries'));
    }

    public function edit ($id)
{  
    $products=DB::table('products')->where('id','=',$id)->first();
    $brands=DB::table('brands')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();
    $subcatogries=DB::table('sub_catogries')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();

   
    return view('products.edit',compact('products','brands','subcatogries'));
}


    public function store(Request $request)
    {    

        $data= $request->except('_token','image');

        //vaildation
        $image_validation =['required','max:1024','mimes:jpg,jpeg,png'];
        $code_validation=['required','integer','digits:6','unique:products,code'];
        include 'validation.php';

        //uplode photo
         $photoname = $request->image->hashName();
         $photopath =public_path('images\product');
         $request->image->move($photopath,$photoname);
   
         //store data 
         $data['image']=$photoname;
         DB::table('products')->insert($data);
          return redirect()->back()->with('success','product updated');

        }


        public function update(Request $request,$id)
        {    
    
            $data= $request->except('_token','image','_method');
           
            //vaildation
               $image_validation =['nullable','max:1024','mimes:jpg,jpeg,png'];
               $code_validation=['required','integer','digits:6','unique:products,code,'.$id.',id'];
                 include 'validation.php';
    
               // uploade new photo and delete old photo
                if($request->has('image')){
                $product = DB::table('products')->select('image')->where('id',$id)->first();
       
                $photopath=public_path('images\product');
                $oldpath=$photopath. '\\' .$product->image;

                if(file_exists($oldpath))
                {
                       unlink($oldpath);
                }
                $photoname=$request->image->hashName();
                $request->image->move($photopath,$photoname);
                $data['image']=$photoname ;
                       

                 //store data 
             DB::table('products')->where('id',$id)->update($data);
             return redirect()->back()->with('success','Product udated ');

    
            }
        }


        public function destroy ($id)
        {
            //delete photo 
            $product = DB::table('products')->select('image')->where('id',$id)->first();
       
            $photopath=public_path('images\product');
            $oldpath=$photopath. '\\' .$product->image;

            if(file_exists($oldpath))
            {
                   unlink($oldpath);
            }

            DB::table('products')->where('id',$id)->delete();
            return redirect()->back()->with('success','Product deleted ');


        }
    }