@extends('layouts.app')
@section('title','Bank')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
                <div class="col-12">


                <section id="menus" class="mb-5">
                <a href="/admin/dashboard/bank/transactions"  class="btn btn-primary mb-2"> Transactions</a>
                <a data-bs-toggle="modal" data-bs-target="#sendmoeny" class="btn btn-info mb-2"> Send Money</a>
                </section>
                    <div>
                        
                        <div class="card-header bg-light">
                            <h5>{{__('Destination Address')}}</h5>
                        </div>
                        <div class="card-body bg-light">
                            <form action="/admin/dashboard/bank/settings" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="settings_destination_address" class="text-info">{{__('Must be a tron address')}}</label>
                                    <input id="settings_destination_address" type="text" required name="settings_destination_address" value="{{$setting->settings_destination_address}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="{{__('Update')}}" class="btn btn-success mt-2">
                                </div>
                            </form>
                        </div>
                        <div class="card-header bg-light">
                            <h5>Wallet Balance</h5>
                        </div>
                   
                        <div class="card-body bg-light">
                   <!-- {{$tron->setAddress('$setting->settings_destination_address')}}   
Balance $
{{$tron->getBalance(null, true);}} -->

                        </div>
                        </div>
                    <div class="mt-3 mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <h5>{{__('Tokens')}}</h5>
                            <a href="{{url('/tokens/create')}}" class="btn btn-primary">{{__('New Token')}}</a>
                        </div>
                        <div class="card-body bg-light">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>{{__('Icon')}}</th>
                                        <th>{{__('Ticker')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Contract Address')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tokens as $token)
                                        <tr>
                                            <td><img class="img" width="30px" src="{{$token->icon}}" alt="{{$token->name}}"></td>
                                            <td>{{$token->ticker}}</td>
                                            <td>{{$token->name}}</td>
                                            <td>{{$token->contract_address}}</td>
                                            <td><a class="btn-link m-1 text-info" href="{{url('/tokens/'.$token->id.'/edit')}}">{{__('edit')}}</a>
                                                <a class="btn-link m-1 text-danger" href="{{url('/tokens/'.$token->id.'/delete')}}">{{__('delete')}}</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </section>

    
<!-- send money -->


<div class="modal fade" id="sendmoeny" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" ><b>Send Money for user</b> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
      </div>
      <div class="card-body row">
      <form action="/admin/dashboard/bank/sendltcoinforuser" method="POST">
                                @csrf
            <div class="row d-flex justify-content-center">
    
                <div class="row p-3">
         
       
             
                       <div class="col-md-6">
                        <h5 class="mt-2 mb-2">For</h5>
                        <input type="text" name="username" class="form-control form-control-lg" required="true">
                        </div>
                        <div class="col-md-6">
                        <h5 class="mt-2 mb-2">Amount $</h5>
                        <input type="number" name="amount" class="form-control form-control-lg" placeholder="Enter amount" required="true">
</div>
<div class="col-md-6">
                        <h5 class="mt-2 mb-2">Comments</h5>
                        <input type="text" name="comment" class="form-control form-control-lg" placeholder="Type comment">
</div>
                        <input type="hidden"  name="sender_id" value="{{auth()->user()->id}}">
                       
                              
</div>

                </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Pay</button>
                            </form>
      <button class="btn zoom btn-info" type="button" data-bs-dismiss="modal" aria-label="Close">Close</button>
      </div>
    </div>
  </div>


  <!-- / send money -->

@endsection
