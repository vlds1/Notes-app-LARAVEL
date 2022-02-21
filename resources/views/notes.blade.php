@extends('./layouts/user')

@section('title', 'Notes')

@section('content')
    <div class="container">
        <div class="notes">
            @if ($notCompleted == null)
            <div class="title">NO NOTES</div>
            <a href="{{ route('notes.create') }}">Create</a>
            @endif
            <div style="text-align: center; margin-top: .5rem; opacity: .7;">Notes</div>
            @foreach ($notCompleted as $note)

            <div class="{{ $note->isdone == false ? "note" : "complete-note"}}">
                <div class="note-descriptions">
                    <div class="note-created">Created at: {{ $note->created_at }}</div> 
                    <div class="note-text">{{ $note->note }}</div> 
                </div>
                <div class="note-inner">
                    <form method="POST" action="{{ route('complete', $note->id) }}" class="note-inner-form">
                        @method('PATCH')
                        @csrf
                        <button class="complete-btn" type="sumbit" name="isdone" id="isdone">
                            <img src="{{ asset('img/check-mark.png') }}" alt="Complete">
                        </button>
                    </form>
                    <form method="POST" action="{{ route('notes.destroy', $note) }}" class="note-inner-form">
                        <a class="edit" type="button" href="{{ route('notes.edit', $note) }}">
                            <img src="{{ asset('img/edit.png') }}" alt="Edit">
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn" type="submit"><img src="{{ asset('img/trash-can.png') }}" alt="Edit"></button>
                    </form>
                </div>
            </div>
            
            @endforeach
        </div>

        <div class="notes" style="opacity: .5">
            <div style="text-align: center; margin-top: .5rem; opacity: .7;">Completed notes</div>
            @if ($completed == null)
                <div class="title">No completed notes</div>
                <a href="{{ route('notes.create') }}">Create</a>
            @endif
            @foreach ($completed as $note)

            <div class="{{ $note->isdone == false ? "note" : "complete-note"}}">
                <div class="note-descriptions">
                    <div class="note-created">Completed at: {{ $note->updated_at }}</div> 
                    <div class="note-text">{{ $note->note }}</div> 
                </div> 
                <div class="note-inner">
                    <form method="POST" action="{{ route('complete', $note->id) }}" class="note-inner-form">
                        @method('PATCH')
                        @csrf
                        <button class="complete-btn" type="sumbit" name="isdone" id="isdone">
                            <img src="{{ asset('img/arrow-back.png') }}" alt="Complete">
                        </button>
                    </form>
                    <form method="POST" action="{{ route('notes.destroy', $note) }}" class="note-inner-form">
                        <a class="edit" type="button" href="{{ route('notes.edit', $note) }}">
                            <img src="{{ asset('img/edit.png') }}" alt="Edit">
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn" type="submit"><img src="{{ asset('img/trash-can.png') }}" alt="Edit"></button>
                    </form>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
@endsection