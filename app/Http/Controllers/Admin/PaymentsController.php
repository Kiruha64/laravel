<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $payments = DB::table('teams')
            ->leftJoin('payments','teams.id' ,'payments.team_id')
            ->where('teams.owner_id' , $user_id)
            ->get();
        return view('admin.payments.index',compact('payments'));
    }
    public function info($id){

        $payments_users = DB::table('payments_users')->where('payment_id', $id)->get();
        $payment = Payment::findOrFail($id);
        return view('admin.payments.info' ,compact('payments_users','payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($team_id)
    {
        $members = DB::table('teams_users')
            ->leftJoin('users', 'users.id', '=', 'teams_users.user_id')
            ->where('team_id' , $team_id)->orderBy('users.id','ASC')
            ->get();
        return view('admin.payments.create',compact('members','team_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$team_id)
    {
//        $data =  ['12321','12312'];
////        $data = $request->keyword;
//        $data = $request->input('data');
//        $id = request()->input('id');



//        $gg = response()->json(['result'=>$request->gg]);
//        dd($gg);

//        $a = $request->all();
//        $data = $request->sum;
//        if ($request->isMethod('post')){
//            dd($a,$data);
//
//        }
//        if ($request->isMethod('get')){
//            dd($a);
//        }

        return $data;
        dd((response()->json($data)));


//        $payment = new Payment();
//        $payment->sum = $request->sum;
//        $payment->team_id = $team_id;
//        $all = $request->all();
//        $keyword = $request->input('keyword');
//        dd($keyword);
//        dd($all);
//
////        $keyword = $this->request->getQuery('keyword');
//        $members =  response();
//
//
//        dd($members);
//
//        dd($payment->toArray());
//
//
//        $payment->save();

//        return redirect(route('teams.index'));
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
        //
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
        //
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
