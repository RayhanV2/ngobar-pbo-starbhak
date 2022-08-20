<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index() 
    {
        //get posts
        $menu = Menu::latest()->paginate(5);

        //return collection of posts as a resource
        return new MenuResource(true, 'List Data Menu', $menu);
    }

    public function store(Request $request){
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_menu'     => 'required',
            'harga_menu'   => 'required',
            'jenis'     => 'required',
            'stock'   => 'required',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

         //upload image
         $image = $request->file('foto');
         $image->storeAs('public/foto', $image->hashName());

         //create Menu
        $menu = Menu::create([
            'nama_menu'     => $request->nama_menu,
            'harga_menu'   => $request->harga_menu,
            'jenis'     => $request->jenis,
            'stock'     => $request->stock,
            'foto'     => $image->hashName(),
        ]);

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Ditambahkan!', $menu);
    }

    public function show(Menu $menu)
    {
        //return single post as a resource
        return new MenuResource(true, 'Data Menu Ditemukan!', $menu);
    }

    public function update(Request $request, Menu $menu)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_menu'     => 'required',
            'harga_menu'   => 'required',
            'jenis'     => 'required',
            'stock'   => 'required',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('foto')) {

            //upload image
            $image = $request->file('foto');
            $image->storeAs('public/Menu', $image->hashName());

            //delete old image
            Storage::delete('public/Menu/'.$menu->image);

            //update post with new image
            $menu->update([
                'nama_menu'     => $request->nama_menu,
                'harga_menu'   => $request->harga_menu,
                'jenis'     => $request->jenis,
                'stock'     => $request->stock,
                'foto'     => $image->hashName(),
            ]);

        } else {

            //update post without image
            $menu->update([
                'nama_menu'     => $request->nama_menu,
                'harga_menu'   => $request->harga_menu,
                'jenis'     => $request->jenis,
                'stock'     => $request->stock,
            ]);
        }

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Diubah!', $menu);
    }

    public function destroy(Menu $menu)
    {
        //delete image
        Storage::delete('public/Menu/'.$menu->image);

        //delete post
        $menu->delete();

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Dihapus!', null);
    }
}
