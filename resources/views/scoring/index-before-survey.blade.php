@extends('layouts/public')
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary head-title text-center">{{ $sections[0]->value }}</h3>
                    <label class="text-justify head-description">{{ $sections[0]->description }}</label>
                </div>
                <div class="card-body">
                    {{-- @if ($errors->any()) --}}
                        <div id="error-container" class="alert alert-danger alert-dismissible" role="alert" style="display: none;" >
                            <button id="close-error" type="button" class="close" data-dismiss="alert">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    {{-- @endif --}}
                    <form id="surveyForm" action="{{ route('survey.submit') }}" method="POST">
                        @csrf
                        @php
                            $sectionCount = count($sections);
                            $options = [
                                1 => 'Strongly Disagree',
                                2 => 'Disagree',
                                3 => 'Neutral',
                                4 => 'Agree',
                                5 => 'Strongly Agree',
                            ];
                        @endphp
                        @for ($i = 0; $i < $sectionCount; $i++)
                            <div class="section" id="section{{ $i }}"
                                style="display: {{ $i === 0 ? 'block' : 'none' }}">
                                <template id="templateContentTitle">
                                    <h2 class="text-center content-title">{{ $sections[$i]->value }}</h2>
                                    <label class="text-justify content-description">{{ $sections[$i]->description }}</label>
                                </template>
                                @php
                                    $questionNumber = 1;
                                @endphp

                                @foreach ($sections[$i]->questions as $index => $question)
                                    <b>{{ $index + 1 }}. {{ $question->value }}</b>
                                    <div style="display: flex; justify-content: center; margin-top: 5px; margin-bottom: 15px;">
                                        @foreach ($options as $weight => $optionText)
                                            <label style="margin-right:60px">
                                                <input type="radio"
                                                    name="answers[{{ $sections[$i]->id }}][{{ $question->id }}]"
                                                    value="{{ $weight }}"
                                                    {{ old("answers.{$sections[$i]->id}.{$question->id}") == $weight ? 'checked' : '' }}>
                                                {{ $optionText }}
                                            </label>
                                        @endforeach
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-center">
                                    <div class="button-container">
                                        @if ($i > 0)
                                            <button type="button" class="previous w-30 btn btn-md btn-primary mt-3"
                                                data-section="{{ $i }}">Previous</button>
                                        @endif

                                        @if ($i < $sectionCount - 1)
                                            <button type="button" class="next w-30 btn btn-md btn-primary mt-3"
                                                data-section="{{ $i }}">Next</button>
                                        @endif

                                        @if ($i == $sectionCount - 1)
                                            <button class="w-30 btn btn-md btn-primary mt-3" type="submit">Submit</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </form>
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

            const contentTitle = document.querySelector(`#section${sectionId} #templateContentTitle`).content.querySelector(
                ".content-title").textContent
            document.querySelector('.head-title').textContent = contentTitle
            const contentDesc = document.querySelector(`#section${sectionId} #templateContentTitle`).content.querySelector(
                ".content-description").textContent
            document.querySelector('.head-description').textContent = contentDesc
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
    <script>
        $(document).ready(function() {
            // Function to validate the form before submission
            function validateForm() {
                // Example: Check if all questions are answered
                var unansweredQuestions = $('input[type=radio]:not(:checked)').length;
                //  if (unansweredQuestions > 0) {
                    // alert('Please answer all question!');
                    // for (var key in errors) {
                    // var errorMessage = '<strong>Error!</strong> ' + 'Please answer all question!' + '<br>';
                    // }
                    // console.log('MASUK');
                    // $('#error-container').html(errorMessage).show();
                    // setTimeout(function() {
                    // $('#error-container').hide();
                    // }, 3000);
                    // return false; // Prevent form submission
                // }

                // Add more validation rules for other form fields as needed
                // ...

                return true; // Allow form submission if all validations pass
            }

            // Handle form submission
            $('#surveyForm').on('submit', function(event) {
                // Prevent default form submission behavior
                event.preventDefault();

                // Perform client-side form validation
                if (validateForm()) {
                    this.submit();
                }
            });

            $('#close-error').on('click', function() {
                $('#error-container').hide();
            });
        });
    </script>
@endsection
