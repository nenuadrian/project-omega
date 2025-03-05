<?php declare (strict_types = 1);

class AI
{
    public static $endpoint = 'https://api.openai.com/v1/chat/completions';
    public static $max_tokens = 700;

    public static function chat(array $messages, string $model = 'gpt-4o-mini')
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . Configs::get('openaisecret'),
        ];

        $data = [
            'model' => $model,
            'messages' => $messages,
            "max_tokens" => AI::$max_tokens, // Adjust as needed
            "temperature" => 0.7, // Adjust as needed
        ];
        $options = [
            'timeout' => 60,
        ];

        $response = WpOrg\Requests\Requests::post(AI::$endpoint, $headers, json_encode($data), $options);

        $decodedResponse = json_decode($response->body, true);

        if (isset($decodedResponse['error'])) {
            return $decodedResponse['error']['message'];
        }

        return $decodedResponse['choices'][0]['message']['content'];
    }
}
