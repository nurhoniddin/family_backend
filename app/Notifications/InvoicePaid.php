<?php

namespace App\Notifications;

use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {

//        $url = url('/invoice/' . $this->invoice->id);

        return TelegramFile::create()
            // Optional recipient user id.
            ->to(-1001359496542)
            // Markdown supported.
            ->content("*$notifiable->title_uz*\n$notifiable->description_uz")
            ->file(public_path("storage/$notifiable->image"), 'photo'); // local photo
            // (Optional) Blade template for the content.
//             ->view('notification.telegram');

            // (Optional) Inline Buttons
//            ->button('View Invoice', $url)
//            ->button('Download Invoice', $url);
    }
}
