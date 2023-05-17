@extends('layout')

@section('title')
    Create Simulation
@endsection

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-lg w-full bg-gray-100 shadow-lg rounded-lg p-6">
            <h1 class="text-xl font-bold text-gray-800 mb-4">Simulation Creation</h1>
            <table class="w-full border-collapse text-sm rounded-lg overflow-hidden shadow-lg">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="px-4 py-2 border text-left">NAME</th>
                        <th class="px-4 py-2 border text-left">PERISHABLE</th>
                        <th class="px-4 py-2 border"></th>
                    </tr>
                </thead>
                <tbody id="cargoTable" class="max-h-10 overflow-auto">
                </tbody>
            </table>

            <form class="mt-4" id="createForm">
                <div class="flex flex-col space-x-4">
                    <div class="w-full">
                        <label for="name" class="block text-gray-600 text-xs mb-2">NAME</label>
                        <input type="text" id="name" name="name"
                            class="w-full border rounded px-3 py-2 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div class="w-full mt-4">
                        <input id="perishable" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="perishable"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PERISHABLE</label>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="button" id="addCargoButton"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-4 py-2 rounded mr-2">ADD</button>
                </div>
            </form>
            <div class="flex justify-between mt-6">
                <button type="button" id="cancelButton"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold px-4 py-2 rounded">CANCEL</button>
                <button type="submit" id="submitButton"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold px-4 py-2 rounded">SUBMIT</button>
            </div>
        </div>
    </div>
@endsection
