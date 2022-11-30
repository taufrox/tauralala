<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\produk;
 
class ProdukController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $produk = produk::all();
       return $produk;
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
        $table = produk::create([
            "nama_barang" => $request->nama_barang,
            "jumlah_barang" => $request->jumlah_barang,
            "harga" => $request->harga
        ]);
  
        return response()->json([
            'succes' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ], 201);
    }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = produk::find($id);
        if ($produk) {
            return response()->json([
                'status' => 200,
                'data' => $produk
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . ' tidak ditemukan'
            ], 400);
        }
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
        $produk = produk::find($id);
        if($produk) {
            $produk->nama_barang = $request->nama_barang ? $request->nama_barang : $produk->nama_barang;
            $produk->jumlah_barang = $request->jumlah_barang ? $request->jumlah_barang : $produk->jumlah_barang;
            $produk->harga = $request->harga ? $request->harga : $produk->harga;
            $produk->save();
            return response()->json([
                'status' => 200,
                'data' => $produk
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
            ], 404);
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('id', $id)->first();
        if($produk){
            $produk->delete();
            return response()->json([
                'status' => 200,
                'data' => $produk
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . ' tidak ditemukan'
            ], 404);
        }
    }
 }