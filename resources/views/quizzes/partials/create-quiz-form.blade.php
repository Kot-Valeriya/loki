
        <form method="POST" class="contact2-form validate-form"  action="{{ route('quizzes.store')}}">
          @csrf

          <span class="contact2-form-title">
            {{__('form-quiz.newQuiz')}}
          </span>

          <div class="wrap-input2 validate-input alert validate" data-validate="Title is required">
            <input class="input2" type="text" name="title" value="{{old('title')}}">
            <span class="focus-input2
            @error('title') danger @enderror"
            data-placeholder="{{ $errors->has('title')? $errors->first('title'): __('form-quiz.title')}}"></span>
          </div>

          <div class="wrap-input2 validate-input" data-validate = "Description is required">
            <textarea class="input2" name="description" >{{old('description')}}</textarea>
            <span class="focus-input2   @error('description') danger @enderror" data-placeholder="{{ $errors->has('description')? $errors->first('description'): __('form-quiz.description') }}">

            </span>
          </div>

            <div class="wrap-input2 validate-input" data-validate="Number is required">
            <input class="input2" type="text" name="number_of_questions" value="{{old('number_of_questions')}}">

            <span class="focus-input2  @error('number_of_questions') danger @enderror" data-placeholder="{{ $errors->has('number_of_questions')? $errors->first('number_of_questions'): __('form-quiz.numberOfQuestions')}}"></span>
            </div>

            <div class="wrap-input2 validate-input" data-validate="Question is required">
            <input class="input2" type="text" name="question" value="{{old('question')}}">
            <span class="focus-input2 @error('question') danger @enderror" data-placeholder="{{ $errors->has('question')? $errors->first('question'): __('form-quiz.question') }}"
             ></span>
          </div>


           <div class="wrap-input2 validate-input" data-validate="Correct answer is required">
            <input type="submit"  style="float:right" class="add-button" id="addCorrAnswer" value=" + ">
            <input class="input2" type="text" name="rightAnswer" value="{{old('rightAnswer')}}">
            <span class="focus-input2   @error('rightAnswer') danger @enderror" data-placeholder="{{ $errors->has('rightAnswer')? $errors->first('rightAnswer'): __('form-quiz.correctAnswer') }}"
              ></span>
          </div>

          <div id="position_field_rightAnswer"></div>


          <div class="wrap-input2 validate-input" data-validate="Answer is required">
            <input type="submit"  style="float:right" class="add-button" id="addWrnAnswer" value=" + ">
            <input class="input2" type="text" name="wrongAnswer" value="{{old('wrongAnswer')}}">
            <span class="focus-input2  @error('wrongAnswer') danger @enderror" data-placeholder="{{ $errors->has('wrongAnswer')? $errors->first('wrongAnswer'): __('form-quiz.wrongAnswer')}}"
              ></span>
          </div>

          <div id="position_field_wrongAnswer"></div>

          <div id="position_field_question"></div>

          <div class="container-contact2-form-btn">
            <div class="wrap-contact2-form-btn">
              <div class="contact2-form-bgbtn"></div>

              <button type="submit" class="contact2-form-btn" style="background: url(/images/right-arrow.png) no-repeat right center;">
               {{__('form-quiz.newQuestion')}}
              </button>
            </div>
          </div>
        </form>






