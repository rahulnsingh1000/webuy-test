@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Address') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add-address') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="address_line1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line1') }}</label>

                            <div class="col-md-6">
                                <input id="address_line1" type="text" class="form-control @error('address_line1') is-invalid @enderror" name="address_line1" value="{{ old('address_line1') }}"  autocomplete="address_line1" autofocus>

                                @error('address_line1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line2') }}</label>

                            <div class="col-md-6">
                                <input id="address_line2" type="text" class="form-control @error('address_line2') is-invalid @enderror" name="address_line2" value="{{ old('address_line2') }}"  autocomplete="address_line2" autofocus>

                                @error('address_line2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line3" class="col-md-4 col-form-label text-md-right">{{ __('Address Line3') }}</label>

                            <div class="col-md-6">
                                <input id="address_line3" type="text" class="form-control @error('address_line3') is-invalid @enderror" name="address_line3" value="{{ old('address_line3') }}"  autocomplete="address_line3" autofocus>

                                @error('address_line3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pincode" class="col-md-4 col-form-label text-md-right">{{ __('Pincode') }}</label>

                            <div class="col-md-6">
                                <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="400072"  autocomplete="pincode" readonly>

                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select  id="city" class="form-control @error('city') is-invalid @enderror" name="city">
                                    <option value="1">Mumbai</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select  id="state" class="form-control @error('state') is-invalid @enderror" name="state">
                                    <option value="1">Maharastra</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select  id="country" class="form-control @error('country') is-invalid @enderror" name="country">
                                    <option value="1">India</option>
                                </select>
                            </div>
                        </div>
                        

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
