<form action="{{ route('questions.update',
['question'=>$question])}}" class="contact2-form validate-form" id="edit" method="POST">
    @method('PATCH')
 @csrf
</form>

<span class="contact2-form-title">
    {{ $quiz->title }}
    <p>
        Here you may update your question
    </p>
</span>


<div class="wrap-input2 validate-input" data-validate="Question is required">
    <br/>
    <input
    class="input2"
    name="question"
    type="text"
    value="{{$question->question}}">
        <span
        class="focus-input2
        {{ $errors->has('question')? 'danger' : '' }}" data-placeholder="{{ $errors->has('question')? $errors->first('question'): 'QUESTION' }}">
        </span>
    </input>
</div>
@php
    $wrngAnsCounter=0;
    $rightAnsCounter=0;
@endphp

@foreach($question->answers as $answer)

<form action="
    {{ route('answers.destroy',
             ['answer'=>$answer])}}"
    id="delete{{$loop->iteration}}"
    method="post">
    @method('delete')
       @csrf
</form>

@if($answer->is_correct)

<div
class="wrap-input2 validate-input"
data-validate="Correct answer is required">
    <br/>

     @if($rightAnsCounter===0)
    <input
    class="add-button"
    id="addCorrAnswer"
    style="float:right"
    type="submit"
    value=" + ">
    @php
    $rightAnsCounter++;
    @endphp


    @else
     <div class="delete-btn">
        <span class="toggle-btn" data-tooltip="Delete answer">
        <button  form="delete{{$loop->iteration}}" type="submit">
        </button>
       </span>
   </div>
    @endif
    <input class="input2" name="rightAnswer{{$loop->iteration}}" type="text" value="{{$answer->answer}}">
            <span class="focus-input2 {{ $errors->has('rightAnswer')? 'danger' : '' }}" data-placeholder="{{ $errors->has('rightAnswer')? $errors->first('rightAnswer'): 'CORRECT ANSWER' }}">
            </span>
        </input>
    </input>
</div>
<div id="position_field_rightAnswer">
</div>
@else
<div class="wrap-input2 validate-input" data-validate="Answer is required">
    <br/>
     @if($wrngAnsCounter===0)
    <input class="add-button" id="addWrnAnswer" style="float:right" type="submit" value=" + ">    </input>
    @php
    $wrngAnsCounter++;
    @endphp
        @else
        <div class="delete-btn">
        <span class="toggle-btn" data-tooltip="Delete answer">
        <button  form="delete{{$loop->iteration}}" type="submit">
        </button>
       </span>
    </div>
        @endif
        <input class="input2" name="wrongAnswer{{$loop->iteration}}" type="text" value="{{$answer->answer}}">
            <span class="focus-input2 {{ $errors->has('wrongAnswer')? 'danger' : '' }}" data-placeholder="{{ $errors->has('wrongAnswer')? $errors->first('wrongAnswer'): 'WRONG ANSWER' }}">
            </span>
        </input>
    </input>
</div>
@endif

@endforeach

<div id="position_field_wrongAnswer">
</div>

<div class="container-contact2-form-btn">
    <div class="wrap-contact2-form-btn">
        <div class="contact2-form-bgbtn">
        </div>
        <button class="contact2-form-btn" name="sbmt-btn" style="background: url(/images/right-arrow.png) no-repeat right center;" type="submit" value="add">
            Done !
        </button>
    </div>
</div>