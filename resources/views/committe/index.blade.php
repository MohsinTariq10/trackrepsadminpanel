@extends('layout.admin')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div style="padding:20px 0px"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Committee Name</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($committedata as $single_committe)
                        <tr>
                            <td>{{$single_committe->value->Name}}</td>
                            <td>{{$single_committe->value->CommitteeType}}</td>
                            <td>
                                <a href="{{route('committe.edit', $single_committe->value->Id)}}"
                                   class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                            <td>
                                <form method="POST" action="{{ url('committe',$single_committe->value->Id) }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" value="Delete"><i class="fa fa-remove"
                                                                                                   style="padding-right:5px"></i>Delete
                                    </button>

                                </form>


                            </td>


                            <td><a href="{{url('committe',$single_committe->value->Id)}}" class="btn btn-success"><i
                                            class="fa fa-eye"></i>View</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection