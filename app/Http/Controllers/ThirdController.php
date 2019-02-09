<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Third;
use Storage;
use PDF;
class ThirdController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function empView(){
        // $third = Third::get();
        $third = Third::paginate(5);
        return view('master.empView',compact('third'));
    }

    public function edit($id){
        $third = Third::get();
        $third1 = Third::Find($id);
        return view('master.edit',compact('third','third1'));
    }

    public function insertEmployeeDetails(Request $request){
        $this->validate($request, [
            'name' => 'required|max:10',
            'type' => 'required|max:100',
            'emp_id' => 'required|max:10',
          ]);
        $emp_name=$request['name'];
        $image = $request->file('image');
        echo $image;
        $filename =$emp_name.'.jpg';
        Storage::put('images/'.$filename, file_get_contents($request->file('image')->getRealPath()));

    	Third::create([
    		'emp_name' => $request['name'],
    		'emp_email' => $request['email'],
    		'emp_type' => $request['type'],
    		'emp_id' => $request['emp_id'],
            'file_upload' => $filename
    	]);
    	return redirect()->back()->withErrors(['Inserted Employee Details successfully!']);
    }

    public function update(Request $request){
        Third::where('id',$request['id'])->update([
            'emp_name' => $request['name'],
            'emp_email' => $request['email'],
            'emp_type' => $request['type'],
            'emp_id' => $request['emp_id']
        ]);
        return redirect()->back();
    }
    public function view(Request $request)
    {
        $third = Third::where('id',$request->id)->first();
        return response()->json($third);
    }
    public function response(Request $request,  third $third)
    {
         $this->validate($request, [
            'response' => 'required|max:2550',
        ]);
        third::where('id',$third->id)->update([
            'response' => $request['response'],
            'updated_by' => Auth::User()->user_id,         
        ]);
        return redirect('/master/empView');
    }
    public function delete(Request $request)
    {   $third = Third::where('id',$request->id)->delete();
        return redirect()->back()->withErrors(['Deleted Successfully']);
    }



     public function search(Request $request)
    {
        $this->validate($request, [
            'searchEmp' => ''
        ]);
       $third = Third::
              where('emp_name', 'like', "%$request->searchEmp%")
              ->orwhere('emp_type','like',"%$request->searchEmp%")
              ->paginate(5)
              ->appends(['searchEmp' => $request->searchEmp]);
 
        
        return view('master.empView',compact('third'));
    }


    public function downloadPDF($id){
      $third = Third::find($id);
      $pdf = PDF::loadView('master.pdf', compact('third'));
      return $pdf->download('details.pdf');

    }


 public function downloadAllPDF(){
      $third = Third::get();
      $pdf = PDF::loadView('master.AllDetails', compact('third'));
      return $pdf->download('Alldetails.pdf');

    }
}