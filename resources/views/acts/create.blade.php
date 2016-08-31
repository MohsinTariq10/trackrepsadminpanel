@extends('layout.admin')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add Acts
            </h1>

        </div>
    </div>
    <!-- /.row -->
    <form method="POST" action="{{url('acts')}}" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="row">
            <div class="col-sm-12">
                <label>Date of Governer Assent</label>
                <input type="date" class="form-control" name="DateOfGovernerAssent"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Title</label>
                <input type="text" class="form-control" name="Title"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="Id"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Act Number</label>
                    <input type="text" class="form-control" name="ActNo"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Date of Passing</label>
                    <input type="date" class="form-control" name="DateOfPassing"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="Subject"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Upload PDF</label>
                    <input type="file" class="form-control" name="get_pdf" id="get_pdf"/>
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