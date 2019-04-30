<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\MediaRequest;

class AdminMediasController extends Controller
{
    public function index(){

        $photos = Photo::all();

        return view('admin.medias.index', compact('photos'));

    }

    public function create(){

        return view('admin.medias.create');

    }

    public function store(MediaRequest $request){

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['file'=>$name]);

        return redirect('/admin/medias')->with('success', 'The media has been saved.');

    }

    public function destroy($id){

        $photo = Photo::findOrFail($id)->delete();

        return redirect('/admin/medias')->with('warning', 'The media has been deleted.');

    }
}
