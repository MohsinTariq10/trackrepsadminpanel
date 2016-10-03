@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Create Poll
            </h1>
        </div>
    </div>
    <form method="POST" action="{{url('polls')}}" role="form" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <input type="hidden" name="noOfOptions" id="noOfOptions" value="1">
        <div class="row">
            <div class="col-sm-12">
                <label>Question</label>
                <input type="text" class="form-control" name="Question"/>
            </div>
        </div>
        <div class="row" id="optionsFields">
            <label>Options</label>
            <br>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="Option1" placeholder="Option 1"/>
            </div>
            <br><br>
        </div>
        <br>
        <a href="#" onclick="addFields()">Add One More Field</a>
        <br><br>
        <div class="row">
            <div class="col-sm-12">
                <label>Status</label>
                <select name="Status" class="form-control">
                    <option>Online</option>
                    <option>Offline</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Tags</label>
                    <br>
                    <input type="text" class="form-control typeahead" name="Tags" data-role="tagsinput"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Upload Image</label>
                    <input name="ImageName" type="file" class="form-control" />
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
    <script>
        var i = 2;
        function addFields() {
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("optionsFields");
            // Create an <input> element, set its type and name attributes
            var divv = document.createElement("div");
            divv.className = "col-sm-12";
            divv.id = "option" + i;
            container.appendChild(divv);
            var container1 = document.getElementById("option" + i);
            var input = document.createElement("input");
            input.className = "form-control";
            input.type = "text";
            input.name = "Option" + i;
            input.placeholder = "Option " + i;
            container1.appendChild(input);
            // Append a line break
            container.appendChild(document.createElement("br"));
            container.appendChild(document.createElement("br"));
            var noOfOptions = document.getElementById('noOfOptions').value = i;
            i++;
        }
    </script>
@endsection