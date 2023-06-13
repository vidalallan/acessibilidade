<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeverityLevel;
use App\Http\Requests\SeverityLevelFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class SeverityLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sl = SeverityLevel::where('deleted','=',0)->get();        
        return $sl;
    }

    public function indexView()
    {
        $sl = SeverityLevel::where('deleted','=',0)->get();        
        return view('panel.nivel-gravidade')->with('sl',$sl);
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
        $sl = new SeverityLevel();
        $sl->severity = $request->severity;
        $sl->description = $request->description;
        $sl->severityColor = $request->severityColor;        
        $sl->deleted = 0;
        $sl->userId = auth()->user()->id;
        $sl->created_at = gmdate('Y-m-d H:i:s');
        $sl->updated_at = gmdate('Y-m-d H:i:s');

        $sl->save();

        return response()->json([
            'message'=> 'severity level created successfully',
            'code'=>200]);
    }

    public function storeView(SeverityLevelFormRequest $request){

        $sl = new SeverityLevel();
        $sl->severity = $request->severity;
        $sl->description = $request->description;
        $sl->severityColor = $request->severityColor;        
        $sl->deleted = 0;
        $sl->userId = auth()->user()->id;
        $sl->created_at = gmdate('Y-m-d H:i:s');
        $sl->updated_at = gmdate('Y-m-d H:i:s');

        $sl->save();

        return redirect('/niveis-gravidade')->with('mensagem', 'Nível de gravidade adicionado com sucesso!');
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
        $sl = SeverityLevel::where('id','=',$id)->first();        
        return view('panel.edit.nivel-gravidade-editar',compact('sl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeverityLevelFormRequest $request, $id)
    {
        SeverityLevel::where('id','=',$request->id)->update($request->except(['_token', '_method']));
        return redirect('/niveis-gravidade')->with('mensagem', 'Nível de gravidade alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {     
        SeverityLevel::where('id', $id)->update(['deleted' => 1]);        
        return redirect('/niveis-gravidade')->with('mensagemExclusao', 'Nível de gravidade removido com sucesso!');     
    }

    public function destroyView($id)
    {     
        SeverityLevel::where('id', $id)->update(['deleted' => 1]);        
        return redirect('/niveis-gravidade')->with('mensagemExclusao', 'Nível de gravidade removido com sucesso!');     
    }

    public function listProblemByLevelSeverityApi(){

        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.deleted=0 and a.issueId =i.id) totalAvaliacoes,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=1 and a.issueId =i.id) totalNenhum,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=2 and a.issueId =i.id) totalBaixo,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=3 and a.issueId =i.id) totalMedio,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=4 and a.issueId =i.id) totalAlto,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=5 and a.issueId =i.id) totalMuitoAlto,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=6 and a.issueId =i.id) totalCritico
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id
        where i.deleted=0 and (select count(issueId) from tbAssessment a where a.deleted=0 and a.issueId =i.id) > 0 order by i.id desc';

        $listProSevLev = DB::select($sql);
       
        return $listProSevLev;
    }


    public function listProblemByLevelSeverity(){

        $sql = 'select i.id,i.creationDate,p.problem,d.device,i.appTitle,pa.pattern,
		(select count(issueId) from tbAssessment a where a.deleted=0 and a.issueId =i.id) totalAvaliacoes,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=1 and a.issueId =i.id) totalNenhum,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=2 and a.issueId =i.id) totalBaixo,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=3 and a.issueId =i.id) totalMedio,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=4 and a.issueId =i.id) totalAlto,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=5 and a.issueId =i.id) totalMuitoAlto,
        (select count(severityId) from tbAssessment a where a.deleted=0 and a.severityId=6 and a.issueId =i.id) totalCritico
		from tbIssue i 
        inner join tbDevice d
        on i.idDevice = d.idDevice
        inner join tbProblem p
        on i.problemId = p.id
        inner join tbPattern pa
        on i.patternId = pa.id
        where i.deleted=0 and (select count(issueId) from tbAssessment a where a.deleted=0 and a.issueId =i.id) > 0 order by i.id desc';

        $listProSevLevPag = DB::select($sql);


        $listProSevLev = $this->paginate($listProSevLevPag, 10);


        $severityLevel = SeverityLevel::where('deleted','=',0)->orderBy('id','desc')->get(); 

        return view('panel.relatNivelGrav', compact('listProSevLev','severityLevel'));
    }


    public function listSeverityLevelGroupBy(){
        $sql = 'SELECT sl.severity,a.severityId,count(a.severityId) total FROM tbassessment a
        left join tbSeverityLevel sl 
        on sl.id = a.severityId
        group by severityId';

        $severityLevelGroup = DB::select($sql);

        return view('panel.relatNivelGrav', compact('severityLevelGroup'));
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

}