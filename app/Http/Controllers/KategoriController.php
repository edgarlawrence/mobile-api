<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $data = KategoriModel::all();
         return $data->toJson();
     }

     public function store(Request $req) {
             $user = KategoriModel::create($req->all());
             return response()->json([
                 'value'  => $user,
                 'status' => 'success',
                 'message' => 'Post Added Successfully !!'
             ]);

             // return response()->toJson();
             // return json_encode($user);

     }

     public function update(Request $req, $id) {
         $product = KategoriModel::find($id);
         $product->update($req->all());

         return $product->toJson();

     }
     /**
     * @param int $id
     * @return
     */
     public function destroy($id) {
         return KategoriModel::destroy($id);
     }

     public function search($nama_kategori) {
         return KategoriModel::where('nama_kategori', 'like', '%'.$nama_kategori.'%')->get();
     }
}
