<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Device;
use App\Models\Assessment;
use App\Models\Pattern;
use App\Models\User;
use App\Models\Problem;
use App\Models\SeverityLevel;
use App\Http\Requests\ProblemFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$issues = Issue::where('deleted','=',0)->get();        
        $sql = 'select              
            i.id,
            i.created_at,
            i.problemId,
            pro.problem,
            pro.description,
            i.appTitle,
            i.appFieldId,
            i.appFieldName,
            i.printScreen,
            i.idDevice,
            d.device,
            i.patternId,
            pat.pattern,
            i.patternVersion,
            i.patternVersionDetailts,
            i.devideModel,
            i.version,
            i.linkApp,
            i.origin,
            i.userId,
            i.toolUsed,
            i.tool_problem,
            i.tool_problem_version,
            i.flow_identify_problem,
            i.assistive_technology_tool,
            i.tool_assistive,
            i.tool_assistive_version,
            i.updated_at    
        from tbIssue i 
        inner join tbDevice d        
        on i.idDevice = d.idDevice                
        inner join tbProblem pro
        on i.problemId = pro.id
        inner join tbPattern pat
        on i.patternId = pat.id
        where i.deleted=0
        order by i.id desc';

        $issues = DB::select($sql);

        return $issues;
    }

    public function detailedProblemById($id)
    {        
        $sql = 'select              
            i.id,
            i.created_at,
            i.problemId,
            pro.problem,
            pro.description,
            i.appTitle,
            i.appFieldId,
            i.appFieldName,
            i.printScreen,
            i.idDevice,
            d.device,
            i.patternId,
            pat.pattern,
            i.patternVersion,
            i.patternVersionDetailts,
            i.devideModel,
            i.version,
            i.linkApp,
            i.origin,
            i.userId,
            i.toolUsed,
            i.tool_problem,
            i.tool_problem_version,
            i.flow_identify_problem,
            i.assistive_technology_tool,
            i.tool_assistive,
            i.tool_assistive_version,
            i.updated_at    
        from tbIssue i 
        inner join tbDevice d        
        on i.idDevice = d.idDevice                
        inner join tbProblem pro
        on i.problemId = pro.id
        inner join tbPattern pat
        on i.patternId = pat.id
        where i.deleted=0 and i.id='. $id .'
        order by i.id desc';

        $issues = DB::select($sql);

        return $issues;
    }

    public function indexView(){

        //consulta dos problemas antes de colocar se o usuário logado já avaliou
        /*
        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.deleted=0 and a.issueId =i.id) totalAvaliacoes
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id
        where i.deleted=0 order by i.id desc';
        */


        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.deleted=0 and a.issueId =i.id) totalAvaliacoes        
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id                
        where i.deleted=0        
        order by i.id desc';
       
        $issuesPag = DB::select($sql);

        $issues = $this->paginate($issuesPag, 10);
        
        $devices = Device::all();        
        $assessments = Assessment::all(); 

        //para verificar quais usuários já fizeram avaliação em um determinado problema
        $sqlIdIssuetotUserAss = 'SELECT i.id,a.userId FROM tbIssue i inner join tbAssessment a
        on i.id = a.issueId
        where i.deleted = 0 and a.userId = ' . auth()->user()->id .
        ' order by i.id desc';

        $idIssuetotUserAss = DB::select($sqlIdIssuetotUserAss);        

        return view('panel.problemas', compact('issues', 'devices','assessments','idIssuetotUserAss'));        
    }



    //function control paginate
    private function paginate($items, $perPage)
    {
        $currentPage = request()->query('page', 1);

        $paginatedItems = array_slice($items, ($currentPage - 1) * $perPage, $perPage);

        $paginatedData = new LengthAwarePaginator($paginatedItems, count($items), $perPage);
        $paginatedData->setPath(request()->url());

        return $paginatedData;
    }



    //para obter a descrição do título escolhido
    public function getDescriptionProblem(Request $request){
        
        $sql = 'select p.description from tbIssue i
                inner join tbProblem p
                on i.problemId = p.id
                where i.problemId = '. $request->id . ' limit 1';

        $desc = DB::select($sql);

        foreach($desc as $d){
            echo $d->description;
        }        
    }

    public function researchProblems(){

        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.issueId =i.id) totalAvaliacoes
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id
        where i.deleted=0 order by i.id desc';
       
        $issues = DB::select($sql);
        
        $devices = Device::all();        
        $assessments = Assessment::all();        

        return view('panel.problemas-pesquisar', compact('issues', 'devices','assessments'));        
    }

    public function researchProblemsByUser(){
        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.issueId =i.id) totalAvaliacoes
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id
        where i.deleted=0 and i.userId='. auth()->user()->id .' order by i.id desc';
       
        $issues = DB::select($sql);
        
        $devices = Device::all();        
        $assessments = Assessment::all();        

        return view('panel.problemas-por-usuario', compact('issues', 'devices','assessments'));        
    }

    public function filterProblemsApi(Request $request){

        $filter = '';
        if($request->searchBy == 0){
            $filter = ''; 
        }
        elseif($request->searchBy == 1){
            $filter = ' and p.problem =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 2){            
            $filter = ' and d.device =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 3){            
            $filter = ' and i.appTitle =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 4){            
            $filter = ' and pa.pattern =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 5){            
            $filter = ' and (select count(issueId) from tbassessment a where a.issueId =i.id) = 0 ';            
        }
        elseif($request->searchBy == 6){            
            $filter = ' and (select count(issueId) from tbassessment a where a.issueId =i.id) > 0 ';            
        }

        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbassessment a where a.issueId =i.id) totalAvaliacoes
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id
        where i.deleted=0 '. $filter .'order by i.id desc';
       
        $issues = DB::select($sql);        
        
        return $issues;        
    }



    public function filterProblems(Request $request){

        $filter = '';
        if($request->searchBy == 0){
            $filter = ''; 
        }
        elseif($request->searchBy == 1){
            $filter = ' and p.problem =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 2){            
            $filter = ' and d.device =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 3){            
            $filter = ' and i.appTitle =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 4){            
            $filter = ' and pa.pattern =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 5){            
            $filter = ' and (select count(issueId) from tbAssessment a where a.issueId =i.id) = 0 ';            
        }
        elseif($request->searchBy == 6){            
            $filter = ' and (select count(issueId) from tbAssessment a where a.issueId =i.id) > 0 ';            
        }


        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.issueId =i.id) totalAvaliacoes        
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id        
        where i.deleted=0 '. $filter .'order by i.id desc';
       
        $issuesPag = DB::select($sql);

        $issues = $this->paginate($issuesPag, 10);
        
        $devices = Device::all();        
        $assessments = Assessment::all();    
        
        $sqlIdIssuetotUserAss = 'SELECT i.id,a.userId FROM tbIssue i inner join tbAssessment a
        on i.id = a.issueId
        where i.deleted = 0 and a.userId = ' . auth()->user()->id .
        ' order by i.id desc';

        $idIssuetotUserAss = DB::select($sqlIdIssuetotUserAss);

        return view('panel.problemas-pesquisar', compact('issues', 'devices','assessments','idIssuetotUserAss'));        
    }

    public function filterProblemsByUser(Request $request){

        $filter = '';
        if($request->searchBy == 0){
            $filter = ''; 
        }
        elseif($request->searchBy == 1){
            $filter = ' and p.problem =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 2){            
            $filter = ' and d.device =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 3){            
            $filter = ' and i.appTitle =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 4){            
            $filter = ' and pa.pattern =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 5){            
            $filter = ' and (select count(issueId) from tbAssessment a where a.issueId =i.id) = 0 ';            
        }
        elseif($request->searchBy == 6){            
            $filter = ' and (select count(issueId) from tbAssessment a where a.issueId =i.id) > 0 ';            
        }


        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.issueId =i.id) totalAvaliacoes
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id
        where i.userId=' . auth()->user()->id . ' and i.deleted=0 '. $filter .' order by i.id desc';
       
        $issuesPag = DB::select($sql);

        $issues = $this->paginate($issuesPag, 1);
        
        $devices = Device::all();        
        $assessments = Assessment::all();        

        return view('panel.problemas-por-usuario', compact('issues', 'devices','assessments'));        
    }


    public function problemsEvaluated(){                 
        $sql = 'SELECT i.id, i.idDevice, d.device,i.appTitle,i.creationDate, pro.problem,pa.pattern,
        SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", 
        SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no",         
        count(i.id) "total"
        from tbAssessment a 
        inner join tbIssue i 
        on a.issueId = i.id 
        inner join tbDevice d 
        on i.idDevice = d.idDevice
        inner join tbProblem pro
        on i.problemId = pro.id
        inner join tbPattern pa
        on i.patternId = pa.id         
        where i.deleted=0 and
        a.deleted=0 
        group by a.issueId 
        order by count(i.id) desc';        
        
        $issues = DB::select($sql);   
       
        return $issues;
    }



    public function indexAvaliacoesView(){                 
        $sql = 'SELECT i.id, i.idDevice, d.device,i.appTitle,i.creationDate, pro.problem problem1,pa.pattern,
        SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", 
        SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no",
        SUM(case when(a.problem=2)THEN 1 ELSE 0 END) AS "noSure",
        count(i.id) "total"
        from tbAssessment a 
        inner join tbIssue i 
        on a.issueId = i.id 
        inner join tbDevice d 
        on i.idDevice = d.idDevice
        inner join tbProblem pro
        on i.problemId = pro.id
        inner join tbPattern pa
        on i.patternId = pa.id         
        where i.deleted=0 and
        a.deleted=0 
        group by a.issueId 
        order by count(i.id) desc';        
        
        $issuesPag = DB::select($sql);   

        $issues = $this->paginate($issuesPag, 10);
       
        return view('panel.problemas-avaliados', compact('issues'));
    }

    public function indexViewDashboard(){         
        
        //inserir título e guia de acessibilidade
        $sql = 'SELECT i.id, p.problem problemTit, d.device,i.problemId, 
        SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", 
        SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no",         
        SUM(case when(a.problem=2)THEN 1 ELSE 0 END) AS "noSure",
        count(i.problemId) "total"
        from tbAssessment a 
        inner join tbIssue i 
        on a.issueId = i.id 
        inner join tbProblem p
        on p.id = i.problemId 
        inner join tbDevice d 
        on i.idDevice = d.idDevice         
        where i.deleted=0 and
        a.deleted=0 
        group by i.problemId
        order by count(i.id) desc
        limit 10';        
        
        $issues = DB::select($sql);
        
        //i.title i.pattern
        $sqlApp = 'SELECT i.id, i.idDevice,i.problemId, d.device,i.appTitle, 
        SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", 
        SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no",         
        count(i.appTitle) "total"
        from tbAssessment a 
        inner join tbIssue i 
        on a.issueId = i.id
        
        inner join tbDevice d 
        on i.idDevice = d.idDevice         
        where i.deleted=0 and
        a.deleted=0 
        group by i.appTitle
        order by count(i.appTitle) desc
        limit 10';        
        
        $issuesApp = DB::select($sqlApp);

        $sql3 = 'SELECT sl.severity,a.severityId,count(a.severityId) total FROM tbAssessment a
        inner join tbSeverityLevel sl 
        on sl.id = a.severityId
        inner join tbIssue i
        on i.id = a.issueId
        where i.deleted = 0        
        group by a.severityId order by a.severityId desc';

        $severityLevelGroup = DB::select($sql3);

        $sqlGrafPie = "SELECT sl.severity,a.severityId,count(a.severityId) total,sl.severityColor FROM tbAssessment a
        inner join tbSeverityLevel sl 
        on sl.id = a.severityId
        inner join tbIssue i
        on i.id = a.issueId
        where i.deleted = 0      
        group by a.severityId order by a.severityId desc";

        $pieChart = DB::select($sqlGrafPie);

        $sqlChartPattern = "select i.patternId,p.pattern,count(i.patternId) total from tbIssue i
        inner join tbPattern p on
        i.patternId = p.id
        where i.deleted=0
        group by i.patternId";

        $patternChart = DB::select($sqlChartPattern);

       
        return view('panel.dashboard', compact('issues','issuesApp','severityLevelGroup','pieChart','patternChart'));
    }

    

    public function queryFilter(Request $request){       

        $filter = '';
        if($request->searchBy == 0){
            $filter = ''; 
        }
        elseif($request->searchBy == 1){                      
            $filter = ' and pro.problem =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 2){            
            $filter = ' and d.device =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 3){            
            $filter = ' and i.appTitle =' . "'$request->searchField'";            
        }
        elseif($request->searchBy == 4){            
            $filter = ' and pa.pattern =' . "'$request->searchField'";            
        }
        
        $sql = 'SELECT pro.problem problem1,i.id, i.creationDate, i.idDevice, d.device,i.appTitle,pa.pattern, 
        SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", 
        SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", 
        SUM(case when(a.problem=2)THEN 1 ELSE 0 END) AS "noSure",        
        count(i.id) "total"
        from tbAssessment a 
        inner join tbIssue i 
        on a.issueId = i.id
        inner join tbProblem pro
        on pro.id = i.problemId 
        inner join tbPattern pa
        on pa.id = i.patternId 
        inner join tbDevice d 
        on i.idDevice = d.idDevice         
        where i.deleted=0 and a.deleted=0 ' .
        $filter .
        ' group by a.issueId order by count(i.id) desc';
        
        $issuesPag = DB::select($sql);   

        $issues = $this->paginate($issuesPag, 10);
       
        return view('panel.problemas-avaliados', compact('issues'));
    }

    public function indexView2(){
        $issues = DB::table('tbIssue')
                    ->join('tbProblem','tbIssue.problemId','=','tbProblem.id')
                    ->where('tbProblem.deleted', '=', 0)
                    ->select('tbIssue.*','tbProblem.id','tbProblem.problem','tbProblem.description')
                    ->get();

        $devices = Device::where('deleted','=',0)->get();  
        $patterns = Pattern::where('deleted','=',0)->orderBy('pattern')->get(); 
        $problems = Problem::where('deleted','=',0)->orderBy('problem')->get();    
        return view('panel.problemas-adicionar', compact('issues', 'devices','patterns','problems'));        
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

        //colocar i.title (problem)
        $sql = 'SELECT i.id, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';
        $sql .= 'SUM(case when(a.problem=2)THEN 1 ELSE 0 END) AS "noSure", ';                
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbAssessment a ';
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
        $sql = "select *, pro.problem,pro.description,pat.pattern from tbIssue i 
        inner join tbDevice d        
        on i.idDevice = d.idDevice                
        inner join tbProblem pro
        on i.problemId = pro.id
        inner join tbPattern pat
        on i.patternId = pat.id
        where i.deleted=0 and i.id=$idIssue";
       
        $issues = DB::select($sql);

        //$assessments = Assessment::where('issueId','=',$idIssue)->get();

        $assessments = DB::table('tbAssessment')
            ->join('tbSeverityLevel', 'tbAssessment.severityId', '=', 'tbSeverityLevel.id')            
            ->select('tbAssessment.*', 'tbSeverityLevel.severity', 'tbSeverityLevel.description','tbSeverityLevel.severityColor')
            ->where('tbAssessment.issueId','=',$idIssue)
            ->get();


            //colocar i.title
        $sql = 'SELECT i.id, i.idDevice, d.device,a.severityId, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';
        $sql .= 'SUM(case when(a.problem=2)THEN 1 ELSE 0 END) AS "noSure", ';        
        $sql .= 'count(i.id) "total" ';
        $sql .= 'from tbAssessment a ';
        $sql .= 'inner join tbIssue i ';
        $sql .= 'on a.issueId = i.id ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where a.issueId = ' . $idIssue;
        $sql .= ' and i.deleted=0 ';
        $sql .= ' group by a.issueId';

        $total = DB::select($sql);

        $severityLevel = SeverityLevel::where('deleted','=',0)->get();

        //$sqlVote = "select * from tbAssessment where issueId= $idIssue and userId= ". auth()->user()->id;
        //$totalVotes = DB::select($sqlVote);

        //return view('panel.problema-detalhado', compact('issues','assessments','total','totalVotes'));        
        return view('panel.problema-detalhado', compact('issues','assessments','total','severityLevel'));        
    }

    public static function totalVotesUser($idIssue){
        $assessment = new Assessment();
        $totalVotes =  $assessment::where('issueId','=',$idIssue)->where('userId','=',auth()->user()->id)->count();

        return $totalVotes;
    }

    public function countIssue(){
        $issue = new Issue();
        
        return response()->json([
            'count'=> $issue::where('deleted','=',0)->count(),
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
        //fazer API ainda hj
        $issue = new Issue();

        $issue -> problemId = $request->problemId;

        if($issue -> problemId == -1){
            $problem = new Problem();
            $problem -> problem = $request->title;
            $problem -> description = $request -> description;
            $problem -> deleted = 0;
            $problem -> userId = auth()->user()->id;
            $problem -> created_at = date('Y-m-d H:i:s');
            $problem -> updated_at = date('Y-m-d H:i:s');
            $problem -> save();
            
            //pegar último id
            $lastId = Problem::where('id', $problem->id)->orderBy('created_at', 'desc')->first();
            $issue -> problemId = $lastId->id;            
        }                
        
        $issue -> creationDate = date('Y-m-d H:i:s');
        $issue -> deleted = 0;
        $issue -> appFieldId = $request->field_id_app;
        $issue -> appFieldName = $request->field_name_app;
        
        $image = $request->file('printScreen');

        if($image ==null){
            $path = "";
        }else{
            $path = $image->store('imagesonline','public');
        }
     
        $issue -> printScreen = $path;        
        $issue -> patternId = $request->pattern_id;
        $issue -> patternVersion = $request->pattern_version;
        $issue -> patternVersionDetailts = $request-> pattern_details;
        $issue -> idDevice = $request-> device_id;
        $issue -> devideModel = $request-> device_model;        
        $issue -> version = $request-> device_version;
        $issue -> appTitle = $request-> title_app;
        $issue -> linkApp = $request-> link_app;   
        $issue -> toolUsed = $request->tool_used;        
        $issue -> tool_problem = $request-> tool_problem;
        $issue -> tool_problem_version = $request-> tool_problem_version;
        $issue -> flow_identify_problem = $request-> flow_identify_problem;
        $issue -> assistive_technology_tool = $request-> assistive_technology_tool;
        $issue -> tool_assistive = $request-> tool_assistive;
        $issue -> developerNote = $request -> developer_note;
        $issue -> tool_assistive_version = $request-> tool_assistive_version;        
        $issue -> origin = "API";
        $issue -> userId = auth()->user()->id;  
        $issue -> created_at = date('Y-m-d H:i:s');
        $issue -> updated_at = date('Y-m-d H:i:s');

        $issue ->save();

        return response()->json([
            'message'=> 'problem successfully added',
            'code'=>200]);

    }


    public function storeView(ProblemFormRequest $request)
    {
        $issue = new Issue();

        $issue -> problemId = $request->problemId;

        if($issue -> problemId == -1){
            $problem = new Problem();
            $problem -> problem = $request->title;

            $exists = Problem::where('problem','=',$request->title)->first();            

            if($exists!=null){
                //dd($exists);
                $issue->problemId = $exists->id;
            }
            else{
                $problem -> description = $request -> description;
                $problem -> deleted = 0;
                $problem -> userId = auth()->user()->id;
                $problem -> created_at = date('Y-m-d H:i:s');
                $problem -> updated_at = date('Y-m-d H:i:s');
                $problem -> save();
                
                //pegar último id
                $lastId = Problem::where('id', $problem->id)->orderBy('created_at', 'desc')->first();
                $issue -> problemId = $lastId->id;
            }
        }                
        
        $issue -> creationDate = date('Y-m-d H:i:s');
        $issue -> deleted = 0;
        $issue -> appFieldId = $request->appFieldId;
        $issue -> appFieldName = $request->appFieldName;
        
        $image = $request->file('printScreen');

        if($image ==null){
            $path = "";
        }else{
            $path = $image->store('imagesonline','public');
        }
     
        $issue -> printScreen = $path;        
        $issue -> patternId = $request->patternId;
        $issue -> patternVersion = $request-> patternVersion;
        $issue -> patternVersionDetailts = $request-> patternVersionDetailts;
        $issue -> idDevice = $request-> idDevice;
        $issue -> devideModel = $request-> devideModel;        
        $issue -> version = $request-> version;
        $issue -> appTitle = $request-> appTitle;
        $issue -> linkApp = $request-> linkApp;   
        $issue -> toolUsed = $request->toolUsed;        
        $issue -> tool_problem = $request-> tool_problem;
        $issue -> tool_problem_version = $request-> tool_problem_version;
        $issue -> flow_identify_problem = $request-> flow_identify_problem;
        $issue -> assistive_technology_tool = $request-> assistive_technology_tool;
        $issue -> tool_assistive = $request-> tool_assistive;
        $issue -> tool_assistive_version = $request-> tool_assistive_version;  
        $issue -> developerNote = $request -> developerNote;      
        $issue -> origin = "web";
        $issue -> userId = auth()->user()->id;  
        $issue -> created_at = date('Y-m-d H:i:s');
        $issue -> updated_at = date('Y-m-d H:i:s');

        $issue ->save();

        return redirect('/problemas')->with('mensagem', 'Problema adicionado com sucesso!');
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
        $issue = Issue::where('id','=',$id)->first();
        
        $severityLevel = SeverityLevel::where('deleted','=',0)->get();

        $devices = Device::where('deleted','=',0)->get();

        $problems = Problem::where('deleted','=',0)->get();

        $patterns = Pattern::where('deleted','=',0)->get();
        
        return view('panel.edit.problemas-editar',compact('issue','severityLevel','devices','problems','patterns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProblemFormRequest $request, $id)
    {

        $issue = Issue::where('id', '=', $id)->first();

        $issue -> problemId = $request->problemId;

        if($issue -> problemId == -1){
            $problem = new Problem();
            $problem -> problem = $request->title;
            $problem -> description = $request -> description;
            $problem -> deleted = 0;
            $problem -> userId = auth()->user()->id;
            $problem -> created_at = date('Y-m-d H:i:s');
            $problem -> updated_at = date('Y-m-d H:i:s');
            $problem -> save();
            
            //pegar último id
            $lastId = Problem::where('id', $problem->id)->orderBy('created_at', 'desc')->first();
            $issue -> problemId = $lastId->id;            
        }

        //
        $hasImage = $request->fileContent;
        $image = $request->file('printScreen');
        $path = "";       

        if($hasImage==null){
            if($image ==null){
                $path = "";
            }else{
                $path = $image->store('imagesonline','public');
            }
        }
        else if($hasImage!=null && $image ==null){
            $path = $request->fileContent;
        } 
        else if($hasImage!=null && $image !=null){
            $path = $image->store('imagesonline','public');
        }            
     
        $issue->printScreen=$path;


        $issue->developerNote = $request->developerNote;

        $issue->fill(
            array(
                'problemId' => $issue -> problemId,
                'printScreen' => $issue->printScreen,
                'appFieldId' => $request->appFieldId,
                'appFieldName' => $request -> appFieldName,                        
                'patternId' => $request->patternId,
                'patternVersion' => $request->patternVersion,
                'patternVersionDetailts' => $request->patternVersionDetailts,
                'idDevice' => $request->idDevice,
                'devideModel' => $request->devideModel,
                'version' => $request->version,
                'appTitle' => $request->appTitle,
                
                'linkApp' => $request -> linkApp,
                'toolUsed' => $request -> toolUsed,
                'tool_problem' => $request -> tool_problem,
                'tool_problem_version' => $request -> tool_problem_version,
                'flow_identify_problem' => $request -> flow_identify_problem,
                'assistive_technology_tool' => $request -> assistive_technology_tool,
                'tool_assistive'=> $request-> tool_assistive,
                'tool_assistive_version' => $request->tool_assistive_version,                
                'updated_at' => date('Y-m-d H:i:s')
            )
        )->save();

        
        return redirect('/problemas-por-usuario')->with('mensagem', 'Problema alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Issue::where('id', $id)->update(['deleted' => 1]);
        return response()->json([
            'message'=> 'problem successfully removed',
            'code'=>200]);

    }

    public function destroyView($idIssue)
    {
        Issue::where('id', $idIssue)->update(['deleted' => 1]);        
        return redirect('/problemas')->with('mensagemExclusao', 'Problema removido com sucesso!'); 
    }

       
    public function download()
    {               
        $sql = 'select              
                i.id,
                i.created_at,
                i.deleted,
                i.problemId,
                pro.problem,
                pro.description,
                i.appTitle,
                i.appFieldId,
                i.appFieldName,
                i.printScreen,
                i.idDevice,
                d.device,
                i.patternId,
                pat.pattern,
                i.patternVersion,
                i.patternVersionDetailts,
                i.devideModel,
                i.version,
                i.linkApp,
                i.origin,
                i.userId,
                i.toolUsed,
                i.tool_problem,
                i.tool_problem_version,
                i.flow_identify_problem,
                i.assistive_technology_tool,
                i.tool_assistive,
                i.tool_assistive_version,
                i.updated_at    
            from tbIssue i 
            inner join tbDevice d        
            on i.idDevice = d.idDevice                
            inner join tbProblem pro
            on i.problemId = pro.id
            inner join tbPattern pat
            on i.patternId = pat.id
            where i.deleted=0
            order by i.id desc';

        $queryJson = DB::select($sql);

        // Nome do arquivo CSV
        $filename = 'problemas.csv';

        // Cabeçalho do arquivo
        
        $headers = [
            'Content-Type' => 'text/csv;charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];        

        //Cabeçalho
        
        
        $file = fopen('php://output', 'w');

        fclose($file);

        // Gera o arquivo CSV
        $callback = function () use ($queryJson) {
            
        $file = fopen('php://output', 'w');

        //Cabeçalho
        $col1 = "ID";
        $col2 = "Data";
        $col3 = mb_convert_encoding("Excluido","ISO-8859-1");
        $col4 = "ID do Problema";
        $col5 = "Problema";
        $col6 = mb_convert_encoding("Descrição","ISO-8859-1");
        $col7 = "Aplicativo";
        $col8 = "Id Campo do Aplicativo";
        $col9 = "Nome do campo do aplicativo";
        $col10 = "URL Arquivo";
        $col11 = "ID Dispositivo";
        $col12 = "Dispositivo";
        $col13 = "ID do Guia de Acessibilidade";
        $col14 = "Guia de Acessibilidade";
        $col15 = mb_convert_encoding("Versão do guia de Acessibilidade","ISO-8859-1");
        $col16 = "Detalhes do Guia de Acessibilidade";
        $col17 = "Modelo do Dispositivo";
        $col18 = mb_convert_encoding("Versão do Dispositivo","ISO-8859-1");
        $col19 = "Link do Aplicativo";
        $col20 = "Origem";
        //$col21 = "userId";
        $col22 = "Usou ferramenta?";
        $col23 = "Qual ferramenta?";
        $col24 = mb_convert_encoding("Versão da ferramenta","ISO-8859-1");
        $col25 = mb_convert_encoding("Fluxo na identificação do problema","ISO-8859-1");
        $col26 = "Utilizou ferramenta de tecnologia assistiva?";
        $col27 = "Qual ferramenta de tecnologia assisitiva";
        $col28 = mb_convert_encoding("Versão da ferramenta de tecnologia assistiva","ISO-8859-1");
        //$col29 = "updated_at";
        $escreve = fwrite($file, "$col1;$col2;$col3;$col4;$col5;$col6;$col7;$col8;$col9;$col10;$col11;$col12;$col13;$col14;$col15;$col16;$col17;$col18;$col19;$col20;$col22;$col23;$col24;$col25;$col26;$col27;$col28");
        
            foreach($queryJson as $d) {
                $data1 = $d->id;
                $data2 = $d->created_at;
                $data3 = $d->deleted;
                $data4 = $d->problemId;
                $data5 = mb_convert_encoding($d->problem,"ISO-8859-1");
                $data6 = mb_convert_encoding($d->description,"ISO-8859-1");
                $data7 = mb_convert_encoding($d->appTitle,"ISO-8859-1");
                $data8 = $d->appFieldId;
                $data9 = mb_convert_encoding($d->appFieldName,"ISO-8859-1");
                $data10 = url('/') . '/storage/' . $d->printScreen;
                $data11 = $d->idDevice;
                $data12 = mb_convert_encoding($d->device,"ISO-8859-1");
                $data13 = $d->patternId;
                $data14 = mb_convert_encoding($d->pattern,"ISO-8859-1");
                $data15 = mb_convert_encoding($d->patternVersion,"ISO-8859-1");
                $data16 = mb_convert_encoding($d->patternVersionDetailts,"ISO-8859-1");
                $data17 = mb_convert_encoding($d->devideModel,"ISO-8859-1");
                $data18 = mb_convert_encoding($d->version,"ISO-8859-1");
                $data19 = $d->linkApp;
                $data20 = mb_convert_encoding($d->origin,"ISO-8859-1");
                //$data21 = $d->userId;
                $data22 = $d->toolUsed;
                $data23 = mb_convert_encoding($d->tool_problem,"ISO-8859-1");
                $data24 = mb_convert_encoding($d->tool_problem_version,"ISO-8859-1");
                $data25 = mb_convert_encoding($d->flow_identify_problem,"ISO-8859-1");
                $data26 = mb_convert_encoding($d->assistive_technology_tool,"ISO-8859-1");
                $data27 = mb_convert_encoding($d->tool_assistive,"ISO-8859-1");
                $data28 = mb_convert_encoding($d->tool_assistive_version,"ISO-8859-1");
                //$data29 = $d->updated_at;            
                $escreve = fwrite($file, "\n$data1;$data2;$data3;$data4;$data5;$data6;$data7;$data8;$data9;$data10;$data11;$data12;$data13;$data14;$data15;$data16;$data17;$data18;$data19;$data20;$data22;$data23;$data24;$data25;$data26;$data27;$data28");
            }
            fclose($file);
        };

        // Retorna o arquivo CSV para download
        return Response::stream($callback, 200, $headers);
    }

}