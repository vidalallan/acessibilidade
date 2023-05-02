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
        $users = User::where('deleted','=',0)->orderBy('id','DESC')->get();
        return $users;
    }

    public function indexView()
    {
        $users = $this->index();
        return view('panel.usuarios')->with('users',$users);
    }

    public function showUserById(){
        $dataUser = User::where('id',auth()->user()->id)->first();
        //dd($dataUser);
        //return view('panel.usuario-mudar-senha')->with('dataUser',$dataUser);
        return view('panel.usuario-mudar-senha',compact('dataUser'));
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
        $user->created_at = date('Y-m-d');
        $user->updated_at = date('Y-m-d');
        $user->level = 'admin';

        $user ->save();
    }

    //quando cria um novo usuário
    public function storeView(UserFormRequest $request)
    {
        /*
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);
        $data['deleted'] = 0;        
        $data['created_at'] = date('Y-m-d');
        $data['updated_at'] = date('Y-m-d');
        $data['level'] = 'admin';        

        $user = User::create($data);
        */

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user -> password = Hash::make($request->password);
        $user -> deleted = 0;
        $user->created_at = date('Y-m-d');
        $user->updated_at = date('Y-m-d');
        $user->level = 'user';
        $user ->save();

        Auth::login($user);

       return redirect('/dashboard')->with('mensagem', 'Usuário adicionado com sucesso!');;
    }


     //quando cria um novo usuário pelo painel adm
     public function storeViewPanel(UserFormRequest $request)
     {
         /*
         $data = $request->except(['_token']);
         $data['password'] = Hash::make($data['password']);
         $data['deleted'] = 0;        
         $data['created_at'] = date('Y-m-d');
         $data['updated_at'] = date('Y-m-d');
         $data['level'] = 'admin';        
 
         $user = User::create($data);
         */
 
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user -> password = Hash::make($request->password);
         $user -> deleted = 0;
         $user->created_at = date('Y-m-d');
         $user->updated_at = date('Y-m-d');
         $user->level = $request->levelUser;
         $user ->save();      
 
        return redirect('usuarios')->with('mensagem', 'Usuário adicionado com sucesso!');;
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
        $user = User::where('id','=',$id)->first();        
        
        $users = User::where('deleted','=',0)->get();
        
        return view('panel.edit.usuarios-editar',compact('user','users'));
    }

    //quando um admin edita um usuário
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id','=',$request->id)->update($request->except(['_token', '_method','confirm_password']));
        return redirect('/usuarios')->with('mensagem', 'Usuário alterado com sucesso!');
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
    
    public function changePassById(Request $request, $id){

        $user = auth()->user(); // resgata o usuario       
        $user->password =  Hash::make($request->password);
        $user->save();

        return redirect('/alterar-senha')->with('mensagem', 'Senha alterada com sucesso!');       
    }

}