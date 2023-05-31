@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible show" role="alert">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(Session::has('unblocked'))
                            <div class="alert alert-success alert-dismissible show" role="alert">
                                {{ Session::get('unblocked') }}
                                @php
                                    Session::forget('unblocked');
                                @endphp
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible show" role="alert">
                                {{ Session::get('error') }}
                                @php
                                    Session::forget('error');
                                @endphp
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Account Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img src="{{ asset('avatar/'.$customer->avatar) }}" class="img-fluid width50" alt="{{ $customer->name }}"></td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        @if($customer->is_blocked == 0)
                                            <span class="badge bg-success">Unblocked</span>
                                        @else
                                            <span class="badge bg-danger">Blocked</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @if($customer->is_blocked == 0)
                                                <a title="Block" href="{{ route('customer.block', $customer) }}" class="btn btn-danger rounded marginRight5" ><i class="fa fa-ban"></i></a>
                                            @else
                                                <a title="Unblock" href="{{ route('customer.unblock', $customer) }}" class="btn btn-success rounded marginRight5"><i class="fa fa-check"></i></a>
                                            @endif
                                            <form action="{{ route('destroy.customer', $customer) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Delete" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this customer ?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
