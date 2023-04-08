<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $users = User::where('deleted','=',0)->get();
        return $users;
    }

    public function indexView()
    {
        $users = $this->index();
        return view('panel.usuarios')->with('users',$users);
    }


    public static function  countUserView(){
        $user = new User();

        $total = $user::where('deleted','=',0)->count();
        
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
     
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user ->save();
    }

    public function storeView(UserFormRequest $request)
    {
       

        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $data['deleted'] = 0;

        $user = User::create($data);

        Auth::login($user);

        return redirect('/dashboard')->with('mensagem', 'Usuário adicionado com sucesso!');;
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


    public function destroyView($id)
    {
        User::where('id', $id)->update(['deleted' => 1]);        
        return redirect('/usuarios')->with('mensagemExclusao', 'Usuário removido com sucesso!'); 
    }

}
