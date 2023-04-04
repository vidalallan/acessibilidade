<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Issue;
use App\Models\Device;
//use App\Models\Pattern;
use App\Models\Assessment;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::where('deleted','=',0)->get();        
        return $issues;
    }

    public function indexView(){

        $sql = 'select * from tbIssue i 
        inner join tbdevice d
        on i.idDevice = d.idDevice        
        where i.deleted=0';
       
        $issues = DB::select($sql);
        
        $devices = Device::all();        
        $assessments = Assessment::all();

        return view('panel.problemas', compact('issues', 'devices','assessments'));        
    }

    public function indexAvaliacoesView(){         
        
        $sql = 'SELECT i.id, i.title, i.idDevice, d.device,i.appTitle, 
        SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", 
        SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no",         
        count(i.id) "total"
        from tbassessment a 
        inner join tbissue i 
        on a.issueId = i.id 
        inner join tbDevice d 
        on i.idDevice = d.idDevice         
        where i.deleted=0
        group by a.issueId';        
        
        $issues = DB::select($sql);   
       
        return view('panel.problemas-avaliados', compact('issues'));
    }

    public function indexView2(){
        $issues = $this->index();
        $devices = Device::where('deleted','=',0)->get();                
        return view('panel.problemas-adicionar', compact('issues', 'devices'));        
    }

    public function queryQuestionsWithOutParameter(){
        $sql = 'select * from tbIssue i 
        inner join tbdevice d
        on i.idDevice = d.idDevice        
        where i.deleted=0';
       
        $issues = DB::select($sql);

        return view('consultar-questoes', compact('issues'));        
    }

    public function queryQuestionsbyParameter($idIssue){
        $sql = "select * from tbIssue i 
        inner join tbdevice d
        on i.idDevice = d.idDevice        
        where i.deleted=0 and i.id=$idIssue";
       
        $issues = DB::select($sql);

        $assessments = Assessment::where('issueId','=',$idIssue)->get();

        $sql = 'SELECT i.id, i.title, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbassessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where a.issueId = ' . $idIssue;
        $sql .= ' and i.deleted=0 ';
        $sql .= ' group by a.issueId';

        $total = DB::select($sql);

        return view('questao-detalhada', compact('issues','assessments','total'));        
    }

    public function queryQuestionsPanelbyParameter($idIssue){
        $sql = "select * from tbIssue i 
        inner join tbdevice d
        on i.idDevice = d.idDevice                
        where i.deleted=0 and i.id=$idIssue";
       
        $issues = DB::select($sql);

        $assessments = Assessment::where('issueId','=',$idIssue)->get();

        $sql = 'SELECT i.id, i.title, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbassessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where a.issueId = ' . $idIssue;
        $sql .= ' and i.deleted=0 ';
        $sql .= ' group by a.issueId';

        $total = DB::select($sql);

        //$sqlVote = "select * from tbAssessment where issueId= $idIssue and userId= ". auth()->user()->id;
        //$totalVotes = DB::select($sqlVote);

        //return view('panel.problema-detalhado', compact('issues','assessments','total','totalVotes'));        
        return view('panel.problema-detalhado', compact('issues','assessments','total'));        
    }

    public static function totalVotesUser($idIssue){
        $assessment = new Assessment();
        $totalVotes =  $assessment::where('issueId','=',$idIssue)->where('userId','=',auth()->user()->id)->count();

        return $totalVotes;
    }

    public function countIssue(){
        $issue = new Issue();
        
        return response()->json([
            'count'=> $issue::count(),
            'code'=>200]);
    }

    public static function  countIssueView(){
        $issue = new Issue();
        $total = $issue::where('deleted','=',0)->count();
        
        return $total;               
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
        $issue = new Issue();
        
        $issue -> creationDate = date('Y-m-d');
        $issue -> deleted = 0;
        $issue -> title = $request-> title;
        $issue -> description = $request-> description;
        $issue -> appFieldId = $request->appFieldId;
        $issue -> appFieldName = $request->appFieldName;

        $image = $request->file('printScreen');
        $path = $image->store('images','public');

        $issue -> printScreen = $path;

        $issue -> idDevice = $request-> idDevice;        
        $issue -> patternVersion = $request-> patternVersion;
        $issue -> patternVersionDetailts = $request-> patternVersionDetailts;
        $issue -> devideModel = $request-> devideModel;        
        $issue -> version = $request-> version;
        $issue -> appTitle = $request-> appTitle;
        $issue -> linkApp = $request-> linkApp;  
        
        $issue -> origin = $request-> origin;
        $issue -> userId = auth()->user()->id;

        $issue ->save();
    }


    public function storeView(Request $request)
    {
        $issue = new Issue();
        
        $issue -> creationDate = date('Y-m-d');
        $issue -> deleted = 0;
        $issue -> title = $request-> title;
        $issue -> description = $request-> description;
        $issue -> appFieldId = $request->appFieldId;
        $issue -> appFieldName = $request->appFieldName;

        
        $image = $request->file('printScreen');

        if($image ==null){
            $path = "";
        }else{
            $path = $image->store('images','public');
        }

        

        //php artisan storage:link
        //$path ="imagem";

        $issue -> printScreen = $path;
        
        $issue -> pattern = $request -> pattern;
        $issue -> patternVersion = $request-> patternVersion;
        $issue -> patternVersionDetailts = $request-> patternVersionDetailts;

        $issue -> idDevice = $request-> idDevice;
        $issue -> devideModel = $request-> devideModel;        
        $issue -> version = $request-> version;
        $issue -> appTitle = $request-> appTitle;
        $issue -> linkApp = $request-> linkApp;

        $issue -> origin = "web";
        $issue -> userId = auth()->user()->id;        

        $issue ->save();

        return redirect('/questions');
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

    public function destroyView($idIssue)
    {
        Issue::where('id', $idIssue)->update(['deleted' => 1]);        
        return redirect('/problemas'); 
    }
}