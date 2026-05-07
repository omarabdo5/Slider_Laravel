<?php

namespace App\Http\Controllers;
use App\Models\SliderImage;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;
use Illuminate\Http\Request;


use phpDocumentor\Reflection\Types\Nullable;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index',compact('sliders'));
    }

    public function show(Slider $slider){

        // $sliderFromDB=slider::all();

        // return view('sliders.show',['slider'=>$sliderFromDB]);
        $slider->load('images');
        return view('sliders.show',compact('slider'));
    }

    public function create(){}

    public function edit(Slider $slider){
        $creators =User::all();

        return view('sliders.edit',compact('slider','creators'));
    }

    protected function uploadImages($images,$sliderId){
        foreach($images as $imageFile){
            $imageName = time().'_'.uniqid().'.'.$imageFile ->getClientOriginalExtension();
            $imageFile->storeAs('public/sliders',$imageName);

            SliderImage::create([
                'slider_id'=>$sliderId,
                'image'=>$imageName
            ]);
        }
    }

    public function update(Request $request,Slider $slider)
    {
        dd('وصلت هنا');

        //del1
        // $request->validate([
        //     'title'=>['required','min:3'],
        //     'description'=>['required','min:3'],
        //     'slider_creator'=>['required','exists:users,id'],
        //     'images.*'=>['image','mimes:jpeg,png,jpg,gif','max:2048']
        // ]);
        //del1

    //    $data=request()->all();
    //    dd($data);
        //   $title=request()->title;
        // $description=request()->description;
        // $slider_creator=request()->slider_id;
        // $singleSliderFromDB =Post:: findOrFail($slider);
        // $singleSliderFromDB->update([
        //     'title'=>$title,
        //     'description'=>$description,
        //     'slider_creator'=>$slider_creator,
        // ]);

        //del2
    //     $slider->settings()->updateOrCreate(
    //         ['slider_id'=>$slider->id],
    //         [
    //             'autoplay'=>$request ->has('autoplay'),
    //             'interval'=>$request ->interval ??3000,
    //             'show_arrows'=>$request-> has('show_arrows'),
    //             'show_indicators'=>$request->has('show_indicators') ,
    //             ]
    //         );


    //     $slider->update([
    //         'title'=>$request->title,
    //         'description'=>$request->description,
    //     'slider_creator'=>$request->slider_creator
    // ]);


    // if($request->hasFile('images')){

    //     $this->uploadImages($request-> file('images'),$slider->id);
    }
//del2

        // foreach($request->file('images' ) as $imageFile){
        //     $imageName=time().'_'.uniqid().'_'.$imageFile->getClientOriginalExtension();
        //     $imageFile->storeAs('public/sliders',$imageName);


        //     SliderImage::create([
        //         'slider_id'=>$slider->id,
        //         'image'=>$imageName
        //     ]);
        // };
    // };
// dd($request->all());

    /* The line `return redirect()->route('sliders.index',->id);` is performing a redirect
    response to a named route in Laravel. */


    // return redirect()->route('sliders.index',$slider->id);





    public function destroy($id)
    {
        $image=SliderImage::findOrFail($id);
        Storage::delete('public/sliders/'.$image->image);
            $image->delete();
            return back()->with('success');
    }
}
