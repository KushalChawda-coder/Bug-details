<?php 
namespace App\Http\Controllers;
use App\Models\{Bug,Bug_type,User,Bug_status};
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\DemoMail;

class BugUserController extends Controller {

  public function __construct(){
    $this->user_data = User::all();
    $this->bug_type = Bug_type::all();
    $this->bug_status = Bug_status::all();
    $this->bug = Bug::with(['user', 'bug_status_data','Bug_type_data']);
  }

	public function show(){  
    $assigned_to=session()->get('assigned_to');
    return view('user',['Bugs_row'=>$this->bug->where('assigned_to','=',$assigned_to)->get(),
                        "Bug_type"=>$this->bug_type,"Bug_status"=>$this->bug_status]);
	}

  public function update(Request $request){
   
    $input = request()->except(['_token']);
    $affected = DB::table('bug')->where('id', $input['bug_id'])->update([$input['key']=>$input['value']]);
    $results1 =$this->bug->where('id', $input['bug_id'])->first();
    if ($affected) {
      if (isset($input['key'])) {
        if ($input['key'] == 'bug_status') {
          if ($input['value'] == 2) {
            $title='Mail from : '.$results1["user"][0]->name;
            $body='The bug : '.$results1->bug_description.' is fixed..';
            $mailData = ['title' => $title,'body' => $body];
           $mail=Mail::to('kushalchawda8@gmail.com')->send(new DemoMail($mailData)); 
          }
        }
      }
    }
  }
  
}