<!-- Sidebar -->
<div class="4u" id="sidebar">
    <section>
        <header>
            <h2>
                Recently added
            </h2>
        </header>
        <ul class="style">
            @foreach($quizzes as $quiz)
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
