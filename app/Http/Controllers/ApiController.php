<?php

namespace App\Http\Controllers;
use App\Models\ApiModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index() {
       $data = ApiModel::all();
        return $data->toJson();
    }

    public function store(Request $req) {
    //    $user = ApiModel::create([
    //         'nama_produk'   => request('nama_produk'),
    //         'kode_produk' => request('kode_produk')
    //     ]);


            $user = ApiModel::create($req->all());
            return response()->json([
                'value'  => $user,
                'status' => 'success',
                'message' => 'Post Added Successfully !!'
            ]);

            // return response()->toJson();
            // return json_encode($user);

    }

    public function update(Request $req, $id) {
        $product = ApiModel::find($id);
        $product->update($req->all());

        return $product->toJson();
    }
    /**
    * @param int $id
    * @return
    */
    public function destroy($id) {
        return ApiModel::destroy($id);
    }

    public function search($nama_produk) {
        return ApiModel::where('nama_produk', 'like', '%'.$nama_produk.'%')->get();
    }
}
