<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{

  public function __construct($title, $excerpt, $date, $body)
  {
    $this->title = $title;
    $this->excerpt = $excerpt;
    $this->date = $date;
    $this->body = $body;
  }


  public static function all()
  {
    $files = File::files(resource_path("posts/"));

    return array_map(fn ($file) => $file->getContents(), $files);
  }

  public static function find($slug)
  {

    if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
      throw new ModelNotFoundException();
    }
    return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));
  }
}
