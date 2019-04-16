<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the models blog post "created" event.
     *
     * @param \App\ModelsBlogPost $modelsBlogPost
     * @return void
     */
    public function created(BlogPost $modelsBlogPost)
    {
        //
    }

    public function creating(BlogPost $blogPost)
    {
        //TODO: сначала нужно сохранить отправить на проверку ошибки там потом только публикация
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);

        $this->setHtml($blogPost);

        $this->setUser($blogPost);
    }

    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            //TODO: add markdown
            $blogPost->content_html = ($blogPost->content_raw);
        }
    }

    protected function setUser(BlogPost $blogPost){

        //TODO: проверки на роли не обойтись
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param \App\ModelsBlogPost $modelsBlogPost
     * @return void
     */
    public function updated(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param \App\Models\BlogPost $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);
    }

    /**
     * Handle the models blog post "deleted" event.
     *
     * @param \App\ModelsBlogPost $modelsBlogPost
     * @return void
     */
    public function deleted(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param \App\ModelsBlogPost $modelsBlogPost
     * @return void
     */
    public function restored(BlogPost $modelsBlogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param \App\ModelsBlogPost $modelsBlogPost
     * @return void
     */
    public function forceDeleted(BlogPost $modelsBlogPost)
    {
        //
    }
}
