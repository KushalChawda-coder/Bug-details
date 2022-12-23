<?php 
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller {

  public function login(Request $request){
    $request->validate(['email' => 'required','password' => 'required']);
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
       $users = DB::table('Users')->where('email', $_POST['email'])->first();
       session(['login_status' => true]);
       session(['user_type' => $users->user_type]);
       session(['assigned_to' => $users->uid]);
       session(['name' => $users->name]);
       \Session::flash('message', 'Successfully login :)');
       \Session::flash('alert-class', 'alert-success');
       if ($users->user_type == "Developer") {
         return redirect('user_panel');
       } else {
        return redirect('bug_details'); 
       }
    } else {
      \Session::flash('message1', 'invalid email or password !!');
      \Session::flash('alert-class1', 'alert-danger');
        return redirect('/'); 
    }
  }

  public function logout(){
    session()->forget(['login_status']);
    session()->flush();
    return redirect('/');
  }

	public function create(){
    return view('registration', ["user"=>User::all()]);
  }

  public function customRegistration(Request $request){  
    $request->validate([ 'name' => 'required|min:30','email' => 'required|email|unique:users|min:20',
                          'password' => 'required|min:6']);  
    $data = $request->all();
    $check = $this->create_data($data);
    return redirect("/")->withSuccess('You have signed-in');
  }

  public function create_data(array $data){
    return User::create(['name' => $data['name'],'email' => $data['email'],
                         'password' => Hash::make($data['password'])]);
  }    
}