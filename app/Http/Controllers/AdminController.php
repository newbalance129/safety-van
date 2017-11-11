<?php

namespace App\Http\Controllers;
//use App\Repositories\DriverRepositoryInterface;

//use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Driver;
use App\Report;
use App\Passenger;
use App\way;
use App\Location;
use App\Van;
use App\RouteNumber;
use DB;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request as requi;
use App\Http\Requests\checkformRequest; 
use Charts;

class AdminController extends Controller
{
      public function autoss(){
      $order = Report::max('reportId');
      return $order+1;
      }

     public function a(){
      $lo = Location::all();
      $data = array(
        'location'=>$lo
      );
      return view('mm',$data);
    }


    public function driverShow(){
      //$t=Driver::where('status','=','active')->pluck('status');
      $driver = Driver::where('status','=','active')->get();
      //dd($driver);
      $data = array(
        'driver'=>$driver
      );
      return view('tables',$data);
    }

    public function routeShow(){
       
            $route = way::all();
            $data = array(
              'route'=>$route
            );
            return view('way',$data);
    }

    public function passengerShow(){
      $passenger = Passenger::join('PasinRound','Passenger.pIdCard','=','PasinRound.pIdCard')->join('TravelRound','PasinRound.roundCount','=','TravelRound.roundCount')->get();
      //dd($passenger);
      $data = array(
        'passenger'=>$passenger
      );
      return view('ViewPassenger',$data);
    }

    public function roundpassShow(){
      $roundpass = RouteNumber::join('Van','RouteNumber.numId','=','Van.numId')->join('TravelRound','Van.vId','=','TravelRound.vId')->groupBy('roundCount','wayStart')->get();
      //dd($passenger);
      $data = array(
        'roundpass'=>$roundpass
      );
      return view('ViewRoundPass',$data);
    }

    public function driverShow1(requi $request){
      $id=$request->input('_id');
      $driver = Driver::where('dIdCard',$id)->get();
      
      return view('blank-page',["div"=>$driver]);
    }

    public function reportShow(requi $request){
      
      $id=$request->input('_id');
      $report = Report::groupBy('vanLicense')->get();
      $stat=DB::table('Report')->where('vanLicense',$id)->get();  

      $data = array(
        'report'=>$report
      );

      return view('ViewReport',["data"=>$data]);
    }



    function findbyIDRe($id){
      return Report::where('reportId',$id)->first();
    }

   function person(){
    $routenumber=DB::table('RouteNumber')->get();
    return view('provider',["provide"=>$routenumber]);
   }

   function reportvan(requi $request){
    $id=$request->input('_id');
    $report=DB::table('Van')->join('Report','Van.vId','=','Report.vanLicense')->where('Van.numId',$id)->get();
    return view('reportvan',["report"=>$report]);
   }

   function chartreport(requi $request){
    $id=$request->input('_id');
    $charts=Charts::database(Van::join('Report','Van.vId','=','Report.vanLicense')->where('Van.numId',$id)->get(), 'bar', 'highcharts')
        ->title('Type of Report')
        ->colors(['#44B2AF','#48BD99','#48A66E','#48BD57'])
        ->dimensions(800, 500)
        ->responsive(false)
        ->groupBy('reportProblem');
        return view('chartreport',["charts"=>$charts]);
   }

    public function problem($reportId=0,requi $request){
      $graph=$request->input('_id');
      $show=DB::table('Report')->where("vanLicense",$graph)->get();
      $report = $this->findbyIDRe($reportId);
          $chart = Charts::database(Report::where("vanLicense",$graph)->get(), 'bar', 'highcharts')
        ->title('Type of Report')
        ->colors(['#44B2AF','#48BD99','#48A66E','#48BD57'])
        ->dimensions(800, 500)
        ->responsive(false)
        ->groupBy('reportProblem');
      $data = array(
        'report' => $report
        );
      return view('problem',$data,["chart"=>$chart]);
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
           if($result){
               return redirect('tables');
           }else{
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

       function deleteDriver(requi $request){
          $id=$request->input('_id');
          $quited="quit";
           $result = DB::table('Driver')->where('dIdCard',$id)->update([
            "status"=>$quited
            ]);
           return redirect('/tables');
           
       } 

       function searches(requi $request){
          $result=$request->input('searched');
          $ss=Driver::where('dIdCard' ,'like','%'.$result.'%')->get();
          return view('tables',["driver"=>$ss]);
       }


        function reportAdd(){
          if(Request::isMethod('post')){     
            $vanLicense = Input::get('vanLicense');
            $problems=Input::get('problem');
            $showvan=DB::table('Van')->where('vLicense','=',$vanLicense)->value('vId');

            foreach($problems as $problem){
              DB::table('Report')->insert([
              "vanLicense"=>$showvan,
              "reportProblem"=>$problem
              ]);
            }
          return redirect('sample');       
          }
        }

        function reportForm($value){
       
           $data= array(
            're' => $value
                        
          );
          return view('report',$data);

        }

}