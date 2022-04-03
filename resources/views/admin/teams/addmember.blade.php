@extends('layouts.admin')
@section('content')
    <div class="text-center d-flex w-100">
{{--        <a href="{{ url(route('teams.addmember' , $id)) }}" class="w-100">--}}
{{--            <button class="btn btn-lg btn-success">--}}
{{--                Add--}}
{{--            </button>--}}
{{--        </a>--}}
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
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>



                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $user->id }}</span>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <h6>{{ $user->name }}</h6>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $user->email }}</span>
                                    </td>


                                    <td class="align-middle text-center text-sm">
                                        <h6 class="mb-0 text-sm">{{ $user->created_at }}</h6>
                                    </td>


                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm">{{ $user->updated_at }}</h6>
                                    </td>


                                    <!--                            <td class="align-middle">-->
                                    <!--                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">-->
                                    <!--                                    Edit-->
                                    <!--                                </a>-->
                                    <!--                            </td>-->
                                    <td class="actions align-middle text-center">

                                        <form action="{{url(route('teams.storemember' , [$team_id ,$user->id]))}}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary btn-lg">
                                                        Add
                                                    </button>
                                                </div>
                                            </div>
                                        </form>



{{--                                                                                <a href="{{url(route('teams.edit', $user->id))}}">--}}
{{--                                                                                    <button class="btn btn-primary">Edit</button>--}}
{{--                                                                                </a>--}}
{{--                                                                                <form action="{{route('teams.destroy', $user->id)}}"method="post">--}}
{{--                                                                                    @csrf--}}
{{--                                                                                    @method('DELETE')--}}
{{--                                                                                    <button class="btn btn-danger">Delete</button>--}}
{{--                                                                                </form>--}}
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
