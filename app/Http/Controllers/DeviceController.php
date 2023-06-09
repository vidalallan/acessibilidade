<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device;
use App\Http\Requests\DeviceFormRequest;

class DeviceController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::where('deleted','=',0)->get();
        return $devices;        
    }


    public function indexView(){
        $devices = $this->index();
        return view('panel.dispositivos')->with('devices',$devices);
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
    public function store(DeviceFormRequest $request)
    {
        $device = new Device();
        $device->device = $request->device;
        $device->deleted = 0; 
        $device ->save();
        
        return response()->json([
            'message'=> 'Device created successfully',
            'code'=>200]);
    }
            

    public function storeView(DeviceFormRequest $request){

        $device = new Device();
        $device->device = $request->device;
        $device->deleted = 0;
        $device ->save();

        return redirect('/dispositivos')->with('mensagem', 'Dispositivo adicionado com sucesso!');

    }

    public function countDevice(){
        $device = new Device();
        
        return response()->json([
            'count'=> $device::where('deleted','=',0)->count(),
            'code'=>200]);
    }

    public static function  countDeviceView(){
        $device = new Device();

        $total = $device::where('deleted','=',0)->count();
        
        return $total;               
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
    public function edit($idDevice)
    {
        $device = Device::where('idDevice','=',$idDevice)->first();
        //dd($devices);
        $devices = Device::where('deleted','=',0)->get();
        
        return view('panel.edit.dispositivos-editar',compact('device','devices'));
        
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
        Device::where('idDevice','=',$request->id)->update($request->except(['_token', '_method']));
        return redirect('/dispositivos')->with('mensagem', 'Dispositivo alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::where('idDevice',$id)->delete();
        
        return response()->json([
            'message'=> "Device removed",
            'code'=>200]);
    }

    public function destroyView($idDevice)
    {
        Device::where('idDevice', $idDevice)->update(['deleted' => 1]);        
        return redirect('/dispositivos')->with('mensagemExclusao', 'Dispositivo removido com sucesso!'); 
    }
}
