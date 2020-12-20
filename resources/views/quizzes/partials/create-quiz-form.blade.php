
        <form method="POST" class="contact2-form validate-form"  action="{{ route('quizzes.store')}}">
          @csrf

          <span class="contact2-form-title">
            New quiz
          </span>

          <div class="wrap-input2 validate-input alert validate" data-validate="Title is required">
            <input class="input2" type="text" name="title">
            <span class="focus-input2
            {{ $errors->has('title')? 'danger' : '' }}"
            data-placeholder="{{ $errors->has('title')? $errors->first('title'): 'TITLE'}}"
            value=" {{old('title')}} "></span>
          </div>

          <div class="wrap-input2 validate-input" data-validate = "Description is required">
            <textarea class="input2" name="description"></textarea>
            <span class="focus-input2   {{ $errors->has('description')? 'danger' : '' }}" data-placeholder="{{ $errors->has('description')? $errors->first('description'): 'DESCRIPTION' }}"
              value="{{old('description')}}"></span>
          </div>

            <div class="wrap-input2 validate-input" data-validate="Number is required">
            <input class="input2" type="text" name="number_of_questions" >
            <span class="focus-input2  {{ $errors->has('number_of_questions')? 'danger' : '' }}" data-placeholder="{{ $errors->has('number_of_questions')? $errors->first('number_of_questions'): 'NUMBER OF QUESTIONS' }}
              " value="{{old('number_of_questions')}}"></span>
            </div>

            <div class="wrap-input2 validate-input" data-validate="Question is required">
            <input class="input2" type="text" name="question" >
            <span class="focus-input2 {{ $errors->has('question')? 'danger' : '' }}" data-placeholder="{{ $errors->has('question')? $errors->first('question'): 'QUESTION' }}"
             ></span>
          </div>


           <div class="wrap-input2 validate-input" data-validate="Correct answer is required">
            <input type="submit"  style="float:right" class="add-button" id="addCorrAnswer" value=" + ">
            <input class="input2" type="text" name="rightAnswer" >
            <span class="focus-input2  {{ $errors->has('rightAnswer')? 'danger' : '' }}" data-placeholder="{{ $errors->has('rightAnswer')? $errors->first('rightAnswer'): 'CORRECT ANSWER' }}"
              ></span>
          </div>

          <div id="position_field_rightAnswer"></div>


          <div class="wrap-input2 validate-input" data-validate="Answer is required">
            <input type="submit"  style="float:right" class="add-button" id="addWrnAnswer" value=" + ">
            <input class="input2" type="text" name="wrongAnswer" >
            <span class="focus-input2  {{ $errors->has('wrongAnswer')? 'danger' : '' }}" data-placeholder="{{ $errors->has('wrongAnswer')? $errors->first('wrongAnswer'): 'WRONG ANSWER' }}"
              ></span>
          </div>

          <div id="position_field_wrongAnswer"></div>

          <div id="position_field_question"></div>

          <div class="container-contact2-form-btn">
            <div class="wrap-contact2-form-btn">
              <div class="contact2-form-bgbtn"></div>

              <button type="submit" class="contact2-form-btn" style="background: url(/images/right-arrow.png) no-repeat right center;">
               New Question!
              </button>
            </div>
          </div>
        </form>




<script>

countRightAnswers = 0;
countWrongAnswers=0;

$(document).ready(function(){
    window.console && console.log('Document ready called');

    var max_answers = 8;
    $('#addWrnAnswer').click(function(event){
        event.preventDefault();
        if ( countWrongAnswers >= max_answers ) {
            alert("Maximum of number of possible answers exceeded");
            return;
        }
        countWrongAnswers++;
        window.console && console.log("Adding answer "+countWrongAnswers);

        $('#position_field_wrongAnswer').append(
          '<div id="positionWrongAnswer'+countWrongAnswers+'">\
             <div class="wrap-input2 validate-input " data-validate="Answer is required">\
            <input type="submit"  style="float:right" class="add-button" id="addWrnAnswer" value=" - "  \
            onclick="$(\'#positionWrongAnswer'+countWrongAnswers+'\').remove();return false;">\
            <input class="input2" type="text" name="wrongAnswer'+countWrongAnswers+'">\
            <span class="focus-input2" data-placeholder="WRONG ANSWER"></span>\
          </div>\
          ');
    });

    var max_right_answers = 8;
    $('#addCorrAnswer').click(function(event){
        event.preventDefault();
        if ( countRightAnswers >= max_right_answers ) {
            alert("Maximum of number of possible right answers exceeded");
            return;
        }
        countRightAnswers++;
        window.console && console.log("Adding answer "+countRightAnswers);

        $('#position_field_rightAnswer').append(
          '<div id="positionRightAnswer'+countRightAnswers+'">\
             <div class="wrap-input2 validate-input" data-validate="Correct answer is required" ">\
            <input type="submit"  style="float:right" class="add-button" id="addWrnAnswer" value=" - "  \
            onclick="$(\'#positionRightAnswer'+countRightAnswers+'\').remove();return false;">\
            <input class="input2" type="text" name="rightAnswer'+countRightAnswers+'">\
            <span class="focus-input2" data-placeholder="CORRECT ANSWER"></span>\
          </div>\
          ');
    });
  });

</script>


