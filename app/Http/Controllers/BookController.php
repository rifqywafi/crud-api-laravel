<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Model::select('id','judul','penulis','penerbit','deskripsi','tahun_terbit')->get();
        //
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
    public function store(Request $request, Book $book)
    {
        $book = Book::create([
            'judul' => $request -> judul,
            'penerbit' => $request -> penerbit,
            'penulis' => $request -> penulis,
            'deskripsi' => $request -> deskripsi,
            'tahun_terbit' => $request -> tahun_terbit
        ]);
        try{
            return response()->json([
            'message' => 'Input Berhasil !']);
        }catch(\Exception $e){
        \Log::error($e->getMessage());
            return response()->json([
            'message' => 'Input Gagal !']);
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json([
            'book'=>$book
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'judul' => $request -> judul,
            'penerbit' => $request -> penerbit,
            'penulis' => $request -> penulis,
            'deskripsi' => $request -> deskripsi,
            'tahun_terbit' => Carbon::parse($request->tahun_terbit)
        ]);

        try{
            $buku->fill($request->post())->update();
            return response()->json([
                'message'=>'Buku Sukses Di Update!!'
            ]);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Update Buku Gagal!!'
            ],500);
        
        //
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return response()->json([
                'message'=>'Buku Berhasil Dihapus!!'
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Buku Gagal Diupdate!!'
            ]);
        }
        //
    }
}

