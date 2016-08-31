<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use CouchbaseCluster; 
use CouchbaseViewQuery;
use Illuminate\Support\Facades\Input;


class actsController extends Controller
{


    public $con;
    public $bucket;

    public function __construct(){
        $this->con = \DB::connection('couchbase');
        $this->bucket = $this->con->openBucket("default");
    }
    
    public function index()
    {
        $query = CouchbaseViewQuery::from('act', 'acts');
        $actsdata = $this->bucket->query($query)->rows;
        if ( count($actsdata) > 0){
            return view('acts.index' , compact('actsdata'));
        }else {
            return "Errror :: Data not found in the database";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('acts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date_of_governer_assent = $request->input('DateofGovernersAssent');
        $title = $request->input('Title');
        $id = $request->input('Id');
        $act_number = $request->input('ActNo');
        $date_of_passing = $request->input('DateOfPassing');
        $subject  = $request->input('Subject');

        if ($file =  $request->file('get_pdf')){
            $get_pdf_act = $title.".pdf";
            $file->move('actspdf',$get_pdf_act);
        }

        $this->bucket->insert("acts::".$id , ['DateofGovernersAssent'=>$date_of_governer_assent,'Title' => $title ,'Id' => $id, 'ActNo' =>  $act_number, 'DateofPassing' =>  $date_of_passing, 'Subject' =>   $subject,'get_pdf' => $get_pdf_act]);

        return redirect('acts/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $act = $this->bucket->get("acts::" . $id)->value;
       return view("acts.show", compact('act'));
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
         $edit_act = $this->bucket->get("acts::" . $id)->value;
         return view("acts.edit", compact('edit_act'));

    }
    public function update(Request $request, $id)
    {
        //

        $date_of_governer_assent = $request->input('DateofGovernersAssent');
        $title = $request->input('Title');
        $id = $request->input('Id');
        $act_number = $request->input('ActNo');
        $date_of_passing = $request->input('DateofPassing');
        $subject  = $request->input('Subject');

        if ($file =  $request->file('get_pdf')){
            $get_pdf_act = $title.".pdf";
            $file->move('actspdf',$get_pdf_act);
        }

        $this->bucket->replace("acts::".$id , ['DateofGovernersAssent'=>$date_of_governer_assent,'Title' => $title ,'Id' => $id, 'ActNo' =>  $act_number, 'DateofPassing' =>  $date_of_passing, 'Subject' =>   $subject,'get_pdf' => $get_pdf_act]);
        return redirect('acts');
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
        
        $this->bucket->remove("act::".$id);
        return  redirect('acts');
    }
}
