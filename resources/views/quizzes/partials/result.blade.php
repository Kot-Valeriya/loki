<span class="contact2-form-title">
    {{ $quiz->title }}
</span>



  <div class="muck-up">
  <div class="overlay"></div>
  <div class="top">
    <div class="user-profile">
      <img src="{{url('/images/user-picture.png')}}">
      <div class="user-details">
        <h4> @php echo __('form-quiz.score', ['score'=>$score]);@endphp</h4>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="bottom">
    <div class="title">
      <h3>{{__('form-quiz.correct')}}</h3>
    </div>

<ul class="points">
@foreach($quiz->questions as $question)
<li class="yellow">
                   <div class="boxes">
                  {{ $loop->iteration}}. {{$question->question}}

                  @foreach($question->answers as $answer)

                    <input type="checkbox" id="box-{{$loop->parent->iteration}}{{$loop->iteration}}" name="answers[]" value="{{$answer->is_correct}}"
                    @ifIsCorrect($answer)
                    checked
                     @endif>

                        <label for="box-{{$loop->parent->iteration}}{{$loop->iteration}}"
                          @ifIsCorrect($answer)
                          class="correct"
                          @endif
                          >
                            {{$answer->answer}}
                        </label>

                    @endforeach
                </div>
              </li>
                @endforeach
              </ul>

      </div>
    </div>
<div class="container-contact2-form-btn">
    <div class="wrap-contact2-form-btn">
        <div class="contact2-form-bgbtn">
        </div>
        <form action="{{ route('quizzes.index')}}" id="check"> </form>
        <form action="{{route('leaderboard')}}" id="leaderboard"></form>
        <button class="contact2-form-btn"  type="submit"
        form="check">
            <span>
              {{__('form-quiz.anotherTest')}}
            </span>
        </button>


        <button class="contact2-form-btn"  type="submit" form="leaderboard">
            <span>
            {{__('form-quiz.leaderboard')}}
          </span>
        </button>

    </div>
</div>