<div class="bg-contact2" style="background-image: url('/images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form action="{{ route('quizzes.store') }}" class="contact2-form validate-form" method="POST">
                @csrf
                <br/>
                <span class="contact2-form-title">
                    {{ $quiz->title }}
                </span>

                @foreach($quiz->questions as $question)

                   <div class="boxes">
                  {{ $loop->iteration}}. {{$question->question}}

                  @foreach($question->answers as $answer)

                    <input type="checkbox" id="box-{{$loop->parent->iteration}}{{$loop->iteration}}" name="answers[]" value={{$answer}}>

                        <label for="box-{{$loop->parent->iteration}}{{$loop->iteration}}">
                            {{$answer->answer}}
                        </label>

                    @endforeach
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>