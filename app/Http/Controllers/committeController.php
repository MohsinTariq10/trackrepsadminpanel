<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use CouchbaseCluster;
use CouchbaseViewQuery;


class committeController extends Controller
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
        $query = CouchbaseViewQuery::from('com', 'committee');
        $committedata = $this->bucket->query($query)->rows;
        if (count($committedata) > 0) {
            return view('committe.index', compact('committedata'));
        } else {
            return "Errror :: Data not found in the database";
        }
    }


    public function create()
    {
        $query = CouchbaseViewQuery::from('mem', 'members');
        $memberData = $this->bucket->query($query)->rows;
        $memberIds = [];
        if (count($memberData) > 0) {
            $i = 0;
            foreach ($memberData as $data) {
                $memberIds[$i] = $data->value->Id;
                $i++;
            }
        }
        return view('committe.create', compact('memberIds'));
    }

    public function store(Request $request)
    {
        $committe_name = $request->input('Name');
        $committe_type = $request->input('CommitteeType');
        $committe_chairman = $request->input('Chairman');
        $committe_members = $request->input('Member');
        $committe_id = $request->input('Id');

        $chairmanId_new = explode(",", $committe_chairman);
        $memberId_new = explode(",", $committe_members);

        $member = [];
        $chairman = [];

        $i = 0;
        foreach ($chairmanId_new as $chairmanId) {
            $single_chairman = $this->bucket->get($chairmanId)->value;
            $chairman[$i] = $single_chairman->Name;
            $i++;
        }
        $i = 0;

        foreach ($memberId_new as $memberId) {
            $single_member = $this->bucket->get($memberId)->value;
            $member[$i] = $single_member->Name;
            $i++;
        }
        $this->bucket->insert("committee::" . $committe_id, ['Name' => $committe_name, 'CommitteeType' => $committe_type,
            'ChairmanId' => $chairmanId_new, 'Chairman' => $chairman, 'MemberId' => $memberId_new, 'Member' => $member,
            'Id' => $committe_id]);

        return redirect('committe/create');
    }

    public function show($id)
    {
        $single_committe = $this->bucket->get("committee::" . $id)->value;
        if (!(is_object($single_committe)))
            $single_committe = json_decode($single_committe);
        return view("committe.show", compact('single_committe'));
    }

    public function edit($id)
    {
        $query = CouchbaseViewQuery::from('mem', 'members');
        $memberData = $this->bucket->query($query)->rows;
        $memberIds = [];
        if (count($memberData) > 0) {
            $i = 0;
            foreach ($memberData as $data) {
                $memberIds[$i] = $data->value->Id;
                $i++;
            }
        }
        $edit_committe = $this->bucket->get("committee::".$id)->value;
        if (!(is_object($edit_committe)))
            $edit_committe = json_decode($edit_committe);
        return view("committe.edit", compact('edit_committe','memberIds'));
    }

    public function update(Request $request)
    {
        $committe_name = $request->input('Name');
        $committe_type = $request->input('CommitteeType');
        $committe_chairman = $request->input('Chairman');
        $committe_members = $request->input('Member');
        $committe_id = $request->input('Id');

        $chairmanId_new = explode(",", $committe_chairman);
        $memberId_new = explode(",", $committe_members);

        $member = [];
        $chairman = [];
        $i = 0;

        foreach ($chairmanId_new as $chairmanId) {
            $single_chairman = $this->bucket->get($chairmanId)->value;
            $chairman[$i] = $single_chairman->Name;
            $i++;
        }
        $i = 0;

        foreach ($memberId_new as $memberId) {
            $single_member = $this->bucket->get($memberId)->value;
            $member[$i] = $single_member->Name;
            $i++;
        }
        $this->bucket->replace("committee::" . $committe_id, ['Name' => $committe_name, 'CommitteeType' => $committe_type,
            'ChairmanId' => $chairmanId_new, 'Chairman' => $chairman, 'MemberId' => $memberId_new, 'Member' => $member,
            'Id' => $committe_id]);
        return redirect('committe');
    }

    public function destroy($id)
    {
        $this->bucket->remove("committe::" . $id);
        return redirect('committe');
    }
}