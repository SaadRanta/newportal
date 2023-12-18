<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__ ("Name")}}</th>
                            <th>{{__ ("Email")}}</th>
                            <th>&ensp;&ensp;&ensp;{{__ ("Course")}}</th>
                            <th>&ensp;&ensp;&ensp;&ensp;{{__ ("Send Request")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        
                            <tr>
                                <td>&ensp;&ensp;&ensp;&ensp;{{ $teacher->name  }}</td>
                                <td>&ensp;&ensp;&ensp;&ensp;{{ $teacher->email }}</td>
                                <td>&ensp;&ensp;&ensp;&ensp;{{ $teacher->course}}</td>
                                <td>
                                &ensp;&ensp;&ensp;&ensp;
                                
                                <form method="POST" action="{{ route('post-requests', ['teacher' => $teacher->id]) }}">
                                    @csrf
                                    <x-primary-button class="ms-3">
                                        <a href="" class="btn btn-primary">{{ __('Request') }}</a>
                                    </x-primary-button> 
                                </form>
                                           
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    <!-- <h1>List of Teachers</h1> -->

