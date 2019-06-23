<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonials;
use App\Traits\UploadTrait;

class ApplicationController extends Controller
{
    //
    use UploadTrait;
    protected $testimonials;

    public function __construct()
    {

    }

    public function index()
    {
//        $data = array(
//            'title'=>'My App',
//            'Description'=>'This is New Application',
//            'author'=>'foo',
//            'message'=>'This is the test message from ApplicationController'
//        );

        //return view('/layout/child')->with('data',$data);
        $testimonials= Testimonials::all();

        return view('/index')->with('data',$testimonials);

    }

    public function testimonials(Request $request){

//        $data = array(
//            'fullname'=>'My App',
//            'title'=>'This is the test title',
//            'email'=>'This is New Application',
//            'address'=>'Nepal',
//            'message'=>'This is the test message from ApplicationController',
//            'star'=>2
//        );

//        foreach ($testimonials as $data){
//            echo($data->title);
//        }
//        exit();


//        $request->validate([
//            'name'=>'required',
//            'title'=>'required',
//            'email'=>'required',
//            'address'=>'required',
//            'profile_image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
//
//        ]);




//        $testimonials->person_name=$request->name;


        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');

            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('person_name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]

            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $request['profile_image']=$filePath;
            // Upload image
            $file=$this->uploadOne($image, $folder, 'public', $name);

            // Set user profile image path in database to filePath
            $formdata=array(
                'person_name'=>$request->name,
                'title'=>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'message'=>$request->message,
                'profile_image'=>$filePath,
                'star'=>$request->star,
            );
            Testimonials::create($formdata);
            return redirect()->back()->with(['status' => 'Profile updated successfully.']);



        }







//        Testimonials::create($request);


//                $testimonials= Testimonials::all();
//
//
//        return view('/index')->with('data',$testimonials);
    }
}
