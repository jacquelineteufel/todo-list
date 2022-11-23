<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class todoController extends Controller
{

    /*public function construct()
        {
            $this->middleware('auth');
        }
        */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$todos = Todo::orderBy('completed')->get();
        $todos = DB::select('select * from todos');
        return view('dashboard')->with(['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.add');
    }

    public function upload(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required'
        ]);

        $data['user_id']=auth()->id();
        $data['completed']=0;

        Todo::create(
           $data
        );

        return redirect('/dashboard')->with('success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with(['id' => $id, 'todo' => $todo]);
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
        $request->validate([
            'title' => 'required',
            'description'=> 'required'
        ]);
        $updateTodo = Todo::find($request->id);
        $updateTodo->update(['title' => $request->title, 'discription' => $request->description, 'completed' => $request->completed]);
        return redirect('/dashboard')->with('success');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
