@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Edit article</h1>

                        @if(session('success'))
                            <div class="alert alert-success bg-success">
                                edited
                            </div>
                        @endif

                        <form action="{{url(route('article.update',$article['id']))}}" method="post">
                            @method('PATCH')
                            @csrf


                            <textarea id="textarea" name="code">
                                {{$article['code']}}
                             </textarea>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        edit
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
