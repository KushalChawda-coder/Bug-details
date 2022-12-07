<?php 

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Bug;
use App\Models\Bug_type;
use App\Models\User;
use App\Models\Bug_status;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\DemoMail;

class BugUserController extends Controller {
	public function show(){  
    if (session()->has('login_status')) {
    $name=session()->get('name');
      $results = DB::table('bug')->join('bug_type', 'bug.bug_category', '=', 'bug_type.bug_type_id')
            ->join('bug_status', 'bug_status.bug_status_id', '=', 'bug.bug_status')
            ->join('user', 'user.uid', '=', 'bug.assigned_to')->where('name','=',$name)->get();
      $results1 = Bug_type::all();   
      $results4 = Bug_status::all();
		  return view('user',['Bugs_row'=>$results,"Bug_type"=>$results1,"Bug_status"=>$results4]);
    }
	}

  public function edit($id){
    if (session()->has('login_status')) {
      $results1 = DB::table('bug')->join('bug_type', 'bug.bug_category', '=', 'bug_type.bug_type_id')
                      ->join('bug_status', 'bug_status.bug_status_id', '=', 'bug.bug_status')
                      ->join('user', 'user.uid', '=', 'bug.assigned_to') ->where('id', $id)->first();
      $results2 = Bug_type::all();
      $results3 = User::all();
      $results4 = Bug_status::all();
      return view("user_edit", 
        ["bug"=>$results1,"Bug_type"=>$results2,"user"=>$results3,"Bug_status"=>$results4]);
    }
  }

    // update code
  public function update(Request $request){
    if (session()->has('login_status')) {
        $input = request()->except(['_token']);
        $affected = DB::table('bug')->where('id', $input['bug_id'])->update(
        [$input['key']=>$input['value'],]);

        $results1 = DB::table('bug')->join('bug_type', 'bug.bug_category', '=', 'bug_type.bug_type_id')
                    ->join('bug_status', 'bug_status.bug_status_id', '=', 'bug.bug_status')
                    ->join('user', 'user.uid', '=', 'bug.assigned_to') ->where('id', $input['bug_id'])->first();

      if ($affected) {
        if (isset($input['key'])) {
          if ($input['key'] == 'bug_status') {
            if ($input['value'] == 2) {
              $title='Mail from : '.$results1->name;
              $body='The bug : '.$results1->bug_description.' is fixed..';
              $mailData = ['title' => $title,'body' => $body];
             $mail=Mail::to('kushalchawda8@gmail.com')->send(new DemoMail($mailData)); 
            }
          }
        }
      }
    }
  }
  
}