

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

