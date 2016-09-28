<?php

namespace App\Http\Controllers;

use CouchbaseViewQuery;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
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
        $query = CouchbaseViewQuery::from('user', 'user');
        $userData = $this->bucket->query($query)->rows;
        if (count($userData) > 0) {
            return view('user.index', compact('userData'));
        } else {
            return "Errror :: Data not found in the database";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleUser = $this->bucket->get("user::" . $id)->value;
        if (is_object($singleUser))
            return view('user.show', compact('singleUser'));
        else {
            $singleUser = json_decode($singleUser);
            return view('user.show', compact('singleUser'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blockedUser = $this->bucket->get("blocklist::user")->value;
        if (!(is_object($blockedUser)))
            $blockedUser = json_decode($blockedUser);
        $new = array();
        $new = $blockedUser->users;
        if (!(in_array($id,$new))) {
            array_push($new, $id);
            $this->bucket->replace("blocklist::user", ['users' => $new]);
            return redirect('/user');
        }else{
            echo "This User is already in Block List";
        }
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bucket->remove("user::" . $id);
        return redirect('user');
    }
}