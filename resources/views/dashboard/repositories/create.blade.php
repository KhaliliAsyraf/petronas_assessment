@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Search Repositories') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('repository.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label>Title/Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Title/Name') }}" name="title" required autofocus>
                            </div>
 
                            <button class="btn btn-block btn-success" type="submit">{{ __('Search') }}</button>
                            <a href="{{ route('repository.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection