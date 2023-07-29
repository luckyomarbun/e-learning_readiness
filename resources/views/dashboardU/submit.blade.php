<!-- @extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('survey.submit') }}" method="POST">
                    @csrf
                    @php
                    $sectionCount = count($sections);
                    @endphp

                    @for ($i = 0; $i < $sectionCount; $i++) <div class="section" id="section{{ $i }}">
                        <h3>{{ $sections[$i]->title }}</h3>

                        @foreach ($sections[$i]->questions as $question)
                        <p>{{ $question->text }}</p>
                        @for ($j = 1; $j <= 5; $j++) <div>
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $j }}">
                            <label>{{ $j }}</label>
            </div>
            @endfor
            @endforeach

            <div class="button-container">
                @if ($i > 0)
                <button type="button" class="previous" data-section="{{ $i }}">Previous</button>
                @endif

                @if ($i < $sectionCount - 1) <button type="button" class="next" data-section="{{ $i }}">Next</button>
                    @endif
            </div>
        </div>
        @endfor

        <button type="submit">Submit</button>
        </form>
    </div>

</div>
</div>
</div>
@endsection -->