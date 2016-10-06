<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use CouchbaseCluster;
use Illuminate\Http\Request;

use App\Http\Requests;

use CouchbaseViewQuery;
use DB;

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
        $created_at = $myTime->format('Y.m.d.h.i.s');

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
            $singelOption = array("Id" => $id . "::" . str_replace(' ', '', $option), "Name" => $option);
            array_push($optionsNew, $singelOption);
        }

        if ($file = $request->file('ImageName')) {
            $member_image = $file->getClientOriginalName();
            $file->move('pollImages', $member_image);
        } else {
            $member_image = "";
        }
        $this->bucket->insert("poll::" . $id, ['Id' => $id, 'created_at' => $created_at, 'options' => $optionsNew,
            'question' => $question, "status" => $status, "tags" => $tags_new, 'imageName' => $member_image]);
        $this->sendNotification($question,$id);
        return redirect("polls/create");
    }

    public function sendNotification($question,$id)
    {
        $ch = curl_init("https://fcm.googleapis.com/fcm/send");
        $header = array('Content-Type: application/json',
            "Authorization: key=AIzaSyBsM3Tvgzgg4b4eQVDrf3ks4M3iIm1J9KY");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"data\": {    \"title\": \"pollId_".$id."\",   
         \"text\": \"" . $question . " \"  },
          \"to\" : \"d_xFTUZorTQ:APA91bHs6NwZvMA-sNKEIL4xwGyRVHFPkP6eWgPrV7oMQQJHCgHjMEyV3rmB9JeMaYYWyQQL_IjPSAf6KQQiwzpDWcwyQV14tQ6VUpq8PXKMwluqYq-SD-OPLt2LmG3NPIY2OtR4NIdH\"}");

        $resultt = curl_exec($ch);
        echo $resultt . "<br><br><br>";
        curl_close($ch);
    }

    public function deleteComment(Request $request)
    {
        $id = $request->input('id');
        $commentId = $request->input('commentId');
        $this->bucket->remove("comment::" . $id . "::" . $commentId);
        return redirect("polls/" . $id);
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

        $query = CouchbaseViewQuery::from('comments', 'comments')->key($id);
        $comments = $this->bucket->query($query)->rows;

        if (!(is_object($poll)))
            $poll = json_decode($poll);

        $options = array();

        foreach ($poll->options as $option) {
            $querySecond = CouchbaseViewQuery::from('option', 'option')->keys(array(array($id, str_replace(' ', '', $option->Name))));
            $users = $this->bucket->query($querySecond)->rows;
            array_push($options, array($option->Name, count($users)));
        }
        return view('polls.show', compact('poll', 'comments', 'options'));
    }

    public function pollUser(Request $request)
    {
        $id = $request->id;
        if (isset($request->city)) {
            $city = $request->input('district');
            $poll = $this->bucket->get("poll::" . $id)->value;
            if (!(is_object($poll)))
                $poll = json_decode($poll);
            $options = array();
            foreach ($poll->options as $option) {
                $querySecond = CouchbaseViewQuery::from('option', 'option')->keys(array(array($id, str_replace(' ', '', $option->Name))));
                $users = $this->bucket->query($querySecond)->rows;
                $i = 0;
                foreach ($users as $user) {
                    $u = $this->bucket->get("user::" . $user->value->userId)->value;
                    if (!(is_object($u)))
                        $u = json_decode($u);
                    if (strcmp($u->city, $city) == 0)
                        $i++;
                }
                array_push($options, array($option->Name, $i));
            }
            return view('polls.pollgraph', compact('options', 'city'));
        } else if (isset($request->ageGroup)) {
            $startKey = $request->input('startAge');
            $endKey = $request->input('endAge');
//            echo $startKey."<br>".$endKey."<br>";
            $poll = $this->bucket->get("poll::" . $id)->value;
            if (!(is_object($poll)))
                $poll = json_decode($poll);
            $options = array();
            foreach ($poll->options as $option) {
                $querySecond = CouchbaseViewQuery::from('option', 'option')->keys(array(array($id, str_replace(' ', '', $option->Name))));
                $users = $this->bucket->query($querySecond)->rows;
                $i = 0;
                foreach ($users as $user) {
                    $u = $this->bucket->get("user::" . $user->value->userId)->value;
                    if (!(is_object($u)))
                        $u = json_decode($u);
  //                  echo $u->age."<br>";
                    if (!(empty($u->age)) && (int)$u->age >= (int)$startKey && (int)$u->age <= (int)$endKey) {
                        $i++;
  //                      echo "Inside <br>";
                    }
                }
                array_push($options, array($option->Name, $i));
            }
            return view('polls.pollgraph', compact('options', 'city'));
        } else {

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
        if (!(is_object($editPoll))) {
            $editPoll = json_decode($editPoll);
        }
        $created_at = $request->input('CreatedAt');
        $question = $request->input('Question');
        $status = $request->input('Status');
        $tags = $request->input('Tags');
        $tags_new = explode(",", $tags);
        $options = $editPoll->options;

        if ($file = $request->file('ImageName')) {
            unlink("imgs/" . $request->input('PreviousImage'));
            $member_image = $file->getClientOriginalName();
            $file->move('imgs', $member_image);
        } else {
            $member_image = $request->input('PreviousImage');
        }

        $this->bucket->replace("poll::" . $id, ['Id' => $id, 'created_at' => $created_at, 'options' => $options,
            'question' => $question, "status" => $status, "tags" => $tags_new, 'ImageName' => $member_image]);
        return redirect("polls");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!empty($request->input('ProfileImage'))) {
            try {
                unlink("pollImages/" . $request->input('ProfileImage'));
            } catch (\Exception $e) {

            }
        }
        $this->bucket->remove("poll::" . $id);
        return redirect('polls');
    }
}