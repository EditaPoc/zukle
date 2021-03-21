<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Reservoir;
use Illuminate\Http\Request;

class ReservoirController extends Controller
{
    public function __construct(){
        $this->middleware('superadmin')->only(['create','edit', 'deleteReservoir']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservoirs=Reservoir::all();
        return view('res', [ 'reservoirs'=>$reservoirs]); 
    }
    
    public function indexOrder($field, Request $request)
    {
        $reservoirs=Reservoir::orderBy($field)->get();
//         $reservoirs=$reservoirs->sortBy($field);
        return view('res', [ 'reservoirs'=>$reservoirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $reservoirs=Reservoir::all();
        $members=Member::all();
        return view('res_create', [ 'reservoirs'=>$reservoirs, 'members'=>$members]);
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservoir=new Reservoir();
        $reservoir->fill($request->all());
        $reservoir->save();
        $member=new Member();
        $member->fill($request->find());
        $member->save();
        return redirect()->route("reservoirs.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function show(Reservoir $reservoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservoir $reservoir)
    {
        return view('res_edit', ['reservoir'=>$reservoir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservoir $reservoir)
    {
        $reservoir->fill($request->all());
        $reservoir->save();
        return redirect()->route("reservoirs.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservoir  $reservoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservoir $reservoir)
    {
        
    }
    public function deleteReservoir($reservoirId){
        $members=Member::where('reservoir_id', $reservoirId)->get();
        if ($members->count()!=0){
            return back()->withErrors(['trynimas'=>'Negalima ištrinti, nes yra priskirtas žvejys']);
        }else {
            Reservoir::destroy($reservoirId);
            
            return redirect()->back();
        }
       
    }
}
