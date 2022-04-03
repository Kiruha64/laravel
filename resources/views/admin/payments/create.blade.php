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

                        <form action="{{url(route('payments.store',$team_id))}}" method="post">
                            @csrf

                            <div class="form-group" id="sum_block">
                                <label class="">Sum</label>
                                <input class="form-group form-control"type="number" name="sum"required>
                            </div>







                            <div class="form-group ">
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-primary btn-lg"id="add_payment_member">
                                        +
                                    </a>
                                </div>
                            </div>




                            <div class="form-group mt-5">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg" id="confirm">
                                        Confirm
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


@section('scripts')
<script>

    $(document).ready(function (){
        var x = 0;
        $('#add_payment_member').click(function (){
            x = x+1;
            $('#sum_block').append('<div class="form-group" id="member_payment">' +
            '<label class="">Member - Payment</label>' +
                '<select class="form-control form-group" name="member'+x+'">' +
                '@foreach($members as $member)'+
                '<option value="{{$member->id}}">{{ $member->name }}</option>'+
                '@endforeach'+
               ' </select>'+
            '<input class="form-group form-control"type="number" name="payment'+x+'"required>'+
            '</div>'
            );
        });




        $('#confirm').click(function(){
            var members = [];
            var payments = [];
            for ($i = 1; $i <= x; $i++) {

                var member = $('#member_payment'+$i+' select').val();
                members.push(member);
                var payment = $('#member_payment'+$i+ ' input[name=payment]').val();
                payments.push(payment);

                // alert(members);
                // alert(payments);
                // payments.push(payment);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                // var data = category_id;

            {{--searchCategoriestype(x);--}}
            {{--function searchCategoriestype(keyword){--}}
            {{--    // var data = category_id;--}}
            {{--    $.ajax({--}}
            {{--        type: "post",--}}
            {{--        url: "{{ route('payments.store',$team_id) }}",--}}
            {{--        data: {text:'text'},--}}
            {{--        success: function(response)--}}
            {{--        {--}}
            {{--            $('#typecategory_id option').remove();--}}
            {{--            $('#typecategory_id').append(response)--}}
            {{--            $('.typecategories-select').fadeIn('slow');--}}
            {{--        },--}}
            {{--        error: function(){alert('AjaX Failed')}--}}
            {{--    });--}}
            {{--}--}}

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('payments.store',$team_id) }}" ,
                    type: "POST",
                    data: {"gg": "1"},
                    success: function (response) {
                        alert(response)
                    },
                    error: function(){alert('AjaX Failed')}

            });


        });
    });
</script>
@endsection
