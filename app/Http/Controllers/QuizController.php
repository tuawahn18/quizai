<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = (new Quiz)->allQuiz();
        return view('backend.quiz.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateForm($request);
        $quiz = (new Quiz)->storeQuiz($data);
        return redirect()->back()->with('message','Quiz created','Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quiz = (new Quiz)->getQuizById($id);
        return view('backend.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = $this->validateForm($request);
        $quiz = (new Quiz)->updateQuiz($data,$id);
        return redirect(route('quiz.index'))->with('message','Quiz Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        (new Quiz)->deleteQuiz();
        return redirect(route('quiz.index'))->with('message','Quiz Deleted Successfully!');
    }

    public function question($id)
    {
        $quizzes = Quiz::with('question')->where('id',$id)->get();
        return view('backend.quiz.question',compact('quizzes'));
    }

    public function validateForm($request)
    {
        return $this->validate($request,[
            'name'=>'required|string',
            'description'=>'required|min:3|max:500',
            'minute'=>'required|integer'
    ]);
    }
}
