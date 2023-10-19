<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListTaskRequest;
use App\Models\ListTask;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ListTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        if (auth()->user()->name != 'admin') {
            $items = ListTask::with(['user'])->where('user_id', Auth::user()->id)->where('user_id','LIKE','%' .$request->search.'%')->simplePaginate($pagination);
        }else {
            $items = ListTask::where('user_id','LIKE','%' .$request->search.'%')->simplePaginate($pagination);
        }

        return view('pages.admin.list-task.index',[
            'items' => $items 
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $task = ListTask::all();
        return view('pages.admin.list-task.create',[
            'task' => $task,
            'users'=> $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListTaskRequest $request)
    {
        $data = $request->all();
        $data['gambar_task'] = $request->file('gambar_task')->store(
            'assets/gallery', 'public'
        );

        ListTask::create($data);
        return redirect()->route('list-task.index');
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
        $item = ListTask::findOrFail($id);
        $user = User::all();

        return view('pages.admin.list-task.edit',[
            'item' => $item,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListTaskRequest $request, $id)
    {
        $data = $request->all();
        $item = ListTask::findOrFail($id);
        $data['gambar_task'] = $request->file('gambar_task')->store(
            'assets/gallery', 'public'
        );


        $item->update($data);

        return redirect()->route('list-task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ListTask::findOrFail($id);
        $item->delete();

        return redirect()->route('list-task.index');
    }

    public function selesai_task(Request $request, $id)
    {
        $items = DB::table('tasks')
            ->where('id',$id)
            ->update(['status' => 1]);

        return redirect()->route('list-task.index',[
            'items' => $items
        ]);
    }
}
