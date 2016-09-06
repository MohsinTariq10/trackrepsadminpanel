<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CouchbaseViewQuery;

use App\Http\Requests;

class AttendanceController extends Controller
{

    public $con;
    public $bucket;

    public function __construct()
    {
        $this->con = \DB::connection('couchbase');
        $this->bucket = $this->con->openBucket("default");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = CouchbaseViewQuery::from('attendance', 'attendanceview');
        $attendanceData = $this->bucket->query($query)->rows;
        if (count($attendanceData) > 0) {
            return view('attendance.index', compact('attendanceData'));
        } else {
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
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $total_present = $request->input('total_present');
        $total_absent = $request->input('total_absent');
        $session = $request->input('session');
        $total_days = $request->input('total_days');
        $this->bucket->insert("attendance::" . $id, ['Id'=> $id,'total_present' => $total_present, 'total_absent' => $total_absent, 'session' => $session, 'total_days' => $total_days ]);
        return redirect('attendance/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_attendance = $this->bucket->get("attendance::".$id)->value;
        return view('attendance.show', compact('single_attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_attendance = $this->bucket->get("attendance::".$id)->value;
        return view('attendance.edit' , compact('edit_attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->input('id');
        $total_present = $request->input('total_present');
        $total_absent = $request->input('total_absent');
        $session = $request->input('session');
        $total_days = $request->input('total_days');

        $this->bucket->replace("attendance::" . $id, ['id'=> $id,'total_present' => $total_present, 'total_absent' => $total_absent, 'session' => $session, 'total_days' => $total_days ]);
        return redirect('attendance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bucket->remove("attendance::".$id);
        return  redirect('attendance');
    }
}