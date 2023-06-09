<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Assessment;
use App\Models\SeverityLevel;
use App\Http\Requests\SeverityLevelRequest;
use App\Models\Issue;

class AssessmentController extends Controller
{
    
    public function index()
    {

        //add problem páttern
        $sql = "select a.* from tbAssessment a inner join tbIssue i on a.issueId = i.id where a.deleted=0";
        $assessment = DB::select($sql);    
        
        return $assessment;
    }

    public function indexView()
    {   
        //add problem pattern
        $sql = "select a.*,a.problem,p.problem titProblem,sl.severity,sl.severityColor
                from tbAssessment a
                inner join tbIssue i on a.issueId = i.id
                inner join tbProblem p on i.problemId = p.id
                inner join tbSeverityLevel sl on sl.id = a.severityId 
                where a.deleted=0 and a.userId = ".auth()->user()->id;

        $assessments = DB::select($sql);     
        
        return view('panel.avaliacoes')->with('assessments',$assessments);
    }

    public static function  countAssessment(){
        $assessment = new Assessment();

        $total = $assessment::where('deleted','=',0)->count();
                
        return response()->json([
            'count'=> $total,
            'code'=>200]);            
    }

    public static function  countAssessmentView(){
        
        //$assessment = new Assessment();
        //$total = $assessment::where('deleted','=',0)->count();
        
        $total = DB::table('tbAssessment')
            ->join('tbIssue', 'tbAssessment.issueId', '=', 'tbIssue.id')            
            ->select('tbAssessment.*', 'tbIssue.deleted')
            ->where('tbIssue.deleted','=',0)
            ->count();

        return $total;               
    }

    public function store(Request $request)
    {
        $assessment = new Assessment();
        $assessment -> creationDate = date('Y-m-d');
        $assessment -> deleted = 0;
	    $assessment -> issueId = $request -> issueId;
	    $assessment -> problem = $request -> problem;
	    $assessment -> justification = $request -> justification;
        $assessment -> severityId = $request -> severityId;
        $assessment -> userId = auth()->user()->id;
        $assessment -> created_at = gmdate('Y-m-d H:i:s');
        $assessment -> updated_at = gmdate('Y-m-d H:i:s');
        $assessment -> save();
        
        return response()->json([
            'message'=> 'evaluation carried out',
            'code'=>200]);
    }

    public function storeViewProblemDetail(SeverityLevelRequest $request){
        $assessment = new Assessment();
        $assessment -> creationDate = date('Y-m-d');
        $assessment -> deleted = 0;
	    $assessment -> issueId = $request -> idIssue;
	    $assessment -> problem = $request -> problem;
	    $assessment -> justification = $request -> justification;
        $assessment -> severityId = $request -> severityId;
        $assessment -> userId = auth()->user()->id;
        $assessment -> created_at = gmdate('Y-m-d H:i:s');
        $assessment -> updated_at = gmdate('Y-m-d H:i:s');

        $assessment -> save();

        $issues = Issue::all();
        
        return redirect('/problema-detalhado/'.$request->idIssue)->with('mensagem', 'Avaliação realizada com sucesso!'); 
    }

    public function queryAssessmentEvaluation($idIssue){

        $assessment = Assessment::where('issueId','=',$idIssue)
                                ->where('deleted','=',false);

        return $assessment;
    }


    public function showIdIssue(Request $request)
    {
        $assessment = Assessment::where('issueId', $request->id)->get();
        return $assessment;
    }

    public function showIdIssueProblem(Request $request)
    {     
        $assessment = Assessment::where('issueId', $request->id)
                                ->where('problem',$request->problem)    
                                ->get();
        return $assessment;    
    }

    public function countYesNoIdIssue(){        

        //add problem pattern
        $sql = 'SELECT i.id,i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';
        $sql .= 'count(i.id) "total"';
        $sql .= 'from tbAssessment a ';
        $sql .= 'inner join tbIssue i ';
        $sql .= 'on a.issueId = i.idIssue ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'group by a.issueId';

        $assessment = DB::select($sql);

        return $assessment;
    }

    public function countYesNoIdIssueView(){        

        //add problem pattern
        $sql = 'SELECT i.id, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbAssessment a ';
        $sql .= 'inner join tbIssue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'group by a.issueId';

        $assessments = DB::select($sql);

        
        return view('assessment.avaliacoes')->with('assessments',$assessments);
    }

    public function countYesNoByIdIssue(Request $request){        

        //add problem pattern
        $sql = 'SELECT i.id, i.idDevice, d.device,  ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbAssessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where a.issueId = ' . $request->id_issue;
        $sql .= ' group by a.issueId';

        $assessment = DB::select($sql);

        return $assessment;
    }


    public function countYesNoByIdDevice(Request $request){        

        //add problem pattern
        $sql = 'SELECT i.id, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbAssessment a ';
        $sql .= 'inner join tbIssue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where i.idDevice = ' . $request->id_device;
        $sql .= ' group by a.issueId';

        $assessment = DB::select($sql);

        return $assessment;
    }


    public function countYesNoByDevice(Request $request){        

        //add problem pattern
        $sql = 'SELECT i.id, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.id) "total"';
        $sql .= 'from tbAssessment a ';
        $sql .= 'inner join tbIssue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where d.device = ' . $request->device;
        $sql .= ' group by a.issueId';

        $assessment = DB::select($sql);

        return $assessment;
    }

    public function countYesNoByDeviceModel(Request $request){        

        //add problem pattern
        $sql = 'SELECT i.id, i.idDevice, d.device, i.devideModel, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbAssessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where i.devideModel = ' . $request->device_model;
        $sql .= ' group by a.issueId';

        $assessment = DB::select($sql);

        return $assessment;
    }

    public function edit($id)
    {
        $assessment = Assessment::where('id','=',$id)->first();
        
        $severityLevel = SeverityLevel::where('deleted','=',0)->get();
        
        return view('panel.edit.avaliacao-editar',compact('assessment','severityLevel'));
        
    }

    public function update(Request $request, $id)
    {
        Assessment::where('id','=',$request->id)->update($request->except(['_token', '_method']));
        return redirect('/avaliacoes')->with('mensagem', 'Avaliação alterada com sucesso!');
    }

    public function destroyView($idAssessment)
    {
        Assessment::where('id', $idAssessment)->update(['deleted' => 1]);        
        return redirect('/avaliacoes')->with('mensagemExclusao', 'Avaliação removida com sucesso!'); 
    }

}