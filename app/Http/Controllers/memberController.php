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

    public function __construct()
    {
        $this->con = \DB::connection('couchbase');
        $this->bucket = $this->con->openBucket("default");
    }

    public function index()
    {
        $query = CouchbaseViewQuery::from('mem', 'members');
        $memberdata = $this->bucket->query($query)->rows;
        if (count($memberdata) > 0) {
            return view('member.index', compact('memberdata'));
        } else {
            return "Errror :: Data not found in the database";
        }
    }

    public function create()
    {
        $query = CouchbaseViewQuery::from('com', 'committee');
        $committedata = $this->bucket->query($query)->rows;
        $committeeIds = [];
        if (count($committedata) > 0) {
            $i = 0;
            foreach ($committedata as $data) {
                $committeeIds[$i] = $data->value->Id;
                $i++;
            }
        }
        return view('member.create', compact('committeeIds'));
    }

    public function store(Request $request)
    {
        $id = $request->input('Id');
        $name = $request->input('Name');
        $father_name = $request->input('FatherName');
        $gender = $request->input('Gender');
        $district = $request->input('District');
        $email = $request->input('Email');
        $constituency = $request->input('Constituency');
        $seat_type = $request->input('SeatType');
        $profession = $request->input('Profession');
        $department = $request->input('Department');
        $cabinet_post = $request->input('CabinetPost');
        $party = $request->input('Party');
        $committees = $request->input('Committees');
        $committeeChairman = $request->input('CommitteeChairman');
        $date_of_birth = $request->input('DateOfBirth');
        $place_of_birth = $request->input('PlaceOfBirth');
        $religion = $request->input('Religion');
        $marital_status = $request->input('MaritalStatus');
        $education = $request->input('Education');
        $constituencyAddress = $request->input('ConstituencyAddress');
        $present_contact = $request->input('PresentContact');
        $permanent_contact = $request->input('PermanentContact');
        if ($file = $request->file('ImageName')) {
            $member_image = $name . "." . $file->getClientOriginalExtension();
            $file->move('imgs', $member_image);
        } else {
            $member_image = "";
        }
        $committees_new = explode(",", $committees);
        $committeeChairman_new = explode(",", $committeeChairman);
        $this->bucket->insert("member::" . $id, ['Name' => $name, 'FatherName' => $father_name, 'Constituency' => $constituency,
            'SeatType' => $seat_type, 'Profession' => $profession, 'Department' => $department, 'CabinetPost' => $cabinet_post,
            'district' => $district, 'Email' => $email, 'Party' => $party, 'DateOfBirth' => $date_of_birth,
            'CommitteeMember' => $committees_new, 'CommitteeChairman' => $committeeChairman_new, 'Religion' => $religion,
            'MartialStatus' => $marital_status, 'Gender' => $gender, 'Education' => $education, 'PlaceOfBirth' => $place_of_birth,
            'PresentContact' => $present_contact, 'PermenentContact' => $permanent_contact, 'ImageName' => $member_image,
            'Id' => $id, 'ConstituencyAddress' => $constituencyAddress]);
        return redirect('member/create');
    }

    public function show($id)
    {
        $single_member = $this->bucket->get("member::" . $id)->value;
        $committeeNames = [];
        $billsTitles = [];
        $committeeChairman = [];
        if (!empty($single_member->CommitteeMember)) {
            $i = 0;
            foreach ($single_member->CommitteeMember as $committee) {
                $committeeDetails = $this->bucket->get($committee)->value;
                $committeeNames[$i] = $committeeDetails->Name;
                $i++;
            }
        }
        if (!empty($single_member->Bills)) {
            $i = 0;
            foreach ($single_member->Bills as $bill) {
                $committeeDetails = $this->bucket->get($bill)->value;
                $billsTitles[$i] = $committeeDetails->Title;
                $i++;
            }
        }
        if (!empty($single_member->CommitteeChairman)) {
            $i = 0;
            foreach ($single_member->CommitteeChairman as $committeeId) {
                $committeeDetails = $this->bucket->get($committeeId)->value;
                $committeeChairman[$i] = $committeeDetails->Name;
                $i++;
            }
        }
        if (!(is_object($single_member)))
            $single_member = json_decode($single_member);
        return view('member.show', compact('single_member', 'committeeNames', 'billsTitles', 'committeeChairman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = CouchbaseViewQuery::from('com', 'committee');
        $committeeData = $this->bucket->query($query)->rows;
        $committeeIds = [];
        if (count($committeeData) > 0) {
            $i = 0;
            foreach ($committeeData as $data) {
                $committeeIds[$i] = $data->value->Id;
                $i++;
            }
        }
        $edit_member = $this->bucket->get("member::" . $id)->value;
        if (!(is_object($edit_member)))
            $edit_member = json_decode($edit_member);
        return view('member.edit', compact('edit_member', 'committeeIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('Id');
        $name = $request->input('Name');
        $father_name = $request->input('FatherName');
        $gender = $request->input('Gender');
        $district = $request->input('District');
        $email = $request->input('Email');
        $constituency = $request->input('Constituency');
        $seat_type = $request->input('SeatType');
        $profession = $request->input('Profession');
        $department = $request->input('Department');
        $cabinet_post = $request->input('CabinetPost');
        $party = $request->input('Party');
        $committees = $request->input('Committees');
        $committeeChairman = $request->input('CommitteeChairman');
        $date_of_birth = $request->input('DateOfBirth');
        $place_of_birth = $request->input('PlaceOfBirth');
        $religion = $request->input('Religion');
        $marital_status = $request->input('MaritalStatus');
        $education = $request->input('Education');
        $constituencyAddress = $request->input('ConstituencyAddress');
        $present_contact = $request->input('PresentContact');
        $permanent_contact = $request->input('PermanentContact');
        if ($file = $request->file('ImageName')) {
            unlink("imgs/".$request->input('PreviousImage'));
            $member_image =$name.".".$file->getClientOriginalExtension();
            $file->move('images', $member_image);
        } else {
            $member_image = $request->input('PreviousImage');
        }
        $committees_new = explode(",", $committees);
        $committeeChairman_new = explode(",", $committeeChairman);
        $this->bucket->replace("member::" . $id, ['Name' => $name, 'FatherName' => $father_name, 'Constituency' => $constituency,
            'SeatType' => $seat_type, 'Profession' => $profession, 'Department' => $department, 'CabinetPost' => $cabinet_post,
            'district' => $district, 'Email' => $email, 'Party' => $party, 'DateOfBirth' => $date_of_birth,
            'CommitteeMember' => $committees_new, 'CommitteeChairman' => $committeeChairman_new, 'Religion' => $religion,
            'MartialStatus' => $marital_status, 'Gender' => $gender, 'Education' => $education, 'PlaceOfBirth' => $place_of_birth,
            'PresentContact' => $present_contact, 'PermenentContact' => $permanent_contact, 'ImageName' => $member_image,
            'Id' => $id, 'ConstituencyAddress' => $constituencyAddress]);
        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $this->bucket->remove("member::" . $id);
        unlink("imgs/".$request->input('ProfileImage'));
        return redirect('member');
    }
}