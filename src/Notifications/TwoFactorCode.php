<?php

namespace Stanfortonski\Laraveltwofactor\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TwoFactorCode extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->subject(__('twofactor::twofactor.notification.subject'))
                                ->line(__('twofactor::twofactor.notification.main_line').': '.$notifiable->two_factor_code)
                                ->action(__('twofactor::twofactor.notification.action'), route('twofactor.verify.index'))
                                ->line(__('twofactor::twofactor.notification.expire_in').' '.config('twofactor.expire_duration').' '.__('twofactor::twofactor.notification.minutes').'.');
    }
}
