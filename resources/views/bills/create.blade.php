@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Add Bill
            </h1>

        </div>
    </div>
    <!-- /.row -->
    <form method="POST" action="{{url('bills')}}" enctype="multipart/form-data">

        {!! csrf_field() !!}

        <div class="row">
            <div class="col-sm-12">
                <label>Status</label>
                <input type="text" class="form-control" name="Status"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <label>Mover</label>
                <input type="text" class="form-control" name="Mover"/>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Date Introduced</label>
                    <input type="date" class="form-control" name="DateIntroduced"/>
                </div>
            </div>
        </div>
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
                    <label>Title</label>
                    <input type="text" class="form-control" name="Title"/>
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