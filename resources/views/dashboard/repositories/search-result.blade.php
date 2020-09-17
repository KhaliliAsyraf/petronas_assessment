@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Results') }}</div>
                    <div class="card-body">
                        <div class="row"> 
                        <div class="col">
                        <a href="{{ route('repository.create') }}" class="btn btn-primary m-2">{{ __('Search Repositories') }}</a>
                        <a href="{{ route('repository.index') }}" class="btn btn-success m-2" style="margin-left:-10px">{{ __('Back to index') }}</a>
                        </div>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped" style="width:100%">
                          <thead>
                            <tr>
                              <th>Repository URL</th>
                              <th>Repository API URL</th>
                              <th>Git Username</th>
                              <th>Username URL</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($details as $detail)
                              <tr>
                                <td><strong>{{ $detail['html_url'] }}</strong></td>
                                <td><strong>{{ $detail['url'] }}</strong></td>
                                <td>{{ $detail['owner']['login'] }}</td>
                                <td>{{ $detail['owner']['html_url'] }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                      {{ $details->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

