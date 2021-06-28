<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class="navbar navbar-expand navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/dashboard" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/users" class="nav-link">Users</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/sales" class="nav-link">Sales</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/configs" class="nav-link">Back office</a>
                    </li>
                </ul>

            </nav>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">






                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Back Office / Configs</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(count($configs) <=0)
                                No Data Found
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Payment</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $configs as $config)
                                        <tr>
                                            <td>{{ $config->id }}</td>
                                            <td>{{ $config->user->name }}</td>
                                            <td>{{ $config->target }}</td>
                                            <td>
                                                <a href="/configs/{{ $config->id }}/edit/" class="btn btn-default">edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {!!  $configs->render() !!}
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
