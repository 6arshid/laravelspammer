@extends('layouts.app')
@section('title','Transactions')
@section('content')
    <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center">
                    <div class="card mb-3 border-0">
                        <div class="card-header">
                            <h5>{{__('Transactions')}}</h5>
                        </div>
                        <div class="card-body table-responsive p-0 m-0 shadow">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{__('Amount USD')}}</th>
                                    <th>{{__('Comment')}}</th>
                                    <th>Receiver</th>
                                    <th>Payer</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        
                                        <td>{{$transaction->amount}}</td>
                                        <td>{{$transaction->comment}}</td>
                                        <td><a href="/{{Helper::find_user_info($transaction->transaction_receiver_id)->username}}" targe="screen">{{Helper::find_user_info($transaction->transaction_receiver_id)->username}}</a></td>
                                        <td><a href="/{{Helper::find_user_info($transaction->transaction_payer_id)->username}}">{{Helper::find_user_info($transaction->transaction_payer_id)->username}}</a></td>
                                        <td>
                                            @if($transaction->success) <span class="text-success">{{__('Success')}}</span> @else <span class="text-warning">{{__('Pending')}}</span> @endif
                                        </td>
                                        <td>
                                            {{date('Y-m-d', strtotime($transaction->created_at))}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$transactions->links()}}
                </div>
            </div>
        </div>
@endsection
