<?php

namespace App\Http\Controllers;
//use App\Repositories\DriverRepositoryInterface;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Driver;
use App\Report;
use DB;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request as requi;
use App\Http\Requests\checkformRequest; 

class AdminController extends Controller
{
    
    public function driverShow(){
    	$driver = Driver::all();
    	$data = array(
    		'driver'=>$driver
    	);
    	return view('tables',$data);
    }

    public function driverShow1(requi $request){
    	$id=$request->input('_id');
    	$driver = Driver::where('dIdCard',$id)->get();
    	
    	return view('blank-page',["div"=>$driver]);
    }

    public function reportShow(){
      $report = Report::all();
      $data = array(
        'report'=>$report
      );
      return view('ViewReport',$data);
    }
      function driverAdd(){
        if(Request::isMethod('post')){
          $driverID = Input::get('dIdCard');
          $dFname = Input::get('dFName');
          $dLname = Input::get('dLName');
          $gender = Input::get('dGender');
          $bType = Input::get('dBlood');
          $dob = Input::get('dDob');
         
           $data = array(
            'dIdCard' => $driverID,
            'dFName'=>$dFname,
            'dLName'=>$dLname,
            'dGender'=>$gender,
            'dBlood'=>$bType,
            'dDob'=>$dob,            
        );
        
          $result = Driver::create($data);

           //$result = $this->DriverRepository->driverAdd($driverID,$dFname,$dLname,$gender,$bType,$dob);
           if($result){
               return redirect('tables');
           }else{
              //echo "Failed to add scholarship";
               return $result;
           }
        }
        elseif(Request::isMethod('get')){
        
          return view('forms');
        }
      }

      function edit(requi $request){
      	$driverID = $request->input('_id');
      	$driver=DB::table('Driver')->where('dIdCard',$driverID)->get();
      	// dd($driver);
      	return view('editer',["da"=>$driver]);
      }
      function update(requi $request){
      	$id=$request->input('_id');
      	$fname=$request->input('firstname');
      	$lname=$request->input('lastname');
        $dob=$request->input('dDob');
      	$driver=DB::table('Driver')->where('dIdCard',$id)->update([
      		"dFName"=>$fname,
      		"dLName"=>$lname,
          "dDob"=>$dob
      		]);
      	return redirect('/tables');
      }

       function deleteDriver($driverID){
           $result = Driver::where('dIdCard',$driverID)->first()->delete();
           if($result){
               return redirect('tables');
           }else{
               echo "Can not delete";
           }
       } 

       function searches(requi $request){
        $result=$request->input('searched');
        $ss=Driver::where('dIdCard' ,'like','%'.$result.'%')->get();
        return view('tables',["driver"=>$ss]);
       }

       function findByID($id){
           return Driver::where('dIdCard',$id)->first();
           
       } 


       // try report

       function reportForm($value){
       
           $data= array(
            're' => $value
                        
          );
          return view('report',$data);

}
}
