<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\UserRepository;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate(5, []);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['avatar'] = 'default-avatar.jpg';//avatar
        $user = $this->user->create($data);
        // dd($user);
        
        if ($user) 
        {
            return redirect()->route('user.create')->with('success', trans('The user has been successfully creted'));
        }
        else
        {
            return redirect()->route('user.crete')->with('error', trans('The user has been created failed'));
        }
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
        $user = $this->user->find($id, []);

        return view('admin.user.edit', compact('user'));
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
        $data= $request->all();

        if ($this->user->update($id, $data))
        {
            return redirect()->route('user.edit', ['id' => $id])->with('success', trans('The user has been successfully edited'));
        }
        else
        {
            return redirect()->route('user.edit', ['id' => $id])->with('error', trans('The user has been edited failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        if ($request->ajax()) {
            if ($this->user->delete($id)) {
                return response(['status' => trans('messages.success')]);
            }
            return response(['status' => trans('messages.failed')]);
        }
    }
    public function search(Request $request)
    {
        if($request->ajax()){
            $users = $this->user->search($request->keyword);
            $views = view('admin.user.list_user', compact('users'))->render();
            return response(['users' => $views]);
        }
        
    }
}
