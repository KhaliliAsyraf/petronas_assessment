@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('') }}</div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('repository.search') }}" class="btn btn-primary m-2">{{ __('Search Repositories') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Repository Name</th>
                            <th>Count Search</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($repos as $repo)
                            <tr>
                              <td><strong>{{ $repo->name }}</strong></td>
                              <td><strong>{{ $repo->total_repo }}</strong></td>
                              <td>{{ $repo->created_at }}</td>
                              <td>{{ $repo->updated_at }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $repos->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

