<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Reservoir;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct(){
        $this->middleware('superadmin')->only(['create','edit', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members=Member::all();
        $reservoirs=Reservoir::all();
        return view('index', [ 'members'=>$members, 'reservoirs'=> $reservoirs, 'order'=>'ASC']); 
    }

    public function indexOrder($field, $order, Request $request)
    {
            $members=Member::all();
            $reservoirs=Reservoir::all();
            
         if(isset($request->title)){                                      /*filtravimas*/
            $reservoirsQuery=Member::where('reservoir_id', $request->title);
        }else{
            $reservoirsQuery=Member::where('reservoir_id', '!=', 0);
        }
        
        if($order=='ASC'){                                    /*rikiavimas*/
            $reservoirsQuery=$reservoirsQuery->orderBy($field);
        }else{
            $reservoirsQuery=$reservoirsQuery->orderByDesc($field);
        }
        $members=$reservoirsQuery->get();
        
        if($order=='ASC')$order='DESC';
        else $order='ASC';
//         $members=Member::all();
//         $members=$members->sortBy($field);
        return view('index', [ 'members'=>$members,'reservoirs'=>$reservoirs, 'field'=>$field, 'order'=>$order]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members=Member::all();
        $reservoirs=Reservoir::all();
        return view('create', ['members'=>$members, 'reservoirs'=>$reservoirs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member=new Member();
        $member->fill($request->all());
        $member->save();
        
        return redirect()->route("members.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $members = Member::findOrFail($id);
        $reservoirs=Member::findOrFail($id)->reservoir;
        return view('profile', ['member'=>$id,  'members'=>$members, 'reservoirs'=>$reservoirs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('edit', ['member'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'experiency'=>'required',
            'registered'=>'required'
        ]);
        
        if($request->experiency < $request->registered ){
            return back()->withErrors(['registered'=>"Klaida, narystės metai didesni už patirtį"]);
        }
        
        $member->fill($request->all());
        $member->save();
        return redirect()->route("members.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        
        $member->delete();
        return redirect()->route("members.index");
    }
}
