<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
    public function index(Request $request){
        $listUser= null;

        if($request->has('keyword') == true){
            $keyword = $request->get('keyword');
           $listUser = User::where('email','LIKE','%$keyword%')->get();

        }else{
            $listUser = User::all();
        }

        $listUser = User::all();
        $listUser->load('invoices');

        // So sánh giữa invoices và invoices()
        // $user->invoice->count();
        $user = $listUser->first();

        // dd($user->invoices()->count());
        // dd($user->invoices->count());

        return view('admin/users/index',[
            'users'=>$listUser,
        ]);
    }
    public function show(User $user){
        // $users = User::find($user);
        // dd($user);
        // dd('show');
        return view('admin/users/show',[
            'user'=>$user,
        ]);

    }
    public function create(){
        // nếu như gate k cho phép người dùng hiện tại thì quay về trang 403
        if (! Gate::allows('create-user' === false)) {
            abort(403);
        }
        return view('/admin/users/create');
    }
    public function store(StoreRequest $request){
        // dd($request);
        // dd(request()->except('_token'));
        $data = $request->except('_token');
        // $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        $result = User::create($data);
        if($request->ajax() == true){
            return response()->json([
                'status' => 200,
                'message' => 'Thêm mới thành công',
                // 'success'=>'Added new records.'

            ]);
            return redirect()->route('admin.users.index')->with('message','Thêm mới thành công');
        }
            // return response()->json([
            //     'status' => 200,
            //     'message' => 'Thêm mới thành công',
            //     // 'success'=>'Added new records.'

            // ]);
            // return redirect()->route('admin.users.index')->with('message','Thêm mới thành công');
        // if ($request->ajax()->passes()) {
		// 	return response()->json(['success'=>'Added new records.']);
        // }


    	// return response()->json(['error'=>$request->ajax()->errors()->all()]);

    }
    public function edit(User $user){
        // dd('edit');
        // $users = User::find($user);
        return view('admin/users/edit',[
            'user' =>$user
        ]);
    }

    public function update(UpdateRequest $request,User $user){
        // dd('update');

        // dd($_REQUEST);
        // $users = User::find($user);
        // dd($request('email'));
        $data = request()->except('_token');
        // $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        // cách 1
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = $data['password'];
        // $user->address = $data['address'];
        // $user->gender = $data['gender'];
        // $user->role = $data['name'];
        // cách 2 :
        // dd($data,$user);
        $user->update($data);

        return redirect()->route('admin.users.index')->with('message','Sửa thành công');

    }


    public function delete(User $user){
        // dd('delete');
        // $result = User::find($id);
        // dd($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('message','Xoá thành  công');
    }



}

