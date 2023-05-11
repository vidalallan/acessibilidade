<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pattern;

class PatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $patterns = Pattern::where('deleted','=',0)->get();
        return $patterns;
    }

    public function indexView(){        
        $patterns = $this->index();
        return view('panel.padrao', compact('patterns'));
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
        $pattern = new Pattern();        
        $pattern -> pattern = $request->pattern;
        $pattern -> description = $request->description;
        $pattern -> deleted = 0;
        $pattern -> userId = auth()->user()->id;
        $pattern -> created_at = gmdate('Y-m-d H:i:s');
        $pattern -> updated_at = gmdate('Y-m-d H:i:s');

        $pattern -> save();
        
        return response()->json([
            'message'=> 'Accessibility Guide created successfully',
            'code'=>200]
        );
    }

    public function storeView(Request $request)
    {
        $pattern = new Pattern();        
        $pattern -> pattern = $request->pattern;
        $pattern -> description = $request -> description;
        $pattern -> userId = auth()->user()->id;
        $pattern -> deleted = 0;
        $pattern -> created_at = date('Y-m-d H:i:s');
        $pattern -> updated_at = date('Y-m-d H:i:s');
        $pattern -> save();
        return redirect('/padroes');
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

    public function destroyView($idPattern)
    {
        Pattern::where('idPattern', $idPattern)->update(['deleted' => 1]);        
        return redirect('/padroes'); 
    }

    public static function  countPatternView(){
        $pattern = new Pattern();

        $total = $pattern::where('deleted','=',0)->count();
        
        return $total;               
    }
}
