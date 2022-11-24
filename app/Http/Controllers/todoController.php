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
        return view('dashboard', ['todos' => auth()->user()->todo()->get()]);
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
            'description' => 'nullable|string'
        ]);

        $data['user_id']=auth()->id();
        if($request->completed == "on"){
            $data['completed'] = 1;
        }

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
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'nullable',
        ]);

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
    public function update(Request $request){
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $updateTodo = Todo::find($request->id);
        $updateTodo->update(['title' => $request->title, 'description' => $request->description]);

        if($request->completed == "on"){
            $updateTodo->update(['completed' => 1]);
        }
        return redirect('/dashboard')->with('success', "TODO updated successfully!");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }

    public function search(Request $request)
    {
        $output="";                                    
        $todos=Todo::where('title', 'Like', '%'.$request->search. '%')->get();          
        foreach($todos as $todo) { 
            if($todo->completed){
                $output.=
                '<tr>
                    <td style="text-decoration:line-through">
                        <s><strong>'.$todo->title.'</strong></s> </br>
                        <s><small>'.$todo->description.'</small></s>
                    </td>
                    <td>
                        <a href="'.$todo->id.'/edit" class="btn btn-sm btn-success">Bearbeiten</a>
                        </td>

                        <td>
                        <form action="/'.$todo->id.'" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger"> Löschen </button>
                        </form>
                    </td>
                </tr>';
            }
         else {
                $output.=
                '<tr>
                    <td>
                        <strong>'.$todo->title.'</strong> </br>
                        <small>'.$todo->description.'</small>
                    </td> 
                    <td>
                        <a href="'.$todo->id.'/edit" class="btn btn-sm btn-success">Bearbeiten</a>
                        </td>

                        <td>
                        <form action="/'.$todo->id.'" method="POST">
                            '.csrf_field().'
                            '.method_field('DELETE').'
                            <button type="submit" class="btn btn-sm btn-danger"> Löschen </button>
                        </form>
                    </td>
                </tr>';
              }

        return response($output);
        }
    }


}
