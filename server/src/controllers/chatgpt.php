<?php declare(strict_types=1);

class ChatgptController extends GuardController {
    function index(): void {
      $messages = [];
      $messages[] = ['role' => 'user', 'content' => 'Player made the decision to go left'];
      $response = $this->chatGPTRequest($messages);
      $this->json(200, $response);
    }

  private function chatGPTRequest($messages) {
    $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . Configs::get('openaisecret')
    ];

    $data = [
      'model' => 'gpt-3.5-turbo',
      'messages' => $messages,
      "max_tokens"=> 400, // Adjust as needed
      "temperature"=> 0.7 // Adjust as needed
    ];
      $options = [
            'timeout' => 20,
        ];

    $url = 'https://api.openai.com/v1/chat/completions';
    $response = WpOrg\Requests\Requests::post($url, $headers, json_encode($data), $options);

    $decodedResponse = json_decode($response->body, true);
    return $decodedResponse;
  }
}
