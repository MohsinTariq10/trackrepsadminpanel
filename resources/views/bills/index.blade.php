@extends('layout.admin')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div style="padding:20px 0px"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Bill Title</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>
                        </tr>
                    </thead>
                <tbody>

                @foreach($billsdata as $single_bill)
                <tr>
                    <td>{{$single_bill->value->Title}}</td>
                    <td>{{$single_bill->value->Status}}</td>
                    <td>
                    <a href="{{route('bills.edit', $single_bill->value->Id)}}"  class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                    <td>
                        <form method="POST" action="{{ url('bills',$single_bill->value->Id) }}">
                    {{ csrf_field() }}

                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" value="Delete"><i class="fa fa-remove" style="padding-right:5px"></i>Delete</button>

                            </form>      







                        </td>




                        <td><a href="{{url('bills',$single_bill->value->Id)}}" class="btn btn-success"><i class="fa fa-eye"></i>View</a></td>
                    </tr>
                    @endforeach   

                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection