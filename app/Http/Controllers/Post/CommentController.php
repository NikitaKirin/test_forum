<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    const COMMENT_RULES = ['text' => 'required|string|max:255'];
    const COMMENT_MESSAGES = [
        'required' => 'Данное поле обязательно для заполнения',
        'string'   => 'Введены не допустимые символы',
        'max'      => 'Превышен допустимый лимит: :max символов',
    ];

    // Вывести все комментарии определенной темы форума
    public function index( Request $request, Post $post ): Collection {
        return $post->comments()->get();
    }

    // Создать новый комментарий
    public function store( Request $request, Post $post ): RedirectResponse {
        $validated = $request->validate(self::COMMENT_RULES, self::COMMENT_MESSAGES);
        $comment = new Comment($validated);
        $comment->user()->associate(Auth::user());
        $comment->post()->associate($post);
        if ( $comment->save() ) {
            return redirect()->back()->with('success', 'Новый комментарий успешно создан!');
        }

        return redirect()->back()->withErrors('Произошла ошибка. Попробуйте еще раз');
    }

    // Открыть форму для изменения комментария
    public function edit( Request $request, Post $post, Comment $comment ) {

    }

    // Обновить данные комментария
    public function update( Request $request, Comment $comment ): RedirectResponse {
        $validated = $request->validate(self::COMMENT_RULES, self::COMMENT_MESSAGES);
        if ( $comment->update($validated) ) {
            return redirect()->back()->with('success', 'Комментарий успешно обновлен');
        }
        return redirect()->back()->withErrors('Произошла ошибка. Повторите попытку еще раз');
    }

    // Удалить комментарий
    public function destroy( Request $request, Comment $comment ) {

    }
}
