@extends('layouts.app')
@section('title' )

@endsection

@section('content')


<div class="py-3 py-md-4 checkout">
    <div class="container">
        <h4>Checkout</h4>

        <hr>

        <div class="row">
            
            <div class="col-md-12 mb-4">
                <div class="shadow bg-white p-3">
                    
                    <hr>
                    <small>* Items will be delivered in 3 - 5 days.</small>
                    <br/>
                    <small>* Tax and other charges are included ?</small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-dark">
                        Basic Information

                    </h4>
                    <hr>
                    @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
              @endif

                    
                        
                        <div class="row">
                            <form action="">
                              
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}" required class="form-control name" placeholder="Enter Full Name" /> 
                                <span id="name_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="text" name="phone" required class="form-control phone" placeholder="Enter Phone Number" />
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="text" name="email" required class="form-control email" placeholder="Enter Email Address" />
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-10 mb-3">
                                <label>Full Address</label>
                                <textarea name="address" required class="form-control address" rows="2"></textarea>
                                <span id="address_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label>State</label>
                                <input type="text" name="state" required class="form-control state" placeholder="Enter your state" />
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label>City</label>
                                <input type="text" name="city" required class="form-control city" placeholder="Enter city" />
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            
                            <div class="col-md-5 mb-3">
                                <label>District</label>

                                <input type="text" name="district" required class="form-control district" placeholder="district"/>
                                <span id="district_error" class="text-danger"></span>
                            </div>

                            
                            

                            <div class="col-md-5">

                            <div class="card">

                            <div class="card-header">Order Details</div>
                            <div class="">
        <div class="py-3 py-md-5 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="shopping-cart">
        
                                <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Item</h4>
                                        </div>
                                        <div class="col-md-2">
                                        <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                
                            </div>
                        </div>

                        @php $total=0; @endphp
                       

                        @foreach($cartitems as $item)

                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    
                                        <label class="product-name">
                                            
                                            {{$item->products->name}}
                                        </label>

                                        
                                    
                                </div>
                                <div class="col-md-2 my-auto">
                                    <label class="price">${{$item->products->selling_price}}</label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <span>{{$item->prod_qty}}</span>
                                    </div>
                                </div>
                                @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                                
                                
                            </div>
                        </div>

                        @endforeach
                        <div class="card-footer mt-4">
                            <h6>Total Price : ${{ $total}}</h6>
                            <input type="hidden" name="cartid" value="{{$item->user_id}}"> 
                        </div>
                        
                    
                                         
            
            </div>
        </div>
    </div>

</div>
</div>

</div>
</div>

</div>
</div>



<div class="col-md-12 mb-3">
    <label>Select Payment Mode: </label>
    <div class="d-md-flex align-items-start">
        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
            <button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
        </div>
        <div class="tab-content col-md-9" id="v-pills-tabContent">
            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                <h6>Cash on Delivery Mode</h6>
                <hr/>
                <button type="submit" class="btn btn-primary paystack_btn">Place Order (Cash on Delivery)</button>

            </div>

            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                <h6>Online Payment Mode</h6>
                <hr/>
                <button type="submit" name="pay_now" id="pay-now" class="btn btn-warning paystack_btn">Pay Now (Online Payment)</button>
                
            </div>
        </div>
    </div>

</div>
</div>
</form>

</div>
</div>

</div>

    </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('scripts')

<script src="https://js.paystack.co/v2/inline.js">


</script>
@endsection