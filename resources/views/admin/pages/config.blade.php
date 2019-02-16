@extends('layouts.admin')
@section('content')
  {{-- start verifying your purchase --}}
  <div class="col-lg-12">
    {{-- if he have licnese --}}
    @if (!empty($data))
      @php
        $id = $data[0]->id;
        $buyer = $data[0]->buyer;
        $email = $data[0]->email;
        $purchase_count = $data[0]->purchase_count;
        $item_id = $data[0]->item_id;
        $license = $data[0]->license;
        $username = $data[0]->username;
      @endphp
      @if ($purchase_count > 0)
        {{-- info --}}
        <div class="card">

          <div style="margin-bottom: 40px;" class="card-head">
            <h1>verifying your purchase</h1>
          </div>

          <div class="card-body">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <td><strong>buyer name</strong></td>
                  <td><strong>email</strong></td>
                  <td><strong>item id</strong></td>
                  <td><strong>purchase count</strong></td>
                  <td><strong>license</strong></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$buyer}}</td>
                  <td>{{$email}}</td>
                  <td>{{$item_id}}</td>
                  <td>{{$purchase_count}}</td>
                  <td>{{$license}}</td>
                </tr>
              </tbody>
            </table>

          </div>

        </div>
        {{-- end info --}}
        {{-- add logos --}}
        <div class="card">
          <form action="{{action('ConfigController@info')}}" enctype="multipart/form-data" method="post">
            @csrf
            <p>update your copyright section</p>
            <input required class="form-control" type="text" name="copyright" placeholder="the copy right">
            <hr>

            <p>update your logo</p>
            <input required type="file" name="logo" class="form-control">
            <hr>

            <p>update your favicon</p>
            <input required type="file" name="favicon" class="form-control">
            <hr>

            <p>admin logo</p>
            <input required type="file" name="admin_logo" class="form-control">
            <hr>

            <p>login and signup logo</p>
            <input required type="file" name="sign_logo" class="form-control">

            <button style="width: 100%; margin-top: 20px;" type="submit" name="button" class="btn btn-primary">update the site info</button>
          </form>
        </div>
        {{-- end logos --}}
      @endif
    @else
      <div class="card">
            It`s activated!
      </div>
    @endif
    {{-- end if he have license --}}
  </div>
  {{-- end verifying your purchase --}}
@endsection
