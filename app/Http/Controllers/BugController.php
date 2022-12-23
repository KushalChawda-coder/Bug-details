<?php 
namespace App\Http\Controllers;
use App\Models\{Bug , User , Bug_type , Bug_status};
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class BugController extends Controller {

  public function __construct() {
    $this->user_data = User::all();
    $this->bug_type = Bug_type::all();
    $this->bug_status = Bug_status::all();
    $this->bug = Bug::with(['user', 'bug_status_data','Bug_type_data']);
  }

	public function show(){
	  return view('admin')->with('Bugs_row',$this->bug->get());
	}

	public function create(){
    return view('create', ["Bug_type"=>$this->bug_type,"user"=>$this->user_data,
                           "Bug_status"=>$this->bug_status]);
  }

  public function insert(Request $request){  
    $request->validate(['bug_title' => 'required|max:50','bug_description'=>'required|max:255',
            'bug_url' => 'required|url|max:255','bug_category'=>'required',
            'bug_status' => 'required','assigned_to' => 'required',
            'comment'=>'required|max:255','bug_image' => 'required|image|max:255'
        ]); 
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
    return view("edit", ["bug"=>$this->bug->where('id', $id)->first(),"Bug_type"=>$this->bug_type,
                          "user"=>$this->user_data,"Bug_status"=>$this->bug_status]);
  }

  public function update(Request $request){
    $request->validate(['bug_title' => 'required|max:50','bug_description'=>'required|max:255',
          'bug_url' => 'required|url|max:255','bug_category'=>'required',
          'bug_status' => 'required','assigned_to' => 'required',
          'comment'=>'required|max:255','bug_image' => 'image|max:255'
      ]);
      $input = request()->except(['_token']);
      if ($request->file('bug_image') != "") {
        $fileName = time().".".$request->file('bug_image')->getClientOriginalExtension();
        $path=$request->file('bug_image')->storeAs('images',$fileName,'public');
        $input["bug_image"]='/storage/'.$path;
        $affected = DB::table('bug')->where('id', $input['id'])->update($input);
      } else {
        $bug=$this->bug->where('id', $input['id'])->first();
        $bug_image=$bug->bug_image;
        $input["bug_image"]=$bug_image;
        $affected = DB::table('bug')->where('id', $input['id'])->update($input);
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

  public function Delete($id){
  	 $deleted =  DB::table('bug')->where('id', $id)->delete();
  	 if ($deleted) {
  	   	\Session::flash('message', 'Successfully deleted !');
        \Session::flash('alert-class', 'alert-danger');
	   	return redirect('bug_details');
      } else {
        echo "something error !!!";
      }
  }

}