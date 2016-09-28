@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Act
            </h1>

        </div>
    </div>
    <form method="POST" action="{{url('acts' , $edit_act->Id)}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" class="form-control" name="PreviousTitle" value="{{$edit_act->Title}}"/>
        <div class="row">
            <div class="col-sm-12">
                <label>Date of Governer Assent</label>
                <input type="text" class="form-control" name="DateofGovernersAssent"
                       value="{{$edit_act->DateofGovernersAssent}}"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Title</label>
                <input type="text" class="form-control" name="Title" value="{{$edit_act->Title}}"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="Id" value="{{$edit_act->Id}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Act Number</label>
                    <input type="text" class="form-control" name="ActNo" value="{{$edit_act->ActNo}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Date of Passing</label>
                    <input type="text" class="form-control" name="DateofPassing" value="{{$edit_act->DateofPassing}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="Subject" value="{{$edit_act->Subject}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Upload PDF</label>
                    <input type="file" class="form-control" name="get_pdf" id="get_pdf"/>
                    {{"Current File is, Show It  "}}
                    <a href="{{asset('actspdf/'.$edit_act->Title.".pdf")}}">{{$edit_act->Title.".pdf"}}</a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </form>
@endsection