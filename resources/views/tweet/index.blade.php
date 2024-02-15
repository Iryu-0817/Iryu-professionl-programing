<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
    <h1>つぶやきアプリ</h1>
    <div>
       
    @auth
        <p>投稿フォーム</p>
        @if(session('feedback.success'))
            <p style="color: green;">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{ route('tweet.create') }}" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea  id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
            @error('tweet')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">投稿</button>
    @endauth

            @foreach ($tweet as $tweet)
            <details>
                <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
                <div>
                    <a  href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a><br>
                    <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                        @method('DELETE')
                        @csrf 
                        <button type="submit"> 削除 </button>
                    </form>
                </div>
            </details>
        @endforeach
        </form> 
    </div>
</body>
</html>