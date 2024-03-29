@props(['method'])

<div x-data='toDoList()'
    x-init="initialize()">

    <div class="mx-auto max-w-2xl rounded-lg bg-gray-200 px-12 py-8 shadow-lg">
        <div class="mb-8 flex flex-col items-center justify-center">
            <h1 class="mb-8 text-3xl font-bold">To Do List</h1>
            <input type="text"
                x-model="newTodo"
                placeholder="I need to..."
                class="mx-auto min-w-full rounded px-4 py-2 text-lg shadow"
                @keydown.enter="addToDo">
        </div>
        <div class="mb-8 w-full rounded bg-white shadow">
            <template x-for="(todo, index) in todos"
                :key="index">
                <div class="ml-8 flex items-center py-4"
                    :class="{ 'border-b border-gray-400': !isLastToDo(index) }">
                    <div class="w-1/12 text-center">
                        <input type="checkbox"
                            x-model="todo.completed">
                    </div>
                    <div class="w-10/12">
                        <p x-text="todo.todo"
                            :class="{ 'line-through': todo.completed }"></p>
                    </div>
                    <div class="w-1/12 text-center">
                        <button class="text-red rounded bg-red-600 px-2 py-1 hover:bg-red-700"
                            @click="deleteToDo(index)">
                            &cross;
                        </button>
                    </div>
                </div>
            </template>

            <button class="btn text-red rounded bg-red-600 px-2 py-1 hover:bg-red-700"
                x-on:click="$wire.{{$method}}()">
                Call Livewire
            </button>
        </div>
        <div>
            <span x-text="numberOfToDosCompleted"></span> / <span x-text="toDoCount"></span> to dos completed
        </div>
    </div>

</div>

<script>
    function toDoList() {
        return {
            newTodo: "",
            todos: [],
            addToDo() {
                if (this.newTodo.trim() !== "") {
                    this.todos.push({
                        todo: this.newTodo,
                        completed: false
                    });
                    this.newTodo = "";
                };
            },
            deleteToDo(index) {
                this.todos.splice(index, 1);
            },
            get numberOfToDosCompleted() {
                return this.todos.filter(todo => todo.completed).length;
            },
            get toDoCount() {
                return this.todos.length;
            },
            isLastToDo(index) {
                return this.todos.length - 1 === index;
            },
            initialize() {
                console.log(this.$wire.val);
                if (this.todos.length === 0) {
                    this.todos.push({
                        todo: "Task 1",
                        completed: false
                    });
                }
            }
        };
    }
</script>

{{-- <div x-data='{ 
    newTodo: "",
    todos: [],
    addToDo() {
        if (this.newTodo.trim() !== "") {
            this.todos.push({
                todo: this.newTodo,
                completed: false
            });
            this.newTodo = "";
        };
        $wire.abc()
        $wire.set("val", 5)
    },
    deleteToDo(index) {
        this.todos.splice(index, 1);
    },
    get numberOfToDosCompleted() {
        return this.todos.filter(todo => todo.completed).length;
    },
    get toDoCount() {
        return this.todos.length;
    },
    isLastToDo(index) {
        return this.todos.length - 1 === index;
    },
    initialize() {
        if (this.todos.length === 0) {
            this.todos.push({
                todo: "Task 1",
                completed: false
            });
        }
    }
}'
    x-init="initialize"></div> --}}
