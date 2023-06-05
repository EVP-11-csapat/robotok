@extends('layout')

@section('title')
    Simulation Selector
@endsection

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-md w-full bg-gray-100 shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold text-center mb-4">Simulation Selector</h1>
            <div class="mb-6">
                <label for="simulation" class="block text-sm font-medium text-gray-700">Select a simulation</label>
                <select id="simulation" name="simulation"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    @foreach ($simulations as $simulation)
                        <option value="{{ $simulation->id }}">{{ $simulation->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-4">
                <button type="button" id="newSimulation"
                    class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Create
                    new simulation</button>
                <button type="button" id="joinSimulation"
                    class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Join
                    simulation</button>
            </div>
        </div>
    </div>
@endsection
