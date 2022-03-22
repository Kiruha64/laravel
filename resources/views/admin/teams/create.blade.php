@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        @if(session('success'))
                            <div class="alert alert-success bg-success">
                                added
                            </div>
                        @endif

                        <form action="{{url(route('teams.store'))}}" method="post">
                            @csrf

                            <div class="form-group">
                                <input class="form-group form-control"type="text" name="name"required>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-body">
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
