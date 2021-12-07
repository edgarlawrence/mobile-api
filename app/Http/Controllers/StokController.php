<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StokModel;

class StokController extends Controller
{
    public function index() {
        $data = StokModel::all();
         return $data->toJson();
     }

     public function store(Request $req) {
     //    $user = ApiModel::create([
     //         'nama_produk'   => request('nama_produk'),
     //         'kode_produk' => request('kode_produk')
     //     ]);

             $user = StokModel::create($req->all());
             return response()->json([
                 'value'  => $user,
                 'status' => 'success',
                 'message' => 'Post Added Successfully !!'
             ]);

             // return response()->toJson();
             // return json_encode($user);

     }

     public function update(Request $req, $id) {
         $product = StokModel::find($id);
         $product->update($req->all());

         return $product->toJson();

     }
     /**
     * @param int $id
     * @return
     */
     public function destroy($id) {
         return StokModel::destroy($id);
     }
}
