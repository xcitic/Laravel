<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Commentable\Models;
use BrianFaust\Commentable\Traits;

class Post extends Model implements Traits
{
  use HasCommentsTrait;
}
