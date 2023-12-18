<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Dashboard') }}
        </h2>
    </x-slot>
    <style>
    .chat-container {
        display: flex;
        flex-direction: column;
        height: 400px; /* Adjust height as needed */
    }

    .chat-messages {
        overflow-y: scroll;
    }

    .message-list {
        list-style-type: none;
        padding: 0;
    }

    .message-item {
        background-color: #f5f5f5;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 8px;
    }

    .message-sender {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .message-form {
        display: flex;
        margin-top: 10px;
    }

    #message-input {
        flex: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
    }

    button {
        padding: 8px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="chat-container">
                        <div class="chat-messages">
                            <ul class="message-list">
                            @if ($ch_messages->count() > 0)
                             <ul class="message-list">
                                    @foreach($ch_messages->reverse() as $message)
                                        <li class="message-item">
                                            <div class="message-sender">{{ $message->studentname }}</div>
                                            <div class="message-body">{{ $message->body }}</div>
                                            <div class="message-sender">{{ $message->created_at }}</div>

                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No messages available.</p>
                            @endif
                            
                            </ul>
                        </div>
                       
                        <form action="{{ route('messages.store', ['teacher' => $teacherDetails->id]) }}" method="post" id="message-form" class="message-form">
                        @csrf
                        <input type="text" name="content" id="message-input" placeholder="Type your message...">
                            <x-primary-button class="ms-3">
                                    <a type="submit">Send</a>
                            </x-primary-button>
                    </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</x-app-layout>

