<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Вывести список всех доступных тем на форуме
    public function index() {
        return view('post.posts', ['posts' => Post::all()]);
    }

    // Вывести список тем текущего авторизованного пользователя
    public function authIndex() {
        return view('user.auth-user-posts', ['posts' => Auth::user()->posts]);
    }

    // Вывести страницу с формой для создания новой темы
    public function create() {
        return view('post.post-form');
    }

    // Создать новую тему для форума
    public function store( PostCreateRequest $request ): RedirectResponse {
        $validated = $request->safe()->only(['title', 'description']);
        if ( Auth::user()->posts()->create($validated) ) {
            return redirect()->back()->with('success', 'Новая тема успешно создана');
        }

        return redirect()->back()->withErrors('Произошла ошибка при создании новой темы. Попробуйте еще раз');
    }

    // Посмотреть определенную тему форума
    public function show( Request $request, Post $post ) {
        return view('post.post', ['post' => $post, 'comments' => $post->comments()->get()]);
    }

    // Вывести форму для изменения определенной темы форума
    public function edit( Request $request, Post $post ) {
        return view('post.post-edit-form', ['post' => $post]);
    }

    // Обновить данные определенной темы форума
    public function update( PostUpdateRequest $request, Post $post ): RedirectResponse {
        $validated = $request->safe()->only(['title', 'description']);
        if ( $post->update($validated) ) {
            return redirect()->route('posts.show', ['post' => $post])->with('success', 'Данные темы обновлены успешно');
        }
        return redirect()->back()->withErrors('Произошла ошибка при обновлении темы. Попробуйте еще раз');
    }


    // Удалить определенную тему
    public function destroy( Request $request, Post $post ): RedirectResponse {
        if ( $post->delete() ) {
            return redirect()->route('posts.index')->with('success', 'Ваша тема успешна удалена');
        }
        return redirect()->back()->withErrors('Произошла ошибка при удалении темы. Попробуйте еще раз');
    }
}
