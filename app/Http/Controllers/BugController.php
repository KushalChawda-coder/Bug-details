<?php 
namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Bug;
use App\Models\Bug_type;
use App\Models\User;
use App\Models\Bug_status;
use Illuminate\Http\Request;
use DB;

class BugController extends Controller {

	public function show(){
    $results = DB::table('bug')->join('bug_type', 'bug.bug_category', '=', 'bug_type.bug_type_id')
          ->join('user', 'user.uid', '=', 'bug.assigned_to')
          ->join('bug_status', 'bug_status.bug_status_id', '=', 'bug.bug_status')->get();
	  return view('admin')->with('Bugs_row',$results);
	}

  public function login(){
    $users = DB::table('User')->where('email', $_POST['email'])->where('password',$_POST['password'])->get();
    
    if ($users->isEmpty()) {
      \Session::flash('message1', 'invalid email or password !!');
      \Session::flash('alert-class1', 'alert-danger');
            return redirect('/');        
    } elseif($users[0]->user_type == "Developer" and !$users->isEmpty()){
      session(['login_status' => true]);
      session(['name' => $users[0]->name]);
      \Session::flash('message', 'Successfully login :)');
      \Session::flash('alert-class', 'alert-success');
       return redirect('user_panel');
    } else {
      session(['login_status' => true]);
      session(['display' => "display_id"]);
      session(['name' => $users[0]->name]);
      session(['messeage_status' => true]);
      $results = DB::table('bug')->join('bug_type', 'bug.bug_category', '=', 'bug_type.bug_type_id')
                                ->join('user', 'user.uid', '=', 'bug.assigned_to')
                              ->join('bug_status', 'bug_status.bug_status_id', '=', 'bug.bug_status')->get();
      \Session::flash('message', 'Successfully login :)');
      \Session::flash('alert-class', 'alert-success');
      return redirect('bug_details')->with('Bugs_row',$results); 
    }
  }

  public function logout(){
    session()->forget(['login_status']);
    session()->flush();
    return redirect('/');
  }

	public function create(){
    $results1 = Bug_type::all();
    $results2 = User::all();
    $results3 = Bug_status::all();
    return view('create', ["Bug_type"=>$results1,"user"=>$results2,"Bug_status"=>$results3]);
  }

  public function insert(Request $request){  
   $input=$request->all();
   $fileName = time().".".$request->file('bug_image')->getClientOriginalExtension();;
   $path=$request->file('bug_image')->storeAs('images',$fileName,'public');
   $input["bug_image"]='/storage/'.$path;
	 \Session::flash('message', 'Successfully stored !');
      \Session::flash('alert-class', 'alert-success');
	 Bug::create($input);
	 return redirect('bug_details')->with('flash_messeage','new data stored ..');
  }

  public function edit($id){
    $results1 = DB::table('bug')->join('bug_type', 'bug.bug_category', '=', 'bug_type.bug_type_id')
                ->join('bug_status', 'bug_status.bug_status_id', '=', 'bug.bug_status')
                ->join('user', 'user.uid', '=', 'bug.assigned_to')->where('id', $id)->first();
    $results2 = Bug_type::all();
    $results3 = User::all();
    $results4 = Bug_status::all();
    return view("edit", ["bug"=>$results1,"Bug_type"=>$results2,"user"=>$results3,"Bug_status"=>$results4]);
  }

    // update code
  public function update(Request $request){
    if(session()->has('login_status')){
      $input = request()->except(['_token']);
      if ($request->file('bug_image') != "") {
        $fileName = time().".".$request->file('bug_image')->getClientOriginalExtension();
        $path=$request->file('bug_image')->storeAs('images',$fileName,'public');
        $input["bug_image"]='/storage/'.$path;
        $affected = DB::table('bug')->where('id', $_POST['id'])->update($input);
      } else {
        $bug = DB::table('bug')->join('bug_type', 'bug.bug_category', '=', 'bug_type.bug_type_id')
          ->join('bug_status', 'bug_status.bug_status_id', '=', 'bug.bug_status')
          ->join('user', 'user.uid', '=', 'bug.assigned_to')->where('id', $_POST['id'])->first();
        $bug_image=$bug->bug_image;
        $input["bug_image"]=$bug_image;
        $affected = DB::table('bug')->where('id', $_POST['id'])->update($input);
      }

      if ($affected) {
        \Session::flash('message', 'Successfully updated !');
        \Session::flash('alert-class', 'alert-success');
         return redirect('bug_details');
      } else {
        \Session::flash('message', 'your data is a same. There is no updated ..');
        \Session::flash('alert-class', 'alert-warning');
         return redirect('bug_details');
      }
    }
  }

  public function Delete($id){
    if(session()->has('login_status')){
  	 $deleted = DB::table('bug')->where('id', $id)->delete();
  	 if ($deleted) {
  	   	\Session::flash('message', 'Successfully deleted !');
        \Session::flash('alert-class', 'alert-danger');
	   	return redirect('bug_details');
      } else {
        echo "something error !!!";
      }
    }
  }

}