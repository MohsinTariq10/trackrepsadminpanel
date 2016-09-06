<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use CouchbaseViewQuery;

class NewsFeedController extends Controller
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
        $query = CouchbaseViewQuery::from('newsfeed', 'newsfeedview');
        $newsFeed = $this->bucket->query($query)->rows;
        if (count($newsFeed) > 0) {
            return view('newsfeed.index', compact('newsFeed'));
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
        return view('newsfeed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = round(microtime(true) * 1000);
        $title = $request->input('title');
        $priority = $request->input('priority');
        $mytime = Carbon::now();
        $date = $mytime->toDateTimeString();
        $content = $request->input('content');
        $this->bucket->insert("newsfeed::" . $id, ['id'=> $id,'title' => $title, 'priority' => $priority, 'date' => $date, 'content' => $content]);
        return redirect('newsfeed/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsfeed = $this->bucket->get("newsfeed::".$id)->value;
        return view('newsfeed.show', compact('newsfeed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        echo $id;
        $newsfeed_single = $this->bucket->get("newsfeed::".$id)->value;
        return view('newsfeed.edit' , compact('newsfeed_single'));
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
        $title = $request->input('title');
        $priority = $request->input('priority');
        $date = $request->input('date');
        $content = $request->input('content');

        $this->bucket->replace("newsfeed::" . $id, ['id'=> $id,'title' => $title, 'priority' => $priority, 'date' => $date, 'content' => $content]);
        return redirect('newsfeed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bucket->remove("newsfeed::".$id);
        return  redirect('newsfeed');
    }
}