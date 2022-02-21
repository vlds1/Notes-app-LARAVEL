@extends('./layouts/user')

@section('title')
    Create
@endsection

@section('content')
    <div class="note-form">
        <div class="title">Create note</div>
        <form method="POST" 
        @if (isset($note))
            action="{{ route('notes.update', $note) }}"
        @else
            action="{{ route('notes.store') }}"
        @endif
        >
        <div class="form-inner">
            @csrf
            @if(isset($note))
                @method('PUT')
            @endif

            <input class="inp"
            value="{{ old('note', isset($note)) ? $note->note : null }}"
            type="text" name="note" id="note" placeholder="Create a note" aria-label="Note"
            >

            <button type="submit" class="btn">
                @if (isset($note))
                    Edit
                @else
                    Create
                @endif  
            </button>
        </div>
        </form>
    </div>
@endsection