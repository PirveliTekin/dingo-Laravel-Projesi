<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Team;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'User List - Admin Panel';
        $users = User::all()->load('roles');
        $teams=Team::all();

        return view('admin.user.index', compact('title', 'users','teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'User Create - Admin Panel';
        $roles = Role::all();
        $teams = Team::all();
        return view('admin.user.create', compact('title', 'roles', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'current_team_id' => $request->current_team_id
            ]);
            if ($user) {
                $role = Role::find($request->role_id);
                $roleSave = $user->assignRole($role);
                if ($roleSave) {
                    $success = true;
                } else {
                    $success = false;
                }
            }
        } catch (\Exception $exception) {
            $success = false;

        }
        if ($success) {
            DB::commit();
            return redirect()->route('admin.users.index')->with(['success' => 'Kayıt Başarılı bir şekilde yapıldı.']);
        } else {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'HATA! Kayıt yapılamadı.']);
        }


    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'User Edit - Admin Panel';
        $roles = Role::all();
        $user=User::find($id)->load('roles');
        $userTeam=$user->current_team_id;
        $teams=Team::all();
        return view('admin.user.edit', compact('title', 'user', 'id','roles', 'teams','userTeam'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {

         $request->validated();
         DB::beginTransaction();
       try {
             $user = User::find($id);
             $user->name = $request->name;
             $user->email = $request->email;
             DB::table('model_has_roles')->where('model_id',$id)->delete();
             DB::table('users')->where('id',$id)->update(['current_team_id'  =>$request->current_team_id]);
             $user->assignRole($request->role_id);
             $save = $user->save();
             if ($save) $success = true; else $success = false;
         } catch (Exception $exception) {
             $success = false;
         }
         if ($success) {
             DB::commit();
             return redirect()->route('admin.users.index')->with(['success' => 'Güncelleme Başarılı bir şekilde yapıldı.']);
         } else {
             DB::rollBack();
             return redirect()->back()->with(['error' => 'HATA! Güncelleme yapılamadı.']);
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$delete=DB::table('users')->where('id',$id)->delete();
        $user=User::find($id);
        $delete= $user->delete();
        if ($delete) {
            DB::commit();
            return redirect()->back()->with(['success' => 'Başarıyla Silindi.']);
        } else {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'HATA! Silme Başarısız.']);
        }
    }
}
