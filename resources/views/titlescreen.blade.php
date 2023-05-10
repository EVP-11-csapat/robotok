@extends('layout')

@vite('resources/js/titlescreen.js')

@section('title')
    Title screen
@endsection

@section('content')
    <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div class="flex">
                <div>
                    <label for="robots" class="block mb-2 text-sm font-medium text-gray-900">Select a Robot</label>
                    <select id="robots"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Choose a Robot to buy</option>
                        @foreach ($storerobots as $robot)
                            <option value="{{ $robot->id }}">Speed: {{ $robot->speed }} - Capacity: {{ $robot->capacity }}
                                -
                                Model: {{ $robot->model }} - Price: {{ $robot->cost }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-auto ml-2"
                    id="buyRobot">Buy</button>
            </div>
        </div>
    </form>
@endsection
