<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Issue;
use Illuminate\Support\Facades\DB;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problem = Problem::where('deleted','=','false')->get();
    }

    public function commonProblems()
    {
        $sql = "select p.problem, count(i.problemId) total from tbProblem p
                inner join tbIssue i on
                p.id = i.problemId
                where i.deleted=0 
                and p.deleted=0
                group by i.problemId
                order by count(i.problemId) desc";
       
        $problems = DB::select($sql);

        return $problems;
    }

    public function commonProblemsView()
    {
        $sql = "select p.problem, count(i.problemId) total from tbProblem p
                inner join tbIssue i on
                p.id = i.problemId
                where i.deleted=0 
                and p.deleted=0
                group by i.problemId
                order by count(i.problemId) desc";
       
        $problems = DB::select($sql);

        $issues = Issue::where('deleted','=',0)->get();

        return view('panel.problemas-frequentes',compact('problems','issues'));
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
        //
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
}
