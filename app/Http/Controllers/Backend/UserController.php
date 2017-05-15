<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Flash;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends AppBaseController
{

    /** @var  TypeRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();
        
        return view('backend.users.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('About not found');

            return redirect(route('users.index'));
        }

        return view('backend.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('About not found');

            return redirect(route('users.index'));
        }

        return view('backend.users.edit')->with('user', $user);
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
        $request_data = $request->All();
        $this->validator($request_data)->validate();
        $new_password = $request->password;
        $name = $request->name;
        $current_password = Auth::User()->password;           
        if (Hash::check($request_data['current-password'], $current_password)) {
            if($new_password != '') {
                $data =  array('name' => $name);
                $this->userRepository->update($data, $id);
                $this->userRepository->update(['password' => Hash::make($request_data['password'])], $id);
            } else {
                $data =  array('name' => $name);
                $this->userRepository->update($data, $id);
            }
            Flash::success('User updated successfully.');
            return redirect(route('users.index'));
        } else {   
            Flash::error('Password is not correct.');
            return redirect(route('users.index'));
        }
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('About not found');

            return redirect(route('users.index'));
        }

        $admin_current_id = Auth::user()->id;

        if ($admin_current_id != $id) {
            $this->userRepository->delete($id);

            Flash::success('About deleted successfully.');

            return redirect(route('users.index'));
        }
        
        Flash::error('Cannot delete current user');

        return redirect(route('users.index'));
    
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:30',
            'current-password' => 'required|min:6',
        ]);
    }

}
