###add livewire to laravel
```
composer require livewire/livewire
```

add 
 ```
 <livewire:styles/> in welcome.blade.php headers
```
 
 add
  ```
 <livewire:scripts/> in welcome.blade.php body
```

 
###create component with
``` 
php artisan make:livewire counter
```

###render livewire component in welcome.blade.php like
```
<livewire:counter/>
```


###click event fire like
```
<button wire:click="increment">+</button>

increment is a function in app/Http/Livewire/<php class>
```

###data binding like
```
<input type="text" wire:model.debounce.lazy="newComment">
```

###passing data as props to components like
```
welcome.blade.php
    <livewire:comments commentsAsProp="Here is a new comment, passing as a vueJs props, you can catch this from mount function"/>

app/Http/Livewire/<php class
    public $comments
    public function mount($commentsAsProp)
    {
        $this->comments = $commentsAsProp;
    }
$comments can be used in comments.blade.php as it is public and livewire has been wired blade and class together
```


###passing data as props with binding

1 from route
```
web.php
pass commentsFromWebPHP from 
    Route::get('/', function () {
        $commentsFromWebPHP = \App\Models\Comment::all();
        return view('welcome', compact('commentsFromWebPHP'));
    });

and catch them from and pass to relavant livewire blade component
    <livewire:comments :commentsAsProp="$commentsFromWebPHP"/>
```

2 from mount function
```
web.php
    Route::get('/', function () {
        return view('welcome');
    });


app/Http/Livewire/<php class>
    public $comments
    public function mount()
        {
            $commentsAsProp = Comment::all();
            $this->comments = $commentsAsProp;
        }

welcome.blade.php
    <livewire:comments />
```

###showing validations like
```
app/Http/Livewire/<php class>
    public function addComment()
        {
           $this->validate([
               'name' => 'required'
           ]);
        }
comments.blade.php
   <input type="text" wire:model="name">
   @error('name') <span class="error">{{ $message }}</span> @enderror
```

###passing data to components like
```
app/Http/Livewire/<php class>
    public function deleteComment($commentId){
       dd('delete '.$commentId);
    }
comments.blade.php
     <div class="text-danger delete-btn" wire:click="deleteComment({{$comment->id}})">X</div>
```
