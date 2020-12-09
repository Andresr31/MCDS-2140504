@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <img src="{{ asset('imgs/bg-dashboard.svg') }}" width="300px" class="my-2 img-top-card">
                <div class="card-header text-center">
                    <h4>
                        <i class="fa fa-clipboard-list"></i>
                        @lang('general.title-dashboard')
                        | 
                        <small>
                            <i class="fas fa-user"></i> Cliente
                        </small> 
                    </h4>
                </div>

                <div class="card-body row align-content-center align-items-center">
                        {{--  --}}
                        <div class="col-md-6 offset-md-3 mt-2">
                            <form method="POST" action="{{ url('customer/'.$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group">
                                <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname', $user->fullname) }}" placeholder="@lang('general.label-fullname')" autofocus>

                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="@lang('general.label-email')">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="@lang('general.label-phone')">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" placeholder="@lang('general.label-birthdate')">

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Seleccione el Genero...</option>
                                    <option value="Female" @if(old('gender', $user->gender) == 'Female') selected @endif>@lang('general.select-female')</option>
                                    <option value="Male" @if(old('gender', $user->gender) == 'Male') selected @endif>@lang('general.select-male')</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $user->address) }}" placeholder="@lang('general.label-address')">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="text-center my-3">
                                    <img src="{{ asset($user->photo) }}" class="img-thumbnail" id="preview" width="120px">
                                </div>
                                <div class="custom-file">
                                   <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                                   <label class="custom-file-label" for="customFile"> 
                                     <i class="fa fa-upload"></i> 
                                     Foto
                                   </label>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>    
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-larapp btn-block text-uppercase">
                                    Editar
                                    <i class="fa fa-save"></i> 
                                </button>
                        </div>
                    </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
