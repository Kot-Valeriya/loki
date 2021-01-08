<form
action="{{ route('quizzes.store')}}"
class="contact2-form validate-form"
method="POST">
    @csrf


    <span class="contact2-form-title">
        {{__('form-quiz.newQuiz')}}
    </span>

    <div class="wrap-input2 validate-input alert validate" data-validate="Title is required">
        <input class="input2" name="title" type="text" value="{{old('title')}}">
            <span class="focus-input2 @error('title') danger @enderror" data-placeholder="{{ $errors->has('title')? $errors->first('title'): __('form-quiz.title')}}">
            </span>
        </input>
    </div>

    <div class="wrap-input2 validate-input" data-validate="Description is required">
        <textarea class="input2" name="description">
            {{old('description')}}
        </textarea>

        <span class="focus-input2 @error('description') danger @enderror" data-placeholder="{{ $errors->has('description')? $errors->first('description'): __('form-quiz.description') }}">
        </span>
    </div>

    <div class="wrap-input2">
        <input class="input2"
        name="tags"
        type="text" id="tag_name"
        value="{{old('tags')}}"/>
            <span
            class="focus-input2
            @error('tags') danger @enderror"
            data-placeholder="{{ $errors->has('tags')? $errors->first('tags'):
            __('form-quiz.tags')}}">
            </span>
        <div id="tagList">
    </div>
    </div>

    <div class="wrap-input2 validate-input" data-validate="Number is required">
        <input class="input2" name="number_of_questions" type="text" value="{{old('number_of_questions')}}">
            <span class="focus-input2 @error('number_of_questions') danger @enderror" data-placeholder="{{ $errors->has('number_of_questions')? $errors->first('number_of_questions'): __('form-quiz.numberOfQuestions')}}">
            </span>
        </input>
    </div>

    <div class="wrap-input2 validate-input" data-validate="Question is required">
        <input class="input2" name="question" type="text" value="{{old('question')}}">
            <span class="focus-input2 @error('question') danger @enderror" data-placeholder="{{ $errors->has('question')? $errors->first('question'): __('form-quiz.question') }}">
            </span>
        </input>
    </div>

    <div class="wrap-input2 validate-input" data-validate="Correct answer is required">
        <input class="add-button" id="addCorrAnswer" style="float:right" type="submit" value=" + ">
        <input class="input2" name="rightAnswer" type="text" value="{{old('rightAnswer')}}">
        <span class="focus-input2 @error('rightAnswer') danger @enderror" data-placeholder="{{ $errors->has('rightAnswer')? $errors->first('rightAnswer'): __('form-quiz.correctAnswer') }}">
        </span>
    </div>

    <div id="position_field_rightAnswer">
    </div>

    <div class="wrap-input2 validate-input" data-validate="Answer is required">
      <input class="add-button" id="addWrnAnswer" style="float:right" type="submit" value=" + ">
      <input class="input2" name="wrongAnswer" type="text" value="{{old('wrongAnswer')}}">
        <span class="focus-input2 @error('wrongAnswer') danger @enderror" data-placeholder="{{ $errors->has('wrongAnswer')? $errors->first('wrongAnswer'): __('form-quiz.wrongAnswer')}}">
      </span>
    </div>

    <div id="position_field_wrongAnswer">
    </div>

    <div id="position_field_question">
    </div>

    <div class="container-contact2-form-btn">
        <div class="wrap-contact2-form-btn">
            <div class="contact2-form-bgbtn">
            </div>
            <button class="contact2-form-btn" style="background: url(/images/right-arrow.png) no-repeat right center;" type="submit"
            >
                {{__('form-quiz.newQuestion')}}
            </button>
        </div>
    </div>

</form>


