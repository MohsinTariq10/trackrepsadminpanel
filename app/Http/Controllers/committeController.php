<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use CouchbaseCluster; 
use CouchbaseViewQuery;



class committeController extends Controller{
    
    public $con;
    public $bucket;
    
    public function __construct(){
        $this->con = \DB::connection('couchbase');
        $this->bucket = $this->con->openBucket("default");
    }

    public function index()
    {
        $query = CouchbaseViewQuery::from('com', 'committee');
        $committedata = $this->bucket->query($query)->rows;

        if ( count($committedata) > 0){
            return view('committe.index' , compact('committedata'));
        }else {
            return "Errror :: Data not found in the database";
        }
    }


    public function create(){
        return view('committe.create');
    }

    public function store(Request $request)
    {
        $committe_name = $request->input('Name');
        $committe_type = $request->input('CommitteeType');
        $committe_chairman = $request->input('Chairman');
        $committe_members = $request->input('Member');
        $committe_id = $request->input('Id');

        $this->bucket->insert(
            "committee::".$committe_id , 
            ['Name'=>$committe_name,'CommitteeType' => $committe_type,'Chairman' =>             $committe_chairman, 'Member' => $committe_members,'Id' => $committe_id]);

        return redirect('committe/create');
    }

    public function show($id){
        $single_committe = $this->bucket->get("committee::" . $id)->value;
        return view("committe.show", compact('single_committe'));
    }

    public function edit($id){
        $edit_committe = $this->bucket->get("committee::" . $id)->value;
        return view("committe.edit", compact('edit_committe'));
    }

    public function update(Request $request, $id)
    {
        $committe_name = $request->input('Name');
        $committe_type = $request->input('CommitType');
        $committe_chairman = $request->input('Chairman');
        $committe_members = $request->input('Member');
        $committe_id = $request->input('Id');

        $this->bucket->replace("committe::".$committe_id , ['Name'=>$committe_name,'CommitteType' => $committe_type,'Chairman' => $committe_chairman, 'Member' => $committe_members,'Id' => $committe_id]);

        return redirect('committe');
    }

    public function destroy($id)
    {
        $this->bucket->remove("committe::".$id);
        return  redirect('committe');
    }
}
