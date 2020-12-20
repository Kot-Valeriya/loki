            <form action="/quizzes/{{$quiz->id}}/result" class="contact2-form validate-form" method="POST">
               @method('PATCH')
                @csrf
                <br/>
                <div
                class="wrap-input2 validate-input alert validate"
                data-validate="Title is required">
                <input class="input2"
                type="text"
                name="title"
                value="{{$quiz->title}}">
                <span class="focus-input2
                {{ $errors->has('title')? 'danger' : '' }}"
                data-placeholder="{{ $errors->has('title')? $errors->first('title'): 'TITLE'}}"
                value=" {{$quiz->title}} "></span>
          </div>

            <div class="wrap-input2 validate-input"
            data-validate = "Description is required">
            <textarea class="input2" name="description" value="{{$quiz->description}}"></textarea>
            <span class="focus-input2   {{ $errors->has('description')? 'danger' : '' }}" data-placeholder="{{ $errors->has('description')? $errors->first('description'): 'DESCRIPTION' }}"
              value="{{$quiz->description}}"></span>
          </div>

                @foreach($quiz->questions as $question)

                   <div class="wrap-input2 validate-input" data-validate="Question is required">
            <input class="input2" type="text" name="question" value="{{$question->question}}">
            <span class="focus-input2 {{ $errors->has('question')? 'danger' : '' }}" data-placeholder="{{ $errors->has('question')? $errors->first('question'): '$question->question' }}"
             ></span>
          </div>


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