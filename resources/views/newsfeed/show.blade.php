@extends('layout.admin')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-header">News feed</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-8">
                    <div>
                        {{$newsfeed->title}}
                    </div>
                    <div>
                        {{$newsfeed->date}}
                    </div>
                    <div>
                        <?php echo $newsfeed->content?>
                    </div>
                    <br>
                </div>
                <div class="col-sm-4"></div>
            </div>
            <div style="padding:20px 0px"></div>
            <div class="row">
                <div class="col-sm-12 text-center">
                </div>
            </div>
        </div>
        <div style="padding:60px 0px"></div>
    </div>
@endsection