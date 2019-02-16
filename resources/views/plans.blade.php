@extends('layouts.app')
@section('content')
  @php
    use App\Subscriptions;
    use App\User;
    $user = auth::user();
    $id = $user->id;
    $email = User::find($id)->email;
    $pro = $user->pro;
  @endphp
  <!-- start plans -->
  @if ($pro === 0)
    <section id="plans">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="top">
              <h1 class="big">Choce your best plane for your need</h1>
              <h1 class="small">you can Pay with <span class="usd">usd</span> OR <span class="bit">BITCOIn</span></h1>
            </div>
            <div class="bottom">
              <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3">
                  <div class="plan active">
                    <ul>
                      <li class="big"><span>$</span>0</li>
                      <li>limited Access</li>
                      <li>For</li>
                      <li>infinty</li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3">
                  <div class="plan pay">
                    <ul>
                      <li class="big"><span>$</span>10</li>
                      <li>Unlimited Access</li>
                      <li>For</li>
                      <li>eternity</li>
                    </ul>
                    <form action="{{action('SubscriptionsController@charge')}}" method="POST">
                      @csrf
                      <input type="hidden" name="price" value="10">
                      <input type="hidden" name="id" value="{{$id}}">
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_bJIhIhmumn5rdYdBXEwnCmIf"
                        data-email="{{$email}}"
                        data-amount="1000"
                        data-name="Nutflix"
                        data-description="Example charge"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                        data-bitcoin="true"
                        data-locale="auto">
                      </script>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @else
    @php
      header('Location:' . '/err');
      exit();
    @endphp
  @endif
  <!-- end plans -->
@endsection
