<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\StudentRepository;
use Flash;
use Illuminate\Support\Facades\Hash;
use Validator;

class StudentController extends AppBaseController
{
    /** @var  StudentRepository */
    private $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|max:30',
            'current-password' => 'max:50',
            'new-password' => 'max:50',
            'phone' => 'required|min:10|max:15|regex:/(0)[0-9]{9}/',
            'address' => 'required|min:3|max:50'
        ];
        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $input = $request->all();

            $current_password = $request->input('current-password');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $name = $request->input('name');
            $new_password = $request->input('new-password');
            $studentPassword = $request->session()->get('users')->password;
            $studentID = $request->session()->get('users')->id;
            if (Hash::check($current_password, $studentPassword)) {
                if($new_password != '') {
                    $data =  array('name' => $name, 'phone' => $phone,'address' => $address);
                    $this->studentRepository->update($data, $studentID);
                    $this->studentRepository->update(['password' => Hash::make($new_password)], $studentID);
                } else {
                    $data =  array('name' => $name, 'phone' => $phone,'address' => $address);
                    $this->studentRepository->update($data, $studentID);
                }
                Flash::success('Chỉnh sửa thành công.');
                return view('frontend.login.show');
            } else {   
                Flash::error('Mật khẩu bạn vừa nhập không đúng');
                return redirect(route('detailStudent'));
            }
        }
        
    }

}
