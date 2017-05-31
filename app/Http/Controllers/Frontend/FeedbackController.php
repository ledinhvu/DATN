<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FeedbackRepository;
use Flash;
use DB;
use Validator;

class FeedbackController extends AppBaseController
{
    /** @var  FeedbackRepository */
    private $feedbackRepository;

    public function __construct(FeedbackRepository $feedbackRepo)
    {
        $this->feedbackRepository = $feedbackRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rule = [
            'title'=>'required|max:50|min:3',
            'content'=>'required'
        ];
        $validator = Validator::make($request->all(), $rule);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $input = $request->all();
            $title = $request->input('title');
            $content = $request->input('content');
            $studentId = $request->session()->get('users')->id;
            DB::table('feedback')->insert(['title' => $title,'content' => $content, 'id_student' => $studentId]);    
            return view('frontend.login.show');
        }
    }
}
