@extends('layouts.admin')

@section('content')

    <?
        $total = 0;
        foreach ($payments_users as $payment_user){
            $total = $total + $payment_user->payment;
        }
        echo $total
    ?>
    <br>

    {{ $payment->sum }}

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
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment_id</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User_id</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Team_id</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated At</th>
                                <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments_users as $payment_user)
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $payment_user->id }}</span>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <h6>{{ $payment_user->payment }}</h6>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $payment_user->payment_id }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $payment_user->user_id }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span>{{ $payment_user->team_id }}</span>
                                    </td>


                                    <td class="align-middle text-center text-sm">
                                        <h6 class="mb-0 text-sm">{{ $payment_user->created_at }}</h6>
                                    </td>


                                    <td class="align-middle text-center">
                                        <h6 class="mb-0 text-sm">{{ $payment_user->updated_at }}</h6>
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
