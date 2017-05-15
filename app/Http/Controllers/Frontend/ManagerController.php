<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MenuRepository;
use Flash;
use DB;
use Illuminate\Http\RedirectResponse;
class ManagerController extends AppBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;
    }

    public function show( $id)
    {
        $item = $this->menuRepository->findWithoutFail($id);

        if (empty($item)) {
            Flash::error('Menu not found');

            return view('frontend.login.show');
        }

        return view('frontend.manager.show')->with('item', $item);
    }


    public function registerCourse(Request $request, $couresId)
    {
        $studentId = $request->session()->get('users')->id;
        $check_regis = DB::table('student_menu')->where('id_student','=',$studentId)->where('id_menu','=',$couresId)->first();
        if(isset($check_regis)) {
            Flash::error('Bạn đã đăng ký khóa học này');
            return new RedirectResponse(url('course'));
        } else {
            DB::table('student_menu')->insert(['id_student' => $studentId,'id_menu' => $couresId, 'check' => '1']);
            return new RedirectResponse(url('course'));
        }
        
    }

    public function viewRegis(Request $request)
    {
        $studentId = $request->session()->get('users')->id;
        $view_regis = DB::table('student_menu')
            ->join('students', 'student_menu.id_student', '=', 'students.id')
            ->join('menus', 'student_menu.id_menu', '=', 'menus.id')
            ->where('id_student','=', $studentId)->where('check','=', '1')->get();
        
        
        if (empty($view_regis)) {
            Flash::error('Bạn chưa đăng ký khóa học nào');

            return view('frontend.login.show');
        }
        return view('frontend.manager.viewRegis')->with('view_regis', $view_regis);
    }

    public function learn(Request $request){
        $order_code = $_GET['order_code'];
        $studentId = $request->session()->get('users')->id;

       $update = DB::table('student_menu')->where('id_student', $studentId)->where('id_menu', $order_code)->update(['check' => 2]);
        if (empty($update)) {
            Flash::error('Thanh toán không thành công');

            return view('frontend.login.show');
        }
        return view('frontend.login.show');
    }

    public function learnEnglish(Request $request)
    {
        $studentId = $request->session()->get('users')->id;
        $learn =  DB::table('student_menu')
        ->join('students', 'student_menu.id_student', '=', 'students.id')
        ->join('menus', 'student_menu.id_menu', '=', 'menus.id')
        ->where('check', '=', 2)->where('id_student', '=', $studentId)->get();
        if (empty($learn)) {
            Flash::error('Không có khóa học nào');
            return view('frontend.login.show');
        }
        return view('frontend.manager.learnEng')->with('learn', $learn);
    }

    public function comeBack(Request $request)
    {
        return view('frontend.login.show');
    }

    public function viewLearn(Request $request, $id)
    {
        $view_learn = DB::table('lesson_menu')
            ->join('lessons', 'lesson_menu.id_lesson', '=', 'lessons.id')
            ->where('id_menu','=', $id)->get();
        if (empty($view_learn)) {
            Flash::error('Không có bài học nào');
            return view('frontend.manager.learnEng');
        }
        return view('frontend.manager.viewLearn')->with('view_learn', $view_learn);
    }

    public function viewLesson(Request $request, $id_lesson)
    {
        $lesson = DB::table('lessons')->where('id', '=', $id_lesson)->get();
        if (empty($lesson)) {
            Flash::error('Bài học này không tồn tại');
            return view('frontend.manager.viewLearn');
        }
        return view('frontend.manager.viewLesson')->with('lesson', $lesson);
    }
}
