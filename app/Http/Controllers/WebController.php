<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Cliente;
use App\Empleado;
use App\Orden;
use App\TipoOrden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WebController extends Controller
{
    function login(Request $request){
        try{
            $user = Admin::where('usuario', 'ilike', $request->usuario)->first();

            if($user != null){
                if($user->password == $request->password){
                    return Response::json(["code"=>"201"]);
                }else{
                    return Response::json(["code"=>"404"]);
                }
            }else{
                $user =  Empleado::where('usuario', 'ilike', $request->usuario)->first();
                if($user != null){
                    if($user->password == $request->password){
                        return Response::json(["code"=>"202"]);
                    }else{
                        return Response::json(["code"=>"404"]);
                    }
                }else{
                    return Response::json(["code"=>"404"]);
                }
            }
        }catch (Exception $error){
            return Response::json(["code"=>500, "error"=>$error->getMessage()]);
        }
    }

    function altaCliente(Request $request){
        try{
            $cliente = new Cliente;

            $cliente->nombre = $request->nombre;
            $cliente->descripcion = $request->descripcion;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->email = $request->correo;

            $cliente->save();
            return Response::json(["code"=>"200"]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getClientes(){
        try{
            $clientes = Cliente::all();
            return Response::json(["code"=>"200",'clientes'=>$clientes]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getTipos(){
        try{
            $tipos = TipoOrden::all();
            return Response::json(["code"=>"200",'tipos'=>$tipos]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getCliente($id){
        try{
            $cliente = Cliente::where('id', '=', $id)->first();
            return Response::json($cliente);
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function editCliente(Request $request, $id){
        try{
            $cliente = Cliente::where('id', '=', $id)->first();
            $cliente->nombre = $request->nombre;
            $cliente->descripcion = $request->descripcion;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->email = $request->correo;

            $cliente->save();
            return Response::json(["code"=>"200"]);            
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function deleteCliente($id){
        try{
            Cliente::destroy($id);
        
            return Response::json(["code"=>"200"]);            
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function altaEmpleado(Request $request){
        try{
            $empleado = new Empleado;

            $empleado->nombre = $request->nombre;
            $empleado->usuario = $request->usuario;
            $empleado->password = $request->password;
            $empleado->idTipoEmpleado = $request->idtipo;

            $empleado->save();
            return Response::json(["code"=>"200"]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getEmpleados(){
        try{
            $empleados = Empleado::all();
            return Response::json(["code"=>"200",'empleados'=>$empleados]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getEmpleado($id){
        try{
            $empleado = Empleado::where('id', '=', $id)->first();
            return Response::json($empleado);
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function editEmpleado(Request $request, $id){
        try{
            
            $empleado = Empleado::where('id', '=', $id)->first();

            $empleado->nombre = $request->nombre;
            $empleado->usuario = $request->usuario;
            $empleado->password = $request->password;
            $empleado->idTipoEmpleado = $request->idtipo;

            $empleado->save();
            return Response::json(["code"=>"200"]);            
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function deleteEmpleado($id){
        try{
            Empleado::destroy($id);
        
            return Response::json(["code"=>"200"]);            
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function altaOrden(Request $request){
        try{
            $orden = new Orden;

            $orden->idCliente = $request->cliente;
            $orden->idTipoOrden = $request->tipo;
            $orden->idEmpleado = $request->empleado;
            $orden->fecha_programada = $request->fecha;
            $orden->hora_programada = $request->hora;
            $orden->descripcion = $request->desc;
            $orden->fotos = "";
            $orden->firma = "";

            $orden->save();
            return Response::json(["code"=>"200"]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getOrdenes(){
        try{
            $Ordens = Orden::all();
            return Response::json(["code"=>"200",'ordenes'=>$Ordens]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getOrden($id){
        try{
            $Orden = Orden::where('id', '=', $id)->first();
            return Response::json($Orden);
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function editOrden(Request $request, $id){
        try{

            $orden = Orden::where('id', '=', $id)->first();

            $orden->idCliente = $request->cliente;
            $orden->idTipoOrden = $request->tipo;
            $orden->idEmpleado = $request->empleado;
            $orden->fecha_programada = $request->fecha;
            $orden->hora_programada = $request->hora;
            $orden->descripcion = $request->desc;

            $orden->save();
            return Response::json(["code"=>"200"]);
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function deleteOrden($id){
        try{
            Orden::destroy($id);

            return Response::json(["code"=>"200"]);
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function getOrdenesEmpleado(){
        try{
            $Ordens = Orden::where('firma','like','')->get();
            return Response::json(["code"=>"200",'ordenes'=>$Ordens]);
        }catch (Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function checkOrden($id, Request $request){
        try{

            $orden = Orden::where('id', '=', $id)->first();
                $i = 0;
                $fotos = "";

                mkdir(public_path().'/img/S'.$id,0777,true);
            foreach($request->photos as $item) {
                $i++;
                $this->base64_to_jpeg($item, public_path()."/img/S" . $id . '/' . $i.'.jpg');
                $fotos = $fotos.$i.'.jpg,';
            }
            $orden->fotos = $fotos;
            $orden->firma = "true";
            $orden->save();
            return Response::json(["code"=>"200",'data'=>$request->photos]);
        }catch(Exception $e){
            return Response::json(["code"=>500, "error"=>$e->getMessage()]);
        }
    }

    function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' ); 
    
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
    
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );
    
        // clean up the file resource
        fclose( $ifp ); 
    
        return $output_file; 
    }
}
