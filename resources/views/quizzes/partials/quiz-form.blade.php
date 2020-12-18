<div class="bg-contact2" style="background-image: url('/images/bg-01.jpg');">
    <div class="container-contact2">
        <div class="wrap-contact2">
            <form action="/quizzes/{{$quiz->id}}/result" class="contact2-form validate-form" method="POST">
                @csrf
                <br/>
                <span class="contact2-form-title">
                    {{ $quiz->title }}
                </span>

                @foreach($quiz->questions as $question)

                   <div class="boxes">
                  {{ $loop->iteration}}. {{$question->question}}

                  @foreach($question->answers as $answer)

                    <input type="checkbox" id="box-{{$loop->parent->iteration}}{{$loop->iteration}}" name="answers[]" value={{$answer->is_correct}}>

                        <label for="box-{{$loop->parent->iteration}}{{$loop->iteration}}">
                            {{$answer->answer}}
                        </label>

                    @endforeach
                </div>
                @endforeach
                <div class="container-contact2-form-btn">
            <div class="wrap-contact2-form-btn">
              <div class="contact2-form-bgbtn"></div>
                 <button type="submit" class="contact2-form-btn" style="background: url(/images/right-arrow.png) no-repeat right center;">
               Done!
              </button>
              </div>
          </div>
            </form>
        </div>
    </div>
</div>