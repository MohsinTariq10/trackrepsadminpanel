<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CouchbaseCluster;
use CouchbaseN1qlQuery;
use CouchbaseViewQuery;

class Member extends Model
{
   
    public function __construct(){
        
    }

    
//    protected $fillable = [
//            'name',
//            'father_name'
////            'constituency' ,
////            'seat_type',
////            'profession' ,
////            'deprtment' ,
////            'cabinet_post',
////            'party',
////            'date_of_birth',
////            'religon' ,
////            'marital_status',
////            'gender' ,
////            'education',
////            'present_contact',
////            'permanent_contact',
////            'member_image'
//    ];




    public static function create(array $attributes = array()){
      //die(print_r($attributes));
        $value = [
           'id' => intval($attributes['id']),
            'name' => $attributes['name'],
            'father_name' => $attributes['father_name'],
            'constituency' => $attributes['constituency'],
            'seat_type' => $attributes['seat_type'],
            'profession' => $attributes['profession'],
            'deprtment' => $attributes['department'],
            'cabinet_post' => $attributes['cabinet_post'],
            'party' => $attributes['party'],
            'date_of_birth' => $attributes['date_of_birth'],
            'religon' => $attributes['religon'],
            'marital_status' => $attributes['marital_status'],
            'gender' => $attributes['gender'],
            'education' => $attributes['education'],
            'present_contact' => $attributes['present_contact'],
            'permanent_contact' => $attributes['permanent_contact'],
            'member_image' => $attributes['member_image'],
        ];
        $key = 'mem::1';
       $val = \DB::connection('couchbase')->table("default")->key($key)->insert($value);
        
//        Member::$bucket->upsert("member1", array('name'=>'name','father_name'=>'father_name','constituency'=>'constituency','seat_type'=>'seat_type','profession'=>'profession','department'=>'department','cabinet_post'=>'cabinet_post','party'=>'party','date_of_birth'=>'date_of_birth','religon'=>'religon','marital_status'=>'marital_status','gender'=>'gender','education'=>'education','present_contact'=>'present_contact','permanent_contact'=>'permanent_contact','member_image'=>'member_image'));
        
    
        
//       return $val;
        
       // Member::$bucket->key("member::1")->upsert($value);
    }



    public static function all($columns = array()){
        
        set_time_limit(300);
        $cluster = new CouchbaseCluster("http://168.235.91.84:8091");
        $bucket = $cluster->openBucket("default");
       // return var_dump($bucket->get("member::pk-1"));
        
       $query = CouchbaseViewQuery::from('mem', 'members');
       $results = $bucket->query($query);
       return  $results->rows;
    }




    public static function one($id){
        set_time_limit(300);
        $cluster = new CouchbaseCluster("http://168.235.91.84:8091");
        $bucket = $cluster->openBucket("default");
        return ($bucket->get("member::".$id));
}
}
