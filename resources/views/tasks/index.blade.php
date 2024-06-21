tasks index
<h1>The list of tasks</h1>
<ul>
    @forelse($tasks as $task)
        <li><a href="{{ route('tasks.show', $task->id) }}">{{$task->title}}</a></li>
    @empty
        <li>There are no tasks!</li>
    @endforelse
</ul>
