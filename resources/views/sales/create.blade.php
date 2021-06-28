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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <form method="POST" action="{{ route('createSales') }}">
                    @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="user" :value="__('User')" />

                            <select class="block mt-1 w-full" name="user" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Payment -->
                        <div class="mt-4">
                            <x-label for="payment" :value="__('Payment')" />

                            <x-input id="payment" class="block mt-1 w-full" type="text" name="payment" :value="old('payment')" required />
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Create Sales') }}
                            </x-button>
                        </div>
                    </form>
                </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
