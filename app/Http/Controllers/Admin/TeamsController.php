<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TeamsController extends Controller
{
    //


    public function index()
    {
        $user_id = Auth::id();
        $teams = Team::all()->where('owner_id' ,$user_id);
//        dd($articles);
        return view('admin.teams.index', compact('teams'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        $team = New Team();
        $team->name = $request->name;
        $team->owner_id = $user_id;
        $team->save();
        return redirect(route('teams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit',[
            'team' => $team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->name = $request->name;
        $team->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->back();
    }


    public function members(Team $team, $id){
//        $users = DB::table('teams_users')->where('team_id',$id)->get();
        $users = DB::table('teams_users')
            ->leftJoin('users', 'users.id', '=', 'teams_users.user_id')
            ->where('team_id' , $id)->orderBy('users.id','ASC')
            ->get();
//        dd($users);
//        $members = User::all('id')->whereIn('id',[$users->user_id]);
////        dd($user);
//        dd($members);
//        $members = DB::table('users')->select('all')->where(['id',])->get();
//        dd($members);
        return view('admin.teams.members',[
            'users'=>$users , 'id'=>$id
        ]);
    }
    public function addmember($id){
    //        $u = DB::table('users')->get() ;
    //        dd($u);
//        $users = DB::table('teams_users')
//            ->leftJoin('users')
//            ->leftJoin('users', 'users.id', '=', 'teams_users.user_id')
//            ->where('team_id' ,'!=', $id)->orderBy('users.id','ASC')
//            ->get();
//        dd($id);
//        $team_users = DB::table('teams_users')->select('user_id')->where('teams_users.team_id','=',$id)->get()->values();
//
//        dd($team_users);
//        $users = DB::table('teams_users')
//            ->leftJoin('users','teams_users.user_id' ,'!=','users.id')
//            ->whereIn('users.id' , $gg)
//            ->get();
//        dd($users);
//        dd($users);
        $users = User::all();
//        dd($users);
        return view('admin.teams.addmember',[
            'users'=>$users ,'team_id'=>$id
        ]);
    }
    public function storemember($id ,$user_id)
    {

        $data=array('team_id'=>$id,"user_id"=>$user_id);
        DB::table('teams_users')->insert($data);
//        dd($this->$team_id);

//        $team = New Team();
//        $team->name = $request->name;
//        $team->owner_id = $user_id;
//        $team->save();
        return redirect(route('teams.addmember',$id));
    }
}
