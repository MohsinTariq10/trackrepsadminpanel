<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use CouchbaseViewQuery;
use DB;


class memberController extends Controller
{

    
    public $con;
    public $bucket;
    public $member_image;

    public function __construct(){
        $this->con = \DB::connection('couchbase');
        $this->bucket = $this->con->openBucket("default");
    }

    public function index(){
        $query = CouchbaseViewQuery::from('mem', 'members');
        $memberdata = $this->bucket->query($query)->rows;

        if ( count($memberdata) > 0){
            return view('member.index' , compact('memberdata'));
        }else {
            return "Errror :: Data not found in the database";
        }
    }


    public function create(){
        return view('member.create');
    }


    public function store(Request $request){
        $name = $request->input('Name');
        $father_name = $request->input('FatherName');
        $constituency = $request->input('Constituency');
        $seat_type = $request->input('SeatType');
        $profession = $request->input('Profession');
        $department = $request->input('Department');
        $cabinet_post = $request->input('CabinetPost');
        $party = $request->input('Party');
        $date_of_birth = $request->input('DateOfBirth');
        $religon = $request->input('Religion');
        $marital_status = $request->input('MartialStatus');
        $gender = $request->input('Gender');
        $education = $request->input('Education');
        $present_contact = $request->input('PresentContact');
        $permanent_contact = $request->input('PermenentContact');
        $id = $request->input('Id');

        if ($file =  $request->file('ImageName')){

            $member_image = $file->getClientOriginalName();
            $file->move('images',$member_image);    
        }

        $this->bucket->insert("member::".$id , ['Name'=>$name,'FatherName' => $father_name,'Constituency' => $constituency, 'SeatType' => $seat_type , 'Profession' => $profession , 'Department' => $department , 'CabinetPost' => $cabinet_post, 'Party' => $party, 'DateOfBirth' => $date_of_birth, 'Religion' => $religon,'MartialStatus' => $marital_status,'Gender' => $gender,'Education' => $education,'PresentContact' => $present_contact,'PermenentContact' => $permanent_contact,'ImageName' => $member_image,'Id'=>$id]);

        return redirect('member/create');
    }

    public function show($id)
    {
        $single_member = $this->bucket->get("member::".$id)->value;
        return view('member.show', compact('single_member'));
        
//        return dd($single_member);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit_member = $this->bucket->get("member::".$id)->value;
        return view('member.edit' , compact('edit_member'));

//          var_dump($edit_member);
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


        $name = $request->input('Name');
        $father_name = $request->input('FatherName');
        $constituency = $request->input('Constituency');
        $seat_type = $request->input('SeatType');
        $profession = $request->input('Profession');
        $department = $request->input('Department');
        $cabinet_post = $request->input('CabinetPost');
        $party = $request->input('Party');
        $date_of_birth = $request->input('DateOfBirth');
        $religon = $request->input('Religion');
        $marital_status = $request->input('MartialStatus');
        $gender = $request->input('Gender');
        $education = $request->input('Education');
        $present_contact = $request->input('PresentContact');
        $permanent_contact = $request->input('PermenentContact');
        $id = $request->input('Id');
        //        $file =  $request->input('member_image');
        //        $member_image = $file->getClientOriginalName();


        if ($file =  $request->file('ImageName')){

            $member_image = $file->getClientOriginalName();
            $file->move('http://trackreps.org/imgs',$member_image);    
        }





        $this->bucket->replace("member::".$id , ['Name' => $name, 'FatherName' => $father_name, 'Constituency' => $constituency,'SeatType' => $seat_type ,'Profession' => $profession,'Department' =>$department,'CabinetPost' => $cabinet_post,'Party' => $party,'DateOfBirth' =>$date_of_birth,'Religion' => $religon,'MartialStatus' => $marital_status,'Gender' =>  $gender,'Education' => $education,'PresentContact' => $present_contact , 'PermenentContact' => $permanent_contact , 'ImageName' => $member_image, 'Id'=>$id]);

        return redirect('member');



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
        $this->bucket->remove("member::".$id);
        return  redirect('member');
    }
}
