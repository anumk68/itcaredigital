<?php
namespace App\Jobs;

use App\Models\Subscribe;
use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\NewBlogMail;

class SendBlogToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function handle()
    {
        $subscribers = Subscribe::pluck('email')->toArray();

        $chunks = array_chunk($subscribers, 20);

        foreach ($chunks as $chunk) {
            foreach ($chunk as $email) {
                Mail::to($email)->queue(new NewBlogMail($this->blog));
            }
            sleep(10);
        }
    }

}
