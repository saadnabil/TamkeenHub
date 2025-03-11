<?php

namespace Modules\JoinUs\App\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JoinUsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Join Us Request')
            ->view('joinus::emails.joinUs')
            ->with(['details' => $this->details])
            ->attach($this->details['cv']->getRealPath(), [
                'as' => 'cv.pdf', // يمكنك تغيير الاسم حسب ما تريد
                'mime' => 'application/pdf', // تأكد من أن MIME type صحيح
            ]);
    }
}
