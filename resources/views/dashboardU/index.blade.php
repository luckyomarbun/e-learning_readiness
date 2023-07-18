@extends('layouts/private')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->

        @if ($errors->any())
        <div id="error-container" class="alert alert-danger alert-dismissible" role="alert">
            <button id="close-error" type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            @foreach ($errors->all() as $error)
            <strong>Error !</strong> {{$error}}
            @endforeach
        </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('survey.submit') }}" method="POST">
                    @csrf
                    @php
                         $sectionCount = count($sections);
                    $options = [
                    1 => 'Sangat Tidak Setuju',
                    2 => 'Tidak Setuju',
                    3 => 'Netral',
                    4 => 'Setuju',
                    5 => 'Sangat Setuju',
                    ];
                    @endphp

                    @for ($i = 0; $i < $sectionCount; $i++) 
                    <div class="section" id="section{{ $i }}" style="display: {{ $i === 0 ? 'block' : 'none' }}">
                        <h3 class="text-center">{{ $sections[$i]->value }}</h3>
                        @php
                        $questionNumber = 1;
                        @endphp

                        @foreach ($sections[$i]->questions as $index => $question)
                        <b>{{ $index + 1 }}. {{ $question->value }}</b>
                        <div style="display: flex; justify-content: center; margin-top: 10px;">
                            @foreach ($options as $weight => $optionText)
                            <label style="margin-right:60px">
                            <input type="radio" name="answers[{{ $sections[$i]->id }}][{{ $question->id }}]"
                       value="{{ $weight }}" {{ old("answers.{$sections[$i]->id}.{$question->id}") == $weight ? 'checked' : '' }}>
                                {{ $optionText }}
                            </label>
                            @endforeach
                        </div>
                        @endforeach


                        <div class="button-container">
                            @if ($i > 0)
                            <button type="button" class="previous w-30 btn btn-md btn-primary mt-3" data-section="{{ $i }}">Previous</button>
                            @endif

                            @if ($i < $sectionCount - 1) 
                            <button type="button" class="next w-30 btn btn-md btn-primary mt-3" data-section="{{ $i }}">Next</button>
                            @endif
                            @if ($i == $sectionCount - 1) 
                            <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Submit</button>
                            @endif
                        </div>

            </div>
                    

      
            </form>
            @endfor
        </div>
    </div>
</div>
</div>
@endsection

@section('javascript_content')
<script>
    const previousButtons = document.querySelectorAll('.previous');
    const nextButtons = document.querySelectorAll('.next');
    const sections = document.querySelectorAll('.section');

    previousButtons.forEach(button => {
        button.addEventListener('click', () => {
            const sectionId = button.getAttribute('data-section');
            goToSection(parseInt(sectionId) - 1);
        });
    });

    nextButtons.forEach(button => {
        button.addEventListener('click', () => {
            const sectionId = button.getAttribute('data-section');
            goToSection(parseInt(sectionId) + 1);
        });
    });

    function goToSection(sectionId) {
        sections.forEach(section => {
            section.style.display = 'none';
        });

        document.querySelector(`#section${sectionId}`).style.display = 'block';
    }
</script>
<script>
    // JavaScript code to handle previous and next button clicks
    setTimeout(function() {
        document.getElementById('error-container').style.display = 'none';
    }, 3000);

    // Close button
    document.getElementById('close-error').addEventListener('click', function() {
        document.getElementById('error-container').style.display = 'none';
    });
</script>


@endsection