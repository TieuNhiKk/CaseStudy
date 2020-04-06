<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class checkpost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $messages = [
            'title.required' => 'Chưa có tiêu đề',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'title.string' => 'Tiêu đề dộ dài tối đa là 255 ký tự',
            'title.max' => 'Tiêu đề quá dài',
            'content.required' => 'Chưa có nội dung',
            'checkavatar.image' => 'Không phải là ảnh'
        ];
        if ($request->method() == 'PATCH') {
            $id = $request->route()->parameters()['post']->id;
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => ['required', 'string', 'max:255', "unique:posts,title,$id,id"],
                    'content' => ['required'],
                    'checkavatar' => ['image']
                ],
                $messages
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => ['required', 'string', 'max:255', 'unique:posts'],
                    'content' => ['required'],
                    'checkavatar' => ['image']
                ],
                $messages
            );
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        return $next($request);
    }
}
