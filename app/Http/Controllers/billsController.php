<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use CouchbaseCluster;
use CouchbaseViewQuery;

class billsController extends Controller
{
    public $con;
    public $bucket;

    public function __construct()
    {
        $this->con = \DB::connection('couchbase');
        $this->bucket = $this->con->openBucket("default");
    }


    public function index()
    {

        $query = CouchbaseViewQuery::from('bill', 'bills');
        $billsdata = $this->bucket->query($query)->rows;
        if (count($billsdata) > 0) {
            return view('bills.index', compact('billsdata'));
        } else {
            return "Errror :: Data not found in the database";
        }

    }

    public function create()
    {
        return view('bills.create');
    }

    public function store(Request $request)
    {

        $status = $request->input('Status');
        $mover = $request->input('Mover');
        $date_introduced = $request->input('DateIntroduced');
        $id = $request->input('Id');
        $title = $request->input('Title');
        if ($file = $request->file('get_pdf')) {
            $get_pdf_act = $title . ".pdf";
            $file->move('billspdf', $get_pdf_act);
        }

        $this->bucket->insert("bills::" . $id, ['Status' => $status, 'Mover' => $mover, 'DateIntroduced' => $date_introduced, 'Id' => $id, 'Title' => $title,'get_pdf' => $get_pdf_act]);

        return redirect('bills/create');


    }

    public function show($id)
    {
        $single_bill = $this->bucket->get("bills::" . $id)->value;
        return view("bills.show", compact('single_bill'));


    }

    public function edit($id)
    {
        $edit_bills = $this->bucket->get("bills::" . $id)->value;
        return view("bills.edit", compact('edit_bills'));
    }

    public function update(Request $request, $id)
    {

        $status = $request->input('Status');
        $mover = $request->input('Mover');
        $date_introduced = $request->input('DateIntroduced');
        $id = $request->input('Id');
        $title = $request->input('Title');

        if ($file =  $request->file('get_pdf')){
            $get_pdf_act = $title.".pdf";
            $file->move('billspdf',$get_pdf_act);
        }


        $this->bucket->replace("bills::" . $id, ['Status' => $status, 'Mover' => $mover, 'DateIntroduced' => $date_introduced, 'Id' => $id, 'Title' => $title,'get_pdf' => $get_pdf_act]);

        return redirect('bills');

    }

    public function destroy($id)
    {
        $this->bucket->remove("bills::" . $id);
        return redirect('bills');
    }
}
