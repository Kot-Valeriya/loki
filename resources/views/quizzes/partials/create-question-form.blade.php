
<form class="contact2-form validate-form"
    action="
    @ifFromEdit
    {{route('quizzes.edit',['quiz'=>$quiz->id]) }}
    @else
      {{route('quizzes.questions.store',['quiz'=>$quiz->id]) }}
    @endif
      " method="POST" >
    @ifFromEdit
    @method('PATCH')
    @else
    @method('POST')
    @endif

    @csrf
     <br/>

          <span class="contact2-form-title">
            {{ $quiz->title }}
            @ifFromEdit
               <p> {{__('form-question.newQuestion')}}
              </p>
              @else
                 <p>
                  @php
                  echo trans_choice(
                    'form-question.remains',
                   request()->session()->get('remainingQuestions'),
                 );
                  @endphp
              </p>
              @endif
          </span>

            <div class="wrap-input2 validate-input" data-validate="Question is required">
            <input class="input2" type="text" name="question" value="{{old('question')}}">
            <span class="focus-input2 {{ $errors->has('question')? 'danger' : '' }}" data-placeholder="{{ $errors->has('question')? $errors->first('question'): __('form-quiz.question') }}"
             ></span>
          </div>


           <div class="wrap-input2 validate-input" data-validate="Correct answer is required">
            <input type="submit"  style="float:right" class="add-button" id="addCorrAnswer" value=" + ">
            <input class="input2" type="text" name="rightAnswer" value="{{old('rightAnswer')}}">
            <span class="focus-input2  {{ $errors->has('rightAnswer')? 'danger' : '' }}" data-placeholder="{{ $errors->has('rightAnswer')? $errors->first('rightAnswer'): __('form-quiz.correctAnswer') }}"
              ></span>
          </div>

          <div id="position_field_rightAnswer"></div>


          <div class="wrap-input2 validate-input" data-validate="Answer is required">
            <input type="submit"  style="float:right" class="add-button" id="addWrnAnswer" value=" + ">
            <input class="input2" type="text" name="wrongAnswer" value="{{old('wrongAnswer')}}">
            <span class="focus-input2  {{ $errors->has('wrongAnswer')? 'danger' : '' }}" data-placeholder="{{ $errors->has('wrongAnswer')? $errors->first('wrongAnswer'): __('form-quiz.wrongAnswer')  }}"
              ></span>
          </div>

          <div id="position_field_wrongAnswer"></div>

          <div id="position_field_question"></div>

          <div class="container-contact2-form-btn">
            <div class="wrap-contact2-form-btn">
              <div class="contact2-form-bgbtn"></div>

              <button name="sbmt-btn" value="add" type="submit" class="contact2-form-btn" style="background: url(/images/right-arrow.png) no-repeat right center;" >

               @if(request()->session()->get('remainingQuestions') ===0)
                {{__('form-question.done')}}
               @else
               {{__('form-question.nextQuestion')}}
               @endif
      </button>
    </div>
  </div>
</form>




