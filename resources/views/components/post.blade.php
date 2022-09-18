@props(['post' => $post])
<div class="card">
                <div class="card-header">
                    <a href="{{route('users.posts', $post->user)}}">{{$post->user->username}}</a>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{$post->body}}</p>
                        <footer class="blockquote-footer">Created <cite title="Source Title">{{$post->created_at->diffForHumans()}}</cite></footer>
                    </blockquote>
                    
                </div>
                    <div class="row">
                        <div class="col-md-9 my-1">
                        @auth
                            @can('delete', $post)
                                <form action="{{route('posts.delete', $post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="col-md-3 btn btn-primary my-1">Delete</button>
                                </form>
                            @endcan

                        @if(!$post->likedBy(auth()->user()))
                            <form action="{{route('posts.likes', $post)}}" method="post">
                                @csrf
                                <button type="submit" class="col-md-3 btn btn-primary" style="float:left;">like</button>
                            </form>
                        @else
                            <form action="{{route('posts.likes', $post)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="col-md-3 btn btn-primary" style="float: left;">Unlike</button>
                            </form>
                        @endif
                        @endauth

                        <div class="col-md-3 mx-2" style="float: left;">
                            <span class="badge bg-secondary">{{$post->likes->count()}}</span> {{ Str::plural('like', $post->likes->count())}}
                        </div>
                        
                        </div>
                    </div>
            </div>