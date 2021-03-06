<form action="/quizzes/{{($quiz->id)}}" class="contact2-form validate-form" method="POST">
    @method('PATCH')
        @csrf
    <br/>

    @if(session()->has('message'))
       <div class="success-msg">
       <i class="fa fa-check"></i>
       {{ session()->get('message') }}
    </div>
    @endif

    <div class="wrap-input2 validate-input alert validate" data-validate="Title is required">
         <br/>
        <input class="input2" name="title" type="text" value="{{$quiz->title}}">
            <span
            class="focus-input2 {{ $errors->has('title')? 'danger' : '' }}"
            data-placeholder="{{ $errors->has('title')? $errors->first('title'): __('form-quiz.title')}}"
            value=" {{$quiz->title}} ">
            </span>
        </input>
    </div>

    <div class="wrap-input2 validate-input">
         <br/>
        <textarea class="input2" name="description" value="{{$quiz->description}}">{{$quiz->description}}
        </textarea>
        <span
        class="focus-input2 {{ $errors->has('description')? 'danger' : '' }}"
        data-placeholder="{{ $errors->has('description')? $errors->first('description'): __('form-quiz.description') }}"
        value="{{$quiz->description}}">
        </span>
    </div>

    @foreach($quiz->questions as $question)

    <div class="wrap-input2 validate-input" data-validate>
    <br/>

    <div class="edit-btn">
    <a href="{{route('questions.edit', ['question'=>$question])}}" class="toggle-btn" data-tooltip="Edit question"></a>
    </div>


         <input class="input2" name="question{{$loop->iteration}}" type="text" value="{{$question->question}}">
            <span class="focus-input2
            {{ $errors->has('question$loop->iteration') ? 'danger' : '' }}"
            data-placeholder="
            {{
                $errors->has('question$loop->iteration') ?
                $errors->first('question$loop->iteration') :
                $loop->iteration.'. '. __('form-quiz.question')
            }}">
            </span>
        </input>
    </div>


    @foreach($question->answers as $answer)

    @if($answer->is_correct)
    <div class="wrap-input2 validate-input" data-validate="Correct answer is required">
          <br/>
            <input class="input2"
            name="rightAnswer{{$loop->parent->iteration}}.{{$loop->iteration}}"
            type="text"
            value="{{$answer->answer}}">
                <span
                class="focus-input2
                {{ $errors->has('rightAnswer'.$loop->parent->iteration.'_'.$loop->iteration)? 'danger' : '' }}"
                data-placeholder="
                {{ $errors->has('rightAnswer'.$loop->parent->iteration.'_'.$loop->iteration)?
                $errors->first('rightAnswer'.$loop->parent->iteration.'_'.$loop->iteration):
                __('form-quiz.correctAnswer') }}">
                </span>
        </input>
    </div>
    <div id="position_field_rightAnswer">
    </div>

    @else
    <div class="wrap-input2 validate-input" data-validate="Answer is required">
        <br/>
      <input class="input2"
      name="wrongAnswer{{$loop->parent->iteration}}.{{$loop->iteration}}"
      type="text"
      value="{{$answer->answer}}">
        <span class="focus-input2
        {{ $errors->has('wrongAnswer'.$loop->parent->iteration.'_'.$loop->iteration)? 'danger' : '' }}"
        data-placeholder="{{ $errors->has('wrongAnswer'.$loop->parent->iteration.'_'.$loop->iteration)?
        $errors->first('wrongAnswer'.$loop->parent->iteration.'_'.$loop->iteration):
        __('form-quiz.wrongAnswer') }}">
        </span>
      </input>
    </div>
    @endif

    @endforeach
    <br/>
    @endforeach

<div class="container-contact2-form-btn">
    <div class="wrap-contact2-form-btn">
        <div class="contact2-form-bgbtn">
        </div>

        <button class="contact2-form-btn" name="sbmt-btn"  value="save" type="submit">
        <span>
            {{__('form-quiz.doneBtn')}}
        </span>
        </button>

        <button class="contact2-form-btn" type="submit" name="sbmt-btn" value="create">
            <span>
                {{__('form-quiz.addNew')}}
           </span>
        </button>
    </div>
</div>

</form>