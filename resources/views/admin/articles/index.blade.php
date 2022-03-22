@extends('layouts.admin')
@section('content')
    <div class="text-center d-flex w-100">
        <a href="{{ url(route('article.create')) }}" class="w-100">
            <button class="btn btn-lg btn-success">
                Add
            </button>
        </a>
    </div>













    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> Table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>


                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span>{{ $article->id }}</span>
                                </td>

                                <td class="align-middle ">
                                    <!--                                <div class=" px-2 py-1">-->
                                    <!--                                    <div>-->
                                    <!--                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">-->
                                    <!--                                    </div>-->
                                    <div class="text-center px-2 py-1">
                                        <h6 class="mb-0 text-sm text-center">{{ $article->code }}</h6>
                                    </div>
                                    <!--                                </div>-->
                                </td>

                                <td class="align-middle text-center text-sm">
                                    <h6 class="mb-0 text-sm">{{ $article->created_at }}</h6>
                                </td>


                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $article->updated_at }}</span>
                                </td>


                                <!--                            <td class="align-middle">-->
                                <!--                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">-->
                                <!--                                    Edit-->
                                <!--                                </a>-->
                                <!--                            </td>-->
                                <td class="actions align-middle text-center">
                                    <a href="{{url(route('article.edit', $article->id))}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <form action="{{route('article.destroy', $article->id)}}"method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
