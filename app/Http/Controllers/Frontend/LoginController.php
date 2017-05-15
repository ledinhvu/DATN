<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\StudentRepository;
use App\Repositories\MenuRepository;
use Flash;
use Validator;
use DB;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
class LoginController extends AppBaseController
{
    /** @var  StudentRepository */
    private $studentRepository;

    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(StudentRepository $studentRepo, MenuRepository $menuRepo)
    {
        
        $this->studentRepository = $studentRepo;
        $this->menuRepository = $menuRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('frontend.login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'email'=>'required|email',
            'password'=>'required'
        ];
        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $input = $request->all();
            $emailLogin = $request->input('email');
            $emaiDB = DB::table('students')->where('email','=',$emailLogin)->first();
            if(isset($emaiDB)) {
                $userLogin = DB::table('students')->where('email','=',$emailLogin)->first();
                $passwordLogin =  $request->input('password');
                if (Hash::check($passwordLogin, $userLogin->password)) {
                    $menus = $this->menuRepository->all();
                    $request->session()->put('users', $userLogin);
                    return new RedirectResponse(url('course'));
                } else {
                    Flash::error('Password is not correct');
                    return view('frontend.login.index');
                }      
            } else {
                Flash::error('Email does not exist');
                return view('frontend.login.index');
            }
                
            
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function logout(Request $request)
    {
    	if ($request->session ()->has ( 'users' )) {
    		$request->session()->forget('users');
    	}
    	return new RedirectResponse(url('/'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter($id, Request $request)
    {
        $item = $this->menuRepository->findWithoutFail($id);

        $menus = $this->menuRepository->all();

        if (empty($item)) {
            Flash::error('Menu not found');

            return redirect(route('login.show'));
        }

        return view('frontend.login.menus', compact('menus', 'item'));
    }
}
