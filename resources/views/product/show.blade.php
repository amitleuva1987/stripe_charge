@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-md">{{$product->name}}</h2>
            <h4>INR.{{$product->price}}</h4>
            <p>{{$product->description}}</p>
        </div>
        <div class="col-md-6">
            <form action="{{ route('processpayment',$product->price) }}" method="POST" id="subscribe-form">

                <label for="card-holder-name">Card Holder Name</label>
                <input id="card-holder-name" class="form-control" type="text" value="{{$user->name}}" disabled>
                @csrf
                <div class="form-row mt-3">
                    <label for="card-element">Credit or Debit card</label>
                    <div id="card-element" class="form-control"> </div>
                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>
                </div>
                <div class="stripe-errors"></div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                    @endforeach
                </div>
                @endif
                <div class="form-group">
                    <button type="button" class="btn btn-primary mt-3" id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block">Pay Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51KBf2FSAu3M86yctfPxRXmxW2mex4z6gZyZyCFpnLUnmCBtmsUVANM6q3FnXdjNJQBApGo5ETaJ9o9R6Cty1rrPR00GdeNEDDs');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {
        hidePostalCode: true,
        style: style
    });
    card.mount('#card-element');
    console.log(document.getElementById('card-element'));
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        console.log("attempting");
        const {
            setupIntent,
            error
        } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });

    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection