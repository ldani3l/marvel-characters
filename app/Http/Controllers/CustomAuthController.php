<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomAuthController extends Controller{
    public function index(){
        return view('auth.login');
    }

    public function edit(){
        return view("auth.edit");
    }

    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration(){
        return view('auth.registration');
    }

    public function customRegistration(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data){
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    /*public function update(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            ]);
        if($request->flexSwitchCheckChecked){
            $currentPassword = Auth::User()->password;
            if(Hash::check($request['password'], $currentPassword)){
                $userId = Auth::User()->id;
                $user = User::find($userId);
                $user->nombres = $request->nombres;
                $user->email = $request->email;
                $user->password = Hash::make($request['password_']);;
            }
            else{
                return back()->with('mjs', "<div class='alert alert-warning' role='alert'>Las contraseñas no coinciden.</div>");
            }
        }
        else{
            $user = User::find(Auth::user()->id);
            $user->nombres = $request->nombres;
            $user->email = $request->email;
        }
        if($user->save())
            $mjs = "<div class='alert alert-success' role='alert'>Los datos se guardaron correctamente.</div>";
        else
            $mjs = "<div class='alert alert-danger' role='alert'>Los datos se guardaron correctamente.</div>";
        return back()->with('mjs', $mjs);
    }*/
}
