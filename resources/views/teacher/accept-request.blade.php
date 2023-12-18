<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{__ ("Teacher")}}</th>
                            <th>{{__ ("Course")}}</th>
                            <th>&ensp;&ensp;&ensp;{{__ ("Student")}}</th>
                            <th>&ensp;&ensp;&ensp;{{__ ("Roll No")}}</th>

                            <th>&ensp;&ensp;&ensp;&ensp;{{__ ("Accept Request")}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stdrequests as $stdrequest)
                        
                            <tr>
                                <td>&ensp;&ensp;&ensp;&ensp;{{ $stdrequest->teachername  }}</td>
                                <td>&ensp;&ensp;&ensp;&ensp;{{ $stdrequest->course  }}</td>
                                <td>&ensp;&ensp;&ensp;&ensp;{{ $stdrequest->studentname  }}</td>&ensp;&ensp;&ensp;&ensp;
                                <td>&ensp;&ensp;&ensp;&ensp;{{ $stdrequest->student_id  }}</td>&ensp;&ensp;&ensp;&ensp;

                                <td>
                                    
                                <form method="POST" action="{{ route('accept.request.post', ['requestId' => $stdrequest->id]) }}">
                                        @csrf
                                        <!-- Add other form fields if needed -->
                                        <x-primary-button class="ms-3">
                                        <a href="" class="btn btn-primary">{{ __('Accept') }}</a>
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

