<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use CouchbaseCluster;
use Illuminate\Http\Request;

use App\Http\Requests;

use CouchbaseViewQuery;
use DB;
use Mockery\CountValidator\Exception;

class PollController extends Controller
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
        $query = CouchbaseViewQuery::from('poll', 'poll');
        $pollsData = $this->bucket->query($query)->rows;
        if (count($pollsData) > 0) {
            return view('polls.index', compact('pollsData'));
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
        return view('polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = (string)round(microtime(true) * 1000);
        $myTime = Carbon::now();
        $created_at = $myTime->toDateTimeString();

        $question = $request->input('Question');
        $noOfOptions = $request->input('noOfOptions');
        $options = array();
        for ($i = 1; $i <= $noOfOptions; $i++) {
            array_push($options, $request->input('Option' . $i));
        }
        $status = $request->input('Status');
        $tags = $request->input('Tags');
        $tags_new = explode(",", $tags);

        $optionsNew = array();

        foreach ($options as $option) {
            $singelOption = array("Id" => $id . "::" . $option, "Name" => $option, "user" => array());
            array_push($optionsNew, $singelOption);
        }

        if ($file = $request->file('ImageName')) {
            $member_image = $file->getClientOriginalName();
            $file->move('pollImages', $member_image);
        } else {
            $member_image = "";
        }
        $this->bucket->insert("poll::" . $id, ['Id' => $id, "comments" => array(), 'created_at' => $created_at, 'options' => $optionsNew,
            'question' => $question, "status" => $status, "tags" => $tags_new,'imageName' => $member_image]);
        return redirect("polls/create");
    }

    public function deleteComment(Request $request){
        $id = $request->input('id');
        $commentId = $request->input('commentId');
        $editPoll = $this->bucket->get("poll::" . $id)->value;
        if (!(is_object($editPoll))){
            $editPoll = json_decode($editPoll);
        }
        $comments = $editPoll->comments;
        $i = 0;
        foreach ($comments as $comment){
            if (strcmp($commentId,$comment->Id ) == 0) {
                unset($comments[$i]);
            }
            $i++;
        }
        $array = array_values($comments);
        $options = $editPoll->options;
        $created_at = $editPoll->created_at;
        $question = $editPoll->question;
        $status = $editPoll->status;
        $tags_new = $editPoll->tags;

        $this->bucket->replace("poll::" . $id, ['Id' => $id, "comments" => $array, 'created_at' => $created_at, 'options' => $options,
            'question' => $question, "status" => $status, "tags" => $tags_new]);
        return redirect("polls/".$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $poll = $this->bucket->get("poll::" . $id)->value;
        if (is_object($poll))
            return view('polls.show', compact('poll'));
        else {
            $poll = json_decode($poll);
            return view('polls.show', compact('poll'));
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
        $editPoll = $this->bucket->get("poll::" . $id)->value;
        if (is_object($editPoll))
            return view('polls.edit', compact('editPoll'));
        else {
            $editPoll = json_decode($editPoll);
            return view('polls.edit', compact('editPoll'));
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
        $id = $request->input('Id');
        $editPoll = $this->bucket->get("poll::" . $id)->value;
        if (!(is_object($editPoll))){
            $editPoll = json_decode($editPoll);
        }
        $created_at = $request->input('CreatedAt');
        $question = $request->input('Question');
        $status = $request->input('Status');
        $tags = $request->input('Tags');
        $tags_new = explode(",", $tags);

        $comment = $editPoll->comments;
        $options = $editPoll->options;

        if ($file = $request->file('ImageName')) {
            unlink("imgs/".$request->input('PreviousImage'));
            $member_image = $file->getClientOriginalName();
            $file->move('imgs', $member_image);
        } else {
            $member_image = $request->input('PreviousImage');
        }

        $this->bucket->replace("poll::" . $id, ['Id' => $id, "comments" => $comment, 'created_at' => $created_at, 'options' => $options,
            'question' => $question, "status" => $status, "tags" => $tags_new,'ImageName' => $member_image]);
        return redirect("polls");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if (!empty($request->input('ProfileImage')))
            unlink("pollImages/".$request->input('ProfileImage'));
        $this->bucket->remove("poll::" . $id);
        return redirect('polls');
    }
}