<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::latest()->get();
        return response()->json([
            'status'  => true,
            'message' => 'Sukses Mengambil data siswa',
            'results' => $siswa
    ], 200);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'prodi'     => 'required',
        ]);

       try{

        $siswa = new Siswa;
        $siswa->firstname = $request->firstname;
        $siswa->lastname  = $request->lastname;
        $siswa->prodi     = $request->prodi;
        $siswa->save();

       } catch(\Exception $e){

        return response()->json([
                'status'  => false,
                'message' => 'Gagal Menambah data siswa'
        ], 500);

       }

       return response()->json([
                'status'  => false,
                'message' => 'Sukses Menambah data siswa'
        ], 200);
    }

    public function show($id)
    {
      
        $siswa = Siswa::findOrFail($id);

        return response()->json( [
                'status' => true,
                'message' => 'Success Fetch Data',
                'result' => $siswa
            ],
            200);

    }


    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $this->validate($request,[
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'prodi' => 'required'
        ]);

        try{

            $siswa->firstname = $request->firstname;
            $siswa->lastname = $request->lastname;
            $siswa->prodi =$request->prodi;

            $siswa->update();

        } catch (\Exception $e){
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Failed',
                    'error' => $e->getMessage()
                ],
                500
            ); 
        }

        return response()->json(
            [
                'status' => true,
                'message' => 'Success',
                'results' => $siswa
            ],
            200
        ); 
    }


    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        try{

            $siswa->delete($id);

        } catch(\Exception $e){
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Failed',
                    'error' => $e->getMessage()
                ],
                500
            ); 
        }

        return response()->json(
            [
                'status' => true,
                'message' => 'Success',
                'results' => $siswa
            ],
            200
        ); 
    }
}
