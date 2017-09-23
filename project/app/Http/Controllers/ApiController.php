<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{

    public function storeData(Request $request,$key){

        try{

            $data=array_values($request->all());
            $fileName = $key.'.json';
            $data = json_encode($data);
            File::put(base_path('shared/json/'.$fileName),$data);
            return Response::json([
                'status'=> 'success',
                'data'=> [
                    $key => $data
                ]
            ], 200);

        }catch(\Exception $e){
            return Response::json([
                'status'=> 'fail',
            ], 500);
        }

    }

    public function getData(Request $request,$key){

        try{
            $fileName = $key.'.json';
            if(File::exists(base_path('shared/json/'.$fileName))){
                if (Cache::has($key)) {
                    $data=Cache::get($key);
                }else{
                    $data=File::get(base_path('shared/json/'.$fileName));
                    Cache::add($key, $data, '1');
                }
                return Response::json([
                    'status'=> 'success',
                    'data'=> [
                        $key => $data
                    ]
                ], 200);
            }else{
                return Response::json([
                    'status'=> 'fail',
                    'data'=>[]
                ], 404);
            }

        }catch (\Exception $e){
            return Response::json([
                'status'=> 'fail',
            ], 500);
        }


    }

    public function flushCache(){
        try{
            Cache::flush();
            return Response::json([
                'status'=> 'success',
                ]);
        }catch (\Exception $e){
            return Response::json([
                'status'=> 'fail',
            ]);
        }

    }
}
