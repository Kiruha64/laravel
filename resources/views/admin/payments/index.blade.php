@extends('layouts.admin')
@section('content')
    <div class="text-center d-flex w-100">
{{--        <a href="{{ url(route('payments.create')) }}" class="w-100">--}}
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
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sum</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Team_id</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>



                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $payment->id }}</span>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <h6>{{ $payment->sum }}</h6>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $payment->team_id }}</span>
                                    </td>


                                    <td class="align-middle text-center text-sm">
                                        <h6 class="mb-0 text-sm">{{ $payment->created_at }}</h6>
                                    </td>


                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm">{{ $payment->updated_at }}</h6>
                                    </td>

                                    <td class="actions align-middle text-center">
                                        <a href="{{url(route('payments.info', $payment->id))}}">
                                            <button class="btn btn-primary">Info</button>
                                        </a>
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
