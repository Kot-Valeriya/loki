<!-- Sidebar -->
<div class="4u" id="sidebar">
    <section>
        <header>
            <h2>
                {{__('partials.newcomes')}}
            </h2>
        </header>
        <ul class="style">
            @foreach($newQuizzes as $quiz)
            <li>
                <p class="posted">
                    {{$quiz->title}} |  {{$quiz->updated_at}}
                </p>
                <p>
                    <a href="#">
                        {{$quiz->description}}
                    </a>
                </p>
            </li>
            @endforeach
        </ul>
    </section>
</div>
