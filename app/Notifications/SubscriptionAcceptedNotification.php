<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SubscriptionAcceptedNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail']; // Vous pouvez ajouter d'autres canaux ici, comme 'database' pour stocker les notifications en base de données
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmation d\'abonnement accepté')
            ->line('Votre abonnement a été accepté avec succès.');
    }
}
